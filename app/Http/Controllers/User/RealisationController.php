<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Admin\Departement;
use App\Model\User\Recrutement;
use Illuminate\Http\Request;

class RealisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $departements = Departement::all();
        return view('user.realisation.index',compact('departements'));
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
            'name' => 'required|string',
            'email' => 'required|email|unique:etudiants',
            'phone' => 'required|unique:etudiants|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
            'date' => 'required|string',
            'lieu' => 'required|string',
            'niveau' => 'required|string',
            'commune' => 'required|numeric',
            'filliere' => 'required|string',
            'etablissement' => 'required|string',
            'status' => 'required|string',
            'cni' => 'required|mimes:PDF,pdf',
            'curiculum' => 'required|mimes:pdf,PDF',
            'image' => 'required|image | mimes:jpeg,png,jpg,gif,ijf,PNG,JPEG,JPG,GIF,IJF',
            'diplome' => 'required|mimes:pdf,PDF',
        ]);
    //    dd($request->all());
        $add_etudiant = new Recrutement();
        $cniName = '';
        $imageName = '';
        $diplomeName = '';
        $curiculumName = '';
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/images');
        }
        if ($request->hasFile('curiculum')) {
            $curiculumName = $request->curiculum->store('public/curiculums');
        }
        if ($request->hasFile('cni')) {
            $cniName = $request->cni->store('public/cni');
        }
        if ($request->hasFile('diplome')) {
            $diplomeName = $request->diplome->store('public/diplomes');
        }
        $add_etudiant->genre = $request->genre;
        $add_etudiant->name = $request->name;
        $add_etudiant->email = $request->email;
        $add_etudiant->phone = $request->phone;
        $add_etudiant->naissance = $request->date;
        $add_etudiant->lieu = $request->lieu;
        $add_etudiant->niveau = $request->niveau;
        $add_etudiant->image = $imageName;
        $add_etudiant->curiculum = $curiculumName;
        $add_etudiant->identite = $cniName;
        $add_etudiant->diplome = $diplomeName;
        $add_etudiant->commune_id = $request->commune;
        $add_etudiant->etablissement = $request->etablissement;
        $add_etudiant->status = $request->status;
        $add_etudiant->filliere = $request->filliere;
        $add_etudiant->save();
          return redirect()->route('index',$add_etudiant)->with([
            "recrute" => "recrute",
            "etudiant_name" => "$add_etudiant->name",
        ]);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('user.realisation.show');
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
