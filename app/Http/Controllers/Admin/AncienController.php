<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Solde;
use App\Model\Admin\Chambre;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Mail\MessageEmailAeerk;
use App\Model\Admin\Departement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Model\User\Etudiant;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Sms;
use App\Model\User\User;
use Brian2694\Toastr\Facades\Toastr;

class AncienController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin','isCodifier']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $immeubles = Immeuble::where('status',2)->get();
        $ancien_bac = Etudiant::where('codifier', '=', 0)
        ->where('ancienete', '=', 2)->paginate(10);
        $ancienCount = Etudiant::where('codifier', '=', 0)
        ->where('ancienete', '=', 2)->get();
        $ancien_sms = Etudiant::where('status', '!=', 0)->where('ancienete', '=', 2)->where('codifier', '=', 0)->get();
        return view('admin.ancien.index',compact('ancien_bac','immeubles','ancien_sms','ancienCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendSms(Request $request)
    {
        $validator = $this->validate($request , [
            'sms' => 'required|numeric',
        ]);
        $etudiant  = Etudiant::where('codifier',0)->where('ancienete',2)->where('status','!=',0)->get();
         $sendPhone = User::first();
        foreach ($etudiant as $smsEtudiant) {
            // Mail::to($sms->email)
            // ->send(new MessageEmailAeerk($sms));
            if($request->sms == 1){
                if ($smsEtudiant->status == 1) {
                     $config = array(
                        'clientId' => config('app.clientId'),
                        'clientSecret' =>  config('app.clientSecret'),
                    );
                    $osms = new Sms($config);

                    $data = $osms->getTokenFromConsumerKey();
                    $token = array(
                        'token' => $data['access_token']
                    );
                    $phone = intval($smsEtudiant->phone);
                    $message = "AEERK KEDOUGOU:\nSalut $smsEtudiant->prenom $smsEtudiant->nom,les documents que vous avez deposés pour les codifications ont été accéptées.Nous vous envérrons un méssage pour la date et les modalités des codification \nCordialement le Bureau de l'AEERK";
                    $response = $osms->sendSms(
                        // sender
                        'tel:+' . $sendPhone->sendPhone,
                        // receiver
                        'tel:+' . $phone, 
                        // message
                        $message,

                        'AEERK'
                    );
                }elseif ($smsEtudiant->status == 2) {
                     $config = array(
                        'clientId' => config('app.clientId'),
                        'clientSecret' =>  config('app.clientSecret'),
                    );
                    $osms = new Sms($config);

                    $data = $osms->getTokenFromConsumerKey();
                    // dd($data);
                    $token = array(
                        'token' => $data['access_token']
                    );
                    $phone = intval($smsEtudiant->phone);
                    $message = "AEERK KEDOUGOU:\nSalut $smsEtudiant->prenom $smsEtudiant->nom les documents que vous avez deposés pour les codifications ont été rejetés\n\nMotif du rejet :\n$smsEtudiant->texmail.\nVeuiilez vous repprocher au-pres du bureau plus d'information. \nCordialement le Bureau de l'AEERK";
                        
                    $response = $osms->sendSms(
                        // sender
                        'tel:+' . $sendPhone->sendPhone,
                        // receiver
                        'tel:+221782875971',
                        // message
                        $message,

                        'AEERK'
                    );
                }
            }elseif ($request->sms == 2) {
                  if ($smsEtudiant->status == 1) {
                    // Mail::to($smsEtudiant->email)
                    // ->send(new MessageEmailAeerk($smsEtudiant));
                    $config = array(
                        'clientId' => config('app.clientId'),
                        'clientSecret' =>  config('app.clientSecret'),
                    );
                    $osms = new Sms($config);

                    $data = $osms->getTokenFromConsumerKey();
                    $token = array(
                        'token' => $data['access_token']
                    );
                    $phone = $smsEtudiant->phone;
                    $message = "AEERK KEDOUGOU:\nSalut $smsEtudiant->prenom $smsEtudiant->nom.\nNous vous informons que la date des codification est fixe le 10/12/2022 a partire de 8:00.\nNous vous avons envoye un courier mail pour plus de details.\nCordialement le Bureau de l'AEERK";

                    $response = $osms->sendSms(
                        // sender
                        'tel:+' . $sendPhone->sendPhone,
                        // receiver
                        'tel:+' . $phone,
                        // message
                        $message,

                        'AEERK'
                    );
                }
            }

            // La partie des sms
        }
        Toastr::success('Votre message a ete envoyer', 'Envoi Message Sms', ["positionClass" => "toast-top-right"]);
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
        $immeubles = Immeuble::where('status',2)->get();
        $departement = Departement::all();
        $show_ancien = Etudiant::find($id);
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
        $immeubles = Immeuble::where('status',2)->get();
        $show_ancien = Etudiant::find($id);
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
        $update_ancien = Etudiant::find($id);
        $extraitBac = '';
        $imageName = '';
        $photocopieName = '';
        $certificatName = '';
        $imgdel = $update_ancien->image;
        $bac = $update_ancien->bac;
        $certificat = $update_ancien->certificat;
        $photocopie = $update_ancien->photocopie;
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Ancien');
            Storage::delete($imgdel); 
        }else{
            $imageName = $update_ancien->image;
        }
        if ($request->hasFile('bac')) {
            $extraitBac = $request->bac->store('public/Ancien');
            Storage::delete($bac); 
        }else{
            $extraitBac = $update_ancien->bac;
        }
        if ($request->hasFile('certificat')) {
            $certificatName = $request->certificat->store('public/Ancien');
            Storage::delete($certificat); 
        }else{
            $certificatName = $update_ancien->certificat;
        }
        if ($request->hasFile('photocopie')) {
            $photocopieName = $request->photocopie->store('public/Ancien');
            Storage::delete($photocopie);
        }else{
            $photocopieName = $update_ancien->photocopie;
        }
        $update_ancien->image = $imageName;
        $update_ancien->bac = $extraitBac;
        $update_ancien->certificat = $certificatName;
        $update_ancien->photocopie = $photocopieName;
        $update_ancien->save();
        Toastr::success('Votre etudaint a ete modifier', 'Modification Etudiant', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function update_ancien(Request $request, $id)
    {
        $update_ancien = Etudiant::find($id);
        $immeuble = Immeuble::where('status',true)->first();
        $update_ancien->nom = $request->nom;
        $update_ancien->prenom = $request->prenom;
        $update_ancien->email = $request->email;
        $update_ancien->phone = $request->phone;
        $update_ancien->commune_id = $request->commune;
        $update_ancien->immeuble_id = $immeuble ->id;
        $update_ancien->save();
        Toastr::success('Votre etudaint a ete modifier', 'Modification Etudiant', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function valider_ancien(Request $request,$id)
    {
        $validator = $this->validate($request,[
            'status' => 'required'
        ]);
        $ancien = Etudiant::find($id);
        if($request->status == 1){
            $ancien->status = $request->status;
            $ancien->save();
            // Mail::to($ancien->email)
            // ->send(new MessageEmailAeerk($ancien));
            Toastr::success('Votre etudaint a ete valider', 'Verification Etudiant', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif($request->status == 2){
            $validator = $this->validate($request,[
                'body' => 'required'
            ]);
            $ancien->status = $request->status;
            $ancien->textmail = $request->body;
            $ancien->save();
            // Mail::to($ancien->email)
            // ->send(new MessageEmailAeerk($ancien));
            Toastr::success('Votre etudaint a ete ommis', 'Verification Etudiant', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
    
    public function codifier_ancien(Request $request, $id)
    {
        $validator = $this->validate($request , [
            'chambre_id' => 'required|string',
        ]);
        $prix = Solde::select('prix_ancien')->first();
        $chambre_ancien = Etudiant::all();
        $sendPhone = User::first();
        foreach($chambre_ancien as $chambres){
            $ancien = Etudiant::where('chambre_id',$request->chambre_id)->get();
            if ($chambres->chambre_id == $request->chambre_id) {
                if($ancien->count() < $chambres->chambre->nombre){
                    define('CODIFIER2',1);
                    $codifier_ancien = Etudiant::where('id',$id)->first();
                    if ($codifier_ancien->codification_count < 5) {

                        $position = Chambre::where('id',$request->chambre_id)->first();
                        $position_nombre = $position->position;
                        $position->position = $position_nombre + 1;
                        $position->save();

                        $codifier_ancien->chambre_id = $request->chambre_id;
                        $codifier_ancien->prix = $prix->prix_ancien;
                        $codifier_ancien->codifier = CODIFIER2;
                        $count = $codifier_ancien->codification_count;
                        $codifier_ancien->codification_count = $count + 1;
                        $codifier_ancien->position = $position_nombre + 1;
                        $codifier_ancien->payment_methode = 'Presentielle';
                        $codifier_ancien->save();

                        // // Message du sms
                        // $config = array(
                        //     'clientId' => config('app.clientId'),
                        //     'clientSecret' =>  config('app.clientSecret'),
                        // );
                        // $osms = new Sms($config);

                        // $data = $osms->getTokenFromConsumerKey();
                        // $token = array(
                        //     'token' => $data['access_token']
                        // );
                        // $phone = $codifier_ancien->phone;
                        // $message = "AEERK KEDOUGOU:\nSalut $codifier_ancien->prenom $codifier_ancien->nom.\nVous avez bien ete codifier,veuillez vous connecter sur votre compte gmail pour les details.\nCordialement le Bureau de l'AEERK";

                        // $response = $osms->sendSms(
                        //     // sender
                        //     'tel:+' . $sendPhone->sendPhone,
                        //     // receiver
                        //     'tel:+' . $phone,
                        //     // message
                        //     $message,
                        //     'AEERK'
                        // );
                        Mail::to($codifier_ancien->email)
                        ->send(new MessageEmailAeerk($codifier_ancien));
                        Toastr::success('Votre etudaint a ete codifier', 'Codification Etudiant', ["positionClass" => "toast-top-right"]);
                        return redirect()->route('admin.ancien.index');
                    }
                    else{
                        Toastr::error('Le quotta de codofication de cette etudiant est epuiser', 'Quota Etudiant', ["positionClass" => "toast-top-right"]);
                        return redirect()->route('admin.home');
                    }
                }else{
                    $is_pleine = Chambre::where('id',$request->chambre_id)->first();
                    $is_pleine->is_pleine = 1;
                    $is_pleine->save();
                    Toastr::error('Cette Chambre est pleine', 'Chambre Status', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.ancien.index');
                }
            }
            else if ($chambres->chambre_id == !$request->chambre_id){
                $chambre_null = Etudiant::where('chambre_id',!$request->chambre_id)->first();
                if ($chambre_null) {
                    define('CODIFIER1',1);
                    $codifier_ancien = Etudiant::where('id',$id)->first();
                    if ($codifier_ancien->codification_count < 5) {
                        
                        $position = Chambre::where('id',$request->chambre_id)->first();
                        $position_nombre = $position->position;
                        $position->position = $position_nombre + 1;
                        $position->save();

                        $codifier_ancien->chambre_id = $request->chambre_id;
                        $codifier_ancien->prix = $prix->prix_ancien;
                        $codifier_ancien->codifier = CODIFIER1;
                        $count = $codifier_ancien->codification_count;
                        $codifier_ancien->codification_count = $count + 1;
                        $codifier_ancien->position = $position_nombre + 1;
                        $codifier_ancien->payment_methode = 'Presentielle';
                        $codifier_ancien->save();

                        // // Message du sms
                        // $config = array(
                        //     'clientId' => config('app.clientId'),
                        //     'clientSecret' =>  config('app.clientSecret'),
                        // );
                        // $osms = new Sms($config);

                        // $data = $osms->getTokenFromConsumerKey();
                        // $token = array(
                        //     'token' => $data['access_token']
                        // );
                        // $phone = $codifier_ancien->phone;
                        // $message = "AEERK KEDOUGOU:\nSalut $codifier_ancien->prenom $codifier_ancien->nom.\nVous avez bien ete codifier,veuillez vous connecter sur votre compte gmail pour les details.\nCordialement le Bureau de l'AEERK";

                        // $response = $osms->sendSms(
                        //     // sender
                        //     'tel:+' . $sendPhone->sendPhone,
                        //     // receiver
                        //     'tel:+' . $phone,
                        //     // message
                        //     $message,
                        //     'AEERK'
                        // );
                        
                        Mail::to($codifier_ancien->email)
                        ->send(new MessageEmailAeerk($codifier_ancien));
                        Toastr::success('Votre etudiant a ete codifier', 'Codification Etudiant', ["positionClass" => "toast-top-right"]);
                        return redirect()->route('admin.ancien.index');
                    }else {
                        Toastr::error('Le quotta de codofication de cette etudiant est epuiser', 'Quota Etudiant', ["positionClass" => "toast-top-right"]);
                        return redirect()->route('admin.home');
                    }
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
        $dlete_etudiant = Etudiant::find($id);
        $imgdel = $dlete_etudiant->image;
        $bac = $dlete_etudiant->bac;
        $certificat = $dlete_etudiant->certificat;
        $photocopie = $dlete_etudiant->photocopie;
        Storage::delete($imgdel); 
        Storage::delete($bac); 
        Storage::delete($certificat); 
        Storage::delete($photocopie); 
        $dlete_etudiant->delete();
        Toastr::success('Votre Etudiant a ete Supprimer', 'Suppression Etudiant', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
