<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experts; // Assurez-vous d'importer le modèle Expert (au singulier)
use App\Models\Domaine;

class ExpertController extends Controller
{
    // Liste des experts
public function index()
{
    $experts = User::where('role', 'expert')->with('domaine')->get(); // Filtre les utilisateurs avec le rôle 'expert'
    return view('experts.index', compact('experts')); // Renommer la variable en 'experts'
}


    // Afficher le formulaire de création
public function create()
{
    $domaines = Domaine::all();  // Récupère tous les domaines pour le formulaire
    return view('experts.create', compact('domaines'));
}


  // Enregistrer un expert
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
        'job' => 'nullable|string|max:255',
        'nb_experience' => 'nullable|integer',
        'domaine_id' => 'required|exists:domaines,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = new User();  

    $user->name = $request->name;
    $user->address = $request->address;
    $user->phone = $request->phone;
    $user->job = $request->job;
    $user->nb_experience = $request->nb_experience;
    $user->domaine_id = $request->domaine_id;
    $user->role = 'expert'; 

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $user->image = $imagePath;
    }

    $user->save();  // Sauvegarde l'expert

    return redirect()->route('experts.index')->with('success', 'Expert créé avec succès.');
}

    
    
    
    // Afficher un expert spécifique
public function show($id)
{
    $user = User::where('role', 'expert')->findOrFail($id);  // Recherche l'expert par ID
    return view('experts.show', compact('user')); // Utilisez 'user' et non 'experts'
}


// Afficher le formulaire d'édition
public function edit($id)
{
    $domaines = Domaine::all();
    $user = User::where('role', 'expert')->findOrFail($id);  // Vérifie que l'expert existe
    return view('experts.edit', compact('user', 'domaines')); // Passez 'user' et 'domaines'
}


// Mettre à jour un expert
public function update(Request $request, $id)
{
    $user = User::where('role', 'expert')->findOrFail($id);  // Recherche l'expert par ID
    
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
        'job' => 'nullable|string|max:255',
        'nb_experience' => 'nullable|integer',
        'domaine_id' => 'required|exists:domaines,id',  // Validation pour domaine_id
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    
    $user->name = $request->name;
    $user->address = $request->address;
    $user->phone = $request->phone;
    $user->job = $request->job;
    $user->nb_experience = $request->nb_experience;
    $user->domaine_id = $request->domaine_id;
    
    // Gestion de l'image (si une nouvelle image est envoyée)
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $user->image = $imagePath;
    }
    
    $user->save();  // Sauvegarde les modifications
    
    return redirect()->route('experts.index')->with('success', 'Expert mis à jour avec succès.');
}
// Supprimer un expert
public function destroy($id)
{
    $user = User::where('role', 'expert')->findOrFail($id);  // Recherche l'expert par ID

    $user->delete();  // Supprime l'expert

    return redirect()->route('experts.index')->with('success', 'Expert supprimé avec succès.');
}




/*public function updateAvailability(Request $request, $id)
{
    $expert = Experts::findOrFail($id);

    $request->validate([
        'availability' => 'required|boolean',
    ]);

    $expert->availability = $request->availability;
    $expert->save();

    return redirect()->route('experts.index')->with('success', 'Disponibilité mise à jour avec succès.');
}*/
}
/*    public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $query = Experts::query();

    if ($searchTerm) {
        $query->where(function($q) use ($searchTerm) {
            $q->where('location', 'like', '%' . $searchTerm . '%')
              ->orWhere('name', 'like', '%' . $searchTerm . '%')
              ->orWhere('availability', true); 
        });
    }

    $experts = $query->get();

    return view('experts.index', compact('experts'));
}*/
