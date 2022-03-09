<?php

namespace App\Http\Controllers\User;

use App\Model\User\Ancien;
use App\Model\User\Nouveau;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\User\Recasement;
use App\Http\Controllers\Controller;
use App\Model\User\Etudiant;
use Brian2694\Toastr\Facades\Toastr;

class RecasementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $immeuble = Immeuble::all();
        return view('user.recasement.index',compact('immeuble'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'email' => 'required|email|unique:recasements',
            'phone' => 'required|numeric|unique:recasements',
            'immeuble' => 'required|numeric',
        ]);
            $etudiant = Etudiant::where(['email'=>$request->email,'phone'=>$request->phone,'codifier'=>1])->where('prix' ,'>',0)->first();
            if ($etudiant) {
                $etudiant_recaser = new Recasement;
                $etudiant_recaser->genre = $etudiant->genre;
                $etudiant_recaser->nom = $etudiant->nom;
                $etudiant_recaser->prenom = $etudiant->prenom;
                $etudiant_recaser->email = $etudiant->email;
                $etudiant_recaser->phone = $etudiant->phone;
                $etudiant_recaser->cni = $etudiant->cni;
                $etudiant_recaser->image = $etudiant->image;
                $etudiant_recaser->immeuble_id = $request->immeuble;
                $etudiant_recaser->status = 0;
                $etudiant_recaser->recaser = 0;
                $etudiant_recaser->save();
                Toastr::success('Votre inscription a ete enregistre','Inscription Valider', ["positionClass" => "toast-top-right"]);
                return back();
            } else {
                Toastr::error('Vous n\'aviez pas codifier','Error Codification', ["positionClass" => "toast-top-right"]);
                return back();
            }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
