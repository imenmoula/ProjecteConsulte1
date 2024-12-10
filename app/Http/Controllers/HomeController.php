<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Users;
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

        return view('front.index', compact('domaines'));
    }
  
public function detailExpert($id)
{
    // Check if the authenticated user has the 'expert' role
    if (auth()->user()->role === 'expert') {
        $experts = Users::with('domaine')->find($id);  // Retrieve the expert with its domaine details

        if (!$experts) {
            return redirect()->route('front.home')->with('error', 'Expert not found.');
        }

        return view('front.expert', compact('experts'));
    }

    // If the user is not an expert, redirect to home or another page
    return redirect()->route('front.home')->with('error', 'You do not have access to this page.');
}
    


    /*public function Apropos()
    {
        $domaines = Domaine::with('experts')->get(); 
        $experts = Experts::with('domaine')->get(); 
      return view ('front.apropos',compact( 'domaines', 'experts'));
    }*/
}
