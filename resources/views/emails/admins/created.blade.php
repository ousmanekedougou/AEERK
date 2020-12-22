@component('mail::message')
# AEERK KEDOUGOU
Bonjour 
@if($msg->genre == 1)
M.{{$msg->prenom}} {{$msg->nom}}
@elseif($msg->genre == 2)
Mme.{{$msg->prenom}} {{$msg->nom}}
@endif
@if($msg->status == 1)
    

@component('mail::panel')
Le Bureau de l'AEERK vous informe que vos document ont ete valide <br>
Vous pouver desormer codifier en ligine via le lien ci dessous
@endcomponent


@component('mail::button', ['url' => 'http://localhost:8000/codification'])
Veullez Vous Codifier
@endcomponent

@elseif($msg->status == 2)

@component('mail::panel')
Le Bureau de l'AEERK vous informe que vos document ont ete refuse <br>
Vous pouvez vous raprocher au pres du bureau pour plus d'information
@endcomponent
@endif
Merci,<br>
<!-- {{ config('app.name') }} -->
@endcomponent
