@extends('layouts.admin', ['app_title' => 'Новая категория'])

@section('content')
    <section>
        <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <block-editor title="Новая категория">
                        @foreach(config('app.locales') as $lang)

                            <fieldset slot="{{ $lang }}">
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input id="title"
                                           type="text"
                                           name="{{$lang}}[title]"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           value="{{ old($lang.'.title') }}"
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
                                           value="{{ old($lang.'.content') }}">
                                    @if($errors->has('content'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first('content') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-0">
                                    <label for="body">Описание</label>
                                    <wysiwyg class="mb-0" id="body"
                                             content="{{ old('body') }}"
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
                                   type="checkbox" value="1" id="published">
                            <label class="custom-control-label" for="published">
                                Опубликовать
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <image-uploader name="category" ratio="67%"></image-uploader>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">
                    Сохранить
                </button>
            </div>
        </form>
    </section>



@endsection
