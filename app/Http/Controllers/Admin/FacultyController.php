<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Faculty;
use App\Model\User\Etudiant;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
     public function __construct()
    {
        $this->middleware(['auth:admin','isEduc']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::where('for',0)->paginate(10);
        return view('admin.faculty.index',compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::where('for',1)->paginate(10);
        return view('admin.faculty.create',compact('faculties'));
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
            'name' => 'required|string',
            'for' => 'required|boolean',
        ]);
        $slug = '';
        if ($request->for == 0) {
            $slug = $request->name.'/publuque';
        }else {
            $request->name.'/prive';
        }

        Faculty::create([
            'name' => $request->name,
            'for' => $request->for,
            'slug' => $slug
        ]);
        Toastr::success('Votre filliere a bien ete ajouter', 'Ajout Filliere', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$niveau)
    {
        //
    }

    public function licence1($id)
    {
        $ancien_bac = Etudiant::where('faculty_id',$id)->where('codification_count',1)->paginate(10);
        $ancien_count = Etudiant::where('faculty_id',$id)->where('codification_count',1)->get();
        $filliere = Faculty::where('id',$id)->first();
        $niveau = 1;
        $count = $ancien_count->count();
        return view('admin.faculty.show',compact('ancien_bac','filliere','niveau','count'));
    }
     public function licence2($id)
    {
        $ancien_bac = Etudiant::where('faculty_id',$id)->where('codification_count',2)->paginate(10);
        $ancien_count = Etudiant::where('faculty_id',$id)->where('codification_count',2)->get();
        $filliere = Faculty::where('id',$id)->first();
        $niveau = 2;
        $count = $ancien_count->count();
        return view('admin.faculty.show',compact('ancien_bac','filliere','niveau','count'));
    }
     public function licence3($id)
    {
        $ancien_bac = Etudiant::where('faculty_id',$id)->where('codification_count',3)->paginate(10);
        $ancien_count = Etudiant::where('faculty_id',$id)->where('codification_count',3)->get();
        $filliere = Faculty::where('id',$id)->first();
        $niveau = 3;
        $count = $ancien_count->count();
        return view('admin.faculty.show',compact('ancien_bac','filliere','niveau','count'));
    }
     public function master1($id)
    {
        $ancien_bac = Etudiant::where('faculty_id',$id)->where('codification_count',4)->paginate(10);
        $ancien_count = Etudiant::where('faculty_id',$id)->where('codification_count',4)->get();
        $filliere = Faculty::where('id',$id)->first();
        $niveau = 4;
        $count = $ancien_count->count();
        return view('admin.faculty.show',compact('ancien_bac','filliere','niveau','count'));
    }
     public function master2($id)
    {
        $ancien_bac = Etudiant::where('faculty_id',$id)->where('codification_count',5)->paginate(10);
        $ancien_count = Etudiant::where('faculty_id',$id)->where('codification_count',5)->get();
        $filliere = Faculty::where('id',$id)->first();
        $niveau = 5;
        $count = $ancien_count->count();
        return view('admin.faculty.show',compact('ancien_bac','filliere','niveau','count'));
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
    public function update(Request $request, $id)
    {
            $validator =  $this->validate($request,[
            'name' => 'required|string',
            'for' => 'required|boolean',
        ]);
        $slug = '';
        if ($request->for == 0) {
            $slug = $request->name.'/publuque';
        }else {
            $request->name.'/prive';
        }

        Faculty::where('id',$id)->update([
            'name' => $request->name,
            'for' => $request->for,
            'slug' => $slug
        ]);
        Toastr::success('Votre filliere a bien ete modifier', 'Modification Filliere', ["positionClass" => "toast-top-right"]);
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
        Faculty::where('id',$id)->delete();
        Toastr::success('Votre filliere a bien ete supprimer', 'Suppression Filliere', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
