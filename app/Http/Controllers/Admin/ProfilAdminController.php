<?php

namespace App\Http\Controllers\Admin;
use App\Model\Admin\Admin;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilAdminController extends Controller
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
        $admins = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view('admin.profile.show',compact('admins'));
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
       $validator = $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'required|numeric',
        ]);
        $admin_update = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $admin_update->name = $request->name;
        $admin_update->email = $request->email;
        $admin_update->phone = $request->phone;
        $admin_update->save();
        Flashy::success('Vos informations ont ete modifier');
        return back();
    }

    public function update_password(Request $request , $id){
        $validator = $this->validate($request,[
            'password' => 'required|confirmed'
        ]);
        $admin_updat_password = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $admin_updat_password->password = Hash::make($request->password);
        $admin_updat_password->save();
         Flashy::success('Votre mot de passe a ete modifier');
        return back();
    }

    public function update_image(Request $request , $id){
        $admin_updat_image = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $imageName = '';
        $imgdel = $admin_updat_image->image;
        if($request->image == Null){
            $imageName = $admin_updat_image->image;
        }else{

            if($request->hasFile('image')){
                $imageName = $request->image->store('public/Admin');
                Storage::delete($imgdel); 
            }
        }
        $admin_updat_image->image = $imageName;
        $admin_updat_image->save();
         Flashy::success('Votre image de profile a bien ete modifier');
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
        //
    }
}
