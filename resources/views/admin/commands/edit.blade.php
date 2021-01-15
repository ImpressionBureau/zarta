@extends('layouts.admin', ['app_title' => $command->title])

@section('content')
    <section>
        <form action="{{ route('admin.commands.update', $command) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-md-8">
                    <block-editor title="Новый работник">
                        @foreach(config('app.locales') as $lang)

                            <fieldset slot="{{ $lang }}">
                                <div class="form-group">
                                    <label for="title">ФИО</label>
                                    <input id="title"
                                           type="text"
                                           name="{{$lang}}[title]"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           value="{{ old($lang.'.title') ?? $command->translate('title', $lang) }}"
                                           required>
                                    @if($errors->has('title'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Должность</label>
                                    <input id="description"
                                           type="text"
                                           name="{{$lang}}[content][description]"
                                           class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                           value="{{ old($lang.'.content') ?? $command->translate('content', $lang)['description'] }}"
                                           required>
                                    @if($errors->has('content'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first('content') }}
                                        </div>
                                    @endif
                                </div>
                                <label for="body">Описание</label>
                                <wysiwyg class="mb-0" id="body"
                                         content="{{ old('body') ?? $command->translate('content', $lang)['body']}}"
                                         name="{{$lang}}[content][body]"
                                         label="Описание"></wysiwyg>
                            </fieldset>

                        @endforeach
                    </block-editor>
                    <hr class="my-5">
                </div>
                <div class="col-md-4">
                    <image-uploader name="command" ratio="67%"
                                    image-id="{{ optional($command->getFirstMedia('command'))->id }}"
                                    src="{{ $command->getFirstMediaUrl('command') }}"></image-uploader>
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
