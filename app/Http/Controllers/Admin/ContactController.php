<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Contact;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index() {
        $contact_all = Contact::All();
        return view('admin.contact.index',compact('contact_all'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_contact =  Contact::find($id);
        return view('admin.contact.show',compact('show_contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $create_message = Contact::find($id);
        return view('admin.contact.compose',compact('create_message'));
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
        $update_contact = Contact::find($id);
        $update_contact->status = 1;
        $update_contact->save();
        return redirect()->route('admin.contact.show',$update_contact->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        Flashy::success('Le Message a ete supprimer');
        return redirect()->route('admin.contact.index');
    }
}
