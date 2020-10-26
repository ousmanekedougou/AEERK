<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Nouveau;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class NouveauController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nouveau_bac = Nouveau::all();
        return view('admin.nouveau.index',compact('nouveau_bac'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departement = Departement::all();
        $show_nouveau = Nouveau::find($id);
        return view('admin.nouveau.show',compact('show_nouveau','departement'));
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
        // $validator = $this->validate($request , [
        //     'extrait' => 'mimes:.pdf,.PDF',
        //     'attestation' => 'mimes:.pdf,.PDF',
        //     'image' => 'dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
        //     'photocopie' => 'mimes:.pdf,.PDF',
        // ]);
        // dd($request->extrait);
        $update_nouveau = Nouveau::find($id);
        $extraitName = '';
        $imageName = '';
        $photocopieName = '';
        $attestationName = '';
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Nouveau');
        }else{
            $imageName = $update_nouveau->image;
        }
        if ($request->hasFile('extrait')) {
            $extraitName = $request->extrait->store('public/Nouveau');
        }else{
            $extraitName = $update_nouveau->extrait;
        }
        if ($request->hasFile('attestation')) {
            $attestationName = $request->attestation->store('public/Nouveau');
        }else{
            $attestationName = $update_nouveau->attestation;
        }
        if ($request->hasFile('photocopie')) {
            $photocopieName = $request->photocopie->store('public/Nouveau');
        }else{
            $photocopieName = $update_nouveau->photocopie;
        }
        if ($request->status != Null) {
            $statusValide = $request->status;
        }else{
           $statusValide = 0;
        }
        $update_nouveau->image = $imageName;
        $update_nouveau->extrait = $extraitName;
        $update_nouveau->attestation = $attestationName;
        $update_nouveau->photocopie = $photocopieName;
        $update_nouveau->status = $statusValide;
        $update_nouveau->save();
        Flashy::success('Votre etudaint a ete consulter');
        return back();
    }

    public function update_nouveau(Request $request, $id){
        $update_nouveau = Nouveau::find($id);
        $immeuble = Immeuble::where('status',false)->first();
        $update_nouveau->nom = $request->nom;
        $update_nouveau->prenom = $request->prenom;
        $update_nouveau->email = $request->email;
        $update_nouveau->phone = $request->phone;
        $update_nouveau->status = $request->status;
        $update_nouveau->commune_id = $request->commune;
        $update_nouveau->immeuble_id = $immeuble ->id;
        $update_nouveau->save();
        Flashy::success('Votre etudaint a ete consulter');
        return back();
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
