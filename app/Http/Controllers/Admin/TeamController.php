<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Team;
use Illuminate\Http\Request;
use App\Model\Admin\Commission;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
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
        $commission = Commission::all();
        $teams = Team::all();
        return view('admin.personnel.index',compact('commission','teams'));
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
        // dd($request->All());
        $validator = $this->validate($request,[
            'nom' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'image' => 'required|image',
            'poste' => 'required|numeric',
        ]);
        if($request->hasFile('image')){
            $imageName = $request->image->store('public/Personnel');
        }

        $add_personnel = new Team;
        $add_personnel->nom = $request->nom;
        $add_personnel->email = $request->email;
        $add_personnel->phone = $request->phone;
        $add_personnel->poste_id = $request->poste;
        $add_personnel->image = $imageName;
        $add_personnel->save();
        Flashy::success('Votre Personnelle a ete ajouter');
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
        $update_personnel = Team::find($id);
        $update_personnel->nom = $request->nom;
        $update_personnel->email = $request->email;
        $update_personnel->phone = $request->phone;
        $update_personnel->poste_id = $request->poste;
        $teameImg = $update_personnel->image;
        if($request->hasFile('image')){
            $imageName = $request->image->store('public/Personnel');
            Storage::delete($teameImg);
        }else {
            $imageName = $update_personnel->image;
        }
        $update_personnel->image = $imageName;
        $update_personnel->save();
        Flashy::success('Votre Personnelle a ete modifier');
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
        $team = Team::find($id);
        $teamimge = $team->image;
        Storage::delete($teamimge);
        $team->delete();
        Flashy::primary('Votre Personnelle a ete Supprimer');
        return back();
    }
}
