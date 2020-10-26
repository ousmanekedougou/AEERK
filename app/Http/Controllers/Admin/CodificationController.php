<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Ancien;
use App\Model\Admin\Chambre;
use App\Model\Admin\Nouveau;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class CodificationController extends Controller
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
        //
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
        $immeubles = Immeuble::all();
        $show_nouveau = Nouveau::find($id);
        return view('admin.codification.index',compact('immeubles','show_nouveau'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $immeubles = Immeuble::where('status',true)->get();
        $show_ancien = Ancien::find($id);
        return view('admin.codification.index1',compact('immeubles','show_ancien'));
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
        $validator = $this->validate($request , [
            'chambre_id' => 'required|string',
            'prix' => 'required|numeric',
        ]);
        // dd($request->chambre);
        $codifier_nouveau = Nouveau::find($id);
        $codifier_nouveau->chambre_id = $request->chambre_id;
        $codifier_nouveau->prix = $request->prix;
        $codifier_nouveau->codifier = 1;
        $codifier_nouveau->save();
        Flashy::success('Votre etudiant a ete codifier');
        return redirect()->route('admin.nouveau.index');

    }

    public function codifier_ancien(Request $request, $id){
        $validator = $this->validate($request , [
            'chambre_id' => 'required|string',
            'prix' => 'required|numeric',
        ]);
        // dd($request->chambre);
        $codifier_ancien = Ancien::find($id);
        $codifier_ancien->chambre_id = $request->chambre_id;
        $codifier_ancien->prix = $request->prix;
        $codifier_ancien->codifier = 1;
        $codifier_ancien->save();
        Flashy::success('Votre etudiant a ete codifier');
        return redirect()->route('admin.ancien.index');
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
