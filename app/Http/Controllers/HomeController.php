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
    
        $experts = User::where('role', 'expert')
            ->whereIn('domaine_id', $domaines->pluck('id'))
            ->get();
    
        return view('front.index', compact('domaines', 'experts'));
    }
  
    public function detailExpert($id)
    {
        // Retrieve the expert by ID, with their domaine details
        $expert = User::with('domaine')->find($id);
    
        if (!$expert) {
            return redirect()->route('front.home')->with('error', 'Expert not found.');
        }
    
        return view('front.expert', compact('expert'));
    }
    


    /*public function Apropos()
    {
        $domaines = Domaine::with('experts')->get(); 
        $experts = Experts::with('domaine')->get(); 
      return view ('front.apropos',compact( 'domaines', 'experts'));
    }*/
}
