<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Str;
use App\Model\Admin\Commune;
use Illuminate\Http\Request;
use App\Model\User\Admission;
use App\Model\Admin\Departement;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $departement = Departement::all();
        return view('user.admission.index',compact('departement'));
    }

    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : str_random('25');
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
     
        return $file;
     }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departement = Departement::all();
        return view('user.admission.index1',compact('departement'));
    }

    public function inserte_ancient(){
        
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
            'kind' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:admissions',
            'phone' => 'required|min:9|max:14|unique:admissions',
            'birthday' => 'required',
            'lieu' => 'required',
            'address' => 'required',
            'commune' => 'required',
            'etablissement' => 'required',
            'filliere' => 'required',
            'niveau' => 'required',
            'extrait' => 'required',
            'a_bac' => 'required',
            'a_obt' => 'required|min:9',
            'a_ins' => 'required',
            'image' => 'required',
            'immeuble' => 'required',
            // 'carte' => 'required|min:13|max:14|unique:admissions',
        ]);
        // dd($request->all());

        $adminssion = new Admission;
        $adminssion->genre = $request->kind;
        $adminssion->nom = $request->firstname;
        $adminssion->prenom = $request->lastname;
        $adminssion->email = $request->email;
        $adminssion->phone = $request->phone;
        $adminssion->naissance = $request->birthday;
        $adminssion->lieu = $request->lieu;
        $adminssion->address = $request->address;
        $adminssion->commune = $request->commune;
        $adminssion->etablissement = $request->etablissement;
        $adminssion->filliere = $request->filliere;
        $adminssion->niveau = $request->niveau;
        $adminssion->a_obt = $request->a_obt;
        $adminssion->immeuble = $request->immeuble;
        $adminssion->cni = $request->carte;

        $adminssion->a_ins = $request->a_ins;
             // l'image de l'attestation d'inscription;
             if($request->has('a_ins')){
                //On enregistre l'url dans un dossier
                $url = $request->file('a_ins');
                //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
                $image_name = Str::slug($request->input('name')).'_'.time();
                //Nous enregistrerons nos fichiers dans /uploads/images dans public
                $folder = '/uploads/attestation_inscription/';
                //Nous allons enregistrer le chemin complet de l'url dans la BD
                $adminssion->a_ins = $folder.$image_name.'.'.$url->getClientOriginalExtension();
                //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
                $this->uploadImage($url, $folder, 'public', $image_name);
            }
                // fin de l'image d'attstation d'inscription

        // l'image de l'attestation du bac;
        if($request->has('a_bac')){
            //On enregistre l'url dans un dossier
            $url = $request->file('a_bac');
            //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
            $image_name = Str::slug($request->input('name')).'_'.time();
            //Nous enregistrerons nos fichiers dans /uploads/images dans public
            $folder = '/uploads/attestation_bac/';
            //Nous allons enregistrer le chemin complet de l'url dans la BD
            $adminssion->a_bac = $folder.$image_name.'.'.$url->getClientOriginalExtension();
            //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
            $this->uploadImage($url, $folder, 'public', $image_name);
        }
            // fin de l'image d'attstation du bac


            // $adminssion->extrait = $request->extrait;
        // l'image de l'extrait de naissance;
        if($request->has('extrait')){
            //On enregistre l'url dans un dossier
            $url = $request->file('extrait');
            //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
            $image_name = Str::slug($request->input('name')).'_'.time();
            //Nous enregistrerons nos fichiers dans /uploads/images dans public
            $folder = '/uploads/extrait_de_naissance/';
            //Nous allons enregistrer le chemin complet de l'url dans la BD
            $adminssion->extrait= $folder.$image_name.'.'.$url->getClientOriginalExtension();
            //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
            $this->uploadImage($url, $folder, 'public', $image_name);
        }
            // fin de l'imagel'extrait de naissance


            // $adminssion->image_cni = $request->image;
            // l'image de l'image de l'etudiant;
        if($request->has('image')){
            //On enregistre l'url dans un dossier
            $url = $request->file('image');
            //Nous allons definir le nom de notre url en combinant le nom du produit et un timestamp
            $image_name = Str::slug($request->input('name')).'_'.time();
            //Nous enregistrerons nos fichiers dans /uploads/images dans public
            $folder = '/uploads/Image_etudiant/';
            //Nous allons enregistrer le chemin complet de l'url dans la BD
            $adminssion->image_cni= $folder.$image_name.'.'.$url->getClientOriginalExtension();
            //Maintenant nous pouvons enregistrer l'url dans le dossier en utilisant la methode uploadImage();
            $this->uploadImage($url, $folder, 'public', $image_name);
        }
            // fin de l'imagel'image de l'etudiant

         
        $adminssion->save();
        return redirect(route('admission.index'))->with('message','Votre inscription a ete enregistre');

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
