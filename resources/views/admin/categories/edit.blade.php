@extends('layouts.admin', ['app_title' => $category->title])

@section('content')
    <form action="{{ route('admin.categories.update', $category) }}" method="post" enctype="multipart/form-data">
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
                                       value="{{ old($lang.'.title') ?? $category->translate('title', $lang) }}"
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
                                >{{ old($lang.'.content') ?? $category->translate('content', $lang)['description'] }}</textarea>
                                @if($errors->has('content'))
                                    <div class="mt-1 text-danger">
                                        {{ $errors->first('content') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <label for="body">Описание</label>
                                <wysiwyg class="mb-0" id="body"
                                         content="{{ old('body') ?? $category->translate('content', $lang)['body'] ?? ''}}"
                                         name="{{$lang}}[content][body]"
                                         label="Описание"></wysiwyg>
                            </div>
                        </fieldset>

                    @endforeach
                </block-editor>

                <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="published" value="0">
                        <input class="custom-control-input" name="published"
                               type="checkbox" value="1" id="published" {{ $category->published ? ' checked' : '' }}>
                        <label class="custom-control-label" for="published">
                            Опубликовать
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <image-uploader ratio="67%" name="category"
                                image-id="{{ optional($category->getFirstMedia('category'))->id }}"
                                src="{{ $category->getFirstMediaUrl('category') }}"></image-uploader>
            </div>

        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection
