<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Rendivent;
use Illuminate\Http\Request;

class RendiventController extends Controller
{public function index()
    {
        $user = Auth::user();
    
        // Récupère les rendez-vous de l'utilisateur connecté et charge le domaine de l'expert
        $rendivents = Rendivent::where('user_id', $user->id)->with('user.domaine')->get();
    
        return view('front.consulte.index', compact('rendivents'));
    }
    

    public function create()
    {
        return view('front.consulte.create');
    }

    public function store(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user(); // Cela donne l'utilisateur connecté
    
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sujet' => 'nullable|string',
            'timedate' => 'required|date',
        ]);
    
        $validated['user_id'] = auth()->user()->id;
           Rendivent::create($validated);
        return redirect()->route('front.consulte.index')->with('success', 'Rendez-vous créé avec succès !');
    }
    


    public function show(Rendivent $rendivent)
    {
        return view('front.consulte.show', compact('rendivent'));
    }

    public function edit(Rendivent $rendivent)
{
    // Vérifier si l'utilisateur connecté est bien celui qui a créé le rendez-vous
    if ($rendivent->user_id !== auth()->id()) {
        return redirect()->route('front.consulte.index')->with('error', 'Vous ne pouvez pas éditer ce rendez-vous.');
    }

    return view('front.consulte.edite', compact('rendivent'));
}

    public function update(Request $request, Rendivent $rendivent)
    {
        // Vérifier si l'utilisateur connecté est bien celui qui a créé le rendez-vous
        if ($rendivent->user_id !== auth()->id()) {
            return redirect()->route('front.consulte.index')->with('error', 'Vous ne pouvez pas modifier ce rendez-vous.');
        }
    
        // Valider les données du formulaire
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sujet' => 'nullable|string',
            'timedate' => 'required|date',
        ]);
    
        // Ajouter l'ID de l'utilisateur connecté (pas nécessaire si l'utilisateur ne peut pas modifier son user_id)
        $validated['user_id'] = auth()->id();
    
        // Mettre à jour le rendez-vous avec les nouvelles données
        $rendivent->update($validated);
    
        return redirect()->route('front.consulte.index')->with('success', 'Rendez-vous mis à jour avec succès !');
    }
    

    public function destroy(Rendivent $rendivent)
    {
        $rendivent->delete();
        return redirect()->route('front.consulte.index')->with('success', 'Rendez-vous supprimé avec succès !');
    }
}
