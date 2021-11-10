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
                            $codifier_nouveau->chambre_id = $imb_chm->chambre_id;
                            $codifier_nouveau->prix = $prix->prix_nouveau;
                            $codifier_nouveau->codifier = 1;
                            $codifier_nouveau->save();
                            // Nexmo::message()->send([
                            //     'to' => '221782875971',
                            //     'from' => '221781956168',
                            //     'text' => 'AEERK : Salut vous avez ete codifier verifier votre compte gmail'
                            // ]);

                            // view()->shared('etudiants',$codifier_nouveau);
                            // $pdf = PDF::loadView('user.pdf',compact('codifier_nouveau'));
                            // $file = $pdf->save('public/reglement');
                            // $codifier_nouveau->update([
                            //     'reglement' => $file
                            // ]);

                            $position = Chambre::where('id',$chambres->id)->first();
                            $position_nombre = $position->position;
                            $position->position = $position_nombre + 1;
                            $position->save();

                            Mail::to($codifier_nouveau->email)
                            ->send(new AeerkEmailMessage($codifier_nouveau));
                            Flashy::success('Vous avez ete codifier');
                            Auth::logout();
                            return redirect()->route('index')->with('success','Vous avez bien ete codifier, verifier votre adresse email');
                        }else{
                            $is_pleine = Chambre::where('id',$imb_chm->chambre_id)->first();
                            $is_pleine->is_pleine = 1;
                            $is_pleine->save();
                            $chambre_suivante = Chambre::where('is_pleine',0)->first();
                            if($chambre_suivante->id == $imb_chm->chambre_id && $chambres->genre == $request->genre){
                                $nouveau = Etudiant::where('chambre_id',$imb_chm->chambre_id)->get();
                                if($nouveau->count() < $chambres->nombre){
                                    $codifier_nouveau = Etudiant::where('id',$id)->first();
                                    $codifier_nouveau->chambre_id = $imb_chm->chambre_id;
                                    $codifier_nouveau->prix = $prix->prix_nouveau;
                                    $codifier_nouveau->codifier = 1;
                                    $codifier_nouveau->save();

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

                                    $position = Chambre::where('id',$chambres->id)->first();
                                    $position_nombre = $position->position;
                                    $position->position = $position_nombre + 1;
                                    $position->save();

                                    Mail::to($codifier_nouveau->email)
                                    ->send(new AeerkEmailMessage($codifier_nouveau));
                                    Flashy::success('Vous avez ete codifier');
                                    Auth::logout();
                                    return redirect()->route('index');
                                }
                            }
                        }
                    }
                }
            }
    }



    // public function update(Request $request, $id)
    // {
    //     $validator = $this->validate($request , [
    //         'chambre_id' => 'required|string',
    //     ]);
    //     $prix = Solde::select('prix_nouveau')->first();
    //     $chambre_nouveau = Nouveau::all();
    //     foreach($chambre_nouveau as $chambres){
    //         $nouveau = Nouveau::where('chambre_id',$request->chambre_id)->get();
    //         if ($chambres->chambre_id == $request->chambre_id) {
    //             if($nouveau->count() < $chambres->chambre->nombre){
    //                 $codifier_nouveau = Nouveau::where('id',$id)->first();
    //                 $codifier_nouveau->chambre_id = $request->chambre_id;
    //                 $codifier_nouveau->prix = $prix->prix_nouveau;
    //                 $codifier_nouveau->codifier = 1;
    //                 $codifier_nouveau->save();
    //                 Flashy::success('Vous avez ete codifier');
    //                 Auth::logout();
    //                 return redirect()->route('index');
    //             }else{
    //                 Flashy::error('Cette Chambre est pleine');
    //                 return redirect()->back();
    //             }
    //         }
    //         else if ($chambres->chambre_id == !$request->chambre_id){
    //             $chambre_null = Nouveau::where('chambre_id',!$request->chambre_id)->first();
    //             if ($chambre_null) {
    //                 $codifier_nouveau = Nouveau::where('id',$id)->first();
    //                 $codifier_nouveau->chambre_id = $request->chambre_id;
    //                 $codifier_nouveau->prix = $prix->prix_nouveau;
    //                 $codifier_nouveau->codifier = 1;
    //                 $codifier_nouveau->save();
    //                 Auth::logout();
    //                 Flashy::success('Vous avez ete codifier');
    //                 return redirect()->route('index');
    //             }
                
    //         }
    //     }
    // }







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
                            $codifier_ancien->chambre_id = $imb_chm->chambre_id;
                            $codifier_ancien->prix = $prix->prix_ancien;
                            $codifier_ancien->codifier = 1;
                            $codifier_ancien->save();
                            // Nexmo::message()->send([
                            //     'to' => '221782875971',
                            //     'from' => '221781956168',
                            //     'text' => 'AEERK : Salut vous avez ete codifier verifier votre compte gmail'
                            // ]);

                            $position = Chambre::where('id',$chambres->id)->first();
                            $position_nombre = $position->position;
                            $position->position = $position_nombre + 1;
                            $position->save();

                            Mail::to($codifier_ancien->email)
                            ->send(new MessageEmailAeerk($codifier_ancien));
                            Flashy::success('Vous avez ete codifier');
                            Auth::logout();
                            return redirect()->route('index');
                        }else{
                            $is_pleine = Chambre::where('id',$imb_chm->chambre_id)->first();
                            $is_pleine->is_pleine = 1;
                            $is_pleine->save();
                            $chambre_suivante = Chambre::where('is_pleine',0)->first();
                            if($chambre_suivante->id == $imb_chm->chambre_id && $chambres->genre == $request->genre){
                                $ancien = Etudiant::where('chambre_id',$imb_chm->chambre_id)->get();
                                if($ancien->count() < $chambres->nombre){
                                    $codifier_ancien = Ancien::where('id',$id)->first();
                                    $codifier_ancien->chambre_id = $imb_chm->chambre_id;
                                    $codifier_ancien->prix = $prix->prix_ancien;
                                    $codifier_ancien->codifier = 1;
                                    $codifier_ancien->save();
                                    // Nexmo::message()->send([
                                    //     'to' => '221782875971',
                                    //     'from' => '221781956168',
                                    //     'text' => 'AEERK : Salut vous avez ete codifier verifier votre compte gmail'
                                    // ]);

                                    $position = Chambre::where('id',$chambres->id)->first();
                                    $position_nombre = $position->position;
                                    $position->position = $position_nombre + 1;
                                    $position->save();

                                    Mail::to($codifier_ancien->email)
                                    ->send(new MessageEmailAeerk($codifier_ancien));
                                    Flashy::success('Vous avez ete codifier');
                                    Auth::logout();
                                    return redirect()->route('index');
                                }
                            }
                        }
                    }
                }
            }
    }







    // public function codifier_ancien(Request $request,$id)
    // {
    //     $validator = $this->validate($request , [
    //         'chambre_id' => 'required|string',
    //     ]);
    //     // dd($request->chambre_id);
    //     $prix = Solde::select('prix_ancien')->first();
    //     $chambre_ancien = Ancien::all();
    //     foreach($chambre_ancien as $chambres){
    //         if ($chambres->chambre_id == $request->chambre_id) {
    //             $ancien = Ancien::where('chambre_id',$request->chambre_id)->get();
    //             if($ancien->count() < $chambres->chambre->nombre){
    //                 $codifier_ancien = Ancien::where('id',$id)->first();
    //                 $codifier_ancien->chambre_id = $request->chambre_id;
    //                 $codifier_ancien->prix = $prix->prix_ancien;
    //                 $codifier_ancien->codifier = 1;
    //                 $codifier_ancien->save();
    //                 Flashy::success('Vous avez ete codifier');
    //                 Auth::logout();
    //                 return redirect()->route('index');
    //             }else{
    //                 Flashy::error('Cette Chambre est pleine');
    //                 return redirect()->back();
    //             }
    //         }
    //         else if ($chambres->chambre_id == !$request->chambre_id){
    //             $chambre_null = Ancien::where('chambre_id',!$request->chambre_id)->first();
    //             if ($chambre_null) {
    //                 $codifier_ancien = Ancien::where('id',$id)->first();
    //                 $codifier_ancien->chambre_id = $request->chambre_id;
    //                 $codifier_ancien->prix = $prix->prix_ancien;
    //                 $codifier_ancien->codifier = 1;
    //                 $codifier_ancien->save();
    //                 Auth::logout();
    //                 Flashy::success('Vous avez ete codifier');
    //                 return redirect()->route('index');
    //             }
                
    //         }
    //     }
    // }
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

