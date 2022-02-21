<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Tag;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:admin','isPost']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $tags = Tag::paginate(10);
            return view('admin.tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
           
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();
        Toastr::success('Votre tag a ete ajouter','Ajout Tag', ["positionClass" => "toast-top-right"]);
        return redirect(route('admin.tag.index'));
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
        $tag = Tag::where('id',$id)->first();
        return view('admin.tag.edit',compact('tag'));
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
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
        
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();
        Toastr::success('Votre tag a ete modifier','Modification Tag', ["positionClass" => "toast-top-right"]);
        return redirect(route('admin.tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::where('id',$id)->delete();
        Toastr::success('Votre tag a ete supprimer','Suppression Tag', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
