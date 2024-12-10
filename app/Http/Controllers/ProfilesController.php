<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Ajoutez cette ligne pour importer le facade Auth


class ProfilesController extends Controller
{

    // Show profile
    public function show()
{
    $user = Auth::user();
    return view('profiles.show', compact('user'));
}


    // Edit profile (only for experts)
    public function edit()
    {
        $user = Auth::user();
        return view('profiles.edit', compact('user'));
    }

    // Update profile (only for experts)
    public function update(Request $request)
    {
        $user = Auth::user();
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'job' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'nb_experience' => 'nullable|integer',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = $imagePath;
        }
    
        $user->update($validatedData);
    
        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès!');
    }
    
   /* public function updatePassword(Request $request)
{
    $user = Auth::user();

    // Validation
    $validatedData = $request->validate([
        'current_password' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Vérifier si le mot de passe actuel est correct
    if (!\Hash::check($validatedData['current_password'], $user->password)) {
        return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
    }

    // Mettre à jour le mot de passe
    $user->password = bcrypt($validatedData['password']);
    $user->save();

    return redirect()->route('profiles.show')->with('success', 'Mot de passe mis à jour avec succès!');
}
*/
    
}
