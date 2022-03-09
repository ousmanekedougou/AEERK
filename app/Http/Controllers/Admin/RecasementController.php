<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\User\Recasement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecasementEmail;
use App\Model\Admin\Chambre;
use Brian2694\Toastr\Facades\Toastr;

class RecasementController extends Controller
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
        $immeubles = Immeuble::all();
        $nouveau_bac = Recasement::where('status', '=', 0)->where('recaser','=',0)->paginate(10);
        return view('admin.recasement.index',compact('nouveau_bac','immeubles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $immeubles = Immeuble::all();
        $recaser = Recasement::where('recaser','=',1)->paginate(10);
        return view('admin.recasement.recaser',compact('recaser','immeubles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $immeubles = Immeuble::all();
        $show_nouveau = Recasement::find($id);
        return view('admin.recasement.create',compact('show_nouveau','immeubles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $immeuble = Immeuble::where('id',$id)->first();
        $recaser = Recasement::where('immeuble_id',$immeuble->id)->where('recaser','=',1)->paginate(10);
        return view('admin.recasement.recaser',compact('recaser','immeuble'));
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
        $validator = $this->validate($request,[
            'immeuble' => 'required|numeric'
        ]);
        // dd($request->all());
        $recaser_ancien = Recasement::where('id',$id)->first();
        $chambre = Chambre::where('immeuble_id',$request->immeuble)->where('genre',$recaser_ancien->genre)->where('is_pleine',0)->first();
            if ($chambre) 
            {
                $chambre_ancien = Recasement::where('chambre_id',$chambre->id)->get();
                if($chambre_ancien->count() < $chambre->nombre){

                    $position = Chambre::where('id',$chambre->id)->first();
                    $position_nombre = $position->position;
                    $position->position = $position_nombre + 1;
                    $position->save();

                    $recaser_ancien->chambre_id = $chambre->id;
                    $recaser_ancien->immeuble_id = $chambre->immeuble->id;
                    $recaser_ancien->recaser = 1;
                    $recaser_ancien->position = $position_nombre + 1;
                    $recaser_ancien->save();
                    // if ($chambre->nombre == $position->position) {
                    //     Chambre::where('id',$chambre->id)->update([
                    //     'is_pleine' => 1
                    //     ]);
                    // }
                    Mail::to($recaser_ancien->email)
                    ->send(new RecasementEmail($recaser_ancien));
                    Toastr::success('Cette etudiant a ete recaser','Recasement Etudiant', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.recasement.edit',$recaser_ancien->immeuble_id);
                }else{
                    Chambre::where('id',$chambre->id)->update([
                        'is_pleine' => 1
                    ]);
                    $chambre_libre = Chambre::where('immeuble_id',$request->immeuble)->where('genre',$recaser_ancien->genre)->where('is_pleine',0)->first();
                    if ($chambre_libre) {

                        $position = Chambre::where('id',$chambre_libre->id)->first();
                        $position_nombre = $position->position;
                        $position->position = $position_nombre + 1;
                        $position->save();

                        $recaser_ancien->chambre_id = $chambre->id;
                        $recaser_ancien->immeuble_id = $chambre->immeuble->id;
                        $recaser_ancien->recaser = 1;
                        $recaser_ancien->position = $position_nombre + 1;
                        $recaser_ancien->save();

                        Mail::to($recaser_ancien->email)
                        ->send(new RecasementEmail($recaser_ancien));
                        Toastr::success('Cette etudiant a ete recaser','Recasement Etudiant', ["positionClass" => "toast-top-right"]);
                        return redirect()->route('admin.recasement.edit',$recaser_ancien->immeuble_id);
                    }
                        Toastr::success('Cette Chambre est pleine','Status Chambre', ["positionClass" => "toast-top-right"]);
                        return back();
                    }
            }
            else{
                Toastr::error('Les chambres enregistre sont pleines','Chambre Etudiant', ["positionClass" => "toast-top-right"]);
                return back();
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
