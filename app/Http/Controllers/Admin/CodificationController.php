<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Etudiant;
use App\Model\Admin\Chambre;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Str;
class CodificationController extends Controller
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
        if (Auth::guard('admin')->user()->can('codifier.index')) 
        {
            // Les Etudiant qui ont codifier
            $immeubles = Immeuble::where('status',1)->first();
            $nouveau_bac = Etudiant::where(['status'=>1, 'codifier'=>1 , 'ancienete'=>1])->paginate(5);
            return view('admin.codification.index',compact('nouveau_bac','immeubles'));
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
        if (Auth::guard('admin')->user()->can('codifier.create')) 
        {
            // Les Etudiant qui n'ont pas codifier
            $immeubles = Immeuble::where('status',2)->first();
            $immeuble2 = Immeuble::where('status',2)->latest()->first();
            $ancien_bac = Etudiant::where(['status'=>1,'codifier'=>1,'ancienete'=>2])->paginate(5);
            return view('admin.codification.index_ancien',compact('ancien_bac','immeubles','immeuble2'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        if (Auth::guard('admin')->user()->can('codifier.index')) 
        {
            $immeubles = Immeuble::all();
            foreach($immeubles as $imb){
                if ($imb->id == $id) {
                    $immeubles = Immeuble::find($imb->id);
                        $ancien_bac = Etudiant::where(['status'=>1,'codifier'=>1 , 'immeuble_id' => $id])->paginate(5);
                        return view('admin.codification.index_ancien',compact('ancien_bac','immeubles'));
                }
            }
        }
         return redirect(route('admin.home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
       

    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
