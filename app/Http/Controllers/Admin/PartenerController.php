<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Partenaire;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class PartenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth:admin','isAdmin']);
    }
    
    public function index()
    {
        return view('admin.partener.index');
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
            'name' => 'required|string',
            'lien' => 'required|string',
            'image' => 'required|image | mimes:jpeg,png,jpg,gif,ijf',
            'mot' => 'required|string',
            'date' => 'required|string',
        ]);
        $add_partener = new Partenaire;
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Partenaire');
        }
        $add_partener->nom = $request->name;
        $add_partener->lien = $request->lien;
        $add_partener->image = $imageName;
        $add_partener->mot = $request->mot;
        $add_partener->date = $request->date;
        $add_partener->save();
        Flashy::success('Votre partenaire a ete ajouter');
        return back();
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
            'name' => 'required|string',
            'lien' => 'required|string',
            'mot' => 'required|string',
            'date' => 'required|string',
            // 'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
        ]);
        $update_partener = Partenaire::find($id);
        if($request->image == Null){
            $imageName = $update_partener->image;
        }
        elseif($request->hasFile('image')) {
            $imageName = $request->image->store('public/Partenaire');
        }
        $update_partener->nom = $request->name;
        $update_partener->lien = $request->lien;
        $update_partener->image = $imageName;
        $update_partener->mot = $request->mot;
        $update_partener->date = $request->date;
        $update_partener->save();
        Flashy::success('Votre partenaire a ete modifier');
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
        Partenaire::find($id)->delete();
        Flashy::success('Votre Partenaire a ete supprimer');
        return back();
    }
}
