<?php

namespace App\Http\Controllers\Admin;
use App\Model\Admin\Tag;
use App\Model\Admin\Post;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use MercurySeries\Flashy\Flashy;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin','isPost']);
    }

      /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $posts = Post::all();
            return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categorys = Category::all();
        return view('admin.post.post',compact(['tags','categorys']));
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
            'title' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,ijf',
            'resume' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required'
        ]);
        $post = new Post;
       
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Article');
        }

        if ($request->slug == '') {
            $slugTitle = $request->title;
        }elseif ($request->slug != '') {
            $slugTitle = $request->slug;
        }
        $post->image = $imageName;
        $post->title = $request->title;
        $vowels = array(":", ",", "-", "/", "%", ";", "(", ")", "[", "]","_","è","é","{","}");
        $post->slug = str_replace($vowels,'',$slugTitle);
        $post->status = $request->status;
        $post->resume = $request->resume;
        $post->body = $request->body;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->category);
        Toastr::success('Votre article a ete ajouter','Ajout Article', ["positionClass" => "toast-top-right"]);
        return redirect(route('admin.post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_post = Post::find($id);
        return view('admin.post.show',compact('show_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('tags','categories')->where('id',$id)->first();
        $tags = Tag::all();
        $categorys = Category::all();
        return view('admin.post.edit',compact(['tags','categorys','post']));
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
        $post = Post::find($id);
        $imgdel = $post->image;
        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Article');
            Storage::delete($imgdel); 
        }
        else{ $imageName = $post->image; }

        if ($request->slug == '') {
            $slugTitle = $request->title;
        }elseif ($request->slug != '') {
            $slugTitle = $request->slug;
        }
        $post->title = $request->title;
        $vowels = array(":", ",", "-", "/", "%", ";", "(", ")", "[", "]","_","è","é","{","}");
        $post->slug = str_replace($vowels,'',$slugTitle);
        $post->status = $request->status;
        $post->image = $imageName;
        $post->resume = $request->resume;
        $post->body = $request->body;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->category);
        Toastr::success('Votre article a ete modifier','Modification Article', ["positionClass" => "toast-top-right"]);
        return redirect(route('admin.post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poste_delete = Post::where('id',$id);
        $imgdel = $poste_delete->image;
        Storage::delete($imgdel); 
        $poste_delete->delete();
        Toastr::success('Votre article a ete supprimer','Suppression Article', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}


