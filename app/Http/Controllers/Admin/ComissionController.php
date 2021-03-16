<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Poste;
use Illuminate\Http\Request;
use App\Model\Admin\Commission;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
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
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        if (Auth::guard('admin')->user()->can('logement.index')) 
        {
            $add_poste = Poste::all();
            $add_commission = Commission::all();
            return view('admin.comission.index',compact('add_commission','add_poste'));
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
                'name' => 'required'
            ]);
            $add_commission = new Commission;
            $add_commission->name = $request->name;
            $add_commission->save();
            Flashy::success('Votre Commission a ete ajoute');
            return redirect()->route('admin.comission.index');
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
            $this->validate($request,[
                'name' => 'required'
            ]);
            $add_commission = Commission::find($id);
            $add_commission->name = $request->name;
            $add_commission->save();
            Flashy::success('Votre Commission a ete modifier');
            return redirect()->route('admin.comission.index');
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
            Commission::find($id)->delete();
            Flashy::error('Votre commission a ete supprimer');
            return back();
        }
                                        
        return redirect(route('admin.home'));
    }
}
