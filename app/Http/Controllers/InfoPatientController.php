<?php

namespace App\Http\Controllers;

use App\Models\InfoMedical;
use App\Models\Patient;
use Illuminate\Http\Request;

class InfoPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        try {
            // Récupérer le patient spécifié
            $patient = Patient::findOrFail($id);

            // Récupérer toutes les informations médicales associées à ce patient
            $allergies = $patient->info_medicals()->get();

            // Passer les informations médicales à la vue
            return view('medecin.allergies', compact('allergies', 'patient'));
        } catch (\Exception $e) {
            // Gérer l'erreur si le patient n'est pas trouvé
            return redirect()->back()->with('error', 'Patient non trouvé.');
        }
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
        // Créez l'entrée dans la table info_medicals
        $allergies = InfoMedical::create($request->all());

        // Redirigez vers une vue ou une route spécifique après l'ajout
        return redirect()->route('patients.allergies', ['id' => $request->patient_id])
            ->with('success', 'Informations médicales ajoutées avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
