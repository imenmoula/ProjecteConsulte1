<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('User.master');
    }
   /* public function nbuser_expert()
    {
        // Calcul du nombre total d'utilisateurs
        $userCount = User::count(); 
    
        // Calcul du nombre d'experts (en supposant que le rôle 'expert' existe)
        $expertCount = User::role('expert')->count(); 
    
        // Retourner la vue avec ces données
        return view('User.dashboard', compact('userCount', 'expertCount'));
    }*/
    
}
