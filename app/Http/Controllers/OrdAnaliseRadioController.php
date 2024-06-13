<?php

namespace App\Http\Controllers;

use App\Models\AnalyseRadio;
use App\Models\OrdAnalyseRadio;
use App\Models\Patient;
use Illuminate\Http\Request;

class OrdAnaliseRadioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        try {
            // Récupérer le patient spécifié
            $patient = Patient::findOrFail($id);

            // Récupérer toutes les ordonnances d'analyses radios associées à ce patient
            $analyses = $patient->ordonance_analyse_radios()->with('medecin')->get();

            // Passer les analyses radios à la vue
            return view('medecin.analyses', compact('analyses', 'patient'));
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
        //
        $ordAnRadio = OrdAnalyseRadio::create($request->all());

        return redirect()->route('detailanalyses.show', ['id' => $ordAnRadio->id]);
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
        $detailOrdMed = OrdAnalyseRadio::findOrFail($id);
        $patientId = $detailOrdMed->patient_id; // Récupérer l'ID du patient avant la suppression
    
        $detailOrdMed->delete();
        
        // Appeler directement la méthode show avec l'ID du patient associé à l'ordonnance supprimée
        return redirect()->route('patients.analyse',$patientId)->with('success', 'Ordonnance supprimée avec succès.');
    }
}
