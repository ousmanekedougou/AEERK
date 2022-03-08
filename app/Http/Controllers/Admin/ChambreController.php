<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Chambre;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Model\User\Etudiant;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth:admin','isCodifier']);
    }
    
    public function index()
    {
        $immeuble = Immeuble::all();
        return view('admin.chambre.add',compact('immeuble'));
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
        $this->validate($request,[
            'name' => 'required',
            'nombre' => 'required|numeric',
            'genre' => 'required',
        ]);
        $add_chambre = new Chambre;
        $add_chambre->nom = $request->name;
        $add_chambre->nombre = $request->nombre;
        $add_chambre->status = 1;
        $add_chambre->genre = $request->genre;
        $add_chambre->immeuble_id = $request->immeuble;
        $add_chambre->save();
        Toastr::success('Votre chambre a ete ajoute', 'Ajout Chambre', ["positionClass" => "toast-top-right"]);
        return back();
        // $add_chambre->immeubles()->sync($request->immeuble);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $immeuble = Immeuble::where('id',$id)->first();
        return view('admin.logement.show',compact('immeuble'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chambre = Chambre::where('id',$id)->first();
        $ancien_bac = Etudiant::where('chambre_id',$id)->where('codifier',1)->get();
        return view('admin.logement.etudiant',compact('ancien_bac','chambre'));
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
        $this->validate($request,[
            'name' => 'required',
            'nombre' => 'required|numeric',
            'genre' => 'required',
        ]);
        $is_peline = '';
        $update_chambre = Chambre::where('id',$id)->first();
        if ($request->nombre > $update_chambre->nombre) {
            $is_peline = 0;
            $nombre = $request->nombre;
        }elseif($request->nombre < $update_chambre->nombre) {
            $is_peline = $update_chambre->is_pleine;
            $nombre = $update_chambre->nombre;
            Toastr::error('Le nombre de place est invalide', 'Nomre de Places', ["positionClass" => "toast-top-right"]);
            return back();
        }
        
        $update_chambre->nom = $request->name;
        $update_chambre->genre = $request->genre;
        $update_chambre->nombre = $nombre;
        $update_chambre->is_pleine = $is_peline;
        $update_chambre->immeuble_id = $request->immeuble;
        $update_chambre->save();
        Toastr::success('Votre chambre a ete modifier', 'Modification Chambre', ["positionClass" => "toast-top-right"]);
        return back();
        // $update_chambre->immeubles()->sync($request->immeuble);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chambre::find($id)->delete();
        Toastr::success('Votre chambre a ete supprimer', 'Suppression Chambre', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
