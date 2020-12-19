<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Ancien;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Solde;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Model\User\Codification_ancien;
use Illuminate\Support\Facades\Storage;
use App\Mail\MessageAdmin;
use Illuminate\Support\Facades\Mail;

class AncienController extends Controller
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
        $immeubles = Immeuble::where('status',true)->get();
        $ancien_bac = Ancien::where('codifier',0)->paginate(10);
        return view('admin.ancien.index',compact('ancien_bac','immeubles'));
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
        $immeubles = Immeuble::where('status',true)->get();
        $departement = Departement::all();
        $show_ancien = Ancien::find($id);
        return view('admin.ancien.show',compact('show_ancien','departement','immeubles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $immeubles = Immeuble::where('status',true)->get();
        $show_ancien = Ancien::find($id);
        return view('admin.ancien.create',compact('immeubles','show_ancien'));
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
        $update_ancien = Ancien::find($id);
        $extraitBac = '';
        $imageName = '';
        $photocopieName = '';
        $certificatName = '';
        $imgdel = $update_ancien->image;
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Nouveau');
        }else{
            $imageName = $update_ancien->image;
        }
        if ($request->hasFile('bac')) {
            $extraitBac = $request->bac->store('public/Ancien');
        }else{
            $extraitBac = $update_ancien->bac;
        }
        if ($request->hasFile('certificat')) {
            $certificatName = $request->certificat->store('public/Ancien');
        }else{
            $certificatName = $update_ancien->certificat;
        }
        if ($request->hasFile('photocopie')) {
            $photocopieName = $request->photocopie->store('public/Ancien');
        }else{
            $photocopieName = $update_ancien->photocopie;
        }
        $update_ancien->image = $imageName;
        $update_ancien->bac = $extraitBac;
        $update_ancien->certificat = $certificatName;
        $update_ancien->photocopie = $photocopieName;
        $update_ancien->save();
        // Storage::disk('public/Ancien')->delete($imgdel); 
        Flashy::success('Votre etudaint a ete consulter');
        return back();
    }

    public function valider(Request $request,$id){
        
       $validator = $this->validate($request,[
            'status' => 'required'
        ]);
        $validate = Ancien::find($id);
        if($request->status == 1){
            $validate->status = $request->status;
            $validate->save();
            Mail::to(config('aeerk.admin_support_email'))
            ->send(new MessageAdmin($validate));
            Flashy::success('Votre etudiant a ete valide');
            return back();
        }elseif($request->status == 2){
            $validate->status = $request->status;
            $validate->save();
            Mail::to(config('aeerk.admin_support_email'))
            ->send(new MessageAdmin($validate));
            Flashy::error('Votre etudiant a ete ommis');
            return back();
        }
    }

    public function update_ancien(Request $request, $id){
        $update_ancien = Ancien::find($id);
        $immeuble = Immeuble::where('status',true)->first();
        $update_ancien->nom = $request->nom;
        $update_ancien->prenom = $request->prenom;
        $update_ancien->email = $request->email;
        $update_ancien->phone = $request->phone;
        $update_ancien->status = $request->status;
        $update_ancien->commune_id = $request->commune;
        $update_ancien->immeuble_id = $immeuble ->id;
        $update_ancien->save();
        Flashy::success('Votre etudaint a ete consulter');
        return back();
    }
    public function codifier_ancien(Request $request, $id){
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
                    Flashy::success('Votre etudiant a ete codifier');
                    return redirect()->route('admin.ancien.index');
                }else{
                    Flashy::error('Cette Chambre est pleine');
                    return redirect()->route('admin.ancien.index');
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
                    Flashy::success('Votre etudiant a ete codifier');
                    return redirect()->route('admin.ancien.index');
                }
                
            }
        }
        // $codifier_ancien = Ancien::where('id',$id)->first();
        // $codifier_ancien->chambre_id = $request->chambre_id;
        // $codifier_ancien->prix = $request->prix;
        // $codifier_ancien->codifier = 1;
        // $codifier_ancien->save();
        // Flashy::success('Votre etudiant a ete codifier');
        // return redirect()->route('admin.ancien.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ancien::find($id)->delete();
        Flashy::success('Votre Etudiant a ete Supprimer');
        return back();
    }
}
