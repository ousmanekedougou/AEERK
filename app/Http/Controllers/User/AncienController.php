<?php

namespace App\Http\Controllers\User;

use App\Model\User\Ancien;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Solde;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Nexmo\Laravel\Facade\Nexmo;
use App\Model\User\Etudiant;
use App\Helpers\Sms;
use App\Model\Admin\Faculty;
use Brian2694\Toastr\Facades\Toastr;

class AncienController extends Controller
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
            $immeuble = Immeuble::where('status',2)->get();
            return view('front-end.ancien.index',compact('departement','immeuble','puliques','prives'));
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
        if (lien_front()->lien_front == 1) {
            $departement = Departement::all();
            $puliques = Faculty::where('for',0)->get();
            $prives = Faculty::where('for',1)->get();
            $immeuble = Immeuble::where('status',2)->get();
            return view('user.ancien.create',compact('departement','immeuble','puliques','prives'));
        }else {
            Toastr::warning('L\'access de cette page est desctiver', 'Access Desactiver', ["positionClass" => "toast-top-right"]);
            return back();
        }
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
                'niveau' => 'required',
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'email' => 'required|email|unique:etudiants',
                'phone' => 'required|unique:etudiants|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
                'commune' => 'required|numeric',
                'immeuble' => 'required|numeric',
                'filliere' => 'required|numeric',
                'extrait' => 'required|mimes:PDF,pdf',
                'certificat' => 'required|mimes:pdf,PDF',
                'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
                'photocopie' => 'required|mimes:pdf,PDF',
                'relever' => 'required|mimes:pdf,PDF',
            ]);
            // dd($request->ccode);
            $add_ancien = new Etudiant;
            define('ANCIENETE',2);
            $imageName = '';
            $extraitName = '';
            $photocopieName = '';
            $certificatName = '';
            $releverName = '';
            $countCodification = '';
            if ($request->hasFile('image')) {
                $imageName = $request->image->store('public/Ancien');
            }
            if ($request->hasFile('extrait')) {
                $extraitName = $request->extrait->store('public/Ancien');
            }
            if ($request->hasFile('certificat')) {
                $certificatName = $request->certificat->store('public/Ancien');
            }
            if ($request->hasFile('photocopie')) {
                $photocopieName = $request->photocopie->store('public/Ancien');
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
                return back();
            }

            $add_ancien->genre = $request->genre;
            $add_ancien->nom = $request->nom;
            $add_ancien->prenom = $request->prenom;
            $add_ancien->email = $request->email;
            $add_ancien->phone = $phoneFinale;
            $add_ancien->image = $imageName;
            $add_ancien->bac = $extraitName;
            $add_ancien->certificat = $certificatName;
            $add_ancien->photocopie = $photocopieName;
            $add_ancien->relever = $releverName;
            $add_ancien->commune_id = $request->commune;
            $add_ancien->immeuble_id = $request->immeuble;
            $add_ancien->status = 0;
            $add_ancien->codification_count = $request->niveau;
            $add_ancien->faculty_id = $request->filliere;
            $add_ancien->ancienete = ANCIENETE;
            $add_ancien->save();

            // Teste sms
            
            // return redirect()->route('index',$add_ancien)->with([
            //     "success" => "success",
            //     "name" => "$add_ancien->prenom $add_ancien->nom"
            // ]);
            Toastr::success('Salut '.$add_ancien->prenom.' '.$add_ancien->nom.' votre inscription a ete enregistre avec success', 'Inscription Reussie', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
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
    public function update(Request $request,$id)
    {
       
    }

    public function update_certificat(Request $request)
    {
        $validator = $this->validate($request , [
            'update_email' => 'required|email',
            'update_phone' => 'required|numeric',
            'update_certificat' => 'required|mimes:pdf,PDF',
            'update_relever' => 'image|mimes:jpeg,png,jpg,gif,ijf',
            'immeuble' => 'required|numeric'
        ]);
        $ancien_existant = Etudiant::where(['email' => $request->update_email , 'phone' => $request->update_phone ,
        'codifier' => 1 , 'ancienete' => 2])->first();

        $releverName = '';
        $certificatName = '';
        if ($request->hasFile('update_relever')) {
            if ($request->update_relever == Null) {
                $releverName = $ancien_existant->image;
            }else{
                $releverName = $request->update_relever->store('public/Ancien');
            }
        }
        if ($request->hasFile('update_certificat')) {
            $certificatName = $request->update_certificat->store('public/Ancien');
        }
        if ($ancien_existant){
            if ($ancien_existant->codification_count < 7) {
                $ancien_existant->certificat = $certificatName;
                $ancien_existant->relever = $releverName;
                $ancien_existant->status = false;
                $ancien_existant->codifier = 0;
                $ancien_existant->prix = 0;
                $ancien_existant->immeuble_id = $request->immeuble;
                $ancien_existant->chambre_id = 0;
                $ancien_existant->save();
                Toastr::success('Votre profile a ete mise a jour', 'Modificatin Profile', ["positionClass" => "toast-top-right"]);
                return redirect()->route('index');
            }else {
                Toastr::error('Votre quotta de codification est epuiser', 'Error Codification', ["positionClass" => "toast-top-right"]);
                return redirect()->route('index');
            }
        }else{
            Toastr::error('Vous etes pas dans notre base de donne', 'Inexiatant', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
        }
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
