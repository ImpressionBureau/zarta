<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="locales" content="{{ json_encode(config('app.locales')) }}">

    <title>{{ config('app.name', 'Impression Admin') . (isset($app_title) ? ' | ' . $app_title : '') }}</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,300,400,400i,700,700i&amp;subset=cyrillic"
          rel="stylesheet">

    <link href="{{ url(mix('css/admin.css')) }}" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/images/favicons/site.webmanifest">
    <link rel="shortcut icon" href="/images/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    @stack('styles')
</head>
<body>
@includeIf('partials.admin.notifications')
@include('partials.admin.icons')
<div id="app">
    @includeIf('partials.admin.header')
    @includeIf('partials.admin.aside')

    <main>
        @yield('content')
    </main>
</div>

<script src="{{ url(mix('js/manifest.js')) }}" defer></script>
<script src="{{ url(mix('js/vendor.js')) }}" defer></script>
<script src="{{ url(mix('js/admin.js')) }}" defer></script>
@stack('scripts')
</body>
</html>
