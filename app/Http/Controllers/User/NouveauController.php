<?php

namespace App\Http\Controllers\User;

use App\Model\User\Nouveau;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Solde;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Model\User\Etudiant;
use Nexmo\Laravel\Facade\Nexmo;
class NouveauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departement = Departement::all();
    
        return view('user.nouveau.index',compact('departement'));
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
        $validator = $this->validate($request , [
            'genre' => 'required',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:etudiants',
            'phone' => 'required|unique:etudiants|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
            'commune' => 'required|numeric',
            'extrait' => 'required|mimes:pdf,PDF',
            'relever' => 'required|mimes:pdf,PDF',
            'attestation' => 'required|mimes:pdf,PDF',
            'photocopie' => 'required|mimes:pdf,PDF',
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
        ]);
        // dd($request->all());
        $immeuble = Immeuble::where('status',1)->first();
        $add_nouveau = new Etudiant;
        define('NOUVEAU',1);
        $extraitName = '';
        $imageName = '';
        $photocopieName = '';
        $attestationName = '';
        $releverName = '';
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Nouveau');
        }
        if ($request->hasFile('extrait')) {
            $extraitName = $request->extrait->store('public/Nouveau');
        }
        if ($request->hasFile('attestation')) {
            $attestationName = $request->attestation->store('public/Nouveau');
        }
        if ($request->hasFile('photocopie')) {
            $photocopieName = $request->photocopie->store('public/Nouveau');
        }
        if ($request->hasFile('relever')) {
            $releverName = $request->relever->store('public/Nouveau');
        }
        $phoneFinale = '';
        $phoneComplet = '221'.$request->phone;
        if (strlen($request->phone) == 12 ) {
            $phoneFinale = $request->phone;
        }elseif (strlen($request->phone) == 9) {
            $phoneFinale = $phoneComplet;
        }else {
            return back()->with('error','votre numero de telephone est invalid');
        }
        if ($immeuble) {
            # code...
            $add_nouveau->genre = $request->genre;
            $add_nouveau->nom = $request->nom;
            $add_nouveau->prenom = $request->prenom;
            $add_nouveau->email = $request->email;
            $add_nouveau->phone = $phoneFinale;
            $add_nouveau->image = $imageName;
            $add_nouveau->extrait = $extraitName;
            $add_nouveau->attestation = $attestationName;
            $add_nouveau->photocopie = $photocopieName;
            $add_nouveau->relever = $releverName;
            $add_nouveau->commune_id = $request->commune;
            $add_nouveau->immeuble_id =  $immeuble->id;
            $add_nouveau->status = 0;
            $add_nouveau->ancienete = NOUVEAU;
            $add_nouveau->save();
            $numero_bureau = Solde::first();
            // Nexmo::message()->send([
            //     'to' => '221'.$numero_bureau->numero_nouveau,
            //     'from' => '+221'.$request->phone,
            //     'text' => "AEERK : Slut $request->prenom  $request->nom,votre inscription a ete enreistre.Nous vous revenons apres consultation de vos."
            // ]);
            Flashy::success('Votre Inscription a ete Valider');
            return redirect()->route('index',$add_nouveau)->with([
                "success" => "success",
                "name" => "$add_nouveau->prenom $add_nouveau->nom"
            ]);
        }else {
           Flashy::error('Il n\'existe pas d\'immeuble pour vous');
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
