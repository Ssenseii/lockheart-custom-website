<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="language" content="fr">
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

    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">

    @stack('meta')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,700" rel="stylesheet" />


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @vite(['resources/scss/style.scss', 'resources/css/app.css', 'resources/js/app.js'])

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "Aladam Groupe",
          "url": "{{ url('/') }}",
          "logo": "{{ asset('images/logo.png') }}",
          "description": "Spécialistes en aménagement professionnel et particulier à Casablanca.",
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "Casablanca",
            "addressCountry": "MA"
          }
        }
        </script>

</head>

<body class="font-sans antialiased">
    <!-- Header -->
    @include('website.layouts.partials.header')
    @include('website.layouts.partials.mobile-nav')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    {{-- Floating Whatsapp --}}
    @include('website.layouts.partials.whatsapp-button')
    
    <!-- Footer -->
    @include('website.layouts.partials.footer')

    @stack('scripts')
</body>

</html>
