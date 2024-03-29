<?php

namespace App\Http\Controllers\User;

use App\Model\User\Nouveau;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Solde;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Model\Admin\Faculty;
use App\Model\User\Etudiant;
use Brian2694\Toastr\Facades\Toastr;
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
        if (lien_front()->lien_front == 1) {
        $departement = Departement::all();
        $puliques = Faculty::where('for',0)->get();
        $prives = Faculty::where('for',1)->get();
        return view('user.nouveau.index',compact('departement','puliques','prives'));
        }else {
            Toastr::warning('L\'access de cette page est desctiver', 'Access Desactiver', ["positionClass" => "toast-top-right"]);
            return back();
        }
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
        if (lien_front()->lien_front == 1) {
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
                'filliere' => 'required|numeric',
                'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            ]);
            // dd($request->all());
            $immeuble = Immeuble::where('status',1)->first();
            $add_nouveau = new Etudiant;
            define('NOUVEAU',1);
            $imageName = '';
            $extraitName = '';
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
                Toastr::error('votre numero de telephone est invalid', 'Error Telepone', ["positionClass" => "toast-top-right"]);
            }
            if ($immeuble) {
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
                $add_nouveau->faculty_id = $request->filliere;
                $add_nouveau->codification_count = 1;
                $add_nouveau->ancienete = NOUVEAU;
                $add_nouveau->save();
                $numero_bureau = Solde::first();
                return redirect()->route('index',$add_nouveau)->with([
                    "success" => "success",
                    "name" => "$add_nouveau->prenom $add_nouveau->nom"
                ]);
            }else {
                Toastr::error('Il n\'existe pas d\'immeuble pour vous', 'Immeule non identifier', ["positionClass" => "toast-top-right"]);
            }
        }else {
            Toastr::warning('L\'access de cette page est desctiver', 'Access Desactiver', ["positionClass" => "toast-top-right"]);
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
