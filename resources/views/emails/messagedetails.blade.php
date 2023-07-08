@component('mail::message')
    Email Details: {{ $details['Email']}}
    <br>
    Message Content: 
    <br>
    <p>{{ $details['Message']}}</p>
    <br>
    Thankyou,
    <br>
    {{ $details['Name']}}

@endcomponent