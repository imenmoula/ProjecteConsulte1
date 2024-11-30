<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experts; // Assurez-vous d'importer le modèle Expert (au singulier)
use App\Models\Domaine;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = Experts::with('domaine')->get(); // Utilisez Expert (au singulier)
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
            'domaine_id' => 'required|exists:domaines,id', // Validation for domaine_id
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image
        ]);
    
        $experts = new Experts(); // Create a new Expert instance
    
        $experts->name = $request->name;
        $experts->email = $request->email;
        $experts->password = bcrypt($request->password);
        $experts->address = $request->address;
        $experts->phone = $request->phone;
        $experts->specialty = $request->specialty;
        $experts->availability = $request->availability;
        $experts->nb_experience = $request->nb_experience;
        $experts->domaine_id = $request->domaine_id;
    
        // Save the image in the 'public/images' directory and get its file path
        $imagePath = $request->file('image')->store('images', 'public'); // Use 'public' disk for public storage
    
        // Save the image path in the database
        $experts->image = $imagePath;
    
        $experts->save(); // Save the expert instance
    
        return redirect()->route('experts.index')->with('success', 'Expert created successfully.');
    }
    
    
    
    public function show($id)
    {
        $expert = Experts::findOrFail($id);

        return view('experts.show', compact('expert'));
    }

    public function edit($id)
    {
        $domaines = Domaine::all();
        $expert = Experts::findOrFail($id); // Récupérer tous les domaines pour le formulaire d'édition
        return view('experts.edit', compact('expert', 'domaines'));
    }

    public function update(Request $request, $id)
    {
        $experts = Experts::findOrFail($id); // Utilisez Expert (au singulier)
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
        if ($request->hasFile('image')) {
            
            // Save the image in the 'public/images' directory and get its file path
            $imagePath = $request->file('image')->store('images', 'public'); // Use 'public' disk for public storage
                
            // Save the image path in the database
            $experts->image = $imagePath;
        }
    
        $experts->save();
    
        return redirect()->route('experts.index')->with('success', 'Expert mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $expert = Experts::find($id);
        if ($expert) {
            $expert->delete();
            return redirect()->route('experts.index')->with('success', 'Expert supprimé avec succès.');
        }
        
        return redirect()->route('experts.index')->withErrors(['error' => "L'expert n'a pas pu être trouvé."]);
    }
}