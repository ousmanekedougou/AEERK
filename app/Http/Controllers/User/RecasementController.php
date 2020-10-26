<?php

namespace App\Http\Controllers\User;

use App\Model\Admin\Ancien;
use App\Model\Admin\Nouveau;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class RecasementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $immeuble = Immeuble::all();
        return view('user.recasement.index',compact('immeuble'));
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
            'status' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'immeuble' => 'required|numeric',
        ]);
        if ($request->status == 1) {
            $nouveaux = Nouveau::where(['email'=>$request->email,'phone'=>$request->phone,'codifier'=>1])->first();
                  
            $nouveaux->recasement = 1;
            $nouveaux->immeuble_rec = $request->immeuble;
            $nouveaux->save();
            Flashy::success('Votre Inscription a ete valider');
            return back();
                
            
        }elseif ($request->status == 2) {
            $anciens = Ancien::where(['email'=>$request->email,'phone'=>$request->phone,'codifier'=>1])->first();
                  
            $anciens->recasement = 1;
            $anciens->immeuble_rec = $request->immeuble;
            $anciens->save();
            Flashy::success('Votre Inscription a ete valider');
            return back();
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
