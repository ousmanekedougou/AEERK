<?php

namespace App\Http\Controllers\User;
use App\Model\User\Ancien;
use App\Model\User\Nouveau;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudiantCodificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nouveau = 1;
        $ancien = 2;
        return view('user.codification.index',compact('nouveau','ancien'));
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
        $validatore = $this->validate($request,[
            'email' => 'required',
            'phone' => 'required',
            'status' => 'required'
        ]);
// dd($request->status);
        if($request->status == 1){
            $status = $request->status;
            $nouveau = Nouveau::where(['email' => $request->email,'phone' => $request->phone,'codifier' => 0,'status' => 1,'prix' => 0])->first();
            if($nouveau){
                return 'yes';
                // return view('user.codification.show',compact('nouveau'));
            }else{
                return back();
                Flashy::error('Vous n\'est pas en mesure de codifier');
            }

        }else if($request->status == 2){
            $status = $request->status;
            // dd($request->status);
            $ancien = Ancien::where(['email' => $request->email,'phone' => $request->phone ,'codifier' => 0,'status' => 1,'prix' => 0])->first();
            if($ancien){
                return view('user.codification.show',compact('ancien'));
            }else{
                return back();
                Flashy::error('Vous n\'est pas en mesure de codifier');
            }
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
