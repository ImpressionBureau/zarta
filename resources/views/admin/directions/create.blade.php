@extends('layouts.admin', ['app_title' => 'Новое направление работы'])

@section('content')
    <section>
        <form action="{{ route('admin.directions.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <block-editor title="Новый метод лечения">
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
                                <label for="navigation">Навигация по статье</label>
                                <wysiwyg class="mb-0" id="navigation"
                                         content="{{ old('navigation') }}"
                                         name="{{$lang}}[content][navigation]"
                                         label="Навигация по статье"></wysiwyg>
                                <label for="body">Текст метода лечения</label>
                                <wysiwyg class="mb-0" id="body"
                                         content="{{ old('body') }}"
                                         name="{{$lang}}[content][body]"
                                         label="Текст метода лечения"></wysiwyg>
                            </fieldset>

                        @endforeach
                    </block-editor>
                    <hr class="my-5">
                    <select class="form-control position-relative mt-3" name="category_id" id="category_id" required>
                        <option value="" disabled selected style='display:none;'>Выберите категорию</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <image-uploader name="direction" ratio="67%"></image-uploader>
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
