<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Role;
use Illuminate\Http\Request;
use App\Model\Admin\Permission;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class RoleController extends Controller
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
        if (Auth::guard('admin')->user()->can('admins.index')) 
        {
        $roles = Role::paginate(8); 
        return view('admin.role.show',compact('roles'));
        }
        return redirect(route('admin.home'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->user()->can('admins.create')) 
        {
        $permissions = Permission::all();
        return view('admin.role.create',compact('permissions'));
        }
        return redirect(route('admin.home'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::guard('admin')->user()->can('admins.create')) 
        {
        $this->validate($request,[
            'name' => 'required|max:50|unique:roles'
        ]);
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        Flashy::success('Votre role a ete creer');
        return redirect(route('admin.role.index'));
        }
        return redirect(route('admin.home'));

   
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
        if (Auth::guard('admin')->user()->can('admins.update')) 
        {
        $permissions = Permission::all();
        $roles = Role::find($id);
        return view('admin.role.edit',compact(['roles','permissions']));
        }
        return redirect(route('admin.home'));

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
        if (Auth::guard('admin')->user()->can('admins.update')) 
        {
        $this->validate($request,[
            'name' => 'required|max:50'
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        Flashy::success('Votre role a ete Modifier');
        return redirect(route('admin.role.index'));
        }
        return redirect(route('admin.home'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->can('admins.delete')) 
        {
        Role::where('id',$id)->delete();
        Flashy::success('Votre role a ete Supprimer');
        return redirect()->back();
        }
        return redirect(route('admin.home'));
    }
}
