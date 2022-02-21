<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Historique;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class HistoriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth:admin','isPost']);
    }
    
    public function index()
    {
        $historique_all = Historique::all();
        return view('admin.historique.index',compact('historique_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.historique.add');
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
            'resume' => 'required|string',
        ]);

        $add_historique = new Historique();
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/historique');
        }

        $add_historique->nom = $request->libele;
        $add_historique->date = $request->date;
        $add_historique->description = $request->resume;
        $add_historique->status = $request->status;
        $add_historique->image = $imageName;
        $add_historique->save();
        Toastr::success('Votre historique a ete ajouter', 'Ajout Historique', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.historique.index');
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
        $edit_historique = Historique::find($id);
        return view('admin.historique.edite',compact('edit_historique'));
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
        $update_historique = Historique::find($id);
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/historique');
        }elseif ($request->image == Null){
            $imageName = $update_historique->image;
        }
        $update_historique->nom = $request->libele;
        $update_historique->date = $request->date;
        $update_historique->description = $request->resume;
        $update_historique->status = $request->status;
        $update_historique->image = $imageName;
        $update_historique->save();
        Toastr::success('Votre historique a ete mise a jour', 'Ajout Historique', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.historique.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Historique::find($id)->delete();
        Toastr::success('Votre historique a ete supprimer', 'Suppression Historique', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
