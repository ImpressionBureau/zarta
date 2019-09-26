@extends('layouts.admin', ['app_title' => $article->title])

@section('content')
    <form action="{{ route('admin.articles.update', $article) }}" method="post" enctype="multipart/form-data">
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
                                       value="{{ old($lang.'.title') ?? $article->translate('title', $lang) }}"
                                       required>
                                @if($errors->has('title'))
                                    <div class="mt-1 text-danger">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>

                            <wysiwyg class="mb-0"
                                     content="{{ old('body') ?? $article->translate('content', $lang)['body'] }}"
                                     name="{{$lang}}[content][body]"
                                     label="Текст новости"></wysiwyg>
                        </fieldset>

                    @endforeach
                </block-editor>
                <hr class="my-5">

            </div>
            <div class="col-md-4">

                <multi-uploader
                        class="mt-4"
                        :src="{{ json_encode($article->images_list) }}"></multi-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Обновить
            </button>
        </div>
    </form>

@endsection
