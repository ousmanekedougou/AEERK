<?php

namespace App\Http\Controllers\User;
use App\Model\Admin\Solde;
use App\Model\Admin\Chambre;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\MessageEmailAeerk;
use App\Mail\AeerkEmailMessage;
use App\Model\User\Etudiant;
use App\Model\User\User;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Paydunya\Checkout\CheckoutInvoice;
use App\Helpers\Sms;
use App\Model\Admin\Info;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class EtudiantCodificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('createPdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_lien_codification = User::first();
        if($active_lien_codification->lien == 1){
            $nouveau = 1;
            $ancien = 2;
            return view('user.codification.index',compact('nouveau','ancien'));
        }else {
            Toastr::error('Cette page n\'est pas disponible', 'Indisponible', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
        }
            
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
            'phone' => 'required|numeric',
            'status' => 'required|numeric'
        ]);
         $phoneFinale = '';
        $phoneComplet = '221'.$request->phone;
        if (strlen($request->phone) == 12 ) {
            $phoneFinale = $request->phone;
        }elseif (strlen($request->phone) == 9) {
            $phoneFinale = $phoneComplet;
        }
        // dd($phoneFinale);
        if($request->status == 1){
            $status = $request->status;
            $nouveau = Etudiant::where(['email' => $request->email,'phone' => $phoneFinale,'codifier' => 0,'ancienete' => 1,'status' => 1,'prix' => 0])->first();
            if($nouveau){
                if ($nouveau->codification_count < 6 ) {
                    $immeubles = Immeuble::where('status',1)->first();
                    return view('user.codification.nouveau',compact('nouveau','immeubles'));
                }else {
                    Toastr::error('Votre quota de codification est epuiser', 'Quota Epuiser', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }elseif(!$nouveau){
                Toastr::error('Vous etes deja codifier ou vos information ne correspondent pas', 'Error Information', ["positionClass" => "toast-top-right"]);
                return back();
            }
            

        }else if($request->status == 2){
            $status = $request->status;
            $ancien = Etudiant::where(['email' => $request->email,'phone' => $phoneFinale ,'codifier' => 0,'ancienete' => 2,'status' => 1,'prix' => 0])->first();
            if($ancien){
                if ($ancien->codification_count < 6 ) {
                    $immeubles = Immeuble::where('status',2)->where('id',$ancien->immeuble_id)->first();
                    if ($immeubles) {
                        return view('user.codification.ancien',compact('ancien','immeubles'));
                    }else {
                        Toastr::error('Vous n\'aviez pas choisi cet immeuble', 'Error de choix', ["positionClass" => "toast-top-right"]);
                        return back();
                    }
                }else {
                    Toastr::error('Votre quota de codification est epuiser', 'Quota Epuiser', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }elseif(!$ancien){
                Toastr::error('Vous etes deja codifier ou vos information ne correspondent pas', 'Error Information', ["positionClass" => "toast-top-right"]);
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


    // Pour la codification des nouveaux
    public function update(Request $request,$id)
    {
      
        $prix = Solde::select('prix_nouveau')->first();
        $codifier_nouveau = Etudiant::where('id',$id)->first();
        $immeuble = Immeuble::where('status',1)->first();
        $chambre = Chambre::where('immeuble_id',$immeuble->id)->where('genre',$codifier_nouveau->genre)->where('is_pleine',0)->first();
        if($chambre){
            $nouveau = Etudiant::where('chambre_id',$chambre->id)->where('genre',$codifier_nouveau->genre)->get();
            if($nouveau->count() < $chambre->nombre){
                if ($codifier_nouveau->codification_count < 6) {
                    $invoice = new CheckoutInvoice();
                    $invoice->addItem("AEERK CODIFICATION", 1,$prix->prix_nouveau, $prix->prix_nouveau, "Codifier en toute securite");
                    $invoice->setTotalAmount($prix->prix_nouveau);
                    $invoice->addCustomData("id", $id);
                    $invoice->addCustomData("chambre_id", $chambre->id);
                    $invoice->addCustomData("email", $codifier_nouveau->email);
                    $invoice->addCustomData("phone", $codifier_nouveau->phone);
                    $invoice->addCustomData("codifier", $codifier_nouveau->codifier);
                    $invoice->addChannels(['wave-senegal']);

                    $chambre_ancien_count = Etudiant::where('chambre_id',$chambre->id)->where('genre',$codifier_nouveau->genre)->get();
                    if ($chambre->nombre == $chambre_ancien_count->count()) {
                        Chambre::where('id',$chambre->id)->update([
                            'is_pleine' => 1
                        ]);
                    }

                    if($invoice->create()) {
                        return redirect(url($invoice->getInvoiceUrl()));
                    }else{
                        dd($invoice->response_text);
                    }

                   
                }else {
                    Auth::logout();
                    Toastr::error('Votre quota de codification est epuiser', 'Quota Epuiser', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('index');
                }
            }
        }else {
            Auth::logout();
            Toastr::error('Pas de chambre disponible pour cet immeuble','Error Chambre', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
        }
    }




    public function codifier_ancien(Request $request,$id)
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
        if($chambre){
            $ancien = Etudiant::where('chambre_id',$chambre->id)->where('genre',$codifier_ancien->genre)->get();
            if($ancien->count() < $chambre->nombre){
                $invoice = new CheckoutInvoice();
                $invoice->addItem("AEERK CODIFICATION", 1,$prix->prix_ancien, $prix->prix_ancien, "Codifier en toute securite");
                $invoice->setTotalAmount($prix->prix_ancien);
                $invoice->addCustomData("id", $id);
                $invoice->addCustomData("chambre_id", $chambre->id);
                $invoice->addCustomData("email", $codifier_ancien->email);
                $invoice->addCustomData("phone", $codifier_ancien->phone);
                $invoice->addCustomData("codifier", $codifier_ancien->codifier);
                $invoice->addChannels(['wave-senegal']);

                $chambre_ancien_count = Etudiant::where('chambre_id',$chambre->id)->where('genre',$codifier_ancien->genre)->get();
                if ($chambre->nombre == $chambre_ancien_count->count()) {
                    Chambre::where('id',$chambre->id)->update([
                    'is_pleine' => 1
                    ]);
                }

                if($invoice->create()) {
                    return redirect(url($invoice->getInvoiceUrl()));
                }else{
                    dd($invoice->response_text);
                }
            }
        }else {
            Auth::logout();
            Toastr::error('Pas de chambre disponible pour cet immeuble','Error Chambre', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
        }
    }

public function reponse(){
$token = $_GET['token'];

$invoice = new CheckoutInvoice();
if ($invoice->confirm($token)) {

  if ($invoice->getStatus() == "completed") {

    $facture  = $invoice->getReceiptUrl();

    $position = Chambre::where('id',$invoice->getCustomData("chambre_id"))->first();
    $position_nombre = $position->position;
    $position->position = $position_nombre + 1;
    $position->save();

    $codifier_ancien = Etudiant::where('id',$invoice->getCustomData("id"))
        ->where('email',$invoice->getCustomData("email"))
        ->where('phone',$invoice->getCustomData("phone"))
        ->where('codifier',$invoice->getCustomData("codifier"))
        ->first();
    $codifier_ancien->chambre_id = $invoice->getCustomData("chambre_id");
    $codifier_ancien->prix = $invoice->getTotalAmount();
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
    $codifier_ancien->payment_methode = 'En ligne';
    $codifier_ancien->codification_token = str_replace('/','',Hash::make(Str::random(40).'etudiant'.$codifier_ancien->email));
    $codifier_ancien->save();

    //le debut du code ajouter
    $chambre_is_pleine = Chambre::where('id',$invoice->getCustomData("chambre_id"))->where('is_pleine',0)->first();

    $chambre_ancien_count = Etudiant::where('chambre_id',$invoice->getCustomData("chambre_id"))
    ->where('genre',$codifier_ancien->genre)->get();
    
    if ($chambre_is_pleine->nombre == $chambre_ancien_count->count()) {
        Chambre::where('id',$chambre_is_pleine->id)->update([
            'is_pleine' => 1
        ]);
    }
    
    $chambre_imb_p = Chambre::where('id',$invoice->getCustomData("chambre_id"))->where('is_pleine',1)->get();
    $immeuble = Immeuble::where('id',$codifier_ancien->immeuble_id)->first();
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

    $chambre_imb_p = Chambre::where('id',$invoice->getCustomData("chambre_id"))->where('is_pleine',1)->where('terre',0)->get();
    if($chambre_imb_p->count() == $immeuble->chambres->count()){
        Immeuble::where('id',$immeuble->id)->update([
            'is_pleine' => 2
        ]);
    }
    // la fin du code ajouter

    // Mail::to($codifier_ancien->email)
    // ->send(new MessageEmailAeerk($codifier_ancien));
    Auth::logout();
    Toastr::success('Vous avez bien ete codifier','Codification reussie', ["positionClass" => "toast-top-right"]);
    return redirect()->route('index')->with([
        'codifier' => 'codifier',
        'name' => "$codifier_ancien->prenom $codifier_ancien->nom",
        'immeuble' => $codifier_ancien->immeuble->name,
        'chambre' => $codifier_ancien->chambre->nom,
        'position' => $codifier_ancien->position,
        'id' => $codifier_ancien->id,
        'codification_token' => $codifier_ancien->codification_token,
        
    ]);
    }elseif ($invoice->getStatus() == "cancelled") {
        Auth::logout();
        Toastr::error('Votre codification a echouer','Error Codification', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index');
    }

    }else{
        echo $invoice->getStatus();
        echo $invoice->response_text;
        echo $invoice->response_code;
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

    public function createPdf($id,$codification_token){
        $etudiant = Etudiant::where(['id' => $id ,'codification_token' => $codification_token, 'codifier' => 1, 'status' => 1])->first();
        if ($etudiant) {
        $image = Storage::url($etudiant->image);
        $pic = 'image/accueil.png';
        $info = Info::first();
        return view('user.pdf',compact('etudiant','image','pic','info'));
        }else {
            Toastr::error('Votre recue est indisponible', 'Error Recue', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
        }
        
    }
}

