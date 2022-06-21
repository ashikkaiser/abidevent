@component('mail::message')
# {{ $maildata['title'] }}

**Name** : {{ $maildata['name'] }}  
**Email** : {{ $maildata['email'] }}  
**Event** : {{ $maildata['event'] }}  
**Paid For** : {{ $maildata['paid_for'] }}  
**Amount** : {{ $maildata['amount'] }}  

@component('mail::button', ['url' => $maildata['url'] ])
View Receipt
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
