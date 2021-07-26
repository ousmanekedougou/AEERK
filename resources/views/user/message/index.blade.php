
  @if (session('success'))
    <div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content bg-success text-white">
          <div class="modal-header">
            @if(session('name'))
              <h5 class="modal-title text-white">{!! session('name') !!}</h5>
						@endif
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p class="text-bold">
              Votre inscription a bien ete enregistre ,un sms vous sera envoyer pour vous faire part de l'avis du bureau sur vos documents.
            </p>
            <h6 class="text-white">Information : </h6>
            <p>
              La codification en ligne est maintenant displonible si toute fois vos documents ont ete accepter un lien vous sera envoyer sur votre addresse email. <br>
              D'ici la passez une bonne fin de journnee, <br>
              Cordialement le Bureau
            </p>
            
          </div>
        </div>
      </div>
    </div>
  @endif


  <div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Note d'information pour les codifications</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p class="text-bold">
              Chers etudiants,<br>
              L'AEERK (Association Des Eleves Et Etudiants Ressortissants De Kedougou) lance sa phase d'inscription pour les codifications.
            </p>
            <p>
              Pour plus d'information pour les modalites de codification veuillez clicker sur <a href="{{ route('systeme.index') }}">les information demander</a>.
              <br> Si toute fois vous avez assimiler ce programme vous pouvez vous inscrire selon votre status en clickant les lien ci-dessous
            </p>
            
          </div>
           <div class="modal-footer text-center">
             <div style="display: flex;width:100%">
              <p style="width: 50%;">
                 <a href="{{ route('nouveau.index') }}" class="">Inscription Nouveaux</a>
              </p>
              
               <p style="width: 50%;">
                 <a href="{{ route('ancien.index') }}" class="">Inscription Anciens</a>
               </p>
             </div>
          </div>
        </div>
      </div>
  </div>