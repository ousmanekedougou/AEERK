<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
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
        //
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
        //
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
