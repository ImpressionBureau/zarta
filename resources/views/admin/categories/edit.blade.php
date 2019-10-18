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
                                <input id="description"
                                       type="text"
                                       name="{{$lang}}[content][description]"
                                       class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                       value="{{ old($lang.'.content') ?? $category->translate('content', $lang)['description'] }}">
                                @if($errors->has('content'))
                                    <div class="mt-1 text-danger">
                                        {{ $errors->first('content') }}
                                    </div>
                                @endif
                            </div>
                        </fieldset>

                    @endforeach
                </block-editor>
                <select class="form-control position-relative mt-3" name="thread" id="thread" required>
                    <option value="" disabled selected style='display:none;'>Выберите направление категории</option>
                    <option value="directions" {{$category->thread == 'directions' ? ' selected' : ''}}>Направления
                        работы
                    </option>
                    <option value="methods" {{$category->thread == 'methods' ? ' selected' : ''}}>Методы лечения
                    </option>
                </select>
                <hr class="my-5">
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
