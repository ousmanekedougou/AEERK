<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Realisation;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class RealisationController extends Controller
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
        $realisation_all = Realisation::all();
        return view('admin.realisation.index',compact('realisation_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.realisation.add');
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
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'contenu' => 'required|string',
        ]);

        $add_realisation = new Realisation();
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/realisation');
        }

        $add_realisation->nom = $request->libele;
        $add_realisation->date = $request->date;
        $add_realisation->contenu = $request->contenu;
        $add_realisation->status = $request->status;
        $add_realisation->image = $imageName;
        $add_realisation->save();
        Flashy::success('Votre realisation a ete ajoute');
        return redirect()->route('admin.realisation.index');
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
        $edit_realisation = Realisation::find($id);
        return view('admin.realisation.edite',compact('edit_realisation'));
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
        $update_realisation = Realisation::find($id);
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/realisation');
        }elseif ($request->image == Null){
            $imageName = $update_realisation->image;
        }
        $update_realisation->nom = $request->libele;
        $update_realisation->date = $request->date;
        $update_realisation->contenu = $request->contenu;
        $update_realisation->status = $request->status;
        $update_realisation->image = $imageName;
        $update_realisation->save();
        Flashy::success('Votre realisation a ete modifier');
        return redirect()->route('admin.realisation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Realisation::find($id)->delete();
        Flashy::success('Votre realisation a ete supprimer');
        return back();
    }
}
