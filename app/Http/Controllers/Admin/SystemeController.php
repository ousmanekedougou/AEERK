<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Systeme;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SystemeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin','isPost']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_systeme = Systeme::all();
        return view('admin.systeme.index',compact('all_systeme'));
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
        $validator = $this->validate($request,[
            'type' => 'required|string',
            'titre' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,ijf',
        ]);
        // dd($request->all());
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Systeme');
        }
        $addSysteme = new Systeme;
        $addSysteme->titre = $request->titre;
        $addSysteme->type = $request->type;
        $addSysteme->content = $request->content;
        $addSysteme->image = $imageName;
        $addSysteme->save();
        Toastr::success('Votre systeme a ete ajouter','Ajout Systeme', ["positionClass" => "toast-top-right"]);
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
        $validator = $this->validate($request,[
            'type' => 'required|string',
            'titre' => 'required|string',
            'content' => 'required|string',
        ]);
        // dd($request->all());
        $updateSysteme = Systeme::find($id);
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Systeme');
        }else{
            $imageName = $updateSysteme->image;
        }
        $updateSysteme->titre = $request->titre;
        $updateSysteme->type = $request->type;
        $updateSysteme->content = $request->content;
        $updateSysteme->image = $imageName;
        $updateSysteme->save();
        Toastr::success('Votre systeme a ete modifier','Modification Systeme', ["positionClass" => "toast-top-right"]);
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
        Systeme::find($id)->delete();
        Toastr::success('Votre systeme a ete supprimer','Suppression Systeme', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
