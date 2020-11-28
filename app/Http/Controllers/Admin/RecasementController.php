<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\User\Recasement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Model\User\Recasement_ancien;
use App\Model\User\Recasement_nouveau;

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
        $nouveau_bac = Recasement::where('status', '=', 0)->where('recaser','=',0)->paginate(10);
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
        $recaser = Recasement::where('status', '=', 1)->where('recaser','=',1)->paginate(10);
        return view('admin.recasement.recaser',compact('recaser','immeubles'));
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
        $show_nouveau = Recasement::find($id);
        return view('admin.recasement.create',compact('show_nouveau','immeubles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
            // dd($request->chambre_id);
            $recasement_nouveau = Recasement::find($id);
            $recasement_nouveau->chambre_id = $request->chambre_id;
            $recasement_nouveau->recaser = 1;
            $recasement_nouveau->status = 1;
            $recasement_nouveau->save();
            Flashy::success('Votre etudiant a ete Recaser');
            return redirect()->route('admin.recasement.create');
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
