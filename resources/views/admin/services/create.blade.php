@extends('layouts.admin', ['app_title' => 'Новая услуга'])

@section('content')
    <section>
        <form action="{{ route('admin.services.store') }}" method="post">
            @csrf


            <block-editor title="Новая услуга">
                @foreach(config('app.locales') as $lang)

                    <fieldset slot="{{ $lang }}">
                        <div class="form-group">
                            <label for="title">Название услуги</label>
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

            <select class="form-control position-relative mt-3" name="category_id" id="category_id" required>
                <option value="" disabled selected>Выберите отделение</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <div class="mt-4">
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
                <button class="btn btn-primary">
                    Сохранить
                </button>
            </div>
        </form>
    </section>
@endsection
