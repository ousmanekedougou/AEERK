<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Social;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:admin');
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  $this->validate($request,[
            'name' => 'required|unique:socials',
            'lien' => 'required|unique:socials',
            
        ]);
        Social::create($request->all());
        Flashy::success('Votre reseau a ete ajouter');
        return redirect()->route('admin.info.index');
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
        $validator =  $this->validate($request,[
            'name' => 'required|unique:socials',
            'lien' => 'required|unique:socials',
            
        ]);

        $social_update = Social::find($id);
        $social_update->name = $request->name;
        $social_update->lien = $request->lien;
        $social_update->save();
        Flashy::success('Votre reseau a ete modifier');
        return redirect()->route('admin.info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Social::where('id',$id)->delete();
        return back();
    }
}
