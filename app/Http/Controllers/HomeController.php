<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Availability;
use App\Models\Rendivent;



class HomeController extends Controller
{
    // Afficher la page d'accueil
    public function index()
    {
        return view('front.home');
    }
    public function showfront()
    {
        $domaines = Domaine::all();
       
        // Récupérer les experts associés
        $experts = User::with('domaine')->where('role', 'expert')
            ->get();
    
           

        return view('front.index', compact('domaines' ,'experts'));
    }
  
    public function detailsExperts($id)
{
    // Fetch experts with their associated domain and availabilities
    $experts = User::with(['domaine', 'availabilities'])
        ->where('role', 'expert')
        ->findOrFail($id);

    // Return the view with the fetched experts
    return view('front.expert', compact('experts'));
}


public function Apropos()
{
    $experts = User::where('role', 'expert')
        ->whereHas('domaine')
        ->with('domaine')
        ->get();

    return view('front.apropos', compact('experts'));
}
// Afficher la page d'accueil
public function acceuil()
{
    $experts=User::where('role', 'expert')
        ->whereHas('domaine')
        ->with('domaine')
        ->get();
        return view('front.acceuil', compact('experts'));
}
public function historique()
{
    $rendivents = Rendivent::all(); 

    return view('front.historique', compact('rendivents'));
}

}
