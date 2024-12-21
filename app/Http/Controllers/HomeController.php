<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 

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
        $experts=User::where('role', 'expert')
        ->whereHas('domaine')
        ->with('domaine')
        ->get();
        return view('front.acceuil', compact('experts'));
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
// public function historique()
// {
//     $rendivents = Rendivent::all(); 

//     return view('front.historique', compact('rendivents'));
// }

public function historique()
{
    // Récupérer l'utilisateur connecté
    $user = Auth::user();

    // Récupérer les rendez-vous de l'utilisateur connecté, avec les informations sur l'expert et le domaine
    $rendivents = Rendivent::where('user_id', $user->id)
                           ->with('user.domaine') // Charger le domaine de l'expert
                           ->get();

    // Retourner la vue avec les rendez-vous et les informations sur l'expert et le domaine
    return view('front.historique', compact('rendivents'));
}






public function filterExperts(Request $request)
{
    // Get distinct status values from the availabilities table
    $status = Availability::distinct()->pluck('status');

    // Filter the experts based on the request and return them
    $experts = User::query()
        ->where('role', 'expert')
        ->when($request->has('address'), function($query) use ($request) {
            return $query->where('address', $request->address);
        })
        ->when($request->has('status'), function($query) use ($request) {
            return $query->whereHas('availabilities', function($query) use ($request) {
                return $query->whereIn('status', $request->status);
            });
        })
        ->when($request->has('domaine'), function($query) use ($request) {
            return $query->where('domaine_id', $request->domaine);
        })
        ->get();

    // Get all the available locations and domaines (assuming you have these in your database)
    $locations = User::distinct()->pluck('address');
    $domaines = Domaine::all();  // Assuming Domaine is a model that contains expertise domains

    // Return view with experts and dynamic statuses
    return view('front.acceuil', compact('experts', 'status', 'locations', 'domaines'));
}










}
