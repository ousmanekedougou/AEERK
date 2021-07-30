<?php

namespace App\Http\Controllers\User;

use App\Model\User\Ancien;
use App\Model\User\Nouveau;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\User\Recasement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Model\User\Etudiant;
use App\Model\User\Recasement_ancien;
use App\Model\User\Recasement_nouveau;

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
            'status' => 'required|numeric',
            'email' => 'required|email|unique:recasements',
            'phone' => 'required|numeric|unique:recasements',
            'immeuble' => 'required|numeric',
        ]);
        if ($request->status == 1) {
            $nouveaux = Etudiant::where(['email'=>$request->email,'phone'=>$request->phone,'codifier'=>1,'ancienete' => 1])->first();
            
            if ($nouveaux) {
                $nouveaux_recaser = new Recasement;
                $nouveaux_recaser->genre = $nouveaux->genre;
                $nouveaux_recaser->nom = $nouveaux->nom;
                $nouveaux_recaser->prenom = $nouveaux->prenom;
                $nouveaux_recaser->email = $nouveaux->email;
                $nouveaux_recaser->phone = $nouveaux->phone;
                $nouveaux_recaser->image = $nouveaux->image;
                $nouveaux_recaser->immeuble_id = $request->immeuble;
                $nouveaux_recaser->status = 0;
                $nouveaux_recaser->recaser = 0;
                $nouveaux_recaser->save();
                Flashy::success('Votre Inscription a ete valider');
                return back();
            } else {
                Flashy::error('Vous n\'aviez pas codifier');
                return back();
            }

        }elseif ($request->status == 2) {
            $anciens = Etudiant::where(['email'=>$request->email,'phone'=>$request->phone,'codifier'=>1,'ancienete' => 2])->first();
            if ($anciens) {
                $anciens_recaser = new Recasement;
                $anciens_recaser->genre = $anciens->genre;
                $anciens_recaser->nom = $anciens->nom;
                $anciens_recaser->prenom = $anciens->prenom;
                $anciens_recaser->email = $anciens->email;
                $anciens_recaser->phone = $anciens->phone;
                $anciens_recaser->image = $anciens->image;
                $anciens_recaser->immeuble_id = $request->immeuble;
                $anciens_recaser->status = 0;
                $anciens_recaser->recaser = 0;
                $anciens_recaser->save();
                Flashy::success('Votre Inscription a ete valider');
                return back();
            } else {
                Flashy::error('Vous n\'aviez pas codifier');
                return back();
            }
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
