@component('mail::message')
# Hey President
-{{ $msg->nom }}
-{{ $msg->email }}
-{{ $msg->subject }}
@component('mail::panel')
{{ $msg->message }}
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
