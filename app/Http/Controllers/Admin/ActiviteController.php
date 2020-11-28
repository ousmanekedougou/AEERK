<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Activite;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class ActiviteController extends Controller
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
        $activite_all = Activite::all();
        return view('admin.activite.index',compact('activite_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activite.add');
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
            'libele' => 'required|string',
            'date' => 'required',
            'fin' => 'required',
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'resume' => 'required|string',
        ]);

        $add_activite = new Activite();
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Activite');
        }

        $add_activite->libele = $request->libele;
        $add_activite->ville = $request->ville;
        $add_activite->adresse = $request->adresse;
        $add_activite->date = $request->date;
        $add_activite->date_fin = $request->fin;
        $add_activite->description = $request->resume;
        $add_activite->status = $request->status;
        $add_activite->image = $imageName;
        $add_activite->save();
        Flashy::success('Votre activite a ete ajoute');
        return redirect()->route('admin.activite.index');
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
        $edit_activite = Activite::find($id);
        return view('admin.activite.edite',compact('edit_activite'));
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
        $update_activite = Activite::find($id);
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Activite');
        }elseif ($request->image == Null){
            $imageName = $update_activite->image;
        }
        $update_activite->libele = $request->libele;
        $update_activite->date = $request->date;
        $update_activite->date_fin = $request->fin;
        $update_activite->ville = $request->ville;
        $update_activite->adresse = $request->adresse;
        $update_activite->description = $request->resume;
        $update_activite->status = $request->status;
        $update_activite->image = $imageName;
        $update_activite->save();
        Flashy::success('Votre activite a ete modifier');
        return redirect()->route('admin.activite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activite::find($id)->delete();
        Flashy::success('Votre Activite a ete supprimer');
        return back();
    }
}
