@extends('layouts.admin', ['app_title' => $page->title])

@section('content')
    <section>
        <form action="{{ route('admin.pages.update', $page) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-md-8">
                    <block-editor title="Новая запись">
                        <div class="form-group">
                            <label for="slug">{{ __('Слаг') }}</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug', $page->slug) }}" required>
                        </div>

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
                                    <textarea
                                        id="description"
                                        type="text"
                                        name="{{$lang}}[content][description]"
                                        class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                    >{{ old($lang.'.content') ?? $page->translate('content', $lang)['description'] }}</textarea>
                                    @if($errors->has('content'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first('content') }}
                                        </div>
                                    @endif
                                </div>
                                @if(in_array($page->slug, ['about', 'documents']))
                                    <label for="body">Описание</label>
                                    <wysiwyg
                                        class="mb-0" id="body"
                                        content="{{ old('body') ?? $page->translate('content', $lang)['body'] ?? '' }}"
                                        name="{{$lang}}[content][body]"
                                        label="Текст новости"
                                    ></wysiwyg>
                                @endif
                            </fieldset>

                        @endforeach
                    </block-editor>
                </div>
                <div class="col-md-4">
                    @if($page->slug == 'about')
                        <multi-uploader
                            class="mt-4"
                            :src="{{ json_encode($page->images_list) }}"></multi-uploader>
                    @else
                        <image-uploader
                            ratio="67%" name="page"
                            image-id="{{ optional($page->getFirstMedia('page'))->id }}"
                            src="{{ $page->getFirstMediaUrl('page') }}"></image-uploader>

                    @endif
                </div>
            </div>
            <div class="mt-4">
                <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="show_in_slider"
                               type="checkbox" id="show_in_slider" {{ $page->show_in_slider ? ' checked' : '' }}>
                        <label class="custom-control-label" for="show_in_slider">
                            Показывать в главном слайдере
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary">
                    Обновить
                </button>
            </div>
        </form>
    </section>
@endsection
