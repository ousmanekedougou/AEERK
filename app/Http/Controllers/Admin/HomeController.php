<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Partenaire;
use App\Model\Admin\Team;
use App\Model\User\Nouveau;
use App\Model\User\Ancien;
use App\Model\User\Contact;

class HomeController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index() 
    {
        $nouveau_total_inscrit = Nouveau::all();
        $nouveau_total_valider = Nouveau::where('status',1)->get();
        $nouveau_total_ommis = Nouveau::where('status',2)->get();
        $nouveau_total_codifier = Nouveau::where('codifier',1)->get();


        $ancien_total_inscrit = Ancien::all();
        $ancien_total_valider = Ancien::where('status',1)->get();
        $ancien_total_ommis = Ancien::where('status',2)->get();
        $ancien_total_codifier = Ancien::where('codifier',1)->get();

        $contact_all = Contact::all();

        $admin_all = Admin::all();
        $team_all = Team::all();
        $partenaire_all = Partenaire::all();

        return view('admin.home',compact(
            ['nouveau_total_inscrit','nouveau_total_valider','nouveau_total_ommis','nouveau_total_codifier',
            
            'ancien_total_inscrit','ancien_total_valider','ancien_total_ommis','ancien_total_codifier',

            'contact_all','admin_all','team_all','partenaire_all'

            ]
        ));
    }
}