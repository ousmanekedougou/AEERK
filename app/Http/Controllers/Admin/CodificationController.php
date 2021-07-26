<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Ancien;
use App\Model\User\Etudiant;
use App\Model\Admin\Chambre;
use Illuminate\Http\Request;
use App\Model\Admin\Immeuble;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Model\User\Codification_ancien;
use App\Model\User\Codification_nouveau;
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
        // Les Etudiant qui ont codifier
        $immeubles = Immeuble::where('status',1)->first();
        $nouveau_bac = Etudiant::where(['status'=>1, 'codifier'=>1 , 'ancienete'=>1])->paginate(5);
        return view('admin.codification.index',compact('nouveau_bac','immeubles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          // Les Etudiant qui n'ont pas codifier
        $immeubles = Immeuble::where('status',2)->first();
        $immeuble2 = Immeuble::where('status',2)->latest()->first();
        $ancien_bac = Etudiant::where(['status'=>1,'codifier'=>1,'ancienete'=>2])->paginate(5);
        return view('admin.codification.index_ancien',compact('ancien_bac','immeubles','immeuble2'));
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
        $immeubles = Immeuble::all();
        foreach($immeubles as $imb){
           if ($imb->id == $id) {
               $immeubles = Immeuble::find($imb->id);
                $ancien_bac = Etudiant::where(['status'=>1,'codifier'=>1 , 'immeuble_id' => $id])->paginate(5);
                return view('admin.codification.index_ancien',compact('ancien_bac','immeubles'));
           }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $codifier_nouveau = Etudiant::where('id',$id);
        // $pdf = PDF::loadView('user.pdf', compact('codifier_nouveau'));

        // $path = public_path('pdf/');
        // $fileName =  $codifier_nouveau->phone . '.' . 'pdf' ;
        // $pdf->save($path . '/' . $fileName);
        // return $pdf->download($fileName);
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
