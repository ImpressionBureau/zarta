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
                    </fieldset>
                @endforeach
            </block-editor>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" min="0" step="1" name="price" class="form-control" value="{{ old('price') }}" required>
            </div>
            <select class="form-control position-relative mt-3" name="category_id" id="category_id" required>
                <option value="" disabled selected style='display:none;'>Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <hr class="my-5">
            <div class="mt-4">
                <button class="btn btn-primary">
                    Сохранить
                </button>
            </div>
        </form>
    </section>
@endsection
