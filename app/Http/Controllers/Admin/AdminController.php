<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Role;
use App\Model\Admin\Admin;
use Illuminate\Http\Request;
use App\Model\Admin\Commission;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class AdminController extends Controller
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
        $admins = Admin::all();
        return view('admin.admin.index',compact('admins'));
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
            'password' => 'required|min:6|string',
            'image' => 'required|image | mimes:jpeg,png,jpg,gif,ijf',
        ]);
       
        $request['password'] = bcrypt($request->password);
        $admin = Admin::create($request->all());
        if($request->hasFile('image')){
            $imageName = $request->image->store('public/Admin');
        }
        $admin->image = $imageName;
        $admin->save();
        $admin->postes()->sync($request->poste);
        $admin->roles()->sync($request->role);
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
        $roles = Role::all();
        return view('admin.admin.edit',compact(['admins','roles']));
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
            $request->status? : $request['status'] = 0 ;
            $user = Admin::where('id',$id)->update($request->except('_token','_method','role'));
            Admin::find($id)->roles()->sync($request->role);
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
            Admin::where('id',$id)->delete();
            return back();
        }
}
