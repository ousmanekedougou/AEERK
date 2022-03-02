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
use Illuminate\Support\Facades\Storage;
use App\Helpers\Sms;
use App\Model\Admin\Immeuble_chambre;
use App\Model\User\User;
use Brian2694\Toastr\Facades\Toastr;

class NouveauController extends Controller
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
        $immeubles = Immeuble::where('status',1)->first();
        $nouveau_bac = Etudiant::where('codifier', '=', 0)
        ->where('ancienete', '=', 1)->paginate(10);
        $nouveauCount = Etudiant::where('codifier', '=', 0)
        ->where('ancienete', '=', 1)->get();
        $nouveau_sms = Etudiant::where('status', '!=', 0)->where('ancienete', '=', 1)->where('codifier', '=', 0)->get();
        $departement = Departement::all();
        return view('admin.nouveau.index',compact('nouveau_bac','immeubles','nouveau_sms','nouveauCount','departement'));
       
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
        $etudiant  = Etudiant::where('codifier',0)->where('ancienete',1)->where('status','!=',0)->get();
        foreach ($etudiant as $smsEtudiant) {
            // Mail::to($smsEtudiant->email)
            // ->send(new AeerkEmailMessage($smsEtudiant));
            if($request->sms == 1){
                if ($smsEtudiant->status == 1) {
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
                    $phone = $smsEtudiant->phone;
                    $message = "AEERK KEDOUGOU:\nSalut $smsEtudiant->prenom $smsEtudiant->nom, les documents que vous avez deposés pour les codifications ont été accéptées.Nous vous envérrons un méssage pour la date et les modalités des codification \nCordialement le Bureau de l'AEERK";
                    $sendPhone = User::first();
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
                    $phone = $smsEtudiant->phone;
                    // dd($phone);
                    $message = "AEERK KEDOUGOU:\nSalut $smsEtudiant->prenom $smsEtudiant->nom les documents que vous avez deposés pour les codifications ont ete rejetés veuiilez vous repprocher au-pres du bureau plus d'information. \nCordialement le Bureau de l'AEERK";
                    $sendPhone = User::first();
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
            }elseif ($request->sms == 2) {
                  if ($smsEtudiant->status == 1) {
                    // Mail::to($smsEtudiant->email)
                    // ->send(new AeerkEmailMessage($smsEtudiant));
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
                    $phone = $smsEtudiant->phone;
                    $message = "AEERK KEDOUGOU:\nSalut $smsEtudiant->prenom $smsEtudiant->nom.\nNous vous informons que la date des codification est fixe le 10/12/2022 a partire de 8:00.\nNous vous avons envoye un courier mail pour plus de details.\nCordialement le Bureau de l'AEERK";
                    $sendPhone = User::first();
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
        Toastr::success('Votre message a ete envoyer','Envoi Message Sms', ["positionClass" => "toast-top-right"]);
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
        $validator = $this->validate($request , [
            'genre' => 'required|numeric',
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'email' => 'required|string|unique:etudiants',
            'phone' => 'required|string|unique:etudiants',
            'commune' => 'required|string',
        ]);
        // dd($request->all());
        $prix = Solde::select('prix_nouveau')->first();
            // dd('duuiei');
        $immeuble = Immeuble::where(['id' => $request->immeuble , 'status' => 1])->first();
        $chambre = Chambre::where('immeuble_id',$request->immeuble)->where('genre',$request->genre)->where('is_pleine',0)->first();
        if($chambre){
            $nouveau = Etudiant::where('chambre_id',$chambre->id)->get();
            if($nouveau->count() < $chambre->nombre){
                $codifier_nouveau = new Etudiant();
                $codifier_nouveau->genre = $request->genre;
                $codifier_nouveau->prenom = $request->prenom;
                $codifier_nouveau->nom = $request->nom;
                $codifier_nouveau->email = $request->email;
                $codifier_nouveau->phone = $request->phone;
                $codifier_nouveau->commune_id = $request->commune;
                $codifier_nouveau->status = 1;
                $codifier_nouveau->immeuble_id = $immeuble->id;
                $codifier_nouveau->ancienete = 1;
                $codifier_nouveau->chambre_id = $chambre->id;
                $codifier_nouveau->prix = $prix->prix_nouveau;
                $codifier_nouveau->codifier = 1;
                $codifier_nouveau->save();

                $position = Chambre::where('id',$chambre->id)->first();
                $position_nombre = $position->position;
                $position->position = $position_nombre + 1;
                $position->save();

                $count = $codifier_nouveau->codification_count;
                $codifier_nouveau->codification_count = $count + 1;
                $codifier_nouveau->position = $position_nombre + 1;
                $codifier_nouveau->payment_methode = 'En Presentielle';
                $codifier_nouveau->save();

                Mail::to($codifier_nouveau->email)
                ->send(new AeerkEmailMessage($codifier_nouveau));
                Toastr::success('Votre etudiant a bien ete codifier','Codification reussie', ["positionClass" => "toast-top-right"]);
                return back();
            }else{
                $is_pleine = Chambre::where('id',$chambre->id)->first();
                $is_pleine->is_pleine = 1;
                $is_pleine->save();
                $chambre_suivante = Chambre::where('immeuble_id',$request->immeuble)->where('genre',$request->genre)->where('is_pleine',0)->first();
                if($chambre_suivante){
                    $nouveau = Etudiant::where('chambre_id',$chambre_suivante->id)->get();
                    if($nouveau->count() < $chambre_suivante->nombre){
                        $codifier_nouveau = new Etudiant();
                        $codifier_nouveau->genre = $request->genre;
                        $codifier_nouveau->prenom = $request->prenom;
                        $codifier_nouveau->nom = $request->nom;
                        $codifier_nouveau->email = $request->email;
                        $codifier_nouveau->phone = $request->phone;
                        $codifier_nouveau->status = 1;
                        $codifier_nouveau->commune_id = $request->commune;
                        $codifier_nouveau->chambre_id = $chambre_suivante->id;
                        $codifier_nouveau->prix = $prix->prix_nouveau;
                        $codifier_nouveau->codifier = 1;
                        $codifier_nouveau->save();
                        
                        $position = Chambre::where('id',$chambre_suivante->id)->first();
                        $position_nombre = $position->position;
                        $position->position = $position_nombre + 1;
                        $position->save();

                        $count = $codifier_nouveau->codification_count;
                        $codifier_nouveau->codification_count = $count + 1;
                        $codifier_nouveau->position = $position_nombre + 1;
                        $codifier_nouveau->payment_methode = 'En Presentielle';
                        $codifier_nouveau->save();

                        Mail::to($codifier_nouveau->email)
                        ->send(new AeerkEmailMessage($codifier_nouveau));
                        Toastr::success('Votre etudiant a bien ete codifier','Codification reussie', ["positionClass" => "toast-top-right"]);
                        return back();
                    }
                }else {
                    Toastr::error('Il n\'existe plus de chambre pour cette etudiant','Chambre Etudiant', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }
        }else {
            Toastr::error('Il n\'existe plus de chambre pour cette etudiant','Chambre Etudiant', ["positionClass" => "toast-top-right"]);
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
        $immeubles = Immeuble::where('status',1)->first();
        $departement = Departement::all();
        $show_nouveau = Etudiant::find($id);
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
        $immeubles = Immeuble::where('status',1)->first();
        $show_nouveau = Etudiant::find($id);
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
        $update_nouveau = Etudiant::find($id);
        $extraitName = '';
        $imageName = '';
        $photocopieName = '';
        $attestationName = '';
        $imgdel = $update_nouveau->image;
        $extrait = $update_nouveau->extrait;
        $attestation = $update_nouveau->attestation;
        $photocopie = $update_nouveau->photocopie;
        $relever = $update_nouveau->relever;
        $releverName = '';
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Nouveau');
            Storage::delete($imgdel); 
        }else{
            $imageName = $update_nouveau->image;
        }
        if ($request->hasFile('extrait')) {
            $extraitName = $request->extrait->store('public/Nouveau');
            Storage::delete($extrait); 
        }else{
            $extraitName = $update_nouveau->extrait;
        }
        if ($request->hasFile('attestation')) {
            $attestationName = $request->attestation->store('public/Nouveau');
            Storage::delete($attestation);
        }else{
            $attestationName = $update_nouveau->attestation;
        }
        if ($request->hasFile('photocopie')) {
            $photocopieName = $request->photocopie->store('public/Nouveau');
            Storage::delete($photocopie);
        }else{
            $photocopieName = $update_nouveau->photocopie;
        }
        if ($request->hasFile('relever')) {
            $releverName = $request->relever->store('public/Nouveau');
            Storage::delete($relever);
        }else{
            $releverName = $update_nouveau->relever;
        }
        $update_nouveau->image = $imageName;
        $update_nouveau->extrait = $extraitName;
        $update_nouveau->attestation = $attestationName;
        $update_nouveau->photocopie = $photocopieName;
        $update_nouveau->relever = $releverName;
        $update_nouveau->save();
        Toastr::success('Votre etudiant a ete modifier','Modification Etudiant', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function update_nouveau(Request $request, $id)
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
        Toastr::success('Votre etudiant a ete modifier','Modification Etudiant', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function valider_nouveau(Request $request,$id)
    {
        $validator = $this->validate($request,[
            'status' => 'required'
        ]);
        $nouveau = Etudiant::find($id);
        if($request->status == 1){
            $nouveau->status = $request->status;
            $nouveau->save();
            // Mail::to($nouveau->email)
            // ->send(new AeerkEmailMessage($nouveau));
            //Doit se faire par sms
            Toastr::success('Votre etudiant a ete valider','Validation Etudiant', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif($request->status == 2){
            $validator = $this->validate($request,[
                'body' => 'required'
            ]);
            $nouveau->status = $request->status;
            $nouveau->textmail = $request->body;
            $nouveau->save();
            // Mail::to($nouveau->email)
            // ->send(new AeerkEmailMessage($nouveau));
            //Doit se faire par sms
            Toastr::success('Votre etudiant a ete ommis','Ommission Etudiant', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function codifier_nouveau(Request $request, $id)
    {
        $validator = $this->validate($request , [
            'chambre_id' => 'required|string',
        ]);
        $prix = Solde::select('prix_nouveau')->first();
        $genre_nouveau = Etudiant::where('id',$id)->first();
        $nouveau = Etudiant::where('chambre_id',$request->chambre_id)->get();
        $chambre = Chambre::where('id',$request->chambre_id)->where('genre',$genre_nouveau->genre)->where('is_pleine',0)->first();
        if($chambre) {
            if($nouveau->count() < $chambre->nombre){
                $codifier_nouveau = Etudiant::where('id',$id)->first();
                if ($codifier_nouveau->codification_count < 5) {
                    $position = Chambre::where('id',$chambre->id)->first();
                    $position_nombre = $position->position;
                    $position->position = $position_nombre + 1;
                    $position->save();

                    $codifier_nouveau->chambre_id = $chambre->id;
                    $codifier_nouveau->prix = $prix->prix_nouveau;
                    $codifier_nouveau->codifier = 1;
                    $count = $codifier_nouveau->codification_count;
                    $codifier_nouveau->codification_count = $count + 1;
                    $codifier_nouveau->position = $position_nombre + 1;
                    $codifier_nouveau->payment_methode = 'Presentielle';
                    $codifier_nouveau->save();

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
                    // $phone = $codifier_nouveau->phone;
                    // $message = "AEERK KEDOUGOU:\nSalut $codifier_nouveau->prenom $codifier_nouveau->nom.\nVous avez bien ete codifier,veuillez vous connecter sur votre compte gmail pour les details.\nCordialement le Bureau de l'AEERK";
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

                    Mail::to($codifier_nouveau->email)
                    ->send(new AeerkEmailMessage($codifier_nouveau));
                    Toastr::success('Votre etudiant a ete codifier','Codification Etudiant', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.nouveau.index');
                }
                else {
                    Toastr::error('Le quotta de codofication de cette etudiant est epuiser','Quota Etudiant', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.home');
                }
            }else{
                $is_pleine = Chambre::where('id',$chambre->id)->first();
                $is_pleine->is_pleine = 1;
                $is_pleine->save();

                $chambre_suivante = Chambre::where('id',$request->chambre_id)->where('genre',$genre_nouveau->genre)->where('is_pleine',0)->first();
                if($chambre_suivante) {
                    $codifier_nouveau = Etudiant::where('id',$id)->first();
                    if ($codifier_nouveau->codification_count < 5) {
                        $position = Chambre::where('id',$chambre_suivante->id)->first();
                        $position_nombre = $position->position;
                        $position->position = $position_nombre + 1;
                        $position->save();

                        $codifier_nouveau->chambre_id = $chambre_suivante->id;
                        $codifier_nouveau->prix = $prix->prix_nouveau;
                        $codifier_nouveau->codifier = 1;
                        $count = $codifier_nouveau->codification_count;
                        $codifier_nouveau->codification_count = $count + 1;
                        $codifier_nouveau->position = $position_nombre + 1;
                        $codifier_nouveau->payment_methode = 'Presentielle';
                        $codifier_nouveau->save();
                        // Message sms
                        // $config = array(
                        //     'clientId' => config('app.clientId'),
                        //     'clientSecret' =>  config('app.clientSecret'),
                        // );
                        // $osms = new Sms($config);

                        // $data = $osms->getTokenFromConsumerKey();
                        // $token = array(
                        //     'token' => $data['access_token']
                        // );
                        // $phone = $codifier_nouveau->phone;
                        // $message = "AEERK KEDOUGOU:\nSalut $codifier_nouveau->prenom $codifier_nouveau->nom.\nVous avez bien ete codifier,veuillez vous connecter sur votre compte gmail pour les details.\nCordialement le Bureau de l'AEERK";
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

                        Mail::to($codifier_nouveau->email)
                        ->send(new AeerkEmailMessage($codifier_nouveau));
                        Toastr::success('Votre etudiant a ete codifier','Codification Etudiant', ["positionClass" => "toast-top-right"]);
                        return redirect()->route('admin.nouveau.index');
                    }else {
                        Toastr::error('Le quotta de codofication de cette etudiant est epuiser','Quota Etudiant', ["positionClass" => "toast-top-right"]);
                        return back();
                    }
                }else {
                    Toastr::error('Il n\'existe plus de chambre pour cette etudiant','Chambre Etudiant', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }
        }else {
            Toastr::error('Il n\'existe plus de chambre pour cette etudiant','Chambre Etudiant', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

  



       public function migret_nouveau(Request $request)
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
        Toastr::success('La migration des etudiant a ete valider','Migration Etudiant', ["positionClass" => "toast-top-right"]);
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
        Toastr::success('Votre etudiant a ete supprimer','Suppression Etudiant', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
