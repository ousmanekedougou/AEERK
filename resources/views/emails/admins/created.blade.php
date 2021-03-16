@component('mail::message')
# AEERK KEDOUGOU
Salut 
@if($msg->genre == 1)
    M.{{$msg->prenom}} {{$msg->nom}}
@elseif($msg->genre == 2)
    Mme.{{$msg->prenom}} {{$msg->nom}}
@endif
@if($msg->status == 1 && $msg->codifier != 1 && $msg->prix == 0)
    
@component('mail::panel')
    Le Bureau de l'AEERK vous informe que vos document ont ete valide <br>
    Vous pouver desormer codifier en ligine via le lien ci dessous
    <br>
    Remarque : Apres avoir codifier nous vous prions de verifier votre compte email pour recevoire la notification qui vous informera votre chambre.
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8000/codification'])
    Veullez Vous Codifier
@endcomponent

@elseif($msg->status == 2 )

@component('mail::panel')
    Le Bureau de l'AEERK vous informe que vos document ont ete refuse <br>
    Vous pouvez vous raprocher au pres du bureau pour plus d'information <br>
    Nous contactez sur le 77000000 / 7800000 ou l'adresse suivante aeerk@gmail.com. 
@endcomponent

@elseif($msg->status == 1 && $msg->codifier == 1 && $msg->prix > 0)
    @component('mail::panel')
            Nous vous informons que vous avez ete codifier a 
        @foreach($msg->chambre->immeubles as $ac_imb)
            {{$ac_imb->name}}
        @endforeach
            a la chambre {{$msg->chambre->nom }}
    @endcomponent
@endif
Merci,Le President de la commission sociale
<!-- {{ config('app.name') }} -->
@endcomponent
