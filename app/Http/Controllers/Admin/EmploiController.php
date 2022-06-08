<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\Domaine;
use App\Model\User\Job;
use App\Model\User\Speciality;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin','isEmployer']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domaine = Domaine::where('id',$id)->first();
        $specialites = Speciality::where('domaine_id',$id)->paginate(10);
        return view('admin.job.show',compact('specialites','domaine'));
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

     public function emploi($id)
    {
        $speciality = Speciality::where('id',$id)->first();
        $employes = Job::where('speciality_id',$id)->where('status',1)->paginate(10);
        return view('admin.job.emploi',compact('employes','speciality'));
    }

    public function stage($id){
        $speciality = Speciality::where('id',$id)->first();
        $employes = Job::where('speciality_id',$id)->where('status',2)->paginate(10);
        return view('admin.job.emploi',compact('employes','speciality'));
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
