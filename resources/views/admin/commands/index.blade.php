@extends('layouts.admin', ['app_title' => 'Наша комманда'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Наша комманда</h1>
        <div class="ml-3">
            <a href="{{ route('admin.commands.create') }}" class="btn btn-primary">
                Создать нового работника
            </a>
        </div>
    </div>
    @forelse($commands as $command)
        <article class="item">
            <div class="item-id">{{ $command->id }}</div>

            <div class="item-body">
                <div class="col-auto">

                    @if ($command->hasMedia('command'))
                        <img src="{{ $command->getFirstMediaUrl('command', 'thumb') }}" class="rounded-circle"
                             alt="{{ $command->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $command->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.commands.edit', $command) }}" class="underline">
                            {{ $command->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $command->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.commands.edit', $command) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.commands.destroy', $command) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $command->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.commands.destroy', $command) }}"
                          id="delete-form-{{ $command->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Работников пока нет!
    @endforelse
    {{ $commands->links() }}
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
