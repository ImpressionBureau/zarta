@extends('layouts.admin', ['app_title' => $page->title])

@section('content')
    <section>
        <form action="{{ route('admin.pages.update', $page) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-md-8">
                    <block-editor title="Новая запись">
                        @foreach(config('app.locales') as $lang)
                            <fieldset slot="{{ $lang }}">
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input id="title"
                                           type="text"
                                           name="{{$lang}}[title]"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           value="{{ old($lang.'.title') ?? $page->translate('title', $lang) }}"
                                           required>
                                    @if($errors->has('title'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Краткое описание</label>
                                    <input id="description"
                                           type="text"
                                           name="{{$lang}}[content][description]"
                                           class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                           value="{{ old($lang.'.content') ?? $page->translate('content', $lang)['description'] }}">
                                    @if($errors->has('content'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first('content') }}
                                        </div>
                                    @endif
                                </div>
                            </fieldset>

                        @endforeach
                    </block-editor>
                    <hr class="my-5">
                </div>
                <div class="col-md-4">
                    <image-uploader ratio="67%" name="page"
                                    image-id="{{ optional($page->getFirstMedia('page'))->id }}"
                                    src="{{ $page->getFirstMediaUrl('page') }}"></image-uploader>
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary">
                    Обновить
                </button>
            </div>
        </form>
    </section>
@endsection
