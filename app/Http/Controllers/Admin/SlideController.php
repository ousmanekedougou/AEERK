<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Slide;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
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
        $sl = Slide::all();
        $slider = [];
        $slider_login = [];
        $slider_ins = [];
        $slider_contact = [];
        foreach ($sl as $sle) {
            if($sle->role == 1){
                $slider[] = $sle;
            }elseif ($sle->role == 2) {
                $slider_login[] = $sle;
            }elseif ($sle->role == 3) {
                $slider_ins[] = $sle;
            }elseif ($sle->role == 4) {
                $slider_contact[] = $sle;
            }
        }
        return view('admin.gallery.index',compact('slider','slider_ins','slider_login','slider_contact','sl'));
     
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
        $validator = $this->validate($request , [
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'role' => 'required|string'
        ]);

        $add_slider = new Slide;
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Slider');
        }
        $add_slider->image = $imageName;
        $add_slider->role = $request->role;
        $add_slider->save();
        Toastr::success('Votre image slider a ete ajouter','Ajout Image', ["positionClass" => "toast-top-right"]);
        return back();
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
        $validator = $this->validate($request , [
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'role' => 'required|string'
        ]);

        $update_slider = Slide::find($id);
        $imageName = '';
        $imgdel = $update_slider->image;
       if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Slider');
            Storage::delete($imgdel); 
        }else if ($request->hasFile('')) {
            $imageName = $update_slider->image;
        }
        $update_slider->image = $imageName;
        $update_slider->role = $request->role;
        $update_slider->save();
        Toastr::success('Votre image slider a ete modifier','Modification Image', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $silder_delete = Slide::find($id);
        $imgdel = $silder_delete->image;
        Storage::delete($imgdel); 
        $silder_delete->delete();
        Toastr::success('Votre image slider a ete supprimer','Suppression Image', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
