<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Chambre;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
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
            'immeuble' => 'required',
            'nombre' => 'required|numeric',
            'genre' => 'required',
        ]);
        $add_chambre = new Chambre;
        $add_chambre->nom = $request->name;
        $add_chambre->nombre = $request->nombre;
        $add_chambre->status = 1;
        $add_chambre->genre = $request->genre;
        $add_chambre->save();
        $add_chambre->immeubles()->sync($request->immeuble);
        Toastr::success('Votre chambre a ete ajoute', 'Ajout Chambre', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.logement.index');
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
        $this->validate($request,[
            'name' => 'required',
            'nombre' => 'required|numeric',
            'genre' => 'required',
        ]);
        $statusNumber = '';
        $update_chambre = Chambre::where('id',$id)->first();
        $update_chambre->nom = $request->name;
        $update_chambre->nombre = $request->nombre;
        $update_chambre->status = $request->status;
        $update_chambre->genre = $request->genre;
        $update_chambre->save();
        $update_chambre->immeubles()->sync($request->immeuble);
        Toastr::success('Votre chambre a ete modifier', 'Modification Chambre', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.logement.index');
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
