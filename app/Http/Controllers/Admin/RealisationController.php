<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Realisation;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Model\Admin\Departement;
use App\Model\User\Recrutement;

class RealisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth:admin','isPost']);
    }
    
    public function index()
    {
        $etudiants = Recrutement::orderBy('created_at','DESC')->paginate(10);
        return view('admin.realisation.index',compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.realisation.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'libele' => 'required|string',
            'date' => 'required',
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'contenu' => 'required|string',
        ]);

        $add_realisation = new Realisation();
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/realisation');
        }

        $add_realisation->nom = $request->libele;
        $add_realisation->date = $request->date;
        $add_realisation->contenu = $request->contenu;
        $add_realisation->status = $request->status;
        $add_realisation->image = $imageName;
        $add_realisation->save();
        Flashy::success('Votre realisation a ete ajoute');
        return redirect()->route('admin.realisation.index');
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_etudiant = Recrutement::find($id);
        $departements = Departement::all();
        return view('admin.realisation.show',compact('show_etudiant','departements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
         if ($request->option == 1) 
        {
          $naissance = '';
            $add_etudiant = Recrutement::where('id',$id)->first();
            $add_etudiant->genre = $request->genre;
            $add_etudiant->name = $request->name;
            $add_etudiant->email = $request->email;
            $add_etudiant->phone = $request->phone;
              if ($request->naissance == null) {
                $naissance = $add_etudiant->naissance;
            }
            else{
                $naissance = $request->naissance;
            }
            $add_etudiant->naissance = $naissance;
            $add_etudiant->lieu = $request->lieu;
            $add_etudiant->niveau = $request->niveau;
            $add_etudiant->commune_id = $request->commune;
            $add_etudiant->etablissement = $request->etablissement;
            $add_etudiant->status = $request->status;
            $add_etudiant->filliere = $request->filliere;
            $add_etudiant->save();
            return back()->with('success','Votre etudiant ete modifier');
        }
        if ($request->option == 2) {
            $validator = $this->validate($request , [
                'diplome' => 'required|mimes:pdf,PDF',
            ]);                
            $etudiant_diplome = Recrutement::where('id',$id)->first();
            if ($request->hasFile('diplome')) {
                $diplomeName = $request->diplome->store('public/diplomes');
            }
            $etudiant_diplome->diplome = $diplomeName;
            $etudiant_diplome->save();
            return back()->with('success','Le diplome a ete modifier');
        }
        if ($request->option == 3) {
             $validator = $this->validate($request , [
                'curiculum' => 'required|mimes:pdf,PDF',
            ]);    
            $etudiant_curiculum = Recrutement::where('id',$id)->first();
            if ($request->hasFile('curiculum')) {
                $curiculumName = $request->curiculum->store('public/curiculum');
            }
            $etudiant_curiculum->curiculum = $curiculumName;
            $etudiant_curiculum->save();
            return back()->with('success','Le curiculum a ete modifier');
        }
        if ($request->option == 4) {
             $validator = $this->validate($request , [
                'photocopie' => 'required|mimes:pdf,PDF',
            ]);   
            $etudiant_cni = Recrutement::where('id',$id)->first();
            if ($request->hasFile('photocopie')) {
                $cniName = $request->photocopie->store('public/cni');
            }
            $etudiant_cni->identite = $cniName;
            $etudiant_cni->save();
            return back()->with('success','Le identite a ete modifier');
        }
        if ($request->option == 5) {
              $validator = $this->validate($request , [
                'image' => 'required|image | mimes:jpeg,png,jpg,gif,ijf,PNG,JPEG,JPG,GIF,IJF',
            ]);
            $etudiant_image = Recrutement::where('id',$id)->first();
            if ($request->hasFile('image')) {
                $imageName = $request->image->store('public/images');
            }
            $etudiant_image->image = $imageName;
            $etudiant_image->save();
            return back()->with('success','L\'image a ete modifier');
        }
        Flashy::success('Votre realisation a ete modifier');
        return redirect()->route('admin.realisation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recrutement::find($id)->delete();
        Flashy::success('Cte etudiant a ete supprimer');
        return back();
    }
}
