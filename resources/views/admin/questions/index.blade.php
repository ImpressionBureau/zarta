@extends('layouts.admin', ['app_title' => 'Вопросы и ответы'])

@section('content')
    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Вопросы и ответы</h1>
        <div class="ml-3">
            <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">
                Создать вопрос
            </a>
        </div>
    </div>
    @forelse($questions as $question)
        <article class="item">
            <div class="item-id">{{ $question->id }}</div>

            <div class="item-body">
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.questions.edit', $question) }}" class="underline">
                            {{ $question->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $question->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.questions.edit', $question) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.questions.destroy', $question) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $question->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.questions.destroy', $question) }}"
                          id="delete-form-{{ $question->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Работников пока нет!
    @endforelse
    {{ $questions->links() }}
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
