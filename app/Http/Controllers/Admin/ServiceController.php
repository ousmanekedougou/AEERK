<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Service;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
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
        $service_all = Service::all();
        return view('admin.service.index',compact('service_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'libele' => 'required|string',
            'icon' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'resume' => 'required|string',
        ]);

        $add_service = new Service();
        if ($request->hasFile('icon')) {
            $imageName = $request->icon->store('public/service');
        }

        $add_service->libele = $request->libele;
        $add_service->description = $request->resume;
        $add_service->status = $request->status;
        $add_service->icon = $imageName;
        $add_service->save();
        Flashy::success('Votre service a ete ajoute');
        return redirect()->route('admin.service.index');
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
        $edit_service = Service::find($id);
        return view('admin.service.edite',compact('edit_service'));
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
        $update_service = Service::find($id);
        if ($request->hasFile('icon')) {
            $imageName = $request->icon->store('public/service');
        }elseif ($request->icon == Null){
            $imageName = $update_service->icon;
        }
        $update_service->libele = $request->libele;
        $update_service->description = $request->resume;
        $update_service->status = $request->status;
        $update_service->icon = $imageName;
        $update_service->save();
        Flashy::success('Votre Service a ete modifier');
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        Flashy::success('Votre service a ete supprimer');
        return back();
    }
}
