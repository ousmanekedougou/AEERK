<?php

   public function codifier_ancien(Request $request,$id)
    {
        $validator = $this->validate($request , [
            'immeuble' => 'required|string',
        ]);
        $prix = Solde::select('prix_ancien')->first();
        $immeuble = Immeuble::where(['id' => $request->immeuble , 'status' => 2])->first();
        $chambre_ancien = Etudiant::all();
            
        // dd($request->all());
            $immeuble_chambre = Immeuble_chambre::select('chambre_id')->where('immeuble_id',$immeuble->id)->get();
            
            foreach($immeuble_chambre as $imb_chm){
                $chambre_vide = Chambre::where('is_pleine',0)->get();
                foreach($chambre_vide as $chambres){
                    if($chambres->id == $imb_chm->chambre_id && $chambres->genre == $request->genre){
                        $ancien = Etudiant::where('chambre_id',$imb_chm->chambre_id)->get();
                        if($ancien->count() < $chambres->nombre){
                            $codifier_ancien = Etudiant::where('id',$id)->first();
                            $position = Chambre::where('id',$chambres->id)->first();
                            return redirect()->route('codification.payment',$codifier_ancien->id)
                            ->with([
                                'chambre_id' => $imb_chm->chambre_id,
                                'place' => $position
                            ]);
                            
                        }else{
                            $is_pleine = Chambre::where('id',$imb_chm->chambre_id)->first();
                            $is_pleine->is_pleine = 1;
                            $is_pleine->save();
                            $chambre_suivante = Chambre::where('is_pleine',0)->first();
                            if($chambre_suivante->id == $imb_chm->chambre_id && $chambres->genre == $request->genre){
                                $ancien = Etudiant::where('chambre_id',$imb_chm->chambre_id)->get();
                                if($ancien->count() < $chambres->nombre){
                                    $codifier_ancien = Ancien::where('id',$id)->first();
                                    $codifier_ancien->chambre_id = $imb_chm->chambre_id;
                                    $codifier_ancien->prix = $prix->prix_ancien;
                                    $codifier_ancien->codifier = 1;
                                    $codifier_ancien->save();
                                    // Nexmo::message()->send([
                                    //     'to' => '221782875971',
                                    //     'from' => '221781956168',
                                    //     'text' => 'AEERK : Salut vous avez ete codifier verifier votre compte gmail'
                                    // ]);

                                    $position = Chambre::where('id',$chambres->id)->first();
                                    $position_nombre = $position->position;
                                    $position->position = $position_nombre + 1;
                                    $position->save();

                                    Mail::to($codifier_ancien->email)
                                    ->send(new MessageEmailAeerk($codifier_ancien));
                                    Flashy::success('Vous avez ete codifier');
                                    Auth::logout();
                                    return redirect()->route('index');
                                }
                            }
                        }
                    }
                }
            }
    }


     public function payment($id)
    {
        $invoice = new CheckoutInvoice;
        $invoice->addItem("Codification", 3, 10000, 30000, "Codifier en toute securite");
        $prix = Solde::select('prix_ancien')->first();
        $invoice->setTotalAmount($prix->prix_ancien);
        $invoice->setCallbackUrl("http://localhost:8000/reponse");
        
        if($invoice->create()) {
            $codifier_ancien = Etudiant::where('id',$id)->where('status',1 )->where('codifier',0)->first();
            $chambre_id = Session::get('chambre_id');
            // dd($chambre_id);
            $codifier_ancien->chambre_id = $chambre_id;
            $codifier_ancien->prix = $prix->prix_ancien;
            $codifier_ancien->codifier = 1;
            $codifier_ancien->save();

            // Nexmo::message()->send([
            //     'to' => '221782875971',
            //     'from' => '221781956168',
            //     'text' => 'AEERK : Salut vous avez ete codifier verifier votre compte gmail'
            // ]);

            $position = Session::get('place');;
            $position_nombre = $position->position;
            $position->position = $position_nombre + 1;
            $position->save();

            Mail::to($codifier_ancien->email)
            ->send(new MessageEmailAeerk($codifier_ancien));
            Flashy::success('Vous avez ete codifier');
            Auth::logout();
            return redirect(url($invoice->getInvoiceUrl()));
        }else{
             dd($invoice->response_text);
        }
    }

   public function reponse(Request $request){
        try {
        //Prenez votre MasterKey, hashez la et comparez le résultat au hash reçu par IPN
        if($request['data']['hash'] === hash('sha512', env('PY_MASTER_KEY'))) {
        
            if ($request['data']['status'] == "completed") {
                //Faites vos traitements backoffice ici...
            }
        
            } else {
                die("Cette requête n'a pas été émise par PayDunya");
            }
        } catch(Exception $e) {
            die();
        }
    }