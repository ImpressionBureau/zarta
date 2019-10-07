@extends('layouts.admin', ['page_title' => 'Записи на прием'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Записи на прием</h1>
    </div>
    @forelse($appointments as $appointment)
        <article class="item">
            <div class="item-id">{{ $appointment->id }}</div>

            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.appointments.edit', $appointment) }}" class="underline">
                            {{ $appointment->name }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $appointment->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.appointments.edit', $appointment) }}"
                           class="btn btn-sm btn-dark">
                            <svg width="16" height="16" style="fill: #fff;">
                                <use xlink:href="#pen"></use>
                            </svg>
                        </a>
                    </p>
                </div>
            </div>
        </article>
    @empty
        Записей на прийом пока нет!
    @endforelse
    {{ $appointments->links() }}
@endsection

