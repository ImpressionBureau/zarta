<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (isset($page_title) ? $page_title . ' | ' : '') . config('app.name') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <link rel="prefetch" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@includeIf('partials.app.layouts.icons')
<div id="app" v-cloak>
    @if(request()->route()->getName() != 'app.home')
    @includeIf('partials.app.layout.header')
    @endif
    <main>
        @yield('content')
    </main>
    @includeIf('partials.app.layouts.footer')

</div>
<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
