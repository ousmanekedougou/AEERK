<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\Document;
use App\Model\User\Type;
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
}
