{{-- resources/views/errors/404.blade.php --}}
@extends('website.layouts.base')

@section('title', 'Page non trouvée')

@section('content')
    <div class="text-center px-6 py-12">
        <img loading="lazy"src="{{ asset('images/logo_aladam.webp') }}" alt="Logo {{ config('site.name') }}"
            class="mx-auto h-16 mb-6">
        <h1 class="text-5xl font-bold">404</h1>
        <p class="mt-4 text-xl font-semibold text-blue-600">Page non trouvée</p>
        <p class="text-gray-600 mt-2">La page que vous recherchez n'existe pas ou a été déplacée.</p>
        <a href="{{ url('/') }}"
            class="mt-6 inline-block  text-white bg-blue-600 hover:bg-blue-700 px-5 py-2 rounded-full">
            Retour à l'accueil
        </a>
    </div>
@endsection
