<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpertProfileController extends Controller
{
    public function show()
{
    $expert = auth()->user(); // Supposant que l'authentification utilise la table experts
    return view('profile.show', compact('expert'));
}

public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:experts,email,' . auth()->id(),
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'specialty' => 'nullable|string|max:255',
        'availability' => 'required|boolean',
        'nb_experience' => 'nullable|integer|min:0',
        'domaine_id' => 'nullable|exists:domaines,id',
    ]);

    $expert = auth()->user();
    $expert->update($request->all());

    return back()->with('success', 'Profil mis à jour avec succès.');
}
public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|confirmed|min:8',
    ]);

    $expert = auth()->user();

    if (!Hash::check($request->current_password, $expert->password)) {
        return back()->withErrors(['current_password' => 'Mot de passe actuel incorrect.']);
    }

    $expert->update(['password' => Hash::make($request->password)]);

    return back()->with('success', 'Mot de passe mis à jour avec succès.');
}
public function updateImage(Request $request)
{
    $request->validate([
        'image' => 'required|image|max:2048',
    ]);

    $expert = auth()->user();

    if ($expert->image) {
        Storage::delete($expert->image);
    }

    $path = $request->file('image')->store('experts/images');

    $expert->update(['image' => $path]);

    return back()->with('success', 'Image mise à jour avec succès.');
}

    
}
