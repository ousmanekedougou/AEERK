<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Solde;
use App\Model\Admin\Chambre;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Mail\AeerkEmailMessage;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use App\Model\User\Etudiant;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ValidateDocument;
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
        if (Auth::guard('admin')->user()->can('codifier.index')) 
        {
            $immeubles = Immeuble::where('status',1)->first();
            $nouveau_bac = Etudiant::where('codifier', '=', 0)
            ->where('ancienete', '=', 1)->paginate(10);
            $nouveau_sms = Etudiant::where('status', '!=', 0)->where('ancienete', '=', 1)->get();
            return view('admin.nouveau.index',compact('nouveau_bac','immeubles','nouveau_sms'));
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
        $sendsms  = Etudiant::where('codifier',0)->where('ancienete',1)->where('status','!=',0)->get();
        foreach ($sendsms as $sms) {
            Mail::to($sms->email)
            ->send(new AeerkEmailMessage($sms));
            // la partie des sms
        }
        Flashy::success('Votre message a ete envoyer');
        return back();
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
        if (Auth::guard('admin')->user()->can('codifier.create')) 
        {
            $immeubles = Immeuble::where('status',1)->first();
            $departement = Departement::all();
            $show_nouveau = Etudiant::find($id);
            return view('admin.nouveau.show',compact('show_nouveau','departement','immeubles'));
        }
                                
        return redirect(route('admin.home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('admin')->user()->can('codifier.update')) 
        {
            $immeubles = Immeuble::where('status',1)->first();
            $show_nouveau = Etudiant::find($id);
            return view('admin.nouveau.create',compact('immeubles','show_nouveau'));
        }
                                    
        return redirect(route('admin.home'));
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
        if (Auth::guard('admin')->user()->can('codifier.update')) 
        {
            $validator = $this->validate($request , [
                'extrait' => 'mimes:.pdf,.PDF',
                'attestation' => 'mimes:.pdf,.PDF',
                'relever' => 'mimes:.pdf,.PDF',
                'image' => 'dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
                'photocopie' => 'mimes:.pdf,.PDF',
            ]);
            // dd($request->extrait);
            $update_nouveau = Etudiant::find($id);
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
            $update_nouveau->relever = $releverName;
            $update_nouveau->save();
            Flashy::success('Votre etudaint a ete consulter');
            return back();
        }
                                        
        return redirect(route('admin.home'));
    }

    public function update_nouveau(Request $request, $id)
    {
        if (Auth::guard('admin')->user()->can('codifier.update')) 
        {
            $update_nouveau = Etudiant::find($id);
            $immeuble = Immeuble::where('status',1)->first();
            $update_nouveau->nom = $request->nom;
            $update_nouveau->prenom = $request->prenom;
            $update_nouveau->email = $request->email;
            $update_nouveau->phone = $request->phone;
            $update_nouveau->commune_id = $request->commune;
            $update_nouveau->immeuble_id = $immeuble ->id;
            $update_nouveau->save();
            Flashy::success('Votre etudaint a ete consulter');
            return back();
        }
                                            
        return redirect(route('admin.home'));
    }

    public function valider_nouveau(Request $request,$id)
    {
        if (Auth::guard('admin')->user()->can('codifier.update')) 
        {
            $validator = $this->validate($request,[
                'status' => 'required'
            ]);
            $nouveau = Etudiant::find($id);
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
                                            
        return redirect(route('admin.home'));
     }

    public function codifier_nouveau(Request $request, $id)
    {
        if (Auth::guard('admin')->user()->can('codifier.update')) 
        {
            $validator = $this->validate($request , [
                'chambre_id' => 'required|string',
            ]);
            $prix = Solde::select('prix_nouveau')->first();
            $chambre_nouveau = Etudiant::all();
            foreach($chambre_nouveau as $chambres){
                $nouveau = Etudiant::where('chambre_id',$request->chambre_id)->get();
                if ($chambres->chambre_id == $request->chambre_id) {
                    if($nouveau->count() < $chambres->chambre->nombre){
                        $codifier_nouveau = Etudiant::where('id',$id)->first();
                        if ($codifier_nouveau->codification_count < 5) {
                            $position = Chambre::where('id',$request->chambre_id)->first();
                            $position_nombre = $position->position;
                            $position->position = $position_nombre + 1;
                            $position->save();

                            $codifier_nouveau->chambre_id = $request->chambre_id;
                            $codifier_nouveau->prix = $prix->prix_nouveau;
                            $codifier_nouveau->codifier = 1;
                            $count = $codifier_nouveau->codification_count;
                            $codifier_nouveau->codification_count = $count + 1;
                            $codifier_nouveau->position = $position_nombre + 1;
                            $codifier_nouveau->payment_methode = 'Presentielle';
                            $codifier_nouveau->save();
                            // Message sms
                            

                            Mail::to($codifier_nouveau->email)
                            ->send(new AeerkEmailMessage($codifier_nouveau));
                            Flashy::success('Votre etudiant a ete codifier');
                            return redirect()->route('admin.nouveau.index');
                        }
                        else {
                            Flashy::error('Le quotta de codofication de cette etudiant est epuiser');
                            return redirect()->route('admin.home')->with('error','Le quotta de codofication de cette etudiant est epuiser');
                        }
                    }else{
                        $is_pleine = Chambre::where('id',$request->chambre_id)->first();
                        $is_pleine->is_pleine = 1;
                        $is_pleine->save();
                        Flashy::error('Cette Chambre est pleine');
                        return redirect()->route('admin.nouveau.index');
                    }
                }
                else if ($chambres->chambre_id == 0){
                    $chambre_null = Etudiant::where('chambre_id',0)->first();
                    if ($chambre_null) {
                        $codifier_nouveau = Etudiant::where('id',$id)->first();
                        if ($codifier_nouveau->codification_count < 5) {
                            $position = Chambre::where('id',$request->chambre_id)->first();
                            $position_nombre = $position->position;
                            $position->position = $position_nombre + 1;
                            $position->save();

                            $codifier_nouveau->chambre_id = $request->chambre_id;
                            $codifier_nouveau->prix = $prix->prix_nouveau;
                            $codifier_nouveau->codifier = 1;
                            $count = $codifier_nouveau->codification_count;
                            $codifier_nouveau->codification_count = $count + 1;
                            $codifier_nouveau->position = $position_nombre + 1;
                            $codifier_nouveau->payment_methode = 'Presentielle';
                            $codifier_nouveau->save();
                            // Message sms
                            

                            Mail::to($codifier_nouveau->email)
                            ->send(new AeerkEmailMessage($codifier_nouveau));
                            Flashy::success('Votre etudiant a ete codifier');
                            return redirect()->route('admin.nouveau.index');
                        }else {
                            Flashy::error('Le quotta de codofication de cette etudiant est epuiser');
                            return redirect()->route('admin.home')->with('error','Le quotta de codofication de cette etudiant est epuiser');
                        }
                    }
                    
                }
            }

            
        }
                                                
        return redirect(route('admin.home'));
    }



       public function migret_nouveau(Request $request)
    {
        if (Auth::guard('admin')->user()->can('codifier.create')) 
        {
            $nouveau_bac = Etudiant::where(['status'=>1, 'codifier'=>1, 'ancienete'=>1])->get(); 

            foreach($nouveau_bac as $migration){
                $migration->ancienete = 2;
                $migration->immeuble_id = 0;
                $migration->codifier = 0;
                $migration->status = false;
                $migration->chambre_id = 0;
                $migration->prix = 0;
                $migration->save();
            }
            Flashy::success('La migration a bien reussie');
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
        if (Auth::guard('admin')->user()->can('codifier.delete')) 
        {
            Etudiant::find($id)->delete();
            Flashy::success('Votre Etudiant a ete Supprimer');
            return back();
        }
                                                        
        return redirect(route('admin.home'));
    }
}
