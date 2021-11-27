@component('mail::message')
# Hey President
-{{ $nom }}
-{{ $email }}
-{{ $subject }}
@component('mail::panel')
{{ $msg }}
@endcomponent

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent

@component('mail::button', ['url' => ''])
Veilliez Vous Codifier
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
