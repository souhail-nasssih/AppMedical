<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailOrdAnalyseRadioController;
use App\Http\Controllers\DetailOrdMedController;
use App\Http\Controllers\InfoPatientController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\MedecinPatientController;
use App\Http\Controllers\OrdAnaliseRadioController;
use App\Http\Controllers\OrdMedicamentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/medecinAttend', function () {
    return view('medecin.attend');
})->name('medecinAttend');


Route::get('/admin', function () {
    return route('login');
})->middleware('auth');


Route::get('/admin/dashbord', function () {
    return route('login');
})->middleware('auth');



Route::get('/liste-patient', [PatientController::class, 'indexPatient'])->middleware('auth')->name('listePatient');



Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role == 'patient') {
        return view('patient.dashboard');
    }

    if ($user->role == 'medecin') {
        return view('medecin.dashboard');
    }
    if ($user->role == 'admin') {
        return view('admin.dashboard');
    }

    return redirect()->route('home')->with('error', 'Invalid user role.');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Routes pour les patients
Route::prefix('patients')->middleware('auth')->group(function () {
    Route::get('/', [PatientController::class, 'index'])->name('patient');
    Route::get('/create', [PatientController::class, 'create'])->name('patient.create');
    Route::get('/{id}', [PatientController::class, 'show'])->name('patients.show');
    Route::get('/{id}/analyses', [PatientController::class, 'analyseStats'])->name('patients.analyse');
    Route::get('/{id}/maladies', [PatientController::class, 'maladieChroniqueStats'])->name('patients.maladie');
});

Route::middleware(['auth', 'verified.medecin'])->prefix('medecin')->group(function () {
    // Routes pour PatientController
    Route::get('/search', [PatientController::class, 'afficher'])->name('search');
    Route::get('/{id}/radios', [PatientController::class, 'radios'])->name('patients.radios');

    // Routes pour OrdMedicamentController
    Route::post('/ordMedicament', [OrdMedicamentController::class, 'store'])->name('ordMedicament.store');
    Route::get('/ordonnances/{id}/consult', [OrdMedicamentController::class, 'consult'])->name('ordonnances.consult');
    Route::delete('/Ord/{id}', [OrdMedicamentController::class, 'destroy'])->name('detailOrd.destroy');

    // Routes pour DetailOrdMedController
    Route::post('/detailOrd', [DetailOrdMedController::class, 'store'])->name('detailOrdMed.store');
    Route::get('/detailOrd/{id}', [DetailOrdMedController::class, 'show'])->name('detailOrdMed.show');
    Route::delete('/detailOrd/{id}', [DetailOrdMedController::class, 'destroy'])->name('detailOrdMed.destroy');

    // Routes pour OrdAnaliseRadioController
    Route::get('/{id}/analyses', [OrdAnaliseRadioController::class, 'index'])->name('patients.analyse');
    Route::post('/analyse-radio/store', [OrdAnaliseRadioController::class, 'store'])->name('ordAnalyseRadio.store');
    Route::delete('/ordAnalyse/{id}', [OrdAnaliseRadioController::class, 'destroy'])->name('detailOrdalayse.destroy');

    // Routes pour DetailOrdAnalyseRadioController
    Route::get('/detailanalyses/{id}', [DetailOrdAnalyseRadioController::class, 'show'])->name('detailanalyses.show');
    Route::post('/detailanalyses', [DetailOrdAnalyseRadioController::class, 'store'])->name('detailanalyses.post');
    Route::delete('/detailanalyses/{id}', [DetailOrdAnalyseRadioController::class, 'destroy'])->name('detailanalyses.destroy');
    Route::get('/analyse/{id}/consult', [DetailOrdAnalyseRadioController::class, 'consult'])->name('analyses.consult');

    // Routes pour MedecinPatientController
    Route::post('/ajoute-patient', [MedecinPatientController::class, 'store'])->name('medecin.patient.store');

    // Routes pour MedecinController
    Route::get('/profile/{id}', [MedecinController::class, 'show'])->name('medecin.show');
});




//route de admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/medecin', [AdminController::class, 'indexMedecin'])->name('liste.doctor');
    Route::get('/patient', [AdminController::class, 'indexPatientAdmin'])->name('liste.patient');
    Route::delete('/{id}', [AdminController::class, 'destroyPatient'])->name('patients.destroy');
    Route::get('/ConsultPatient/{id}', [AdminController::class, 'indexConsultPatientAdmin'])->name('admin.consultPatient');
    Route::get('/verification', [AdminController::class, 'verification'])->name('liste.verification');
    Route::get('/verification/{id}', [AdminController::class, 'accepter'])->name('admin.accepter');
    Route::delete('/medecin/{id}', [AdminController::class, 'medecindestroy'])->name('admin.medecindestroy');
    Route::get('/profil/{id}', [AdminController::class, 'show'])->name('admin.show');
});



require __DIR__ . '/auth.php';














// Route::get('/medecin/search', [PatientController::class, 'afficher'])->name('search');
// Route::post('/medecin/ordMedicament', [OrdMedicamentController::class, 'store'])->name('ordMedicament.store');
// Route::post('/medecin/detailOrd', [DetailOrdMedController::class, 'store'])->name('detailOrdMed.store');
// Route::get('/medecin/detailOrd/{id}', [DetailOrdMedController::class, 'show'])->name('detailOrdMed.show');
// Route::delete('/medecin/detailOrd/{id}', [DetailOrdMedController::class, 'destroy'])->name('detailOrdMed.destroy');
// Route::get('/medecin/ordonnances/{id}/consult', [OrdMedicamentController::class, 'consult'])->name('ordonnances.consult');

// // Route pour consulter les analyses d'un patient
// Route::get('/medecin/{id}/analyses', [OrdAnaliseRadioController::class, 'index'])->name('patients.analyse');

// // Route pour consulter les radios d'un patient
// Route::get('/medecin/{id}/radios', [PatientController::class, 'radios'])->name('patients.radios');

// Route::post('/medecin/analyse-radio/store', [OrdAnaliseRadioController::class, 'store'])->name('ordAnalyseRadio.store');
// Route::get('/medecin/detailanalyses/{id}', [DetailOrdAnalyseRadioController::class, 'show'])->name('detailanalyses.show');
// Route::post('//mdecin/detailanalyses', [DetailOrdAnalyseRadioController::class, 'store'])->name('detailanalyses.post');
// Route::delete('/medecin/detailanalyses/{id}', [DetailOrdAnalyseRadioController::class, 'destroy'])->name('detailanalyses.destroy');
// Route::get('/medecin/analyse/{id}/consult', [DetailOrdAnalyseRadioController::class, 'consult'])->name('analyses.consult');
// Route::delete('/medecin/Ord/{id}', [OrdMedicamentController::class, 'destroy'])->name('detailOrd.destroy');
// Route::delete('/medecin/ordAnalyse/{id}',[OrdAnaliseRadioController::class, 'destroy'])->name('detailOrdalayse.destroy');
// Route::post('/medecin/ajoute-patient',[MedecinPatientController::class, 'store'])->name('medecin.patient.store');
// Route::get('/medecin/profile/{id}', [MedecinController::class, 'show'])->name('medecin.show');