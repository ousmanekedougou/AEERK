<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Nouveau;
use App\Model\Admin\Solde;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Model\User\Codification_nouveau;
use App\Mail\AeerkEmailMessage;
use Illuminate\Support\Facades\Mail;

class NouveauController extends Controller
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
        $immeubles = Immeuble::where('status',false)->first();
        $nouveau_bac = Nouveau::where('codifier',0)->paginate(10);
        return view('admin.nouveau.index',compact('nouveau_bac','immeubles'));
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
        $immeubles = Immeuble::where('status',false)->first();
        $departement = Departement::all();
        $show_nouveau = Nouveau::find($id);
        return view('admin.nouveau.show',compact('show_nouveau','departement','immeubles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $immeubles = Immeuble::where('status',false)->first();
        $show_nouveau = Nouveau::find($id);
        return view('admin.nouveau.create',compact('immeubles','show_nouveau'));
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
            'extrait' => 'mimes:.pdf,.PDF',
            'attestation' => 'mimes:.pdf,.PDF',
            'relever' => 'mimes:.pdf,.PDF',
            'image' => 'dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'photocopie' => 'mimes:.pdf,.PDF',
        ]);
        // dd($request->extrait);
        $update_nouveau = Nouveau::find($id);
        $extraitName = '';
        $imageName = '';
        $photocopieName = '';
        $attestationName = '';
        $releverName = '';
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Nouveau');
        }else{
            $imageName = $update_nouveau->image;
        }
        if ($request->hasFile('extrait')) {
            $extraitName = $request->extrait->store('public/Nouveau');
        }else{
            $extraitName = $update_nouveau->extrait;
        }
        if ($request->hasFile('attestation')) {
            $attestationName = $request->attestation->store('public/Nouveau');
        }else{
            $attestationName = $update_nouveau->attestation;
        }
        if ($request->hasFile('photocopie')) {
            $photocopieName = $request->photocopie->store('public/Nouveau');
        }else{
            $photocopieName = $update_nouveau->photocopie;
        }
        if ($request->hasFile('relever')) {
            $releverName = $request->relever->store('public/Nouveau');
        }else{
            $releverName = $update_nouveau->relever;
        }
        $update_nouveau->image = $imageName;
        $update_nouveau->extrait = $extraitName;
        $update_nouveau->attestation = $attestationName;
        $update_nouveau->photocopie = $photocopieName;
        $update_nouveau->save();
        Flashy::success('Votre etudaint a ete consulter');
        return back();
    }

    public function update_nouveau(Request $request, $id){
        $update_nouveau = Nouveau::find($id);
        $immeuble = Immeuble::where('status',false)->first();
        $update_nouveau->nom = $request->nom;
        $update_nouveau->prenom = $request->prenom;
        $update_nouveau->email = $request->email;
        $update_nouveau->phone = $request->phone;
        $update_nouveau->status = $request->status;
        $update_nouveau->commune_id = $request->commune;
        $update_nouveau->immeuble_id = $immeuble ->id;
        $update_nouveau->save();
        Flashy::success('Votre etudaint a ete consulter');
        return back();
    }

    public function valider_nouveau(Request $request,$id){
        
        $validator = $this->validate($request,[
             'status' => 'required'
         ]);
         $nouveau = Nouveau::find($id);
         if($request->status == 1){
             $nouveau->status = $request->status;
             $nouveau->save();
             Mail::to($nouveau->email)
             ->send(new AeerkEmailMessage($nouveau));
             Flashy::success('Votre etudiant a ete valide');
             return back();
         }elseif($request->status == 2){
             $nouveau->status = $request->status;
             $nouveau->save();
             Mail::to($nouveau->email)
             ->send(new AeerkEmailMessage($nouveau));
             Flashy::error('Votre etudiant a ete ommis');
             return back();
         }
     }

    public function codifier_nouveau(Request $request, $id){
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
                    Flashy::success('Votre etudiant a ete codifier');
                    return redirect()->route('admin.nouveau.index');
                }else{
                    Flashy::error('Cette Chambre est pleine');
                    return redirect()->route('admin.nouveau.index');
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
                    Flashy::success('Votre etudiant a ete codifier');
                    return redirect()->route('admin.nouveau.index');
                }
                
            }
        }
        // $codifier_nouveau = Nouveau::where('id',$id)->first();
        // $codifier_nouveau->chambre_id = $request->chambre_id;
        // $codifier_nouveau->prix = $request->prix;
        // $codifier_nouveau->codifier = 1;
        // $codifier_nouveau->save();
        // Flashy::success('Votre etudiant a ete codifier');
        // return redirect()->route('admin.nouveau.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nouveau::find($id)->delete();
        Flashy::success('Votre Etudiant a ete Supprimer');
        return back();
    }
}
