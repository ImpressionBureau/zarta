@extends('layouts.admin', ['app_title' => 'Новый вопрос'])

@section('content')
    <section>
        <form action="{{ route('admin.questions.store') }}" method="post" enctype="multipart/form-data">
            @csrf


            <block-editor title="Новая статья">
                @foreach(config('app.locales') as $lang)

                    <fieldset slot="{{ $lang }}">
                        <div class="form-group">
                            <label for="title">Вопрос</label>
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
                        <label for="body">Ответ</label>
                        <wysiwyg class="mb-0" id="body"
                                 content="{{ old('body') }}"
                                 name="{{$lang}}[content][body]"
                                 label="Ответ"></wysiwyg>
                    </fieldset>

                @endforeach
            </block-editor>
            <hr class="my-5">
            <div class="mt-4">
                <button class="btn btn-primary">
                    Сохранить
                </button>
            </div>
        </form>
    </section>
@endsection
