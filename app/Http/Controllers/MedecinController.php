<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\User;
use Illuminate\Http\Request;


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
        return view('admin.listeDoctor',compact('medecins'));
    
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
}
