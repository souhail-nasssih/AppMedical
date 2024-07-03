<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\MedecinPatient;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MedecinController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //page admin dashbord
        return redirect(Route('dashboard'));
    }
    public function indexMedecin()
    {
        //page admin dashbord
        $medecins = Medecin::all();
        dd($medecins);
        return view('admin.listeDoctor', compact('medecins'));
    }
    public function indexMedecinAlternative()
    {
        $medecins = Medecin::all();
        return view('pageDoctor', compact('medecins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //cree un medecin depuis le form qui est dans le view medecin 
        return view('medecin.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $medecin = Medecin::create($request->all());

        return view('medecin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Récupérer l'utilisateur avec le médecin associé
        $user = User::with('medecin')->find($id);

        // Vérifier si l'utilisateur existe
        if (!$user) {
            abort(404, 'User not found');
        }

        // Vérifier si l'utilisateur est associé à un médecin
        $medecin = $user->medecin;

        return view('medecin.profil', compact('medecin'));
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
        //
    }
    public function getMedecinsData()
    {
        $medecins = Medecin::all();

        return response()->json($medecins);
    }

    public static function latestPatients()
    {
        // Récupérer l'utilisateur authentifié
        $user = auth()->user();

        // Vérifier s'il est médecin
        if (!$user->medecin) {
            abort(403, 'Unauthorized action.');
        }

        // Récupérer les 5 derniers patients pour ce médecin
        $patients = Patient::whereHas('medecins', function ($query) use ($user) {
            $query->where('medecin_id', $user->medecin->id);
        })
            ->latest()
            ->take(5)
            ->get();

        return $patients;
    }
    public function patientChartData()
    {
        // Récupérer l'utilisateur authentifié
        $user = auth()->user();

        // Vérifier si l'utilisateur est un médecin
        if (!$user->medecin) {
            abort(403, 'Unauthorized action.');
        }

        // Récupérer l'ID du médecin connecté
        $medecinId = $user->medecin->id;

        // Récupérer le total de patients avec la date de liaison par médecin
        $patientsByDate = MedecinPatient::where('medecin_id', $medecinId)
            ->join('patients', 'medecin_patients.patient_id', '=', 'patients.id')
            ->select(DB::raw('DATE(medecin_patients.created_at) as date'), DB::raw('COUNT(*) as total_patients'))
            ->groupBy(DB::raw('DATE(medecin_patients.created_at)'))
            ->get();

        return response()->json($patientsByDate);
    }
    public static function countPatients()
    {
        // Récupérer l'utilisateur authentifié (médecin connecté)
        $user = Auth::user();

        // Vérifier s'il est un médecin
        if (!$user || !$user->medecin) {
            abort(403, 'Unauthorized action.'); // Arrête l'exécution si l'utilisateur n'est pas un médecin
        }

        // Récupérer le nombre de patients associés à ce médecin
        $totalPatients = $user->medecin->patients()->count();

        // Retourner le nombre de patients
        return $totalPatients;
    }
}
