<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Primary Meta Tags -->
    <title>@yield('title', 'Welcome') - {{ config('site.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('site.meta.description'))">
    <meta name="keywords" content="@yield('meta_keywords', config('site.meta.keywords'))">
    <meta name="author" content="{{ config('site.company') }}">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', config('site.meta.og_title'))">
    <meta property="og:description" content="@yield('og_description', config('site.meta.og_description'))">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', config('site.meta.og_title'))">
    <meta name="twitter:description" content="@yield('twitter_description', config('site.meta.og_description'))">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/og-default.jpg'))">
    <meta name="twitter:site" content="{{ config('site.twitter') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    @stack('meta')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,700" rel="stylesheet" />

    {{-- AlpineJS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @vite(['resources/scss/style.scss', 'resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
    @stack('head-scripts')
</head>

<body class="font-sans antialiased">
    <!-- Header -->
    @include('website.layouts.partials.header')
    @include('website.layouts.partials.mobile-nav')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('website.layouts.partials.footer')

    @stack('scripts')
</body>

</html>
