<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Poste;
use Illuminate\Http\Request;
use App\Model\Admin\Commission;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
class ComissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth:admin','isCodifier']);
    }
    
    public function index()
    {
        $add_poste = Poste::all();
        $add_commission = Commission::all();
        return view('admin.comission.index',compact('add_commission','add_poste'));
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
            'name' => 'required'
        ]);
        $add_commission = new Commission;
        $add_commission->name = $request->name;
        $add_commission->save();
        Toastr::success('Votre commission a ete ajoute', 'Ajout Commission', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.comission.index');
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
            'name' => 'required'
        ]);
        $add_commission = Commission::find($id);
        $add_commission->name = $request->name;
        $add_commission->save();
        Toastr::success('Votre commission a ete modifier', 'Modification Commission', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.comission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commission::find($id)->delete();
        Toastr::success('Votre commission a ete supprimer', 'Suppression Commission', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
