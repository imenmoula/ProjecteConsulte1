<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\User;
use Illuminate\Http\Request;




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
  
    public function detailsExperts()
    {
        // Récupérer les utilisateurs avec le rôle 'expert', leurs domaines et disponibilités associées
        $experts = User::with('domaine', 'availabilities') // Assurez-vous de charger les disponibilités
            ->where('role', 'expert')
            ->get();
    
        return view('front.expert', compact('experts'));
    }

    /*public function Apropos()
    {
        $domaines = Domaine::with('experts')->get(); 
        $experts = Experts::with('domaine')->get(); 
      return view ('front.apropos',compact( 'domaines', 'experts'));
    }*/
}
