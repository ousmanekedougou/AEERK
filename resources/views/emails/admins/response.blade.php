    @component('mail::message')
    # AEERK KEDOUGOU
    @if($msg->genre == 1)
        M.{{$msg->prenom}} {{$msg->nom}}
    @elseif($msg->genre == 2)
        Mme.{{$msg->prenom}} {{$msg->nom}}
    @endif
        
    @component('mail::panel')
        Pour l'objet : {{ $msg->subject }} <br>
        {{$msg->message}}
    @endcomponent
    Mercie,<br>
    <!-- {{ config('app.name') }} -->
    @endcomponent
