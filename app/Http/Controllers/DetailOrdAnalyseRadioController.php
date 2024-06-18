<?php

namespace App\Http\Controllers;

use App\Models\DetailOrdAnalyseRadio;
use App\Models\OrdAnalyseRadio;
use Illuminate\Http\Request;

class DetailOrdAnalyseRadioController extends Controller
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
        // Créer un nouveau détail d'analyse
        $detailAnalyse = DetailOrdAnalyseRadio::create($request->all());

        // Récupérer l'ID de l'analyse
        $ordAnalyseRadioId = $request->input('ordAnalyseRadio_id');

        // Rediriger vers la méthode show avec l'ID de l'analyse
        return redirect()->route('detailanalyses.show', ['id' => $ordAnalyseRadioId])->with('success', 'Analyse ajoutée avec succès.');
    }

    public function show(string $id)
    {
        try {
            // Récupérer les détails d'analyses associés à l'ID de l'analyse
            $analyses = DetailOrdAnalyseRadio::where('ordAnalyseRadio_id', $id)->get();
    
            // Récupérer l'ID du patient associé à cette analyse
            $idPatient = OrdAnalyseRadio::findOrFail($id)->patient_id;
    
            // Passer les détails et l'ID du patient à la vue
            return view('medecin.analyses.detailAnalyse', compact('analyses', 'id', 'idPatient'));
        } catch (\Exception $e) {
            // Gérer l'erreur si l'analyse n'est pas trouvée
            return redirect()->back()->with('error', 'Analyse non trouvée.');
        }
    }
    


public function consult($id)
{
    // Récupérer l'analyse par son ID
    $analyses = DetailOrdAnalyseRadio::where('ordAnalyseRadio_id', $id)->get();
    $details = OrdAnalyseRadio::find($id);
    // Passer les détails de l'analyse à la vue
    return view('medecin.analyses.createAnalyse', compact('analyses', 'details'));
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
        $detailAnalyse = DetailOrdAnalyseRadio::find($id);
        $detailAnalyse->delete();

        return redirect()->route('detailanalyses.show', ['id' => $detailAnalyse->ordAnalyseRadio_id])->with('success', 'Analyse supprimée avec succès.');
    }
}
