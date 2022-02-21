<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\User;
use App\Model\Admin\Role;
use App\Model\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
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
        Toastr::success('Votre admin a ete ajouter','Ajout Admin', ["positionClass" => "toast-top-right"]);
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
        Admin::where('id',$id)->update($request->except('_token','_method','role'));
        Toastr::success('Votre admin a ete modifier','Modification Admin', ["positionClass" => "toast-top-right"]);
        return redirect(route('user.index'));
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
        Toastr::success('Votre admin a ete supprimer','Suppression Admin', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
