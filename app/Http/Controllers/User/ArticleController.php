<?php

namespace App\Http\Controllers\User;

use App\Model\Admin\Tag;
use App\Model\Admin\Post;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Category_post;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();
        $tags = Tag::all();
        $posts = Post::where('status',1)->paginate(10);
        return view('user.article.index',compact('posts','categorys','tags'));
    }

    public function category($id){
        $categorys = Category::all();
        $tags = Tag::all();
        $category_post = Category::find($id);
        return view('user.article.category',compact('category_post','tags','categorys'));
    }

    public function etiquette($id){
        $categorys = Category::all();
        $tags = Tag::all();
        $tag_post = Tag::find($id);
        return view('user.article.tag',compact('tag_post','tags','categorys'));
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
        
        $update_post = Post::find($id);
        $i = $update_post->view;
        $update_post->view = $i + 1 ;
        $update_post->save();
        return redirect()->route('article.show',$update_post->slug);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $categorys = Category::all();
        $tags = Tag::all();
        $slugs = Post::where('slug',$slug)->first();
        return view('user.article.show',compact('slugs','categorys','tags'));
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
