<?php

namespace App\Http\Controllers;

use App\Models\OrdMedicament;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdMedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // Récupérer les ordonnances médicamenteuses associées au patient spécifié
        $idp=$id;
        $patient = Patient::findOrFail($id);
        $ordonnances = $patient->ordonance_medicaments()->with('medecin')->get();
        
        return view('medecin.ordonnances', compact('ordonnances','id'));
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
        // Créer l'ordonnance
        $ordonnance = OrdMedicament::create($request->all());

        // Rediriger vers la méthode show pour afficher les détails des ordonnances
        return redirect()->route('detailOrdMed.show', ['id' => $ordonnance->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //  // Récupérer les ordonnances associées au patient
        $ordonnances = Patient::findOrFail($id)->ordonnances;

        // Afficher la vue avec les détails des ordonnances
        return view('medecin.ordonnance.detailOrdMed', ['ordonnances' => $ordonnances]);
    }

    public function consult($id)
    {
        // Récupérer l'ordonnance par son ID
        $ordonnance = OrdMedicament::with(['medecin.user', 'patient', 'detailOrdMeds'])->findOrFail($id);

        // Passer les détails de l'ordonnance à la vue
        return view('medecin.ordonnance.consultORd', compact('ordonnance'));
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
        $detailOrdMed = OrdMedicament::findOrFail($id);
        $patientId = $detailOrdMed->patient_id; // Récupérer l'ID du patient avant la suppression

        $detailOrdMed->delete();

        // Appeler directement la méthode show avec l'ID du patient associé à l'ordonnance supprimée
        return redirect()->route('patients.ord', $patientId)->with('success', 'Ordonnance supprimée avec succès.');
    }
}
