<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Ancien;
use Illuminate\Http\Request;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class AncienController extends Controller
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
        $anciens = Ancien::all();
        return view('admin.ancien.index',compact('anciens'));
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
        $show_ancien = Ancien::find($id);
        return view('admin.ancien.show',compact('show_ancien','departement'));
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
        $update_ancien = Ancien::find($id);
        $extraitName = '';
        $imageName = '';
        $photocopieName = '';
        $certificatName = '';
        $statusValide = '';
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Nouveau');
        }else{
            $imageName = $update_ancien->image;
        }
        if ($request->hasFile('extrait')) {
            $extraitName = $request->extrait->store('public/Ancien');
        }else{
            $extraitName = $update_ancien->extrait;
        }
        if ($request->hasFile('certificat')) {
            $certificatName = $request->certificat->store('public/Ancien');
        }else{
            $certificatName = $update_ancien->certificat;
        }
        if ($request->hasFile('photocopie')) {
            $photocopieName = $request->photocopie->store('public/Ancien');
        }else{
            $photocopieName = $update_ancien->photocopie;
        }
        if ($request->status != Null) {
            $statusValide = $request->status;
        }else{
           $statusValide = 0;
        }
        $update_ancien->image = $imageName;
        $update_ancien->extrait = $extraitName;
        $update_ancien->certificat = $certificatName;
        $update_ancien->photocopie = $photocopieName;
        $update_ancien->status = $statusValide;
        $update_ancien->save();
        Flashy::success('Votre etudaint a ete consulter');
        return back();
    }
    public function update_ancien(Request $request, $id){
        $update_ancien = Ancien::find($id);
        $immeuble = Immeuble::where('status',true)->first();
        $update_ancien->nom = $request->nom;
        $update_ancien->prenom = $request->prenom;
        $update_ancien->email = $request->email;
        $update_ancien->phone = $request->phone;
        $update_ancien->status = $request->status;
        $update_ancien->commune_id = $request->commune;
        $update_ancien->immeuble_id = $immeuble ->id;
        $update_ancien->save();
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
