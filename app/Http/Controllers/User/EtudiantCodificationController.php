<?php

namespace App\Http\Controllers\User;
use App\Model\User\Ancien;
use App\Model\User\Nouveau;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Solde;
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
                $immeubles = Immeuble::where('status',false)->first();
                return view('user.codification.nouveau',compact('nouveau','immeubles'));
            }else{
                Flashy::error('Vous n\'est pas en mesure de codifier');
                return back();
            }

        }else if($request->status == 2){
            $status = $request->status;
            // dd($request->status);
            $ancien = Ancien::where(['email' => $request->email,'phone' => $request->phone ,'codifier' => 0,'status' => 1,'prix' => 0])->first();
            if($ancien){
                $immeubles = Immeuble::where('status',true)->get();
                return view('user.codification.ancien',compact('ancien','immeubles'));
            }else{
                Flashy::error('Vous n\'est pas en mesure de codifier');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
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
        $validator = $this->validate($request , [
            'chambre_id' => 'required|string',
        ]);
        $prix = Solde::select('prix_nouveau')->first();
        $chambre_nouveau = Nouveau::select('chambre_id')->get();
        foreach($chambre_nouveau as $chambres){
            if ($chambres->chambre_id == $request->chambre_id) {
                if($chambre_nouveau->count() < $chambres->chambre->nombre){
                    $codifier_nouveau = Nouveau::where('id',$id)->first();
                    $codifier_nouveau->chambre_id = $request->chambre_id;
                    $codifier_nouveau->prix = $prix->prix_nouveau;
                    $codifier_nouveau->codifier = 1;
                    $codifier_nouveau->save();
                    Flashy::success('Vous avez ete codifier');
                    return redirect()->route('index');
                }else{
                    Flashy::error('Cette Chambre est pleine');
                    return back();
                }
            }
            else if ($chambres->chambre_id == 0){
                $chambre_null = Nouveau::where('chambre_id',0)->first();
                if ($chambre_null) {
                    $codifier_nouveau = Nouveau::where('id',$id)->first();
                    $codifier_nouveau->chambre_id = $request->chambre_id;
                    $codifier_nouveau->prix = $prix->prix_nouveau;
                    $codifier_nouveau->codifier = 1;
                    $codifier_nouveau->save();
                    Flashy::success('Vous avez ete codifier');
                    return redirect()->route('index');
                }
                
            }
        }
    }

    public function codifier_ancien(Request $request,$id)
    {
        $validator = $this->validate($request , [
            'chambre_id' => 'required|string',
        ]);
        // dd($request->chambre_id);
        $prix = Solde::select('prix_ancien')->first();
        $chambre_ancien = Ancien::select('chambre_id')->get();
        foreach($chambre_ancien as $chambres){
            if ($chambres->chambre_id == $request->chambre_id) {
                if($chambre_ancien->count() < $chambres->chambre->nombre){
                    $codifier_ancien = Ancien::where('id',$id)->first();
                    $codifier_ancien->chambre_id = $request->chambre_id;
                    $codifier_ancien->prix = $prix->prix_ancien;
                    $codifier_ancien->codifier = 1;
                    $codifier_ancien->save();
                    Flashy::success('Vous avez ete codifier');
                    return redirect()->route('index');
                }else{
                    Flashy::error('Cette Chambre est pleine');
                    return redirect()->route('index');
                }
            }
            else if ($chambres->chambre_id == 0){
                $chambre_null = Ancien::where('chambre_id',0)->first();
                if ($chambre_null) {
                    $codifier_ancien = Ancien::where('id',$id)->first();
                    $codifier_ancien->chambre_id = $request->chambre_id;
                    $codifier_ancien->prix = $prix->prix_ancien;
                    $codifier_ancien->codifier = 1;
                    $codifier_ancien->save();
                    Flashy::success('Vous avez ete codifier');
                    return redirect()->route('index');
                }
                
            }
        }
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
