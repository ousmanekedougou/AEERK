@component('mail::message')
# AEERK KEDOUGOU
Bonjour M.{{$msg->prenom}} {{$msg->nom}}
{% if $msg->status == 1 %}
    

@component('mail::panel')
Le Bureau de l'AEERK vous informe que vos document ont ete valide <br>
Vous pouver desormer codifier en ligine via le lien ci dessous
@endcomponent


@component('mail::button', ['url' => 'http://localhost:8000/codification'])
Veullez Vous Codifier
@endcomponent
{% elif $msg->status == 2 %}

@component('mail::panel')
Le Bureau de l'AEERK vous informe que vos document ont ete refuse <br>
Vous pouvez vous raprocher au pres du bureau pour plus d'information
@endcomponent
{% endif %}
Merci,<br>
<!-- {{ config('app.name') }} -->
@endcomponent
