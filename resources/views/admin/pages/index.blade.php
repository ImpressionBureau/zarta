@extends('layouts.admin', ['app_title' => 'Страницы'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Страницы</h1>
    </div>
    @forelse($pages as $page)
        <article class="item">
            <div class="item-id">{{ $page->id }}</div>

            <div class="item-body">
                <div class="col-auto">
                    @if($page->hasMedia('uploads'))
                        <img src="{{ $page->getFirstMediaUrl('uploads','thumb') }}" class="rounded-circle"
                             alt="{{ $page->name }}" style="width: 100px;">
                    @elseif ($page->hasMedia('page'))
                        <img src="{{ $page->getFirstMediaUrl('page','thumb') }}" class="rounded-circle"
                             alt="{{ $page->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $page->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="underline">
                            {{ $page->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Создан {{ $page->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.pages.edit', $page) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                </div>
            </div>
        </article>
    @empty
        Страницы пока не созданы!
    @endforelse
    {{ $pages->links() }}
@endsection
