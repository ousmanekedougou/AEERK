<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\Domaine;
use App\Model\User\Job;
use App\Model\User\Speciality;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class DomaineController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin','isAdmin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $add_commission = Domaine::all();
        $add_poste = Domaine::all();
        return view('admin.domaine.index',compact('add_commission','add_poste'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    public function post(Request $request)
    {
        $validate = $this->validate($request,[
            'name' => 'required|string',
            'domaine' => 'required|string',
        ]);

        Speciality::create([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(20).'speciality'.$request->name)),
            'domaine_id' => $request->domaine,
        ]);
        Toastr::success('Votre specialite a ete bien ajouter', 'Ajout Spacialite', ["positionClass" => "toast-top-right"]);
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
        $validate = $this->validate($request,[
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,ijf',
            'desc' => 'required|string'
        ]);

        $imageName = '';

        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Domaine');
        }

        Domaine::create([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(20).'domaine'.$request->name)),
            'image' => $imageName,
            'body' => $request->desc
        ]);
        Toastr::success('Votre domaine a ete bien ajouter', 'Ajout Domaine', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $add_commission = Domaine::all();
        $domaine = Domaine::where('id',$id)->first();
        $speciality = Speciality::where('domaine_id',$id)->get();
        return view('admin.domaine.show',compact('speciality','add_commission','domaine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speciality = Speciality::where('id',$id)->first();
        $employes = Job::where('speciality_id',$id)->where('status',1)->paginate(10);
        return view('admin.domaine.emploi',compact('employes','speciality'));
    }

    public function emploi($id){
        $speciality = Speciality::where('id',$id)->first();
         $employes = Job::where('speciality_id',$id)->where('status',2)->paginate(10);
        return view('admin.domaine.emploi',compact('employes','speciality'));
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
        $update = Domaine::where('id',$id)->first();
        $imgdel = $update->image;
        $imageName = '' ;
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Domaine');
            Storage::delete($imgdel); 
        }else{
            $imageName = $update->image;
        }

        $update->name = $request->name;
        $update->slug = str_replace('/','',Hash::make(Str::random(20).'domaine'.$request->name));
        $update->image = $imageName;
        $update->body = $request->desc;
        $update->save();
        Toastr::success('Votre domaine a ete bien modifier', 'Modifier Domaine', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function update_post(Request $request, $id)
    {
        Speciality::where('id',$id)->update([
            'name' => $request->name,
            'slug' => str_replace('/','',Hash::make(Str::random(20).'specialite'.$request->name)),
            'domaine_id' => $request->domaine
        ]);
        Toastr::success('Votre specialite a ete bien modifier', 'Modifier Specialite', ["positionClass" => "toast-top-right"]);
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
        $delete = Domaine::where('id',$id)->first();
        $imgdel = $delete->image;
        Storage::delete($imgdel); 
        $delete->delete();
        Toastr::success('Votre domaine a ete supprimer', 'Suppression Domaine', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function delete($id)
    {
        Speciality::where('id',$id)->delete();
        Toastr::success('Votre specialite a ete supprimer', 'Suppression Specialite', ["positionClass" => "toast-top-right"]);
        return back();
    }
     public function delete_emploi($id)
    {
        Job::where('id',$id)->delete();
        Toastr::success('Votre candidats a bien ete supprimer', 'Suppression Candidat', ["positionClass" => "toast-top-right"]);
        return back();
    }
}


