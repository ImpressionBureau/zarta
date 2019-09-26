@extends('layouts.admin', ['app_page_title' => 'Отзывы'])

@section('content')
    <form action="{{ route('admin.reviews.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <block-editor title="Новая статья">
                    @foreach(config('app.locales') as $lang)

                        <fieldset slot="{{ $lang }}">
                            <div class="form-group">
                                <label for="title">Имя</label>
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

                            <wysiwyg class="mb-0"
                                     content="{{ old('body') }}"
                                     name="{{$lang}}[content][body]"
                                     label="Текст отзыва"></wysiwyg>
                        </fieldset>
                    @endforeach
                </block-editor>
                <div class="form-group">
                    <label for="video">Ссылка на видео с youtube</label>
                    <input type="text" name="video" class="form-control"
                           placeholder="https://youtube.com/..." value="{{ old('video') }}">
                </div>
                <div class="form-group">
                    <label for="facebook">Ссылка facebook</label>
                    <input type="text" name="facebook" class="form-control"
                           placeholder="https://facebook.com/..." value="{{ old('facebook') }}">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="published" value="0">
                        <input class="custom-control-input" name="published"
                               type="checkbox" value="1" id="published">
                        <label class="custom-control-label" for="published">
                            Опубликовать
                        </label>
                    </div>
                </div>
                <hr class="my-5">
            </div>
            <div class="col-md-4">
                <label for="review">Аватарка</label>
                <image-uploader name="review" id="review" ratio="67%"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>
@endsection
