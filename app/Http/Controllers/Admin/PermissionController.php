<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PermissionController extends Controller
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
        $permission = Permission::paginate(4);
        return view('admin.permission.index',compact('permission'));
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
        return view('admin.permission.create');
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
            'name' => 'required|max:50',
            'for' => 'required'
        ]);
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->for = $request->for;
        $permission->save();
        return redirect(route('admin.permission.index'))->with('message','Permission added succefully');
        }
        return redirect(route('admin.home'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admins\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admins\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('admin')->user()->can('admins.update')) 
        {
        $permission = Permission::find($id);
        return view('admin.permission.edit',compact('permission'));
        }
        return redirect(route('admin.home'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admins\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if (Auth::guard('admin')->user()->can('admins.update')) 
        {
        $this->validate($request,[
            'name' => 'required|max:50',
            'for' => 'required|max:50'
        ]);
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->for = $request->for;
        $permission->save();
        return redirect(route('admin.permission.index'))->with('message','Permission updated succefully');
        }
        return redirect(route('admin.home'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admins\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->can('admins.delete')) 
        {
        Permission::where('id',$id)->delete();
        return redirect()->back()->with('message','Permission deleted succefully');
        }
        return redirect(route('admin.home'));
    }
}
