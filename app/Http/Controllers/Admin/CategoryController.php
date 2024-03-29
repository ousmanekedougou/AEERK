<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Category;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
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
        $categorys = Category::paginate(10);
        return view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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
        $category = new Category;
        $category->name = $request->name;
        $vowels = array(":", ",", "-", "/", "%", ";", "(", ")", "[", "]","_","è","é","{","}");
        $category->slug = str_replace($vowels,'',$request->slug);
        $category->save();
        Toastr::success('Votre Categorie a ete ajoute', 'Ajout Category', ["positionClass" => "toast-top-right"]);
        return redirect(route('admin.category.index'));
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
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
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
        $category = Category::find($id);
        $category->name = $request->name;
        $vowels = array(":", ",", "-", "/", "%", ";", "(", ")", "[", "]","_","è","é","{","}");
        $category->slug = str_replace($vowels,'',$request->slug);
        $category->save();
        Toastr::success('Votre Categorie a ete modifier', 'Modification Category', ["positionClass" => "toast-top-right"]);
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        Toastr::success('Votre Categorie a ete supprimer', 'Suppression Category', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
