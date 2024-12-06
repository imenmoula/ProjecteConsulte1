<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Experts; 
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
        $domaines = Domaine::with('experts')->get();

        return view('front.index', compact('domaines'));
    }
    public function detailExpert($id)
{
    $experts = Experts::with('domaine')->find($id); // Correction ici

    if (!$experts) {
        return redirect()->route('front.index')->with('error', 'Expert non trouvé.');
    }

    return view('front.expert', compact('experts'));
}
    


    /*public function Apropos()
    {
        $domaines = Domaine::with('experts')->get(); 
        $experts = Experts::with('domaine')->get(); 
      return view ('front.apropos',compact( 'domaines', 'experts'));
    }*/
}
