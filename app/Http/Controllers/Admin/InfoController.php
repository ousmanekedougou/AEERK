<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Info;
use App\Model\Admin\Social;
use Illuminate\Http\Request;
use App\Model\Admin\Partenaire;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class InfoController extends Controller
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
        $infos = Info::all();
        $partener = Partenaire::all();
        $social_reseau = Social::all();
        return view('admin.info.index',compact('infos','social_reseau','partener'));
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
            'email' => 'required|email|unique:infos',
            'phone' => 'required|unique:infos',
            'adresse' => 'required|unique:infos',
            'bp' => 'required|unique:infos',
            'fax' => 'required|unique:infos',
            
        ]);
        $info_ajouter = new Info;
        $info_ajouter->email = $request->email;
        $info_ajouter->phone = $request->phone;
        $info_ajouter->adresse = $request->adresse;
        $info_ajouter->bp = $request->bp;
        $info_ajouter->fax = $request->fax;
        $info_ajouter->save();
        Flashy::success('Vos infos ont ete ajouter');
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
        $info_view = Info::where('id',$id)->first();
        return view('admin.info.edite',compact('info_view'));
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
        $info_update = Info::find($id);
        $info_update->email = $request->email;
        $info_update->phone = $request->phone;
        $info_update->adresse = $request->adresse;
        $info_update->bp = $request->bp;
        $info_update->fax = $request->fax;
        $info_update->save();
        Flashy::success('Vos infos ont ete modifier');
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
        Info::where('id',$id)->delete();
        return back();
    }
}
