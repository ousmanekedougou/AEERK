<?php

namespace App\Http\Controllers\User;

use App\Model\User\Ancien;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Solde;
use App\Model\Admin\Departement;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Nexmo\Laravel\Facade\Nexmo;
use App\Model\User\Etudiant;
use App\Helpers\Sms;
class AncienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departement = Departement::all();
        $immeuble = Immeuble::where('status',2)->get();
        return view('user.ancien.index',compact('departement','immeuble'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $immeuble = Immeuble::where('status',2)->get();
        return view('user.ancien.update',compact('immeuble'));
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
            'genre' => 'required',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:etudiants',
            'phone' => 'required|unique:etudiants|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
            'commune' => 'required|numeric',
            'immeuble' => 'required|numeric',
            'extrait' => 'required|mimes:PDF,pdf',
            'certificat' => 'required|mimes:pdf,PDF',
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'photocopie' => 'required|mimes:pdf,PDF',
        ]);
        // dd($request->ccode);
        $add_ancien = new Etudiant;
        define('ANCIENETE',2);
        $extraitName = '';
        $imageName = '';
        $photocopieName = '';
        $certificatName = '';
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Ancien');
        }
        if ($request->hasFile('extrait')) {
            $extraitName = $request->extrait->store('public/Ancien');
        }
        if ($request->hasFile('certificat')) {
            $certificatName = $request->certificat->store('public/Ancien');
        }
        if ($request->hasFile('photocopie')) {
            $photocopieName = $request->photocopie->store('public/Ancien');
        }
        $phoneFinale = '';
        $phoneComplet = '221'.$request->phone;
        if (strlen($request->phone) == 12 ) {
            $phoneFinale = $request->phone;
        }elseif (strlen($request->phone) == 9) {
            $phoneFinale = $phoneComplet;
        }else {
            return back()->with('error','votre numero de telephone est invalid');
        }
        $add_ancien->genre = $request->genre;
        $add_ancien->nom = $request->nom;
        $add_ancien->prenom = $request->prenom;
        $add_ancien->email = $request->email;
        $add_ancien->phone = $phoneFinale;
        $add_ancien->image = $imageName;
        $add_ancien->bac = $extraitName;
        $add_ancien->certificat = $certificatName;
        $add_ancien->photocopie = $photocopieName;
        $add_ancien->commune_id = $request->commune;
        $add_ancien->immeuble_id = $request->immeuble;
        $add_ancien->status = 0;
        $add_ancien->ancienete = ANCIENETE;
        $add_ancien->save();

        // Teste sms
        
        return redirect()->route('index',$add_ancien)->with([
            "success" => "success",
            "name" => "$add_ancien->prenom $add_ancien->nom"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
       
    }

    public function update_certificat(Request $request)
    {
        $validator = $this->validate($request , [
            'update_email' => 'required|email',
            'update_phone' => 'required|numeric',
            'update_certificat' => 'required|mimes:pdf,PDF',
            'update_image' => 'image|mimes:jpeg,png,jpg,gif,ijf',
            'immeuble' => 'required|numeric'
        ]);
        $ancien_existant = Etudiant::where(['email' => $request->update_email , 'phone' => $request->update_phone ,
        'codifier' => 1 , 'ancienete' => 2])->first();

        $imageName = '';
        $certificatName = '';
        if ($request->hasFile('update_image')) {
            if ($request->update_image == Null) {
                $imageName = $ancien_existant->image;
            }else{
                $imageName = $request->update_image->store('public/Ancien');
            }
        }
        if ($request->hasFile('update_certificat')) {
            $certificatName = $request->update_certificat->store('public/Ancien');
        }
        if ($ancien_existant){
            if ($ancien_existant->codification_count < 5) {
                $ancien_existant->certificat = $certificatName;
                $ancien_existant->image = $imageName;
                $ancien_existant->status = false;
                $ancien_existant->codifier = 0;
                $ancien_existant->prix = 0;
                $ancien_existant->immeuble_id = $request->immeuble;
                $ancien_existant->chambre_id = 0;
                $ancien_existant->save();
                Flashy::success('Votre profile a ete mise a jour');
                return redirect()->route('index');
            }else {
                return redirect()->route('index')->with('error','Votre quotta de codification est epuiser');
            }
        }else{
            Flashy::error('Vous etes pas dans notre base de donne');
            return redirect()->route('index');
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

    public function getSendSms($email , $user_tel ,$prenom , $nom){
        // Authorisation details.
        $username = "ousmanelaravel@gmail.com";
        $hash = "18b51d0115d65bfa0abd5bb15b25d685d6b76bd03380f0fe9fdafd658bc76de9";

        // Config variables. Consult http://api.txtlocal.com/docs for more info.
        $test = "0";

        // Data for text message. This is the text message data.
        $sender = "AEERK"; // This is who the message appears to be from.
        $numbers = $user_tel; // A single number or a comma-seperated list of numbers
        $message = "Salut $prenom $nom votre inscription a bien ete valider";
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('http://api.txtlocal.com/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);
        dd($result);
    }
}
