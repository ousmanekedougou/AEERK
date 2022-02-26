<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Education;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class StageController extends Controller
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
        $stages = Education::where('type',5)->paginate(10);
        return view('admin.stage.index',compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stage.add');
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
            'lien' => 'required',
            'lien_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,ijf',
            'desc' => 'required|string',
            'content' => 'required|string',
        ]);
        // dd($request->all());
        $add_bourse = new Education();
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/stage');
        }
        if ($request->status == null) {
            $status = 0;
        }else {
            $status = 1;
        }

        $add_bourse->titre = $request->title;
        $add_bourse->lien = $request->lien;
        $add_bourse->lien_name = $request->lien_name;
        $add_bourse->type = 5;
        $add_bourse->image = $imageName;
        $add_bourse->desc = $request->desc;
        $add_bourse->content = $request->content;
        $add_bourse->status = $status;
        $add_bourse->save();
        Toastr::success('Votre stage a ete ajouter', 'Ajout stage', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.stage.index');
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Education::where('type',5)->where('id',$id)->first();
        return view('admin.stage.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Education::where('type',5)->where('id',$id)->first();
        return view('admin.stage.edite',compact('edit'));
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
            'lien' => 'required',
            'lien_name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,ijf',
            'desc' => 'required|string',
            'content' => 'required|string',
        ]);
        $update = Education::where('type',5)->where('id',$id)->first();
        $imgdel = $update->image;
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/stage');
            Storage::delete($imgdel); 
        }elseif ($request->image == Null){
            $imageName = $update->image;
        }
        if ($request->status == null) {
            $status = 0;
        }else{
            $status = 1;
        }
        $update->titre = $request->title;
        $update->lien = $request->lien;
        $update->lien_name = $request->lien_name;
        $update->image = $imageName;
        $update->desc = $request->desc;
        $update->content = $request->content;
        $update->status = $status;
        $update->save();
        Toastr::success('Votre stage a ete mise a jour', 'Modifier Stage', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.stage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Education::where('type',5)->where('id',$id)->first();
        Storage::delete($delete->image);
        $delete->delete();
        Toastr::success('Votre stage a ete supprimer', 'Suppression Stage', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
