@extends('website.layouts.app')

@section('title', 'Homepage')
@section('meta_description', 'Welcome to our homepage with special offers')
@section('meta_keywords', 'home, welcome, offers')

@section('content')
    <section class="home__hero">
        <div class="home__hero-column">
            <div class="home__hero-socials">
                <a href="#">
                    <img src="{{ asset('images/social-media/linkedin.svg') }}" alt="">
                </a>
                <a href="#">
                    <img src="{{ asset('images/social-media/facebook.svg') }}" alt="">
                </a>
                <a href="#">
                    <img src="{{ asset('images/social-media/instagram.svg') }}" alt="">
                </a>
                <a href="#">
                    <img src="{{ asset('images/social-media/tiktok.svg') }}" alt="">
                </a>
            </div>
            <p class="home__hero-paragraph">Aladam Group transforme vos espaces commerciaux et résidentiels avec des designs
                haut de gamme. Expertise en agencement, rénovation et installation technique. Des solutions clés en main
                pour un résultat impeccable.</p>
            <a href="{{ route('references') }}" class="home__hero-references">
                Voir Nos Réferences
            </a>
        </div>
        <div class="home__hero-column">
            <h1 class="home__hero-title">Spécialiste en Aménagement Intérieur</h1>
            <button class="button button--primary">Demandez un Devis</button>
            <div class="home__hero-services">
                <a class="{{ route('services') }}">
                    <img src="{{ asset('images/hero_services/hero_serv1.jpg') }}" alt="">
                </a>
                <a class="{{ route('services') }}">
                    <img src="{{ asset('images/hero_services/hero_serv2.jpg') }}" alt="">
                </a>
                <a class="{{ route('services') }}">
                    <img src="{{ asset('images/hero_services/hero_serv3.jpg') }}" alt="">
                </a>
            </div>
        </div>
    </section>

    {{-- References --}}
    <section class="home__references">
        @if ($references->count())
            <div class="references__container">
                <div class="references__text">
                    <strong>REFERENCES</strong>
                    <h2>Nos Réalisations & Témoignages</h2>
                    <p>
                        Découvrez des projets concrets réalisés pour nos clients à Casablanca.
                        Des espaces commerciaux optimisés aux résidences sur mesure,
                        chaque réalisation reflète notre engagement qualité et savoir-faire.
                        Faites-nous confiance pour transformer vos idées en réalité.
                    </p>
                    <div class="references__buttons">
                        <a href="{{ route('references') }}" class="button button--primary">Voir toutes nos références</a>
                        <a href="{{ route('contact') }}" class="button button--outline">Nous Contacter</a>
                    </div>
                    <div class="references__results">
                        <div class="result">
                            <span class="result__value">+120</span>
                            <span class="result__label">Projets Livrés</span>
                        </div>
                        <div class="result">
                            <span class="result__value">95%</span>
                            <span class="result__label">Clients Satisfaits</span>
                        </div>
                        <div class="result">
                            <span class="result__value">8</span>
                            <span class="result__label">Années d'Expérience</span>
                        </div>
                    </div>
                    
                </div>
                <div class="references__pyramid">
                    @foreach ($references->where('is_published', true)->whereNotNull('company_logo') as $reference)
                        <div class="references__logo">
                            <img src="{{ asset('storage/' . $reference->company_logo) }}"
                                alt="{{ $reference->company_name }} logo" class="references__image">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>


    {{-- About --}}

    <section class='home__about'>
        
    </section>

    {{-- Services --}}
    {{-- Products --}}
    {{-- Contact --}}
    

@endsection

@section('scripts')
@endsection
