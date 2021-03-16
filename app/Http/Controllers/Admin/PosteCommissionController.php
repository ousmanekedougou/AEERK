<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Poste;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class PosteCommissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $add_poste = Poste::all();
        // return view('admin.posteCommission.index',compact('add_poste'));
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
                'name' => 'required',
                'commission' => 'required',
            ]);
            $add_poste = new Poste;
            $add_poste->name = $request->name;
            $add_poste->save();
            $add_poste->commissions()->sync($request->commission);
            Flashy::success('Votre poste a ete ajoute');
            return back();
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
                'name' => 'required',
                'commission' => 'required',
            ]);
            $update_poste = Poste::find($id);
            $update_poste->name = $request->name;
            $update_poste->save();
            $update_poste->commissions()->sync($request->commission);
            Flashy::success('Votre poste a ete modifier');
            return back();
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
            Poste::find($id)->delete();
            Flashy::error('Votre poste a ete supprimer');
            return back();
        }
                                            
        return redirect(route('admin.home'));
    }
}
