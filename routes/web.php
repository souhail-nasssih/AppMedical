<?php

use App\Http\Controllers\DetailOrdAnalyseRadioController;
use App\Http\Controllers\DetailOrdMedController;
use App\Http\Controllers\InfoPatientController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\MedecinPatientController;
use App\Http\Controllers\OrdAnaliseRadioController;
use App\Http\Controllers\OrdMedicamentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Models\Medecin;
use App\Models\OrdMedicament;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
// Route::get('/', function () {
//     return view('medecin.listePatients');
// })->name('listePatient');

Route::get('/liste-patient', [PatientController::class, 'indexPatient'])->name('listePatient');



Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role == 'patient') {
        return view('patient.dashboard');   
    }

    if ($user->role == 'medecin') {
        return view('medecin.dashboard');
    }

    return redirect()->route('home')->with('error', 'Invalid user role.');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 // Routes pour les patients
Route::prefix('patients')->middleware('auth')->group(function () {
    Route::get('/', [PatientController::class, 'index'])->name('patient');
    Route::get('/create', [PatientController::class, 'create'])->name('patient.create');
    // Route::post('/', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/search', [PatientController::class, 'afficher'])->name('search');
    Route::get('/{id}', [PatientController::class, 'show'])->name('patients.show');
    
    Route::get('/{id}/analyses', [PatientController::class, 'analyseStats'])->name('patients.analyse');
    Route::get('/{id}/maladies', [PatientController::class, 'maladieChroniqueStats'])->name('patients.maladie');
    
    
    });
Route::post('/patients', [OrdMedicamentController::class, 'store'])->name('ordMedicament.store');
Route::post('/detailOrd', [DetailOrdMedController::class, 'store'])->name('detailOrdMed.store');
Route::get('/detailOrd/{id}', [DetailOrdMedController::class, 'show'])->name('detailOrdMed.show');
Route::delete('/detailOrd/{id}', [DetailOrdMedController::class, 'destroy'])->name('detailOrdMed.destroy');
Route::get('/ordonnances/{id}/consult', [OrdMedicamentController::class, 'consult'])->name('ordonnances.consult');

// Route pour consulter les analyses d'un patient
Route::get('/patients/{id}/analyses', [OrdAnaliseRadioController::class, 'index'])->name('patients.analyse');

// Route pour consulter les radios d'un patient
Route::get('/patients/{id}/radios', [PatientController::class, 'radios'])->name('patients.radios');

Route::post('/ordonnances/analyse-radio/store', [OrdAnaliseRadioController::class, 'store'])->name('ordAnalyseRadio.store');
Route::get('/detailanalyses/{id}', [DetailOrdAnalyseRadioController::class, 'show'])->name('detailanalyses.show');
Route::post('/detailanalyses', [DetailOrdAnalyseRadioController::class, 'store'])->name('detailanalyses.post');
Route::delete('/detailanalyses/{id}', [DetailOrdAnalyseRadioController::class, 'destroy'])->name('detailanalyses.destroy');
Route::get('/analyse/{id}/consult', [DetailOrdAnalyseRadioController::class, 'consult'])->name('analyses.consult');
Route::delete('/Ord/{id}', [OrdMedicamentController::class, 'destroy'])->name('detailOrd.destroy');
Route::delete('/ordAnalyse/{id}',[OrdAnaliseRadioController::class, 'destroy'])->name('detailOrdalayse.destroy');
Route::post('/ajoute-patient',[MedecinPatientController::class, 'store'])->name('medecin.patient.store');
Route::get('/medecin/profile/{id}', [MedecinController::class, 'show'])->name('medecin.show');



require __DIR__ . '/auth.php';


