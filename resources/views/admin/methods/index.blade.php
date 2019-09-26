@extends('layouts.admin', ['app_title' => 'Направления работы'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Направления работы</h1>
        <div class="ml-3">
            <a href="{{ route('admin.methods.create') }}" class="btn btn-primary">
                Создать новое направление работы
            </a>
        </div>
    </div>
    @forelse($methods as $method)
        <article class="item">
            <div class="item-id">{{ $method->id }}</div>

            <div class="item-body">
                <div class="col-auto">

                    @if ($method->hasMedia('method'))
                        <img src="{{ $method->getFirstMediaUrl('method', 'thumb') }}" class="rounded-circle"
                             alt="{{ $method->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $method->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.methods.edit', $method) }}" class="underline">
                            {{ $method->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $method->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.methods.edit', $method) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.methods.destroy', $method) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $method->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.methods.destroy', $method) }}"
                          id="delete-form-{{ $method->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Методы лечения пока не созданы!
    @endforelse
    {{ $methods->links() }}
@endsection

@push('scripts')
    <script>
      function confirmDelete(id) {
        event.preventDefault();
        const agree = confirm('Уверены?');
        if (agree) {
          document.getElementById('delete-form-' + id).submit();
        }
      }
    </script>
@endpush
