<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Document;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        if (Auth::guard('admin')->user()->can('posts.viewAny')) 
        {
            $document_all = Document::all();
            return view('admin.document.index',compact('document_all'));
        }
         return redirect(route('admin.home'));
    }
    
    public function create()
    {
        if (Auth::guard('admin')->user()->can('posts.create')) 
        {
            return view('admin.document.add');
        }
         return redirect(route('admin.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::guard('admin')->user()->can('posts.create')) 
        {
            $validator = $this->validate($request,[
                'libele' => 'required|string',
                'type' => 'required|string',
                'image' => 'required|mimes:pdf,PDF',
                'resume' => 'required|string',
            ]);

            $add_doc = new Document();
            if ($request->hasFile('image')) {
                $imageName = $request->image->store('public/Document');
            }

            $add_doc->libele = $request->libele;
            $add_doc->type = $request->type;
            $add_doc->resume = $request->resume;
            $add_doc->status = $request->status;
            $add_doc->image = $imageName;
            $add_doc->save();
            Flashy::success('Votre Document a ete ajoute');
            return redirect()->route('admin.document.index');
        }
         return redirect(route('admin.home'));
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
        if (Auth::guard('admin')->user()->can('posts.update')) 
        {
            $edit_doc = Document::find($id);
            return view('admin.document.edite',compact('edit_doc'));
        }
         return redirect(route('admin.home'));
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
        if (Auth::guard('admin')->user()->can('posts.update')) 
        {
            $update_doc = Document::find($id);
            $docment = $update_doc->image;
            if ($request->hasFile('image')) {
                $imageName = $request->image->store('public/Document');
                Storage::delete($docment);
            }elseif ($request->image == Null){
                $imageName = $update_doc->image;
            }
            $update_doc->libele = $request->libele;
            $update_doc->type = $request->type;
            $update_doc->resume = $request->resume;
            $update_doc->status = $request->status;
            $update_doc->image = $imageName;
            $update_doc->save();
            Flashy::success('Votre Document a ete modifier');
            return redirect()->route('admin.document.index');
        }
         return redirect(route('admin.home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->can('posts.delete')) 
        {
            $doc_delete = Document::find($id);
            $doc_img = $doc_delete->image;
            Storage::delete($doc_img);
            $doc_delete->delete();
            Flashy::success('Votre document a ete supprimer');
            return back();
        }
         return redirect(route('admin.home'));
    }


}
