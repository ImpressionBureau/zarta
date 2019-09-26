@extends('layouts.admin', ['app_title' => 'Новый работник'])

@section('content')
    <section>
        <form action="{{ route('admin.commands.store') }}" method="post" enctype="multipart/form-data">
            @csrf

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
                                           value="{{ old($lang.'.title') }}"
                                           required>
                                    @if($errors->has('title'))
                                        <div class="mt-1 text-danger">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                                <fieldset slot="{{ $lang }}">
                                    <div class="form-group">
                                        <label for="title">Должность</label>
                                        <input id="title"
                                               type="text"
                                               name="{{$lang}}[content][body]"
                                               class="form-control{{ $errors->has('content.body') ? ' is-invalid' : '' }}"
                                               value="{{ old($lang.'.content.body') }}"
                                               required>
                                        @if($errors->has('content.body'))
                                            <div class="mt-1 text-danger">
                                                {{ $errors->first('content.body') }}
                                            </div>
                                        @endif
                                    </div>


                            </fieldset>

                        @endforeach
                    </block-editor>
                    <hr class="my-5">
                </div>
                <div class="col-md-4">
                    <image-uploader name="command" ratio="67%"></image-uploader>
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
