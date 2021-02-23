<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class ImmeubleController extends Controller
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
        return view('admin.immeuble.add');
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
            'address' => 'required|string',
            'image' => 'required|image',
            'status' => 'required'
        ]);
        $add_immeuble = new Immeuble;
        $add_immeuble->name = $request->name;
        $add_immeuble->address = $request->address;
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Immeuble');
        }
        $add_immeuble->image = $imageName;
        $add_immeuble->status = $request->status;
        $add_immeuble->save();
        Flashy::success('Votre immeuble a ete ajouter');
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
            'name' => 'required|string',
            'address' => 'required|string',

        ]);
        $update_immeuble = Immeuble::find($id);
        $imageName = '';
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Immeuble');
        }else{
            $imageName = $update_immeuble->image;
        }
        $update_immeuble->name = $request->name;
        $update_immeuble->address = $request->address;
        $update_immeuble->image = $imageName;
        $update_immeuble->status = $request->status;
        $update_immeuble->save();
        Flashy::success('Votre immeuble a ete ajouter');
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
        Immeuble::find($id)->delete();
        Flashy::success('Votre immeuble a ete supprimer');
        return back();
    }
}
