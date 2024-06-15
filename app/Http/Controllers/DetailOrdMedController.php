<?php

namespace App\Http\Controllers;

use App\Models\DetailOrdMed;
use App\Models\OrdMedicament;
use Illuminate\Http\Request;

class DetailOrdMedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  

        // Afficher la vue avec les détails des ordonnances
        // return view('medecin.detailOrdMed');
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
        // Créer un nouveau DetailOrdMed
        $detailOrdMed = DetailOrdMed::create($request->all());

        // Récupérer l'ID de l'ordonnance
        $ordMedicamentId = $request->input('ordMedicament_id');

        // Rediriger vers la méthode show avec l'ID de l'ordonnance
        return redirect()->back()->with('success', 'Ordonnance ajoutée avec succès.');
    }
    /**
     * Display the specified resource.
     */ 
    public function show(string $id)
    {
        // Récupérer les détails d'ordonnances associés à l'ID de OrdMedicament
        $details = DetailOrdMed::where('ordMedicament_id', $id)->get();
        // Passer les détails à la vue
        return view('medecin.ordonnance.detailOrdMed', compact('details', 'id'));
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
        $detailOrdMed = DetailOrdMed::find($id);
        $ordMedicamentId = $detailOrdMed->ordMedicament_id;
        $detailOrdMed->delete();
        return redirect()->route('detailOrdMed.show', ['id' => $ordMedicamentId])->with('success', ' supprimée avec succès.');
    }
}
