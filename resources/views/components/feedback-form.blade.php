@props(['id' => $id ?? Str::random(8), 'type' => $type ?? '', 'model' => $model ?? ''])

<form action="{{ route('app.appointments') }}" method="post" class="form">
    @csrf
    <input type="hidden" name="service_type" value="{{ $type }}">
    <input type="hidden" name="service_id" value="{{ $model }}">

    <h3 class="form__title">@lang('common.form.title')</h3>
    <p class="form__description">@lang('common.form.description')</p>

    <div class="field">
        <label for="{{ $id }}-name">@lang('common.form.name')</label>
        <input id="{{ $id }}-name" name="name" type="text" class="field__item" required>
    </div>

    <div class="field">
        <label for="{{ $id }}-phone">@lang('common.form.phone')</label>
        <input id="{{ $id }}-phone" name="phone" type="tel" class="field__item" required>
    </div>

    <div class="field">
        <label for="{{ $id }}-email">Email</label>
        <input id="{{ $id }}-email" name="email" type="email" class="field__item">
    </div>

    <div class="field">
        <button class="btn btn-primary"><span>@lang('common.form.btn')</span></button>
    </div>
</form>
