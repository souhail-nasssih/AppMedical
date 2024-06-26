<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Medecin;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //afficher le profil de admin avec leur information 
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
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

    public function indexPatientAdmin()
    {
        $patients = Patient::paginate(10); // Paginate par 10 patients par page
    
        return view('admin.listePatients', compact('patients'));
    }
    
    public function destroyPatient(string $id)
    {
        //supprimer un patient
        $patient = Patient::findOrFail($id);
        $patient->delete();
        //retouner back
        return redirect()->back()->with('success', 'Patient supprimé avec succès.');
    }
    public function indexConsultPatientAdmin(string $id)
    {
        //
        $patient = Patient::findOrFail($id);
        return view('admin.consulterPatient', compact('patient'));
    }
    public function indexMedecin()
    {
        //page admin dashbord
        $medecins = Medecin::all()->where('verification', true);
        return view('admin.listeDoctor', compact('medecins'));
    }
    public function verification()
    {
        //page admin dashbord
        $medecins = Medecin::all()->where('verification', false);
        return view('admin.verification', compact('medecins'));
    }
    public function accepter(Request $request, string $id)
    {
        //cette ces pour modifier les medecin 
        $medecin = Medecin::findOrFail($id);
        $medecin->verification = true;
        $medecin->save();
        //retouner back
        return redirect()->back()->with('success', 'Le medecin a été accepté avec
        succès.');
    }
    public function medecindestroy(string $id)
    {
        //supprimer un medecin
        $medecin = Medecin::findOrFail($id);
        $medecin->delete();
        //retouner back
        return redirect()->back()->with('success', 'Le medecin a été supprimé
        avec succès.');
    }

    public static function countPatients()
    {
        return Patient::count();
    }

    /**
     * Récupère le nombre total de médecins vérifiés.
     */
    public static function countVerifiedMedecins()
    {
        return Medecin::where('verification', true)->count();
    }

    /**
     * Récupère le nombre total de médecins non vérifiés.
     */
    public static function countUnverifiedMedecins()
    {
        return Medecin::where('verification', false)->count();
    }

    public static function latestPatients()
    {
        // Récupérer les 5 derniers patients ajoutés
        $patients = Patient::latest()->take(5)->get();

        // Retourner la vue avec les données des patients
        return  $patients;
    }

    public static function unverifiedMedecins()
    {
        // Récupérer les médecins non vérifiés
        return Medecin::where('verification', false)->get();
    }
}
