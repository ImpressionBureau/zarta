@extends('layouts.admin', ['page_title' => 'Запись №' . $appointment->id])

@section('content')
    <section id="content">
        <h1 class="h3 mb-4">Запись № {{$appointment->id}}</h1>

        <form action="{{ route('admin.appointments.update', $appointment) }}" method="post">
            @csrf
            @method('patch')
            <h4 class="mb-3">Имя</h4>
            <h5 class="position-relative">
                <div class="indicator bg-success"></div>
                <p class="mb-1">
                    {{ $appointment->name }}
                </p>
            </h5>
            <p class="font-weight-bold mb-2">Почта</p>
            <p>
                <a class="mb-1 dashed"
                   href="mailto:{{ $appointment->email }}">{{ $appointment->email }}</a>
            </p>
            <p class="font-weight-bold mb-2">Телефон</p>
            <p class="mb-1">{{ $appointment->phone }}</p>
            @if(count($appointment->service_id))
                    {{$appointment->title}}
            @endif
            <div class="form-group">
                <label for="comment" class="font-weight-bold mb-2">Комментарий</label>
                <textarea class="form-control" id="comment"
                          name="comment">{{ old('comment') ?? $order->comment }}</textarea>
            </div>
            <div class="row">
                <div class="col-auto">
                    <button class="btn btn-primary">
                        Обновить
                    </button>
                </div>
                <div class="col-auto">
                    <select name="status"
                            class="form-control {{ $appointment->status == 'declined' ? 'border-danger' : ($appointment->status == 'completed' ? 'border-success' : '') }}">
                        @foreach(\App\Models\Appointment::$STATUSES as $status)
                            <option value="{{ $status }}"
                                    {{ $appointment->status == $status ? 'selected' : '' }}>
                                {{$status}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </section>
@endsection