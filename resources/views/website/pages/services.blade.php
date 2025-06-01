@extends('website.layouts.app')

@section('title', 'Nos Services')
@section('meta_description', 'Découvrez notre gamme complète de services professionnels')
@section('meta_keywords', 'services, aladam, groupe, solutions')

@section('content')
    <main class="services">
        <!-- Header Section -->
        <header class="services__header">
            <div class="services__tag">
                <span class="services__tag-pill">Nos Solutions</span>
            </div>
            <h1 class="services__title">Services Professionnels d'Aladam Group</h1>
            <p class="services__description">
                Nous offrons une gamme complète de services spécialisés pour répondre à tous vos besoins en aménagement
                d'espaces.
            </p>
        </header>

        <!-- Services Listing -->
        <section class="services__listing">
            @if ($services->count())
                @foreach ($services as $index => $service)
                    <div
                        class="service-section {{ $index % 2 === 0 ? 'service-section--image-right' : 'service-section--image-left' }}">
                        <div class="service-section__image-container">
                            <img loading="lazy"src="{{ $service->image_url }}" alt="{{ $service->title }}"
                                class="service-section__image" loading="lazy">
                        </div>
                        <div class="service-section__content">
                            <h2 class="service-section__title">{{ $service->title }}</h2>
                            <p class="service-section__description">{{ $service->short_description }}</p>
                            <div class="service-section__buttons">
                                <a href="/services/{{ $service->slug }}"
                                    class="service-section__button service-section__button--secondary">
                                    <span>Voir Plus</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                </a>
                                <a href="{{ route('contact') }}"
                                    class="service-section__button service-section__button--primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-phone-ringing">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M20 4l-2 2" />
                                        <path d="M22 10.5l-2.5 -.5" />
                                        <path d="M13.5 2l.5 2.5" />
                                        <path
                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2c-8.072 -.49 -14.51 -6.928 -15 -15a2 2 0 0 1 2 -2" />
                                    </svg>
                                    <span>Nous Contacter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>

        <section class="services__cta">
            <div class="services__cta-content">
                <h2 class="services__cta-title">Prêt à transformer votre espace ?</h2>
                <p class="services__cta-description">
                    Nos experts sont à votre disposition pour discuter de votre projet et vous proposer des solutions sur
                    mesure.
                </p>
                <a href="{{ route('contact') }}" class="services__cta-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-phone-ringing">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M20 4l-2 2" />
                        <path d="M22 10.5l-2.5 -.5" />
                        <path d="M13.5 2l.5 2.5" />
                        <path
                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2c-8.072 -.49 -14.51 -6.928 -15 -15a2 2 0 0 1 2 -2" />
                    </svg>
                    Contactez-nous
                </a>
            </div>
        </section>
    </main>
@endsection
