<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\EmploiMailere;
use App\Model\Admin\Departement;
use App\Model\User\Domaine;
use App\Model\User\Job;
use App\Model\User\Speciality;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domaines = Domaine::all();
        return view('user.job.index',compact('domaines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departement = Departement::all();
        return view('user.job.add',compact('departement'));
    }

    public function add($slug){
        $departement = Departement::all();
        $speciality = Speciality::where('slug',$slug)->first();
        return view('user.job.add',compact('speciality','departement'));
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
            'genre' => 'required',
            'niveau' => 'required',
            'name' => 'required|string',
            'email' => 'required|email|unique:jobs',
            'phone' => 'required|unique:jobs|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
            'commune' => 'required|numeric',
            'status' => 'required|numeric',
            'cv' => 'required|mimes:PDF,pdf',
            'cni' => 'required|mimes:pdf,PDF',
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'profile' => 'required|string',
        ]);
        $imageName = '';
        $cvName = '';
        $cniName = '';
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/Emplois');
        }
        if ($request->hasFile('cv')) {
            $cvName = $request->cv->store('public/Emplois');
        }
        if ($request->hasFile('cni')) {
            $cniName = $request->cni->store('public/Emplois');
        }
        $code = str_replace('/','',Str::random(5));
        $tokenFinale = '';
        $token_essei = Job::where('token_number',$code)->first();
        if ($token_essei) {
            $tokenFinale = str_replace('/','',Str::random(5));
        }else {
            $tokenFinale = $code;
        }
        $sendCode = $tokenFinale;
        Job::create([
            'genre' => $request->genre,
            'niveau_id' => $request->niveau,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'commune_id' => $request->commune,
            'speciality_id' => $request->speciality,
            'status' => $request->status,
            'cv' => $cvName,
            'cni' => $cniName,
            'image' => $imageName,
            'profile' => $request->profile,
            'slug' =>  str_replace('/','',Hash::make(Str::random(20).$tokenFinale.$request->email)),
            'token_number' => Hash::make($tokenFinale), 
        ]);

        Mail::to($request->email)
        ->send(new EmploiMailere($request->genre,$request->name,$sendCode));
        Toastr::success('Votre inscription a bien ete enregistre', 'Inscription Emplois', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $domaine = Domaine::where('slug',$slug)->first();
        $specialites = Speciality::where('domaine_id',$domaine->id)->paginate(12);
        return view('user.job.show',compact('specialites','domaine'));
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
        //
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
}
