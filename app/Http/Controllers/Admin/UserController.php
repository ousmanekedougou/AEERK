<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\User;
use App\Model\Admin\Role;
use App\Model\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
        $users = Admin::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
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
            'password' => 'required|min:6|string',
            'phone' => 'required|unique:admins|numeric',
        ]);
        $request['password'] = bcrypt($request->password);
        $user = Admin::create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('user.index'));
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
        $users = Admin::find($id);
        $roles = Role::all();
        return view('admin.user.edit',compact(['users','roles']));
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
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'required|numeric',
        ]);
        $request->status? : $request['status'] = 0 ;
        $user = Admin::where('id',$id)->update($request->except('_token','_method','role'));
        Admin::find($id)->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message','Admin updated succuffly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id',$id)->delete();
        return redirect()->back()->with('message','Admin deleted succuffly');
    }
}
