<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Domaine;
use Illuminate\Support\Facades\Storage;


class ExpertController extends Controller
{
    // Afficher la liste des experts
    public function index()
    {
        // Charger les experts et leurs domaines associés
        $experts = User::where('role', 'expert')->with('domaine')->get(); 
        return view('experts.index', compact('experts')); 
    }

    // Afficher les détails d'un expert
    public function show($id)
    {
        // Recherche de l'expert par ID
        $user = User::where('role', 'expert')->findOrFail($id);  
        return view('experts.show', compact('user')); // Passe l'expert à la vue
    }

    // Supprimer un expert
    public function destroy($id)
    {
        // Recherche de l'expert par ID
        $user = User::where('role', 'expert')->findOrFail($id);  

        // Supprimer l'image de l'expert (si elle existe)
        if ($user->image) {
            Storage::delete('public/' . $user->image);
        }

        // Supprimer l'expert
        $user->delete();  

        // Rediriger avec un message de succès
        return redirect()->route('experts.index')->with('success', 'Expert supprimé avec succès.');
    }
}
