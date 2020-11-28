<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Slide;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        //
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
        Flashy::success('votre image slider a ete ajouter');
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
       if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Slider');
        }else if ($request->hasFile('')) {
            $imageName = $update_slider->image;
        }
        $update_slider->image = $imageName;
        $update_slider->role = $request->role;
        $update_slider->save();
        Flashy::success('votre image slider a ete modifier');
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
        Slide::find($id)->delete();
        Flashy::success('Votre Image slider a ete supprimer');
        return back();
    }
}
