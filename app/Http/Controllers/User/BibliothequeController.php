<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Admin\Faculty;
use App\Model\User\Document;
use App\Model\User\Type;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BibliothequeController extends Controller
{
    public function index(){
        $facultes = Faculty::all();
        return view('user.bibliotheque.index',compact('facultes'));
    }

    public function show($id){
        $documents = Document::where('faculty_id',$id)->where('status',1)->paginate(10);
        return view('user.bibliotheque.show',compact('documents'));
    }

    public function search(){
        request()->validate([
            'q' => 'required|min:3'
        ]);
        $q = request()->input('q');
        if ($q != null ) {
            $documents = Document::where('title',$q)->orWhere('subject',$q)->orWhere('desc',$q)->get();
            if ($documents->count() > 0) {
                return view('user.bibliotheque.show',compact('documents'));
            }else {
                Toastr::warning('Il n\'y a pas de resultat pour cette recherche', 'Resultat Recherche', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }else {
           Toastr::warning('Il n\'y a pas de resultat pour cette recherche', 'Resultat Recherche', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
