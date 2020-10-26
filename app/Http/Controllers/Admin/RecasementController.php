<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Ancien;
use App\Model\Admin\Nouveau;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class RecasementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $immeubles = Immeuble::all();
        $nouveau_bac = Nouveau::where(['recasement'=>1,'recasement'=>2])->get();
        return view('admin.recasement.index',compact('nouveau_bac','immeubles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $immeubles = Immeuble::all();
        $ancien_bac = Ancien::where(['recasement'=>1,'recasement'=>2])->get();
        return view('admin.recasement.index1',compact('ancien_bac','immeubles'));
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
        $immeubles = Immeuble::all();
        $show_nouveau = Nouveau::find($id);
        return view('admin.recasement.show_nouveau',compact('show_nouveau','immeubles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $immeubles = Immeuble::all();
        $show_ancien = Nouveau::find($id);
        return view('admin.recasement.show_ancien',compact('show_ancien','immeubles'));
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
        $validator = $this->validate($request,[
            'chambre_id' => 'required|numeric'
        ]);
        if ($request->distinct == 1) {
            $recasement_nouveau = Nouveau::find($id);
            $recasement_nouveau->chambre_id = $request->chambre_id;
            $recasement_nouveau->recasement = 2;
            $recasement_nouveau->save();
            Flashy::success('Votre etudiant a ete Recaser');
            return redirect()->route('admin.recasement.index');
        }
        // dd($request->chambre_id);
        else if ($request->distinct == 2) {
            $recasement_ancien = Ancien::find($id);
            $recasement_ancien->chambre_id = $request->chambre_id;
            $recasement_ancien->recasement = 2;
            $recasement_ancien->save();
            Flashy::success('Votre etudiant a ete Recaser');
            return redirect()->route('admin.recasement.create');
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
