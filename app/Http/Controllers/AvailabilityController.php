<?php


namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Experts;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    // Liste des disponibilités
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'expert') {
            // Récupérer les disponibilités de l'expert
            $availabilities = Availability::where('user_id', $user->id)->orderBy('start_time')->get();
            return view('availabilities.index', compact('availabilities'));
        }
    
        // Si l'utilisateur n'est pas un expert, rediriger ou afficher une erreur
        return redirect()->route('home')->with('error', 'Accès non autorisé');
    }
 // 2. Afficher une disponibilité spécifique (Show)
 public function show($id)
 {
     $availability = Availability::with('expert')->findOrFail($id);
     return view('availabilities.show', compact('availability'));
 }
    // Formulaire de création
    public function create()
    {
        $experts = Experts::all();
        return view('availabilities.create', compact('experts'));
    }

    // Enregistrer une disponibilité
    public function store(Request $request)
    {
        $request->validate([
            'expert_id' => 'required|exists:experts,id',
            'start_time' => 'required|date|before:end_time',
            'end_time' => 'required|date|after:start_time',
            'status' => 'required|in:disponible,réservé,indisponible',
        ]);

        Availability::create($request->all());

        return redirect()->route('availabilities.index')->with('success', 'Disponibilité ajoutée avec succès.');
    }

    // Formulaire de modification
    public function edit($id)
    {
        $availability = Availability::findOrFail($id);
        $experts = Experts::all();
        return view('availabilities.edit', compact('availability', 'experts'));
    }

    // Mettre à jour une disponibilité
    public function update(Request $request, $id)
    {
        $request->validate([
            'expert_id' => 'required|exists:experts,id',
            'start_time' => 'required|date|before:end_time',
            'end_time' => 'required|date|after:start_time',
            'status' => 'required|in:disponible,réservé,indisponible',
        ]);

        $availability = Availability::findOrFail($id);
        $availability->update($request->all());

        return redirect()->route('availabilities.index')->with('success', 'Disponibilité mise à jour avec succès.');
    }

    // Supprimer une disponibilité
    public function destroy($id)
    {
        $availability = Availability::findOrFail($id);
        $availability->delete();

        return redirect()->route('availabilities.index')->with('success', 'Disponibilité supprimée avec succès.');
    }
}
