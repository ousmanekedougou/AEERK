<?php

namespace App\Http\Controllers\Admin;
use App\Model\Admin\Tag;
use App\Model\Admin\Post;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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
        if (Auth::guard('admin')->user()->can('posts.viewAny')) {
            $posts = Post::all();
            return view('admin.post.index',compact('posts'));
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
        // les droit d'authentification avec les condition de can
        if (Auth::guard('admin')->user()->can('posts.create')) {
            $tags = Tag::all();
            $categorys = Category::all();
            return view('admin.post.post',compact(['tags','categorys']));
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
        if (Auth::guard('admin')->user()->can('posts.create')) {
        $this->validate($request,[
            'title' => 'required',
            // 'subtitle' => 'required',
            // 'slug' => 'required',
            'image' => 'required',
            'body' => 'required'
        ]);
        $post = new Post;
       
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Article');
        }

        // $image = $request->image;
        // $filname = $image->getClientOriginalName();
        // $image_resize = Image::make($image->getRealPath());
        // $image_resize->resize(555,280);
        // $imageName = $image_resize->save(public_path("Article/".$filname));

        if ($request->slug == '') {
            $slugTitle = $request->title;
        }elseif ($request->slug != '') {
            $slugTitle = $request->slug;
        }
        $post->image = $imageName;
        $post->title = $request->title;
        $post->slug = $slugTitle;
        $post->status = $request->status;
        $post->body = $request->body;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->category);
        return redirect(route('admin.post.index'));
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
        if(Auth::guard('admin')->user()->can('posts.update'))
        {
            $show_post = Post::find($id);
            return view('admin.post.show',compact('show_post'));
        }
        return redirect(route('admin.home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // les droit d'authentification avec les condition de can
        if(Auth::guard('admin')->user()->can('posts.update'))
        {
            $post = Post::with('tags','categories')->where('id',$id)->first();
            $tags = Tag::all();
            $categorys = Category::all();
            return view('admin.post.edit',compact(['tags','categorys','post']));
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
        if(Auth::guard('admin')->user()->can('posts.update'))
        {
            $post = Post::find($id);
            $imgdel = $post->image;
    
            if($request->image != '')
            {
                $imageName = $request->image->store('public/Article');
            }
            else{ $imageName = $post->image; }

            if ($request->slug == '') {
                $slugTitle = $request->title;
            }elseif ($request->slug != '') {
                $slugTitle = $request->slug;
            }
            $post->title = $request->title;
            $post->slug = $slugTitle;
            $post->status = $request->status;
            $post->image = $imageName;
            $post->body = $request->body;
            $post->save();
            $post->tags()->sync($request->tags);
            $post->categories()->sync($request->category);
            Storage::disk('public')->delete($imgdel); 
            return redirect(route('admin.post.index'));
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
        if(Auth::guard('admin')->user()->can('posts.delete'))
        {
            Post::where('id',$id)->delete();
            return redirect()->back();
        }
        return redirect(route('admin.home'));
    }
}


