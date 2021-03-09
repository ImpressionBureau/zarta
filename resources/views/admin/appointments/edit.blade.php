@extends('layouts.admin', ['page_title' => 'Запись №' . $appointment->id])

@section('content')
    <section id="content">
        <h1 class="h3 mb-4">Запись № {{$appointment->id}}</h1>

        <form action="{{ route('admin.appointments.update', $appointment) }}" method="post">
            @csrf
            @method('patch')

            <p><strong>Имя:</strong> {{ $appointment->name }}</p>
            <p><strong>Телефон:</strong> {{ $appointment->phone }}</p>
            <p><strong>E-mail:</strong> {{ $appointment->email }}</p>

            @if($appointment->service)
                <p class="font-weight-bold mb-1">Страница:</p>
                <p>{{optional($appointment->service)->title}}</p>
            @endif
            <div class="form-group">
                <label for="comment" class="font-weight-bold mb-2">Комментарий</label>
                <textarea class="form-control" id="comment"
                          name="comment">{{ old('comment') ?? $appointment->comment }}</textarea>
            </div>
            <div class="row">
                <div class="col-auto">
                    <button class="btn btn-primary">
                        Обновить
                    </button>
                </div>
                <div class="col-auto">
                    <select name="status"
                            class="form-control {{ $appointment->status == 'no_dial' ? 'border-danger' : ($appointment->status == 'completed' ? 'border-success' : '') }}">
                        @foreach(\App\Models\Appointment::$STATUSES as $status)
                            <option value="{{ $status }}"
                                    {{ $appointment->status == $status ? 'selected' : '' }}>
                                {{ __('statuses.' . $status) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </section>
@endsection
