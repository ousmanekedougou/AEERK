<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Faculty;
use App\Model\User\Document;
use App\Model\User\Type;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DocumentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth:admin','isEduc']);
    }

    public function index() {
        
        $document_all = Faculty::all();
        return view('admin.document.index',compact('document_all'));
    }
    
    public function create()
    {
        
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
                'title' => 'required|string',
                'sujet' => 'required|string',
                'auteur' => 'required|string',
                'date' => 'required|date',
                'image' => 'required|mimes:jpeg,png,jpg,gif,ijf',
                'file' => 'required|mimes:pdf,PDF',
                'resume' => 'required|string',
            ]);

            $imageName = '';
            $fileName = '';

            $add_doc = new Document();
            if ($request->hasFile('image')) {
                $imageName = $request->image->store('public/Document');
            }

            if ($request->hasFile('file')) {
                $fileName = $request->file->store('public/Document');
            }
            $status = '';
            if($request->status != null){
                $status = $request->status;
            }else {
                $status = 0;
            }

            $add_doc->title = $request->title;
            $add_doc->auteur = $request->auteur;
            $add_doc->subject = $request->sujet;
            $add_doc->faculty_id = $request->faculty;
            $add_doc->status = $status;
            $add_doc->pub_at = $request->date;
            $vowels = array(":", ",", "-", "/", "%", ";", "(", ")", "[", "]","_","è","é","{","}");
            $add_doc->slug = str_replace($vowels,'',$request->title.'/'.$request->type.'/'.$request->sujet);
            $add_doc->image = $imageName;
            $add_doc->file = $fileName;
            $add_doc->desc = $request->resume;
            $add_doc->save();
            Toastr::success('Votre document a ete ajouter', 'Ajout Document', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.document.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Faculty::where('id',$id)->first();
        $documents = Document::where('faculty_id',$id)->paginate(10);
        return view('admin.document.show',compact('documents','type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_doc = Document::find($id);
        return view('admin.document.edite',compact('edit_doc'));
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
            $update_doc = Document::where('id',$id)->first();
            $docment = $update_doc->image;
            $imageName = '';
            $fileName = '';
            $dateUpdate = '';
            if ($request->hasFile('image')) {
                $imageName = $request->image->store('public/Document');
                Storage::delete($docment);
            }elseif ($request->image == Null){
                $imageName = $update_doc->image;
            }
            $file_doc = $update_doc->file;
            if ($request->hasFile('file')) {
                $fileName = $request->file->store('public/Document');
                Storage::delete($file_doc);
            }elseif ($request->file == Null){
                $fileName = $update_doc->file;
            }
             $status = '';
            if($request->status != null){
                $status = $request->status;
            }else {
                $status = 0;
            }
            if ($request->date == null) {
                $dateUpdate = $update_doc->pub_at;
            }else {
                $dateUpdate = $request->date;
            }
            $update_doc->title = $request->title;
            $update_doc->auteur = $request->auteur;
            $update_doc->desc = $request->resume;
            $update_doc->status = $status;
            $update_doc->subject = $request->sujet;
            $update_doc->pub_at = $dateUpdate;
            $vowels = array(":", ",", "-", "/", "%", ";", "(", ")", "[", "]","_","è","é","{","}");
            $update_doc->slug = str_replace($vowels,'',$request->title.'/'.$request->type.'/'.$request->sujet);

            $update_doc->image = $imageName;
            $update_doc->file = $fileName;
            $update_doc->save();
            Toastr::success('Votre document a ete modifier', 'Modification Document', ["positionClass" => "toast-top-right"]);
            return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $doc_delete = Document::find($id);
        $doc_img = $doc_delete->image;
        $doc_file = $doc_delete->file;
        Storage::delete($doc_img);
        Storage::delete($doc_file);
        $doc_delete->delete();
        Toastr::success('Votre document a ete supprimer', 'Suppression Document', ["positionClass" => "toast-top-right"]);
        return back();
        
    }


}


