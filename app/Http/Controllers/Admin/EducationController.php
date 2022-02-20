<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
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
        $educations = Education::all();
        return view('admin.education.index',compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = $this->validate($request,[
            'title' => 'required|string',
            'type' => 'required|numeric',
            'lien' => 'required|string',
            'file' => 'required|mimes:pdf,PDF',
            'body' => 'required|string'
        ]);
        $fileName = '';
        if ($request->hasFile('file')) {
            $fileName = $request->file->store('public/education');
        }

            $add_document = new Education();
            $add_document->titre = $request->title;
            $add_document->type = $request->type;
            $add_document->lien = $request->lien;
            $add_document->file = $fileName;
            $add_document->content = $request->body;
            $add_document->slug = $request->title.' '.$request->type; 
            $add_document->save();
            return redirect()->route('admin.education.index')->with('success','Votre ducument a ete ajoute');
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
        $edit_doc = Education::where('id',$id)->first();
        return view('admin.education.edit',compact('edit_doc'));
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
        $validator = $this->validate($request,[
            'title' => 'required|string',
            'type' => 'required|numeric',
            'lien' => 'required|string',
            'file' => 'mimes:pdf,PDF',
            'body' => 'required|string'
        ]);
            $fileName = '';
            $update_document = Education::where('id',$id)->first();
            if ($request->hasFile('file')) {
                $fileName = $request->file->store('public/education');
            }else{
                $fileName = $update_document->file;
            }
            $update_document->titre = $request->title;
            $update_document->type = $request->type;
            $update_document->lien = $request->lien;
            $update_document->file = $fileName;
            $update_document->content = $request->body;
            $update_document->slug = $request->title.' '.$request->type; 
            $update_document->save();
            return redirect()->route('admin.education.index')->with('success','Votre ducument a ete mise a joure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Education::find($id)->delete();
        return back()->with('success','Votre document a ete supprimer');
    }
}
