<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::guard('admin')->user()->can('admins.index')) 
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
        return redirect(route('admin.home'));
    }
}
