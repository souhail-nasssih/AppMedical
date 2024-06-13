<?php

namespace App\Http\Controllers;

use App\Models\MedecinPatient;
use Illuminate\Http\Request;

class MedecinPatientController extends Controller
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
        $request->validate([
            'medecin_id' => 'required|exists:medecins,id',
            'patient_id' => 'required|exists:patients,id',
        ]);

        $medecinId = $request->input('medecin_id');
        $patientId = $request->input('patient_id');

        // Vérifie si l'association existe déjà
        $exists = MedecinPatient::where('medecin_id', $medecinId)
                                ->where('patient_id', $patientId)
                                ->exists();

        if (!$exists) {
            MedecinPatient::create([
                'medecin_id' => $medecinId,
                'patient_id' => $patientId,
            ]);

            return redirect()->back()->with('success', 'Patient ajouté avec succès au médecin.');
        } else {
            return redirect()->back()->with('error', 'Ce Patient existe déjà.');
        }
    
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
