<?php

namespace App\Http\Controllers\User;
use App\Model\Admin\Solde;
use App\Model\User\Ancien;
use App\Model\User\Nouveau;
use App\Model\Admin\Chambre;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin\Immeuble_chambre;
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
        // dd($request->status);
         $phoneFinale = '';
        $phoneComplet = '221'.$request->phone;
        if (strlen($request->phone) == 12 ) {
            $phoneFinale = $request->phone;
        }elseif (strlen($request->phone) == 9) {
            $phoneFinale = $phoneComplet;
        }
        if($request->status == 1){
            $status = $request->status;
            $nouveau = Etudiant::where(['email' => $request->email,'phone' => $phoneFinale,'codifier' => 0,'ancienete' => 1,'status' => 1,'prix' => 0])->first();
            if($nouveau){
                if ($nouveau->codification_count < 5 ) {
                    $immeubles = Immeuble::where('status',1)->first();
                    return view('user.codification.nouveau',compact('nouveau','immeubles'));
                }else {
                    Flashy::error('Votre quota de codification est epuiser');
                    return back()->with(['error' => 'Votre quota de codification est epuiser']);
                }
            }elseif(!$nouveau){
                Flashy::error('Vous etes deja codifier ou vos information ne correspondent pas');
               return back()->with(['error' => 'Vous etes deja codifier ou vos information ne correspondent pas']);
            }
            

        }else if($request->status == 2){
            $status = $request->status;
            $ancien = Etudiant::where(['email' => $request->email,'phone' => $phoneFinale ,'codifier' => 0,'ancienete' => 2,'status' => 1,'prix' => 0])->first();
            if($ancien){
                if ($ancien->codification_count < 5 ) {
                    $immeubles = Immeuble::where('status',2)->get();
                    return view('user.codification.ancien',compact('ancien','immeubles'));
                }else {
                    Flashy::error('Votre quota de codification est epuiser');
                    return back()->with(['error' => 'Votre quota de codification est epuiser']);
                }
            }elseif(!$ancien){
                Flashy::error('Vous etes deja codifier ou vos information ne correspondent pas');
                return back()->with(['error' => 'Vous etes deja codifier ou vos information ne correspondent pas']);
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


    public function update(Request $request,$id)
    {
        $validator = $this->validate($request , [
            'immeuble' => 'required|string',
        ]);
        // dd('ddjjd');
        $prix = Solde::select('prix_nouveau')->first();
        $immeuble = Immeuble::where(['id' => $request->immeuble , 'status' => 1])->first();
        $chambre_nouveau = Etudiant::all();
            $immeuble_chambre = Immeuble_chambre::select('chambre_id')->where('immeuble_id',$immeuble->id)->get();
            foreach($immeuble_chambre as $imb_chm){
                $chambre_vide = Chambre::where('is_pleine',0)->get();
                foreach($chambre_vide as $chambres){
                    if($chambres->id == $imb_chm->chambre_id && $chambres->genre == $request->genre){
                        $nouveau = Etudiant::where('chambre_id',$imb_chm->chambre_id)->get();
                        if($nouveau->count() < $chambres->nombre){
                            $codifier_nouveau = Etudiant::where('id',$id)->first();
                            if ($codifier_nouveau->codification_count < 5) {
                                $invoice = new CheckoutInvoice();
                                $invoice->addItem("AEERK CODIFICATION", 1, $prix->prix_nouveau, $prix->prix_nouveau, "Codifier en toute securite");
                                $invoice->setTotalAmount($prix->prix_nouveau);
                                $invoice->addCustomData("id", $id);
                                $invoice->addCustomData("chambre_id", $imb_chm->chambre_id);
                                $invoice->addCustomData("chambres", $chambres->id);
                                $invoice->addCustomData("email", $codifier_nouveau->email);
                                $invoice->addCustomData("phone", $codifier_nouveau->phone);
                                $invoice->addCustomData("codifier", $codifier_nouveau->codifier);
                                $invoice->addChannels(['wave-senegal', 'orange-money-senegal']);
                                if($invoice->create()) {
                                    return redirect(url($invoice->getInvoiceUrl()));
                                }else{
                                    dd($invoice->response_text);
                                }
                                // $codifier_nouveau->chambre_id = $imb_chm->chambre_id;
                                // $codifier_nouveau->prix = $prix->prix_nouveau;
                                // $codifier_nouveau->codifier = 1;
                                // $codifier_nouveau->save();
                                // // Nexmo::message()->send([
                                // //     'to' => '221782875971',
                                // //     'from' => '221781956168',
                                // //     'text' => 'AEERK : Salut vous avez ete codifier verifier votre compte gmail'
                                // // ]);

                                // // view()->shared('etudiants',$codifier_nouveau);
                                // // $pdf = PDF::loadView('user.pdf',compact('codifier_nouveau'));
                                // // $file = $pdf->save('public/reglement');
                                // // $codifier_nouveau->update([
                                // //     'reglement' => $file
                                // // ]);

                                // $position = Chambre::where('id',$chambres->id)->first();
                                // $position_nombre = $position->position;
                                // $position->position = $position_nombre + 1;
                                // $position->save();

                                // Mail::to($codifier_nouveau->email)
                                // ->send(new AeerkEmailMessage($codifier_nouveau));
                                // Flashy::success('Vous avez ete codifier');
                                // Auth::logout();
                                // return redirect()->route('index')->with('success','Vous avez bien ete codifier, verifier votre adresse email');
                            }else {
                                Auth::logout();
                                 Flashy::error('Votre quota de codification est epuiser');
                                return redirect()->route('index')->with(['error' => 'Votre quotta de codofication est epuiser']);
                            } 
                        }else{
                            $is_pleine = Chambre::where('id',$imb_chm->chambre_id)->first();
                            $is_pleine->is_pleine = 1;
                            $is_pleine->save();
                            $chambre_suivante = Chambre::where('is_pleine',0)->first();
                            if($chambre_suivante->id == $imb_chm->chambre_id && $chambres->genre == $request->genre){
                                $nouveau = Etudiant::where('chambre_id',$imb_chm->chambre_id)->get();
                                if($nouveau->count() < $chambres->nombre){
                                    $codifier_nouveau = Etudiant::where('id',$id)->first();
                                    if ($codifier_nouveau->codification_count < 5) {
                                        $invoice = new CheckoutInvoice();
                                        $invoice->addItem("AEERK CODIFICATION", 1, $prix->prix_nouveau, $prix->prix_nouveau, "Codifier en toute securite");
                                        $invoice->setTotalAmount($prix->prix_nouveau);
                                        $invoice->addCustomData("id", $id);
                                        $invoice->addCustomData("chambre_id", $imb_chm->chambre_id);
                                        $invoice->addCustomData("chambres", $chambres->id);
                                        $invoice->addCustomData("email", $codifier_nouveau->email);
                                        $invoice->addCustomData("phone", $codifier_nouveau->phone);
                                        $invoice->addCustomData("codifier", $codifier_nouveau->codifier);
                                        $invoice->addChannels(['wave-senegal', 'orange-money-senegal']);


                                        if($invoice->create()) {
                                            return redirect(url($invoice->getInvoiceUrl()));
                                        }else{
                                            dd($invoice->response_text);
                                        }
                                    }else {
                                        Auth::logout();
                                         Flashy::error('Votre quota de codification est epuiser');
                                        return redirect()->route('index')->with(['error' => 'Votre quotta de codofication est epuiser']);
                                    }
                                }
                            }
                        }
                    }
                }
            }
    }




    public function codifier_ancien(Request $request,$id)
    {
        $validator = $this->validate($request , [
            'immeuble' => 'required|string',
        ]);
        $prix = Solde::select('prix_ancien')->first();
        $immeuble = Immeuble::where(['id' => $request->immeuble , 'status' => 2])->first();
        $chambre_ancien = Etudiant::all();
            
        // dd($request->all());
            $immeuble_chambre = Immeuble_chambre::select('chambre_id')->where('immeuble_id',$immeuble->id)->get();
            
            foreach($immeuble_chambre as $imb_chm){
                $chambre_vide = Chambre::where('is_pleine',0)->get();
                foreach($chambre_vide as $chambres){
                    if($chambres->id == $imb_chm->chambre_id && $chambres->genre == $request->genre){
                        $ancien = Etudiant::where('chambre_id',$imb_chm->chambre_id)->get();
                        if($ancien->count() < $chambres->nombre){
                            $codifier_ancien = Etudiant::where('id',$id)->first();
                            if ($codifier_ancien->codification_count < 5) {
                                $invoice = new CheckoutInvoice();
                                $invoice->addItem("AEERK CODIFICATION", 1,$prix->prix_ancien, $prix->prix_ancien, "Codifier en toute securite");
                                $invoice->setTotalAmount($prix->prix_ancien);
                                $invoice->addCustomData("id", $id);
                                $invoice->addCustomData("chambre_id", $imb_chm->chambre_id);
                                $invoice->addCustomData("chambres", $chambres->id);
                                $invoice->addCustomData("email", $codifier_ancien->email);
                                $invoice->addCustomData("phone", $codifier_ancien->phone);
                                $invoice->addCustomData("codifier", $codifier_ancien->codifier);
                                $invoice->addChannels(['wave-senegal', 'orange-money-senegal']);
                                if($invoice->create()) {
                                    return redirect(url($invoice->getInvoiceUrl()));
                                }else{
                                    dd($invoice->response_text);
                                }
                            }else {
                                Auth::logout();
                                 Flashy::error('Votre quota de codification est epuiser');
                                return redirect()->route('index')->with(['error' => 'Votre quotta de codification est epuiser']);
                            }
                        }else{
                            $is_pleine = Chambre::where('id',$imb_chm->chambre_id)->first();
                            $is_pleine->is_pleine = 1;
                            $is_pleine->save();
                            $chambre_suivante = Chambre::where('is_pleine',0)->first();
                            if($chambre_suivante->id == $imb_chm->chambre_id && $chambres->genre == $request->genre){
                                $ancien = Etudiant::where('chambre_id',$imb_chm->chambre_id)->get();
                                if($ancien->count() < $chambres->nombre){
                                    $codifier_ancien = Etudiant::where('id',$id)->first();
                                    if ($codifier_ancien->codification_count < 5) {
                                        $invoice = new CheckoutInvoice();
                                        $invoice->addItem("AEERK CODIFICATION", 1, $prix->prix_ancien, $prix->prix_ancien, "Codifier en toute securite");
                                        $invoice->setTotalAmount($prix->prix_ancien);
                                        $invoice->addCustomData("id", $id);
                                        $invoice->addCustomData("chambre_id", $imb_chm->chambre_id);
                                        $invoice->addCustomData("chambres", $chambres->id);
                                        $invoice->addCustomData("email", $codifier_ancien->email);
                                        $invoice->addCustomData("phone", $codifier_ancien->phone);
                                        $invoice->addCustomData("codifier", $codifier_ancien->codifier);
                                        $invoice->addChannels(['wave-senegal', 'orange-money-senegal']);
                                        if($invoice->create()) {
                                            return redirect(url($invoice->getInvoiceUrl()));
                                        }else{
                                            dd($invoice->response_text);
                                        }
                                    }else {
                                        Auth::logout();
                                         Flashy::error('Votre quota de codification est epuiser');
                                        return redirect()->route('index')->with(['error' => 'Votre quotta de codification est epuiser']);
                                    }
                                }
                            }
                        }
                    }
                }
            }
    }

public function reponse(){
$token = $_GET['token'];

$invoice = new CheckoutInvoice();
if ($invoice->confirm($token)) {

  // Récupérer le statut du paiement
  // Le statut du paiement peut être soit completed, pending, cancelled
//   echo $invoice->getStatus();

  // Vous pouvez récupérer le nom, l'adresse email et le
  // numéro de téléphone du client en utilisant
  // les méthodes suivantes
//   echo $invoice->getCustomerInfo('name');
//   echo $invoice->getCustomerInfo('email');
//   echo $invoice->getCustomerInfo('phone');

  // Les méthodes qui suivent seront disponibles si et
  // seulement si le statut du paiement est égal à "completed".

  // Récupérer l'URL du reçu PDF électronique pour téléchargement
//   echo $invoice->getReceiptUrl();

  // Récupérer n'importe laquelle des données personnalisées que
  // vous avez eu à rajouter précédemment à la facture.
  // Merci de vous assurer à utiliser les mêmes clés que celles utilisées
  // lors de la configuration.
    // echo $invoice->getCustomData("id");
    // echo $invoice->getCustomData("chambre_id");
    // echo $invoice->getCustomData("chambres");
    // echo $invoice->getCustomData("email");
    // echo $invoice->getCustomData("phone");
    // echo $invoice->getCustomData("codifier");

  if ($invoice->getStatus() == "completed") {

    $facture  = $invoice->getReceiptUrl();

    $position = Chambre::where('id',$invoice->getCustomData("chambres"))->first();
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

    $count = $codifier_ancien->codification_count;
    $codifier_ancien->codification_count = $count + 1;
    $codifier_ancien->position = $position_nombre + 1;
    $codifier_ancien->payment_methode = 'En ligne';
    $codifier_ancien->save();

    Mail::to($codifier_ancien->email)
    ->send(new MessageEmailAeerk($codifier_ancien));
    $config = array(
        'clientId' => config('app.clientId'),
        'clientSecret' =>  config('app.clientSecret'),
    );
    $osms = new Sms($config);

    $data = $osms->getTokenFromConsumerKey();
    $token = array(
        'token' => $data['access_token']
    );
    $phone = $codifier_ancien->phone;
    $message = "AEERK KEDOUGOU:\nSalut $codifier_ancien->prenom $codifier_ancien->nom.\nVous avez bien ete codifier,veuillez vous connecter sur votre compte gmail pour les details.\nCordialement le Bureau de l'AEERK";
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
    Flashy::success('Vous avez ete codifier');
    Auth::logout();
    return redirect()->route('index');
  }elseif ($invoice->getStatus() == "cancelled") {
      Flashy::success('Votre codification a echouer');
      return redirect()->route('index')->with(['error' => 'Votre codification a echouer']);
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

    public function createPdf($id,$email,$phone){
         $etudiant = Etudiant::where(['id' => $id ,'email' => $email , 'phone' => $phone , 'codifier' => 1])->first();
         
         $image_etudiant = Storage::url($etudiant->image);
         $imge_s = str_replace("/storage/",'',$image_etudiant);

         $img = 'storage/app/public/'.$imge_s;
         $path_img = base_path($img);
         $type_img = pathinfo($path_img , PATHINFO_EXTENSION);
         $data_img = file_get_contents($path_img);
         $image = "data:image/" .$type_img. ';base64,' . base64_encode($data_img);

         $logo = 'image/accueil.png';
         $path = base_path($logo);
         $type = pathinfo($path , PATHINFO_EXTENSION);
         $data = file_get_contents($path);
         $pic = "data:image/" .$type. ';base64,' . base64_encode($data);

         $output = view('user.pdf',compact('etudiant','image','pic'));
         $dompdf = new Dompdf();
         $dompdf->loadHtml($output);
         $dompdf->setPaper('A4','landscape');
         $dompdf->render();
         $dompdf->stream();
        
    }
}

