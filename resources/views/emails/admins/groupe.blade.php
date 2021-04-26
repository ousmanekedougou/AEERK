    @component('mail::message')

        # AEERK KEDOUGOU
        @component('mail::panel')
            Pour l'objet : {{ $subject }} <br>
            {{$msg}}
        @endcomponent
        Mercie,<br>
        
    @endcomponent
