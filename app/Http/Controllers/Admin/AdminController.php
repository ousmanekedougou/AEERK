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
        if (Auth::guard('admin')->user()->can('admins.index')) 
        {
            $admins = Admin::all();
            return view('admin.admin.index',compact('admins'));
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
            $roles = Role::all();
            $commission = Commission::all();
            return view('admin.admin.add',compact('roles','commission'));
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
                'name' => 'required|string',
                'email' => 'required|unique:admins',
                'phone' => 'required|unique:admins|numeric',
                'password' => 'required|min:6|string',
                'image' => 'required|image | mimes:jpeg,png,jpg,gif,ijf',
            ]);
        
            $request['password'] = Hash::make($request->password);
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
            $admins = Admin::find($id);
            $roles = Role::all();
            return view('admin.admin.edit',compact(['admins','roles']));
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
                // dd($request->role);
                $request->status? : $request['status'] = 0 ;
                $user = Admin::where('id',$id)->update($request->except('_token','_method','role'));
                Admin::find($id)->roles()->sync($request->role);
                Flashy::success('Votre administrateur a ete modifier');
                return redirect()->route('admin.admin.index');
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
                Admin::where('id',$id)->delete();
                return back();
            }
                        
            return redirect(route('admin.home'));
        }
}
