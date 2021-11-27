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
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use Dompdf\Dompdf;
use Illuminate\Support\Str;
use Paydunya\Checkout\CheckoutInvoice;

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
        $nouveau = 1;
        $ancien = 2;
        return view('user.codification.index',compact('nouveau','ancien'));
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
        if($request->status == 1){
            $status = $request->status;
            $nouveau = Etudiant::where(['email' => $request->email,'phone' => $request->phone,'codifier' => 0,'ancienete' => 1,'status' => 1,'prix' => 0])->first();
            if($nouveau){
                $immeubles = Immeuble::where('status',1)->first();
                return view('user.codification.nouveau',compact('nouveau','immeubles'));
            }elseif(!$nouveau){
                Flashy::error('Vous etes deja codifier ou vos information ne correspondent pas !');
                return back();
            }
            

        }else if($request->status == 2){
            $status = $request->status;
            $ancien = Etudiant::where(['email' => $request->email,'phone' => $request->phone ,'codifier' => 0,'ancienete' => 2,'status' => 1,'prix' => 0])->first();
            // dd($ancien);
            if($ancien){
                $immeubles = Immeuble::where('status',2)->get();
                return view('user.codification.ancien',compact('ancien','immeubles'));
            }elseif(!$ancien){
                
                Flashy::error('Vous etes deja codifier ou vos information ne correspondent pas !');
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
                                $invoice = new CheckoutInvoice();
                                $invoice->addItem("AEERK CODIFICATION", 1, 1, $prix->prix_nouveau, "Codifier en toute securite");
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
                        }else{
                            $is_pleine = Chambre::where('id',$imb_chm->chambre_id)->first();
                            $is_pleine->is_pleine = 1;
                            $is_pleine->save();
                            $chambre_suivante = Chambre::where('is_pleine',0)->first();
                            if($chambre_suivante->id == $imb_chm->chambre_id && $chambres->genre == $request->genre){
                                $nouveau = Etudiant::where('chambre_id',$imb_chm->chambre_id)->get();
                                if($nouveau->count() < $chambres->nombre){
                                        $codifier_nouveau = Etudiant::where('id',$id)->first();
                                        $invoice = new CheckoutInvoice();
                                        $invoice->addItem("AEERK CODIFICATION", 1, 1, $prix->prix_nouveau, "Codifier en toute securite");
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
                                    // $codifier_nouveau = Etudiant::where('id',$id)->first();
                                    // $codifier_nouveau->chambre_id = $imb_chm->chambre_id;
                                    // $codifier_nouveau->prix = $prix->prix_nouveau;
                                    // $codifier_nouveau->codifier = 1;
                                    // $codifier_nouveau->save();

                                    // view()->shared('etudiants',$codifier_nouveau);
                                    // $pdf = PDF::loadView('user.pdf',compact('codifier_nouveau'));
                                    // $file = $pdf->save('public/reglement');
                                    // $codifier_nouveau->update([
                                    //     'reglement' => $file
                                    // ]);

                                    // Nexmo::message()->send([
                                    //     'to' => '221782875971',
                                    //     'from' => '221781956168',
                                    //     'text' => 'AEERK : Salut vous avez ete codifier verifier votre compte gmail'
                                    // ]);

                                    // $position = Chambre::where('id',$chambres->id)->first();
                                    // $position_nombre = $position->position;
                                    // $position->position = $position_nombre + 1;
                                    // $position->save();

                                    // Mail::to($codifier_nouveau->email)
                                    // ->send(new AeerkEmailMessage($codifier_nouveau));
                                    // Flashy::success('Vous avez ete codifier');
                                    // Auth::logout();
                                    // return redirect()->route('index');
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

                                $invoice = new CheckoutInvoice();
                                $invoice->addItem("AEERK CODIFICATION", 1, 1, $prix->prix_ancien, "Codifier en toute securite");
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

                         
                        }else{
                            $is_pleine = Chambre::where('id',$imb_chm->chambre_id)->first();
                            $is_pleine->is_pleine = 1;
                            $is_pleine->save();
                            $chambre_suivante = Chambre::where('is_pleine',0)->first();
                            if($chambre_suivante->id == $imb_chm->chambre_id && $chambres->genre == $request->genre){
                                $ancien = Etudiant::where('chambre_id',$imb_chm->chambre_id)->get();
                                if($ancien->count() < $chambres->nombre){
                                $codifier_ancien = Etudiant::where('id',$id)->first();
                                $invoice = new CheckoutInvoice();
                                $invoice->addItem("AEERK CODIFICATION", 1, 1, $prix->prix_ancien, "Codifier en toute securite");
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
                                    // $codifier_ancien = Ancien::where('id',$id)->first();
                                    // $codifier_ancien->chambre_id = $imb_chm->chambre_id;
                                    // $codifier_ancien->prix = $prix->prix_ancien;
                                    // $codifier_ancien->codifier = 1;
                                    // $codifier_ancien->save();
                                    // // Nexmo::message()->send([
                                    // //     'to' => '221782875971',
                                    // //     'from' => '221781956168',
                                    // //     'text' => 'AEERK : Salut vous avez ete codifier verifier votre compte gmail'
                                    // // ]);

                                    // $position = Chambre::where('id',$chambres->id)->first();
                                    // $position_nombre = $position->position;
                                    // $position->position = $position_nombre + 1;
                                    // $position->save();

                                    // Mail::to($codifier_ancien->email)
                                    // ->send(new MessageEmailAeerk($codifier_ancien));
                                    // Flashy::success('Vous avez ete codifier');
                                    // Auth::logout();
                                    // return redirect()->route('index');
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
    $codifier_ancien = Etudiant::where('id',$invoice->getCustomData("id"))
        ->where('email',$invoice->getCustomData("email"))
        ->where('phone',$invoice->getCustomData("phone"))
        ->where('codifier',$invoice->getCustomData("codifier"))
        ->first();
    $codifier_ancien->chambre_id = $invoice->getCustomData("chambre_id");
    $codifier_ancien->prix = $invoice->getTotalAmount();
    $codifier_ancien->codifier = 1;
    $codifier_ancien->save();

    $position = Chambre::where('id',$invoice->getCustomData("chambres"))->first();
    $position_nombre = $position->position;
    $position->position = $position_nombre + 1;
    $position->save();

    Mail::to($codifier_ancien->email)
    ->send(new MessageEmailAeerk($codifier_ancien));
    Flashy::success('Vous avez ete codifier');
    Auth::logout();
    return redirect()->route('index');
  }elseif ($invoice->getStatus() == "cancelled") {
      return redirect()->route('index')->with('error','Votre codification a echouer');
  }

  // Vous pouvez aussi récupérer le montant total spécifié précédemment
  echo $invoice->getTotalAmount();

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
         $output = view('user.pdf' ,compact('etudiant'));
         $dompdf = new Dompdf();
         $dompdf->loadHtml($output);
         $dompdf->setPaper('A4','landscape');
         $dompdf->render();
         $dompdf->stream();
        
    }
}

