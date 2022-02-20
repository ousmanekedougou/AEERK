<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Role;
use App\Model\Admin\Admin;
use Illuminate\Http\Request;
use App\Model\Admin\Commission;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth:admin','isAdmin']);

    }
    
    public function index()
    {
        $admins = Admin::all();
        $commission = Commission::all();
        return view('admin.admin.index',compact('admins','commission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $commission = Commission::all();
        return view('admin.admin.add',compact('roles','commission'));
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
            'name' => 'required|string',
            'email' => 'required|unique:admins',
            'phone' => 'required|unique:admins|numeric',
            'role' => 'required|numeric',
            'password' => 'required|min:6|string',
            'image' => 'required|image | mimes:jpeg,png,jpg,gif,ijf',
        ]);
        if($request->hasFile('image')){
            $imageName = $request->image->store('public/Admin');
        }
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->is_admin = $request->role;
        $admin->image = $imageName;
        $admin->status = 1;
        $admin->save();
        Flashy::success('Votre administrateur a ete ajoute');
        return redirect()->route('admin.admin.index');
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
        $admins = Admin::find($id);
        $commission = Commission::all();
        $roles = Role::all();
        return view('admin.admin.edit',compact(['admins','roles','commission']));
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
            $update_admin = Admin::where('id',$id)->first();
            $update_admin->is_admin = $request->role;
            $update_admin->status = $request->status;
            $update_admin->save();
            Flashy::success('Votre administrateur a ete modifier');
            return redirect()->route('admin.admin.index');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $admin_delete = Admin::where('id',$id)->delete();
            $imgdel = $admin_delete->image;
            Storage::delete($imgdel); 
            $admin_delete->delete();
            return back();
        }
}
