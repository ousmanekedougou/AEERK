<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Partenaire;
use App\Model\Admin\Team;
use App\Model\User\Nouveau;
use App\Model\User\Ancien;
use App\Model\User\Contact;
use App\Model\User\Etudiant;
use App\Model\User\Recasement;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index() 
    {
        // if (Auth::guard('admin')->user()->can('admins.index')) 
        // {
            $contact_nomLue = Contact::where('status',0)->get();
            $contact_lue = Contact::where('status',1)->get();
            $admin_all = Admin::all();
            $team_all = Team::all();
            $partenaire_all = Partenaire::all();
        // }
        
        $nouveau_total_inscrit = Etudiant::where(['ancienete' => 1 , 'status' => 0])->get();
        $nouveau_total_valider = Etudiant::where(['ancienete' => 1 , 'status' => 1])->get();
        $nouveau_total_ommis = Etudiant::where(['ancienete' => 1 , 'status' => 2])->get();
        $nouveau_total_codifier = Etudiant::where(['ancienete' => 1 , 'status' => 1 , 'codifier' => 1])->get();


        $ancien_total_inscrit = Etudiant::where(['ancienete' => 2 , 'status' => 0])->get();
        $ancien_total_valider = Etudiant::where(['ancienete' => 2 , 'status' => 1])->get();
        $ancien_total_ommis = Etudiant::where(['ancienete' => 2 , 'status' => 2])->get();
        $ancien_total_codifier = Etudiant::where(['ancienete' => 2 , 'status' => 1 , 'codifier' => 1])->get();
        $inscription_recasement = Recasement::where(['recaser' => 0 ])->get();
        $recaser = Recasement::where(['recaser' => 1 ])->get();

        

        return view('admin.home',compact(
            ['nouveau_total_inscrit','nouveau_total_valider','nouveau_total_ommis','nouveau_total_codifier',
            
            'ancien_total_inscrit','ancien_total_valider','ancien_total_ommis','ancien_total_codifier',

            'contact_nomLue','contact_lue','admin_all','team_all','partenaire_all','inscription_recasement','recaser'

            ]
        ));
    }
}