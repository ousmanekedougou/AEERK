<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Temoignage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class TemoignageController extends Controller
{
    public function post(Request $request)
    {
        $validator = $this->validate($request , [
            'name' => 'required|string',
            'email' => 'required|email|string',
            'message' => 'required|string',
        ]);

        $add_temoignage = new Temoignage();
        $add_temoignage->nom = $request->name;
        $add_temoignage->email = $request->email;
        $add_temoignage->message = $request->message;
        $add_temoignage->status = false;
        $add_temoignage->save();
        Toastr::success('Merci de nous faire part de votre avis', 'Avis Message', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
