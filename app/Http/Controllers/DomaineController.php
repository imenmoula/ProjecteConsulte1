<?php

namespace App\Http\Controllers;

use  App\Models\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    public function index()
    {
        $domaines =Domaine::all();
        return view('domaines.index', compact('domaines'));
    }

    public function create()
    {
        return view('domaines.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);
    
        // Gestion de l'image (si nécessaire)
        if ($request->hasFile('image')) {
            try {
                $imagePath = $request->file('image')->store('images', 'public');
            } catch (\Exception $e) {
                return back()->withErrors(['image' => 'Erreur lors du téléchargement de l\'image : '.$e->getMessage()]);
            }
        } else {
            $imagePath = null;
        }
    
        Domaine::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('domaines.index')->with('success', 'Domaine créé avec succès.');
    }

    public function show($id)
    {
        $domaine = Domaine::findOrFail($id);
        return view('domaines.show', compact('domaine'));
    }

    public function edit(Domaine $domaine)
    {
        return view('domaines.edit', compact('domaine'));
    }

    public function update(Request $request, Domaine $domaine)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        // Gestion de l'image (si nécessaire)
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($domaine->image) {
                \Storage::disk('public')->delete($domaine->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $domaine->image; // Garder l'ancienne image si aucune nouvelle n'est fournie
        }

        $domaine->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('domaines.index')->with('success', 'Domaine mis à jour avec succès.');
    }

    public function destroy(Domaine $domaine)
    {
        // Supprimer l'image si elle existe
        if ($domaine->image) {
            \Storage::disk('public')->delete($domaine->image);
        }
        
        $domaine->delete();
        
        return redirect()->route('domaines.index')->with('success', 'Domaine supprimé avec succès.');
    }

    
}