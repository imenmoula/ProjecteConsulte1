<?php


namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\User;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    // Liste des disponibilités
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'expert') {
            $availabilities = Availability::where('user_id', $user->id)
                ->orderBy('start_time')
                ->get();

            return view('availabilities.index', compact('availabilities'));
        }

        return redirect()->route('home')->with('error', 'Accès non autorisé');
    }
 // 2. Afficher une disponibilité spécifique (Show)
 public function show($id)
 {
     $availability = Availability::with('user')->findOrFail($id);
     return view('availabilities.show', compact('availability'));
 }

 public function create()
{
    $experts = User::where('role', 'expert')->get();
    
    // Définir les valeurs possibles de statut
    $statuses = ['disponible', 'reserver', 'indisponible'];

    return view('availabilities.create', compact('experts', 'statuses'));
}
    // Formulaire de création
    public function store(Request $request)
    {
        $data = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'status' => 'required|in:disponible,reserver,indisponible',
        ]);

        // Utilisation de l'utilisateur authentifié
        $data['user_id'] = auth()->id();

        Availability::create($data);
        return redirect()->route('availabilities.index')->with('success', 'Disponibilité ajoutée avec succès.');
    }
    
    
  // Display form to edit availability
  public function edit($id)
  {
      $availability = Availability::findOrFail($id);
      $experts = User::where('role', 'expert')->get();
      return view('availabilities.edit', compact('availability', 'experts'));
  }

  // Update an existing availability
  public function update(Request $request, $id)
  {
      $request->validate([
          'start_time' => 'required|date|before:end_time',
          'end_time' => 'required|date|after:start_time',
          'status' => 'required|in:disponible,reserver,indisponible',
      ]);

      $availability = Availability::findOrFail($id);
      $availability->update($request->all());

      return redirect()->route('availabilities.index')->with('success', 'Disponibilité mise à jour avec succès.');
  }
    // Delete an availability
    public function destroy($id)
    {
        $availability = Availability::findOrFail($id);
        $availability->delete();

        return redirect()->route('availabilities.index')->with('success', 'Disponibilité supprimée avec succès.');
    }
}
