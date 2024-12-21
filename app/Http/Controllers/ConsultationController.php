<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Availability;
use App\Models\Rendivent;
class ConsultationController extends Controller
{
    // Afficher la liste des rendez-vous
    public function index()
    {
        // Récupérer uniquement les rendez-vous des utilisateurs ayant le rôle "expert"
        $rendivents = Rendivent::with(['user' => function ($query) {
            $query->where('role', 'expert');
        }])->where('user_id', '=', auth()->user()->id)->get();
    
        // Ajouter des informations sur la disponibilité pour chaque rendez-vous
        $rendivents = $rendivents->map(function ($rendivent) {
            $availability = Availability::where('user_id', $rendivent->user_id)
                ->where('start_time', '<=', $rendivent->timedate)
                ->where('end_time', '>=', $rendivent->timedate)
                ->first();
    
            $rendivent->availability_status = $availability ? $availability->status : 'indisponible';
            return $rendivent;
        });
    
        return view('consultation.index', compact('rendivents'));
    }
    

    // Accepter un rendez-vous
       
        

}