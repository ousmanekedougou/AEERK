<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Admin\Info;
use App\Model\Admin\Solde;
use App\Model\User\Option;
use App\Model\Admin\Social;
use Illuminate\Http\Request;
use App\Model\Admin\Partenaire;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware(['auth:admin','isAdmin']);
    }
    public function index()
    {
        $infos = Info::first();
        $partener = Partenaire::all();
        $social_reseau = Social::all();
        $soldes = Solde::first();
        $options = Option::all();
        $autorisation = User::first();
        return view('admin.info.index',compact('infos','social_reseau','partener','soldes','options','autorisation'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    public function add_prix(Request $request){
  
        $validator = $this->validate($request,[
            'prix_n' => 'required|numeric',
            'prix_a' => 'required|numeric',
            'numero_n' => 'required|numeric',
            'numero_a' => 'required|numeric',
        ]);
        $add_solde = new Solde;
        $add_solde->prix_nouveau = $request->prix_n;
        $add_solde->prix_ancien = $request->prix_a;
        $add_solde->numero_nouveau = $request->numero_n;
        $add_solde->numero_ancien = $request->numero_a;
        $add_solde->save();
        Flashy::success('Vos Prix ont ete mise a joure');
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
        $validator =  $this->validate($request,[
            'email' => 'required|email|unique:infos',
            'phone' => 'required|unique:infos',
            'adresse' => 'required|unique:infos',
            'bp' => 'required|unique:infos',
            'fax' => 'required|unique:infos',
            
        ]);
        $info_ajouter = new Info;
        $info_ajouter->email = $request->email;
        $info_ajouter->phone = $request->phone;
        $info_ajouter->adresse = $request->adresse;
        $info_ajouter->bp = $request->bp;
        $info_ajouter->fax = $request->fax;
        $info_ajouter->save();
        Flashy::success('Vos infos ont ete ajouter');
        return redirect()->route('admin.info.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function solde(Request $request ,$id)
    {
        $validator = $this->validate($request,[
            'prix_n' => 'required|numeric',
            'prix_a' => 'required|numeric',
            'numero_n' => 'required|numeric',
            'numero_a' => 'required|numeric',
        ]);
        // dd($request);
        $update_solde = Solde::find($id);
        $update_solde->prix_nouveau = $request->prix_n;
        $update_solde->prix_ancien = $request->prix_a;
        $update_solde->numero_nouveau = $request->numero_n;
        $update_solde->numero_ancien = $request->numero_a;
        $update_solde->save();
        Flashy::success('Vos Prix ont ete mise a joure');
        return back();
    }

    public function register(Request $request ,$id){
        $update_lien = Option::find($id);
        // dd($request->recasement_etudiant);
        
        if($request->register == 0){
            $update_lien->register = 0;
        }elseif($request->register == 1){
            $update_lien->register = 1;
        }
        $update_lien->save();
        Flashy::success('Votre lien a ete modifier');
        return back();
    }

    public function register_etudiant(Request $request ,$id){
        $update_lien = Option::find($id);
        if($request->inscription_etudiant == 0){
            $update_lien->register_nouveau = 0;
            $update_lien->register_ancien = 0;
        }elseif($request->inscription_etudiant == 1){
            $update_lien->register_nouveau = 1;
            $update_lien->register_ancien = 1;
        }
        $update_lien->save();
        Flashy::success('Votre lien a ete modifier');
        return back();
    }

    public function register_recasement(Request $request ,$id){
        $update_lien = Option::find($id);
        if($request->register_recasement == 0){
            $update_lien->register_recasement = 0;
        }elseif($request->register_recasement == 1){
            $update_lien->register_recasement = 1;
        }
        $update_lien->save();
        Flashy::success('Votre lien a ete modifier');
        return back();
    }

    public function codification(Request $request ,$id){
        $update_lien = Option::find($id);
        if($request->codification == 0){
            $update_lien->codification = 0;
        }elseif($request->codification == 1){
            $update_lien->codification = 1;
        }
        $update_lien->save();
        Flashy::success('Votre lien a ete modifier');
        return back();
    }

    public function codification_etudiant(Request $request ,$id){
        $update_lien = Option::find($id);
        if($request->codification_etudiant == 0){
            $update_lien->codification_nouveau = 0;
            $update_lien->codification_ancien = 0;
        }elseif($request->codification_etudiant == 1){
            $update_lien->codification_nouveau = 1;
            $update_lien->codification_ancien = 1;
        }
        $update_lien->save();
        Flashy::success('Votre lien a ete modifier');
        return back();
    }

    public function recasement_etudiant(Request $request ,$id){
        $update_lien = Option::find($id);
        if($request->recasement_etudiant == 0){
            $update_lien->recasement = 0;
        }elseif($request->recasement_etudiant == 1){
            $update_lien->recasement = 1;
        }
        $update_lien->save();
        Flashy::success('Votre lien a ete modifier');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info_view = Info::where('id',$id)->first();
        return view('admin.info.edite',compact('info_view'));
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
        $info_update = Info::find($id);
        $info_update->email = $request->email;
        $info_update->phone = $request->phone;
        $info_update->adresse = $request->adresse;
        $info_update->bp = $request->bp;
        $info_update->fax = $request->fax;
        $info_update->save();
        Flashy::success('Vos infos ont ete modifier');
        return redirect()->route('admin.info.index');
    }


    public function autorisation(Request $request ,$id){
        if ($request->option == 1) {
            $this->validate($request,[
                'email' => 'required|email|string',
                'password' => 'required|confirmed'
            ]);
            $update_autorisation = User::where('id',$id)->first();
            $update_autorisation->email = $request->email;
            $update_autorisation->text_dechifre = $request->password;
            $update_autorisation->password = Hash::make($request->password);
            $update_autorisation->sendmail = $request->sendmail;
            $update_autorisation->save();
            Flashy::success('Vos informations de codifications ont ete modifier');
            return back();
        }elseif ($request->option == 2) {
            $update_lient = User::where('id',$id)->first();
            $update_lient->lien = $request->lien;
            $update_lient->save();
            Flashy::success('Le status de votre lien a ete modifier');
            return back();
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
        Info::where('id',$id)->delete();
        return back();
    }
}
