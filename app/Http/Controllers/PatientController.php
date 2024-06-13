<?php

namespace App\Http\Controllers;

use App\Models\InfoMedical;
use App\Models\OrdMedicament;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use Illuminate\Database\QueryException;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        // Récupérer l'utilisateur authentifié (médecin)
        $user = Auth::user();

        // Récupérer tous les patients associés à ce médecin
        $patients = $user->patients;

        return view('medecin.listePatients', compact('patients'));
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
    public function afficher(Request $request)
    {
        $cin = $request->input('cin');

        // Charger les utilisateurs avec leurs patients filtrés par CIN
        $users = User::whereHas('patients', function ($query) use ($cin) {
            $query->where('CIN', $cin);
        })->with(['patients' => function ($query) use ($cin) {
            $query->where('CIN', $cin);
        }])->get();

        return view('medecin.recherche', compact('users'));
    }
    // public function ordonnanceStats()
    // {
    //     $ordonnances = OrdMedicament::all();
    //     return view('medecin.ordonnances', compact('ordonnances'));
    // }

    // public function analyses()
    // {
    //     $analyses = AnalyseRadio::all();
    //     return view('medecin.analyses', compact('analyses'));
    // }

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
}
