<?php

namespace App\Http\Controllers;

use App\Models\DetailOrdAnalyseRadio;
use App\Models\DetailOrdMed;
use App\Models\InfoMedical;
use App\Models\Medecin;
use App\Models\OrdAnalyseRadio;
use App\Models\OrdMedicament;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use Illuminate\Database\QueryException;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Return_;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return redirect(Route('dashboard'));
    }
    public function indexPatient()
    {
        $medecin = Auth::user()->medecin;

        if ($medecin) {
            $patients = Patient::whereHas('medecins', function ($query) use ($medecin) {
                $query->where('medecins.id', $medecin->id);
            })->get();

            return view('medecin.listePatients', compact('patients'));
        } else {
            return redirect()->back()->with('error', 'Médecin non trouvé.');
        }
    }


    public function indexPatientAdmin()
    {
        $patients = Patient::all();
        return view('admin.listePatients', compact('patients'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('patient.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'CIN' => 'required|unique:patients,CIN',
        ]);

        try {
            Patient::create($request->all());

            // Rediriger ou retourner une réponse appropriée
            return redirect()->route('dashboard')->with('success', 'Patient created successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->back()
                    ->withErrors(['CIN' => 'Ce numéro de CIN existe déjà.'])
                    ->withInput();
            }

            return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Récupérer le patient par son ID avec les informations de l'utilisateur associé
        $patient = Patient::with('user')->findOrFail($id);

        // Retourner la vue avec les détails du patient
        return view('medecin.consulter', compact('patient'));
    }
    public function showPatient()
    {
        // Récupérer le patient par son ID avec les informations de l'utilisateur associé
        $patient = Patient::all();

        // Retourner la vue avec les détails du patient
        return view('admin.dashboard', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->back()->with('success', 'Patient supprimé avec succès.');
    }
    public function afficher(Request $request)
    {
        $cin = $request->input('cin');
        $users = User::whereHas('patients', function ($query) use ($cin) {
            $query->where('CIN', $cin);
        })->with(['patients' => function ($query) use ($cin) {
            $query->where('CIN', $cin);
        }])->get();

        return view('medecin.recherche', compact('users'));
    }

    public function maladieChroniqueStats()
    {
        $maladiesChroniques = InfoMedical::all();
        return view('medecin.maladies', compact('maladiesChroniques'));
    }

    public function allergieStats()
    {
        $allergies = InfoMedical::where('type', 'allergie')->get();
        return view('medecin.allergies', compact('allergies'));
    }

    public function patientOrdonnances(String $id)
    {
        $ordonnances = OrdMedicament::where('patient_id', $id)->get();
        return view('patient.ordonnances', compact('ordonnances'));
    }

    public function ordonnancedetails(String $id)
    {
        $ordonnance = OrdMedicament::findOrFail($id);
        $detailOrdonnance = DetailOrdMed::where('ordMedicament_id', $ordonnance->id)->latest()->get();

        // dd($detailOrdonnance);
        return view('patient.ordonnancedetails', compact('ordonnance', 'detailOrdonnance'));
    }

    public static function ordonnancedetailsProfile($id)
    {
        $ordonnance = OrdMedicament::findOrFail($id);
        $detailOrdonnance = DetailOrdMed::where('ordMedicament_id', $ordonnance->id)->get();
        return $detailOrdonnance;
    }

    public function patientOrdonnancesAnalyse(String $id)
    {
        // Récupérer les ordonnances du patient
        $ordonnances = OrdAnalyseRadio::where('patient_id', $id)->latest()->get();
        return view('patient.ordAnalyse', compact('ordonnances'));
    }
    public function ordonnancedetailsAR(String $id)
    {
        $ordonnance = OrdAnalyseRadio::findOrFail($id);
        $detailOrdonnance = DetailOrdAnalyseRadio::where('ordAnalyseRadio_id', $ordonnance->id)->latest()->get();

        return view('patient.ordAnalyseDetails', compact('ordonnance', 'detailOrdonnance'));
    }
    //afficher toues les medecin qui ont relation avec ce patient 
    public function medecinPatient(String $id)
    {
        $medecins = Medecin::whereHas('patients', function ($query) use ($id) {
            $query->where('patients.id', $id);
        })->get();
        return view('patient.medecinPatient', compact('medecins'));
    }
    // show profil patient 
    public function profilPatient(String $id)
    {
        $user = Auth::user(); // Utilisateur authentifié
        $patient = Patient::with('user')->findOrFail($id); // Inclure la relation 'user'
        return view('patient.profile', compact('patient', 'user'));
    }
    public function editProfile(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.modifierprofile', compact('patient'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'date_naissance' => 'required|date',
            'adress' => 'required|string|max:255',
            'groupes_sanguins' => 'required|string|max:3',
        ]);

        $patient = Patient::findOrFail($request->id);
        $patient->user->name = $request->name;
        $patient->user->email = $request->email;
        $patient->tel = $request->tel;
        $patient->date_naissance = $request->date_naissance;
        $patient->adress = $request->adress;
        $patient->groupes_sanguins = $request->groupes_sanguins;
        $patient->user->save();
        $patient->save();

        return redirect()->route('ProfilePatient', ['id' => $patient->id])->with('success', 'Profile updated successfully.');
    }

    public function getPatientData()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }
    public function getMonthlyPatientData()
{
    $monthlyData = Patient::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->get()
        ->keyBy('month')
        ->toArray();

    $data = array_fill(1, 12, 0);
    foreach ($monthlyData as $month => $value) {
        $data[$month] = $value['count'];
    }

    return response()->json($data);
}
    
}
