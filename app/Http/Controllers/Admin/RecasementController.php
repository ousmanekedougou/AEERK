<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\User\Recasement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageEmailAeerk;
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
            'chambre_id' => 'required|numeric'
        ]);
        $chambre_ancien = Recasement::select('chambre_id')->get();
        foreach($chambre_ancien as $chambres)
        {
            if ($chambres->chambre_id == $request->chambre_id) 
            {
                if($chambre_ancien->count() < $chambres->chambre->nombre){
                    $recaser_ancien = Recasement::where('id',$id)->first();
                    $recaser_ancien->chambre_id = $request->chambre_id;
                    $recaser_ancien->recaser = 1;
                    $recaser_ancien->save();
                    Mail::to($recaser_ancien->email)
                    ->send(new MessageEmailAeerk($recaser_ancien));
                    Toastr::success('Cette etudiant a ete recaser','Recasement Etudiant', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.ancien.index');
                }else{
                    Toastr::success('Cette Chambre est pleine','Status Chambre', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.recasement.create');
                }
            }
            else if ($chambres->chambre_id == 0){
                $chambre_null = Recasement::where('chambre_id',0)->first();
                if ($chambre_null) {
                    $recaser_ancien = Recasement::where('id',$id)->first();
                    $recaser_ancien->chambre_id = $request->chambre_id;
                    $recaser_ancien->recaser = 1;
                    $recaser_ancien->save();
                    Mail::to($recaser_ancien->email)
                    ->send(new MessageEmailAeerk($recaser_ancien));
                    Toastr::success('Cette etudiant a ete recaser','Recasement Etudiant', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.recasement.create');
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
