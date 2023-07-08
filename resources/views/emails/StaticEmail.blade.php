
@component('mail::message')
    Email Sent!

        @component('mail::button', ['url'=>'facebook.com'])
            add me first!
        @endcomponent

    Thanks,
    Web Admin
@endcomponent