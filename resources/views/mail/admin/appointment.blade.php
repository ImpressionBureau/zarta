<h3>Запись на прийом:</h3>
<h4>Имя:</h4>
<p>{{$appointment->name}}</p>
<h4>Телефон:</h4>
<p>{{$appointment->phone}}</p>
<h4>E-mail:</h4>
<p>{{$appointment->email}}</p>
@if($appointment->service_id)
    <h4>На услугу:</h4>
    <p>{{$appointment->service->title}}</p>
@endif