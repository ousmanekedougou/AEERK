<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Commune;
use Illuminate\Http\Request;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class CommuneController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->user()->can('logement.create')) 
        {
            $dep = Departement::all();
            return view('admin.commune.add',compact('dep'));
        }
                                    
        return redirect(route('admin.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::guard('admin')->user()->can('logement.create')) 
        {
            $this->validate($request,[
                'name' => 'required|string',
                'departement' => 'required|string',
            ]);
            $add_commune = new Commune;
            $add_commune->name = $request->name;
            $add_commune->departement_id = $request->departement;
            $add_commune->save();
            Flashy::success('Votre Commune a ete jouter');
            return redirect()->route('admin.localite.index');
        }
                                        
        return redirect(route('admin.home'));
        
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
        if (Auth::guard('admin')->user()->can('logement.update')) 
        {
            $update_com = Commune::find($id);
            $update_com->name = $request->name;
            $update_com->departement_id = $request->departement;
            $update_com->save();
            Flashy::success('Votre departement a ete modifier');
            return redirect()->route('admin.localite.index');
        }
                                            
        return redirect(route('admin.home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->can('logement.delete')) 
        {
            Commune::find($id)->delete();
            Flashy::success('Votre commune a ete Supprimer');
            return back();
        }                                               
        return redirect(route('admin.home'));
    }
}
