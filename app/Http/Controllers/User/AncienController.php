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
class AncienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departement = Departement::all();
        $immeuble = Immeuble::where('status',2)->get();
        return view('user.ancien.index',compact('departement','immeuble'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $immeuble = Immeuble::where('status',2)->get();
        return view('user.ancien.update',compact('immeuble'));
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
            'immeuble' => 'required|numeric',
            'extrait' => 'required|mimes:PDF,pdf',
            'certificat' => 'required|mimes:pdf,PDF',
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'photocopie' => 'required|mimes:pdf,PDF',
        ]);
        // dd($request->ccode);
        $add_ancien = new Etudiant;
        define('ANCIENETE',2);
        $extraitName = '';
        $imageName = '';
        $photocopieName = '';
        $certificatName = '';
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
        $phoneFinale = '';
        $phoneComplet = $request->indicatif.''.$request->phone;
        if (strlen($request->phone) == 13 ) {
            $phoneFinale = $request->phone;
        }elseif (strlen($request->phone) == 9) {
            $phoneFinale = $phoneComplet;
        }else {
            return back()->with('error','votre numero de telephone est invalid');
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
        $add_ancien->commune_id = $request->commune;
        $add_ancien->immeuble_id = $request->immeuble;
        $add_ancien->status = 0;
        $add_ancien->ancienete = ANCIENETE;
        $add_ancien->save();
        $numero_bureau = Solde::first();
        // Nexmo::message()->send([
        //     'to' => '221'.$numero_bureau->numero_ancien,
        //     'from' => '+221'.$request->phone,
        //     'text' => "AEERK : Slut $request->prenom  $request->nom,votre inscription a ete enreistre.Nous vous revenons apres consultation de vos."
        // ]);
        Flashy::success('Votre Inscription a ete Valider');
        return redirect()->route('index',$add_ancien)->with([
            "success" => "success",
            "name" => "$add_ancien->prenom $add_ancien->nom"
        ]);
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
            'update_image' => 'image|mimes:jpeg,png,jpg,gif,ijf',
            'immeuble' => 'required|numeric'
        ]);
        $ancien_existant = Etudiant::where(['email' => $request->update_email , 'phone' => $request->update_phone ,
        'codifier' => 1 , 'ancienete' => 2])->first();

        $imageName = '';
        $certificatName = '';
        if ($request->hasFile('update_image')) {
            if ($request->update_image == Null) {
                $imageName = $ancien_existant->image;
            }else{
                $imageName = $request->update_image->store('public/Ancien');
            }
        }
        if ($request->hasFile('update_certificat')) {
            $certificatName = $request->update_certificat->store('public/Ancien');
        }
        if ($ancien_existant){
            $ancien_existant->certificat = $certificatName;
            $ancien_existant->image = $imageName;
            $ancien_existant->status = false;
            $ancien_existant->codifier = 0;
            $ancien_existant->prix = 0;
            $ancien_existant->immeuble_id = $request->immeuble;
            $ancien_existant->chambre_id = 0;
            $ancien_existant->save();
            $numero_bureau = Solde::first();
            // Nexmo::message()->send([
            //     'to' => '221'.$numero_bureau->numero_ancien,
            //     'from' => '+221'.$request->update_phone,
            //     'text' => "AEERK : Slut $ancien_existant->prenom  $ancien_existant->nom,votre certificat d'inscription a ete modifier."
            // ]);
            Flashy::success('Votre profile a ete mise a jour');
            return redirect()->route('index');
        }else{
            Flashy::error('Vous etes pas dans notre base de donne');
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
