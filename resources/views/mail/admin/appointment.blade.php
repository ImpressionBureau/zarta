@component('mail::message')
# Запись на прийом:
**Имя:** {{$appointment->name}}
**Телефон:** {{$appointment->phone}}
**E-mail:** {{$appointment->email}}
@if($appointment->service)
<br>
**Страница записи:** {{$appointment->service->title}}
@endif
@endcomponent
