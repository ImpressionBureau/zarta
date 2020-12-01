<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (isset($page_title) ? $page_title . ' | ' : '') . config('app.name') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://api.mapbox.com">


    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
@includeIf('partials.app.layouts.icons')
<div id="app" v-cloak>
    @if(request()->route()->getName() != 'app.home')
        @includeIf('partials.app.layouts.header')
    @endif
    <main>
        @yield('content')
    </main>
    @includeIf('partials.app.layouts.menu')
    @includeIf('partials.app.layouts.footer')
</div>

<script src="{{ url(mix('js/manifest.js')) }}" defer></script>
<script src="{{ url(mix('js/vendor.js')) }}" defer></script>
<script src="{{ url(mix('js/app.js')) }}" defer></script>
@stack('scripts')
</body>
</html>
