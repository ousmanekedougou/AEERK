<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class DepartementController extends Controller
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
        if (Auth::guard('admin')->user()->can('logement.create')) 
        {
        
            return view('admin.departement.add');
        }
                        
        return redirect(route('admin.home'));
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
        if (Auth::guard('admin')->user()->can('logement.create')) 
        {
            $this->validate($request,[
                    'name' => 'required|string'
            ]);
            Departement::create($request->all());
            Flashy::success('Votre departement a ete ajouter');
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
            $update_dep = Departement::find($id);
            $update_dep->name = $request->name;
            $update_dep->save();
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
            Departement::find($id)->delete();
            return back();
        }
                                
        return redirect(route('admin.home'));
    }
}
