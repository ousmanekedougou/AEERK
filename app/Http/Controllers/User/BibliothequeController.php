<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Document;
use App\Model\User\Type;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BibliothequeController extends Controller
{
    public function index(){
        $categories = Type::all();
        $documents = Document::where('status',1)->paginate(10);
        return view('user.bibliotheque.index',compact('documents','categories'));
    }

    public function show($slug){
        $categories = Type::all();
        $type = Type::where('slug',$slug)->first();
        $documents = Document::where('type_id',$type->id)->where('status',1)->paginate(10);
        return view('user.bibliotheque.index',compact('documents','categories'));
    }

    public function search(){
        request()->validate([
            'q' => 'required|min:3'
        ]);
        $q = request()->input('q');
        if ($q != null ) {
            $documents = Document::where('title',$q)->orWhere('subject',$q)->orWhere('desc',$q)->get();
            if ($documents->count() > 0) {
                $categories = Type::all();
                return view('user.bibliotheque.index',compact('documents','categories'));
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
