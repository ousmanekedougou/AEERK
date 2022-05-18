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
use App\Model\Admin\Faculty;
use Illuminate\Support\Str;
use App\Model\User\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

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
        $ancien_bac = Etudiant::where('codifier', '=', 0)->where('ancienete', '=', 2)->paginate(10);

        $ancienCount = Etudiant::where('codifier', '=', 0)->where('ancienete', '=', 2)->get();
        $ancien_sms = Etudiant::where('status', '!=', 0)->where('ancienete', '=', 2)->where('codifier', '=', 0)->get();

        $update_immeubles = Immeuble::where('is_pleine',0)->get();

        return view('admin.ancien.index',compact('ancien_bac','immeubles','ancien_sms','ancienCount','update_immeubles'));
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
            if($request->sms == 1){
                if ($smsEtudiant->status == 1) {
                    Mail::to($smsEtudiant->email)
                    ->send(new MessageEmailAeerk($smsEtudiant));
                    //  $config = array(
                    //     'clientId' => config('app.clientId'),
                    //     'clientSecret' =>  config('app.clientSecret'),
                    // );
                    // $osms = new Sms($config);

                    // $data = $osms->getTokenFromConsumerKey();
                    // $token = array(
                    //     'token' => $data['access_token']
                    // );
                    // $phone = intval($smsEtudiant->phone);
                    // $message = "AEERK KEDOUGOU:\nSalut $smsEtudiant->prenom $smsEtudiant->nom,les documents que vous avez deposés pour les codifications ont été accéptées.Nous vous envérrons un méssage pour la date et les modalités des codification \nCordialement le Bureau de l'AEERK";
                    // $response = $osms->sendSms(
                    //     // sender
                    //     'tel:+' . $sendPhone->sendPhone,
                    //     // receiver
                    //     'tel:+' . $phone, 
                    //     // message
                    //     $message,

                    //     'AEERK'
                    // );
                }elseif ($smsEtudiant->status == 2) {
                    Mail::to($smsEtudiant->email)
                    ->send(new MessageEmailAeerk($smsEtudiant));
                    //  $config = array(
                    //     'clientId' => config('app.clientId'),
                    //     'clientSecret' =>  config('app.clientSecret'),
                    // );
                    // $osms = new Sms($config);

                    // $data = $osms->getTokenFromConsumerKey();
                    // // dd($data);
                    // $token = array(
                    //     'token' => $data['access_token']
                    // );
                    // $phone = intval($smsEtudiant->phone);
                    // $message = "AEERK KEDOUGOU:\nSalut $smsEtudiant->prenom $smsEtudiant->nom les documents que vous avez deposés pour les codifications ont été rejetés\n\nMotif du rejet :\n$smsEtudiant->texmail.\nVeuiilez vous repprocher au-pres du bureau plus d'information. \nCordialement le Bureau de l'AEERK";
                        
                    // $response = $osms->sendSms(
                    //     // sender
                    //     'tel:+' . $sendPhone->sendPhone,
                    //     // receiver
                    //     'tel:+221782875971',
                    //     // message
                    //     $message,

                    //     'AEERK'
                    // );
                }
            }elseif ($request->sms == 2) {
                if ($smsEtudiant->status == 1) {
                    Mail::to($smsEtudiant->email)
                    ->send(new MessageEmailAeerk($smsEtudiant));
                    // $config = array(
                    //     'clientId' => config('app.clientId'),
                    //     'clientSecret' =>  config('app.clientSecret'),
                    // );
                    // $osms = new Sms($config);

                    // $data = $osms->getTokenFromConsumerKey();
                    // $token = array(
                    //     'token' => $data['access_token']
                    // );
                    // $phone = $smsEtudiant->phone;
                    // $message = "AEERK KEDOUGOU:\nSalut $smsEtudiant->prenom $smsEtudiant->nom.\nNous vous informons que la date des codification est fixe le 10/12/2022 a partire de 8:00.\nNous vous avons envoye un courier mail pour plus de details.\nCordialement le Bureau de l'AEERK";

                    // $response = $osms->sendSms(
                    //     // sender
                    //     'tel:+' . $sendPhone->sendPhone,
                    //     // receiver
                    //     'tel:+' . $phone,
                    //     // message
                    //     $message,

                    //     'AEERK'
                    // );
                }
            }

            // La partie des sms de orange
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
        $departement = Departement::all();
        $show_ancien = Etudiant::where('id',$id)->first();
        $immeuble = Immeuble::where('status',2)->where('id',$show_ancien->immeuble_id)->first();
        $immeubles = Immeuble::where('status',2)->get();
        $puliques = Faculty::where('for',0)->get();
        $prives = Faculty::where('for',1)->get();
        $update_immeubles = Immeuble::where('is_pleine',0)->get();
        return view('admin.ancien.show',compact('show_ancien','departement','immeuble','immeubles','puliques','prives','update_immeubles'));
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
        $immeuble = Immeuble::where('id',$request->immeuble)->where('status',2)->first();
        $update_ancien->nom = $request->nom;
        $update_ancien->prenom = $request->prenom;
        $update_ancien->email = $request->email;
        $update_ancien->phone = $request->phone;
        $update_ancien->faculty_id = $request->filliere;
        $update_ancien->commune_id = $request->commune;
        $update_ancien->immeuble_id = $immeuble->id;
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
        $prix = Solde::select('prix_ancien')->first();
        $codifier_ancien = Etudiant::where('id',$id)->first();
        $immeuble = Immeuble::where('status',2)->where('id',$codifier_ancien->immeuble_id)->first();
        $chambre = '';
        if ($codifier_ancien->codification_count < 5) {
            $chambre = Chambre::where('immeuble_id',$immeuble->id)->where('genre',$codifier_ancien->genre)->where('is_pleine',0)->where('status',0)->first();
        }else {
            $chambre = Chambre::where('immeuble_id',$immeuble->id)->where('genre',$codifier_ancien->genre)->where('is_pleine',0)->where('status',1)->first();
        }
        if($chambre) {
            $ancien = Etudiant::where('chambre_id',$chambre->id)->where('genre',$codifier_ancien->genre)->get();
            if($ancien->count() < $chambre->nombre){
                $position = Chambre::where('id',$chambre->id)->first();
                $position_nombre = $position->position;
                $position->position = $position_nombre + 1;
                $position->save();

                $codifier_ancien->chambre_id = $chambre->id;
                $codifier_ancien->prix = $prix->prix_ancien;
                $codifier_ancien->codifier = 1;

                $count = '';
                $count_code = $codifier_ancien->codification_count;
                if ($count_code < 5) {
                    $count = $count_code + 1;
                }else {
                    $count = 5;
                }
                
                $codifier_ancien->codification_count = $count;
                $codifier_ancien->position = $position_nombre + 1;
                $codifier_ancien->payment_methode = 'Présentielle';
                $codifier_ancien->codification_token = str_replace('/','',Hash::make(Str::random(40).'ancien'.$codifier_ancien->email));
                $codifier_ancien->save();

                $chambre_ancien_count = Etudiant::where('chambre_id',$chambre->id)->where('genre',$codifier_ancien->genre)->get();
                if ($chambre->nombre == $chambre_ancien_count->count()) {
                    Chambre::where('id',$chambre->id)->update([
                        'is_pleine' => 1
                    ]);
                }

                $chambre_imb_p = Chambre::where('id',$chambre->id)->where('is_pleine',1)->where('terre','>',0)->get();
                if($chambre_imb_p->count() == $immeuble->chambres->count()){
                    
                    Immeuble::where('id',$immeuble->id)->update([
                        'is_pleine' => 1
                    ]);

                    foreach ($chambre_imb_p as $ch_imb_terre) {
                        Chambre::where('id',$ch_imb_terre->id)->where('terre','>',0)->update([
                            'nombre' => $ch_imb_terre->nombre + $ch_imb_terre->terre,
                            'is_pleine' => 0,
                            'terre' => 0
                        ]);
                    }
                }

                 $chambre_imb_p = Chambre::where('id',$chambre->id)->where('is_pleine',1)->where('terre',0)->get();
                 if($chambre_imb_p->count() == $immeuble->chambres->count()){
                    Immeuble::where('id',$immeuble->id)->update([
                        'is_pleine' => 2
                    ]);
                 }

                // // Message sms
                //   $config = array(
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
                // $sendPhone = User::first();
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
                Toastr::success('Votre etudiant a ete codifier','Codification Etudiant', ["positionClass" => "toast-top-right"]);
                return back();
                
            }
        }else {
            Toastr::error('Il n\'existe plus de chambre pour cette etudiant','Chambre Etudiant', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function update_immeuble(Request $request,$id){
        $validator = $this->validate($request,[
            'update_immeble' => 'required|numeric'
        ]);
        Etudiant::where('id',$id)->update([
            'immeuble_id' => $request->update_immeble
        ]);

        Toastr::success('Votre immeuble a ete modifier','Modification Immeuble', ["positionClass" => "toast-top-right"]);
        return back();
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
