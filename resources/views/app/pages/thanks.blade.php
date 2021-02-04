@extends('layouts.app', ['page_title' => trans('breadcrumb.thk')])
@section('content')

    <section class="thanks-section">
        <h1 class="thanks-title mb-3">@lang('common.thk.title')</h1>

        @if($type == 'subscribe')
            <p class="thanks-text mb-3">@lang('common.thk.subscribe')</p>
            @else
        <p class="thanks-text mb-3">@lang('common.thk.description')</p>
        @endif
        <a href="/" class="btn btn-primary"><span>@lang('common.thk.btn')</span></a>
    </section>

@endsection
