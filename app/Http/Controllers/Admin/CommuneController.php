<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Commune;
use Illuminate\Http\Request;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
class CommuneController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dep = Departement::all();
        return view('admin.commune.add',compact('dep'));
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
            'name' => 'required|string',
            'departement' => 'required|string',
        ]);
        $add_commune = new Commune;
        $add_commune->name = $request->name;
        $add_commune->departement_id = $request->departement;
        $add_commune->save();
        Toastr::success('Votre commune a ete ajoute', 'Ajout Commune', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.localite.index');
        
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
        $update_com = Commune::find($id);
        $update_com->name = $request->name;
        $update_com->departement_id = $request->departement;
        $update_com->save();
        Toastr::success('Votre commune a ete modifier', 'Modification Commune', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.localite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commune::find($id)->delete();
        Toastr::success('Votre commune a ete supprimer', 'Suppression Commune', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
