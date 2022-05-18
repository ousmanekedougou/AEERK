
  @if (session('success'))
    <div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content bg-success text-white">
          <div class="modal-header">
            @if(session('name'))
              <h5 class="modal-title text-white">Salut {!! session('name') !!}</h5>
						@endif
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p class="text-bold">
              Votre inscription à bien été enrégistré ,un sms vous sera envoyer pour vous faire part de l'avis du bureau sur vos documents.
            </p>
            <h6 class="text-white">NB : </h6>
            <p>
              La codification en ligne est maintenant displonible si toute fois vos documents ont été accépter un lien vous sera envoyer sur votre adresse mail. <br>
              D'ici la passez une bonne fin de journnée, <br>
              Cordialement le Bureau
            </p>
            
          </div>
        </div>
      </div>
    </div>
  @endif

  @if (session('recrute'))
    <div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content bg-success text-white">
          <div class="modal-header">
            @if(session('etudiant_name'))
              <h5 class="modal-title text-white">{!! session('etudiant_name') !!}</h5>
						@endif
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p class="text-bold">
              Votre inscription à bien été enrégistré ,un sms vous sera envoyer pour vous faire part de l'avis du bureau sur vos documents.
            </p>
          </div>
        </div>
      </div>
    </div>
  @endif

  @if (session('codifier'))
    <div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content bg-success text-white">
          <div class="modal-header">
            @if(session('name'))
              <h5 class="modal-title text-white">Salut {!! session('name') !!}</h5>
						@endif
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p class="text-bold">
              Votre codification dans @if(session('immeuble')) {!! session('immeuble') !!} @endif à bien été enrégistré,vous étes
              a la chambre @if(session('chambre')) {!! session('chambre') !!} @endif. <br>
              La notification email que vous venez de recevoir contient les détails de votre codification et votre place dans cette chambre
            </p>
            <p>
              Vous pouvez télécharger votre reçue et le réglement de codification en cliquant sur le lien ci-dessous, <br>
              Cordialement le Bureau
            </p>
            
          </div>
          <div class="modal-footer text-center">
            <a href="https://www.aeerk-sn.com/createPdf/{{session('id')}}/{{session('codification_token')}}" style="width:100%;background-color:white;color:black;border-radius:8px;padding:10px;">
             <i class="fa fa-download"></i>  Télécharger votre reçue et le réglement
            </a>
          </div>
        </div>
      </div>
    </div>
  @endif

  {{--
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Note d'information pour les codifications</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p class="text-bold">
                Chers étudiants,<br>
                L'AEERK (Association Des Eléves Et Etudiants Ressortissants De Kédougou) lance sa phase d'inscription pour les codifications.
              </p>
              <p>
                Pour plus d'information sur les modalités de codification veuillez cliquer sur <a href="{{ route('systeme.index') }}">les informations demander</a>.
                <br> Si toute fois vous avez assimiler ce procéssus vous pouvez vous inscrire selon votre status en cliquant sur les liens ci-dessous
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
  --}}
  @if (session('error'))
    <div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content bg-danger text-white">
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">{!! session('error') !!}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif