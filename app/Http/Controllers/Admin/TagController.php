<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Tag;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('posts.viewAny')) {
            $tags = Tag::paginate(10);
            return view('admin.tag.index',compact('tags'));
        }
        return redirect(route('admin.home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->user()->can('posts.create')) {
            return view('admin.tag.add');
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
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
           
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();
        Flashy::success('Votre tag a ete ajoute');
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
        if (Auth::guard('admin')->user()->can('posts.update')) {
            $tag = Tag::where('id',$id)->first();
            return view('admin.tag.edit',compact('tag'));
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
        if (Auth::guard('admin')->user()->can('posts.update')) {
            $this->validate($request,[
                'name' => 'required',
                'slug' => 'required',
            
            ]);
            $tag = Tag::find($id);
            $tag->name = $request->name;
            $tag->slug = $request->slug;
            $tag->save();
            Flashy::success('Votre tag a ete modifier');
            return redirect(route('admin.tag.index'));
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
        if (Auth::guard('admin')->user()->can('posts.delete')) {
            Tag::where('id',$id)->delete();
            return redirect()->back();
        }
        return redirect(route('admin.home'));
    }
}
