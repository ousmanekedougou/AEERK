<?php

namespace App\Http\Controllers\Admin;
use App\Model\Admin\Admin;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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
        $admins = Admin::where('id',Auth::user()->id)->first();
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
            'password' => 'confirmed'
        ]);
        $imageName = '';
        $password_actuel = '';
        $admin_update = Admin::where('id',Auth::user()->id)->first();
        $admin_update->name = $request->name;
        $admin_update->email = $request->email;
        $admin_update->phone = $request->phone;
        if($request->password == Null){
            $password_actuel = $admin_update->password;
        }else{
            $password_actuel = Hash::make($request->password);
        }
        $admin_update->password = $password_actuel;
        if($request->image == Null){
            $imageName = $admin_update->image;
        }else{

            if($request->hasFile('image')){
                $imageName = $request->image->store('public/Admin');
            }
        }
        $admin_update->image = $imageName;
        $admin_update->save();
        Flashy::success('Votre Profile a ete modifier');
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
