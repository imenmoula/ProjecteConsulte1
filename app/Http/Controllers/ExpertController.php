<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experts; // Assurez-vous d'importer le modèle Expert (au singulier)
use App\Models\Domaine;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = Expert::with('domaine')->get(); // Utilisez Expert (au singulier)
        return view('experts.index', compact('experts'));
    }

    public function create()
    {
        $domaines = Domaine::all(); // Récupérer tous les domaines pour le formulaire
        return view('experts.create', compact('domaines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:experts',
            'password' => 'required|string|min:8',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'specialty' => 'nullable|string|max:255',
            'availability' => 'boolean',
            'nb_experience' => 'nullable|integer',
            'domaine_id' => 'required|exists:domaines,id', // Validation pour l'identifiant du domaine
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour l'image
        ]);
    
        $experts = new Expert(); // Utilisez Expert (au singulier)
    
        $experts->name = $request->name;
        $experts->email = $request->email;
        $experts->password = bcrypt($request->password);
        $experts->address = $request->address;
        $experts->phone = $request->phone;
        $experts->specialty = $request->specialty;
        $experts->availability = $request->availability;
        $experts->nb_experience = $request->nb_experience;
        $experts->domaine_id = $request->domaine_id;
        $experts->image = $request->file('image')->store('images'); // Enregistrer l'image
    
        $experts->save();
    
        return redirect()->route('experts.index')->with('success', 'Expert créé avec succès.');
    }

    
    
    public function show($idt)
    {
        $expert = Expert::findOrFail($id);

        return view('experts.show', compact('expert'));
    }

    public function edit(Expert $experts)
    {
        $domaines = Domaine::all(); // Récupérer tous les domaines pour le formulaire d'édition
        return view('experts.edit', compact('expert', 'domaines'));
    }

    public function update(Request $request, Expert $expert)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'specialty' => 'nullable|string|max:255',
            'availability' => 'boolean',
            'nb_experience' => 'nullable|integer',
            'domaine_id' => 'required|exists:domaines,id', // Validation pour l'identifiant du domaine
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour l'image
        ]);
    
        $experts->name = $request->name;
        $experts->email = $request->email;
        $experts->password = bcrypt($request->password);
        $experts->address = $request->address;
        $experts->phone = $request->phone;
        $experts->specialty = $request->specialty;
        $experts->availability = $request->availability;
        $experts->nb_experience = $request->nb_experience;
        $experts->domaine_id = $request->domaine_id;
        $experts->image = $request->file('image')->store('images'); // Enregistrer l'image
    
        $experts->save();
    
        return redirect()->route('experts.index')->with('success', 'Expert mis à jour avec succès.');
    }

    public function destroy(Expert $expert)
    {
        if ($expert) {
            $expert->delete();
            return redirect()->route('experts.index')->with('success', 'Expert supprimé avec succès.');
        }
        
        return redirect()->route('experts.index')->withErrors(['error' => "L'expert n'a pas pu être trouvé."]);
    }
}