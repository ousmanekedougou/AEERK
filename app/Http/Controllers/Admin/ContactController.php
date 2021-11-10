<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Contact;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResponseEmailMessage;
use App\Mail\GroupeEmailMessage;
use App\Model\User\Etudiant;

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
        return view('admin.contact.groupe');
    }

    public function post(Request $request)
    {
            // dd($request->all());
            $validator = $this->validate($request,[
                'subject' => 'required|string',
                'msg' => 'required|string'
            ]);
            $email_etudian = Etudiant::select('email')->where('codifier',1)->get(); 
            foreach ($email_etudian as $sendmail_etudiant) {
                $mail = new GroupeEmailMessage($request->subject,$request->msg);
                Mail::to($sendmail_etudiant->email)->send($mail);
            }
    
            Flashy::success('Votre reponse a bien ete envoyer');
            return redirect()->route('admin.contact.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = $this->validate($request,[
            'nom' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);
        $contact = Contact::create($request->only('nom','email','subject','message'));

        Mail::to($request->email)
            ->send(new ResponseEmailMessage($contact));

        Flashy::success('Votre reponse a bien ete envoyer');
        return redirect()->route('admin.contact.index');
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
        return view('admin.contact.response',compact('create_message'));
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
