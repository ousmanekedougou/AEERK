<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\Nouveau;
use App\Model\User\Ancien;

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


        return view('admin.home',compact(
            ['nouveau_total_inscrit','nouveau_total_valider','nouveau_total_ommis','nouveau_total_codifier',
            
            'ancien_total_inscrit','ancien_total_valider','ancien_total_ommis','ancien_total_codifier']
        ));
    }
}