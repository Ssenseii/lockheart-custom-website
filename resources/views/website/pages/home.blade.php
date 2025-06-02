@extends('website.layouts.app')

@section('title', 'Aménagement Professionnel et Particulier à Casablanca')
@section('meta_description', 'Aménagement de magasins, bureaux, restaurants et maisons à Casablanca. Aladam Groupe transforme vos idées en espaces uniques.')
@section('meta_keywords', 'aménagement Casablanca, agencement professionnel Maroc, design intérieur boutique, rénovation bureau, Aladam Groupe')


@section('content')
    <section class="home__hero">
        <div class="home__hero-column">
            <div class="home__hero-socials">
                <a href="https://www.linkedin.com/{{ $settings->social_linkedin }}">
                    <img loading="lazy"src="{{ asset('images/social-media/linkedin.svg') }}" alt="">
                </a>
                <a href="https://www.facebook.com/{{ $settings->social_facebook }}">
                    <img loading="lazy"src="{{ asset('images/social-media/facebook.svg') }}" alt="">
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
            <h1 class="home__hero-title">Aménagement Professionnel et Particulier à Casablanca</h1>
            <a href="{{ route('contact') }}" class="button button--primary">Demandez un Devis</a>
            <div class="home__hero-services">
                <a href="{{ route('services') }}">
                    <img loading="lazy"src="{{ asset('images/hero_services/hero_serv1.webp') }}" alt="">
                </a>
                <a href="{{ route('services') }}">
                    <img loading="lazy"src="{{ asset('images/hero_services/hero_serv2.webp') }}" alt="">
                </a>
                <a href="{{ route('services') }}">
                    <img loading="lazy"src="{{ asset('images/hero_services/hero_serv3.webp') }}" alt="">
                </a>
            </div>
        </div>
    </section>

    {{-- References --}}
    <section class="home__references">
        @if ($references->count())
            <div class="home__references__container">
                <div class="home__references__text">
                    <strong>REFERENCES</strong>
                    <h2>Nos Réalisations & Témoignages</h2>
                    <p>
                        Découvrez des projets concrets réalisés pour nos clients à Casablanca.
                        Des espaces commerciaux optimisés aux résidences sur mesure,
                        chaque réalisation reflète notre engagement qualité et savoir-faire.
                        Faites-nous confiance pour transformer vos idées en réalité.
                    </p>
                    <div class="home__references__buttons">
                        <a href="{{ route('references') }}" class="button button--primary">Voir toutes nos références</a>
                        <a href="{{ route('contact') }}" class="button button--outline">Nous Contacter</a>
                    </div>
                    <div class="home__references__results">
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
                <div class="home__references__pyramid">
                    @foreach ($references->where('is_published', true)->whereNotNull('company_logo') as $reference)
                        <div class="home__references__logo">
                            <img loading="lazy"src="{{ asset('storage/' . $reference->company_logo) }}" loading="lazy"
                                alt="{{ $reference->company_name }} logo" class="home__references__image">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    {{-- About --}}
    <section class="home__about">
        <div class="home__about__container">
            <div class="home__about__content">
                <strong class="home__about__tag">À Propos de Nous</strong>
                <h2 class="home__about__tagline">Chez Aladam Group, Nous Construisons Des Expériences</h2>
                <p class="home__about__subtitle">L'Art de l'Aménagement, Réinventé</p>
                <div class="home__about__image">
                    <img loading="lazy"src="{{ asset('images/home__about.webp') }}"
                        alt="Aladam Group Ceiling Installation ">
                </div>
                <p class="home__about__description">Au-delà des cloisons et des faux plafonds, nous sculptons des
                    environnements
                    qui inspirent, fonctionnent et évoluent avec vous. Notre approche ? Un mélange rare entre l'artisanat
                    marocain et l'innovation technique, où chaque projet devient une signature.</p>

                <div class="home__about__differentiators">
                    <h3 class="home__about__differentiators-title">Pourquoi Nous Sommes Différents :</h3>
                    <ul class="home__about__points">
                        <li class="home__about__point">

                            <span class="home__about__point-icon">
                                <img loading="lazy"src="{{ asset('images/icons/social-listening.png') }}"
                                    alt="social icon">
                            </span>
                            <span class="home__about__point-title">Écoute Radicale</span>
                            <span class="home__about__point-text">Nous captons ce que vous ne dites pas (vos silences ont
                                autant
                                de valeur que vos briefs).</span>
                        </li>
                        <li class="home__about__point">
                            <span class="home__about__point-icon">
                                <img loading="lazy"src="{{ asset('images/icons/design-thinking.png') }}" alt="design icon">
                            </span>
                            <span class="home__about__point-title">Design Tactique</span>
                            <span class="home__about__point-text">Chaque choix, du BA13 à la climatisation, est une
                                stratégie
                                pour votre confort ou productivité.</span>
                        </li>
                        <li class="home__about__point">
                            <span class="home__about__point-icon">
                                <img loading="lazy"src="{{ asset('images/icons/transparency.png') }}"
                                    alt="transparency icon">
                            </span>
                            <span class="home__about__point-title">Transparence Totale</span>
                            <span class="home__about__point-text">Pas de surprises, juste des comptes-rendus honnêtes et un
                                planning visible en temps réel.</span>
                        </li>
                    </ul>
                </div>

                <div class="home__about__credo">
                    <p class="home__about__credo-text">"Un espace bien conçu doit vous ressembler, pas à nos précédents
                        projets."
                    </p>
                    <a href="{{ route('about') }}" class="button button--primary">Découvrez Notre Philosophie en Action
                        →</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="home__services">
        <div class="home__services-container">
            <div class="home__services-text">
                <span class="home__services-tag">Services</span>
                <h2 class="home__services-title">Des Solutions Sur Mesure, de la Conception à la Réalisation</h2>
                <p class="home__services-description">
                    Chez Aladam Group, nous transformons vos espaces avec une expertise polyvalente et un savoir-faire
                    artisanal. Que ce soit pour un commerce élégant, un bureau ergonomique, ou une maison harmonieuse, nos
                    spécialistes conjuguent créativité et technicité pour livrer des résultats impeccables. Chaque détail
                    est pensé, chaque projet est unique.
                </p>
                <div class="home__services-buttons">
                    <a href="{{ route('services') }}" class="button button--primary">Explorer nos services</a>
                    <a href="{{ route('contact') }}" class="button button--outline">Contactez-nous</a>
                </div>
            </div>

            <div class="home__services-cards">
                @if ($services->count())
                    @foreach ($services as $service)
                        <div class="service-card">
                            <div class="service-card__image-container">
                                <img loading="lazy"src="{{ $service->image_url }}" alt="{{ $service->title }}"
                                    class="service-card__image" loading="lazy" width="300" height="225">
                                {{-- <div class="service-card__overlay"></div> --}}
                            </div>
                            <div class="service-card__content">
                                <h3 class="service-card__title">{{ $service->title }}</h3>
                                <p class="service-card__description">{{ $service->short_description }}</p>
                                <div class="service-card__footer">
                                    <a href="/services/{{ $service->slug }}" class="service-card__button">
                                        <span>{{ $service->cta_button_label ?? 'Voir Plus' }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14M12 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <a href="/services" class="service-card service-card--link">
                    <div class="service-card__image-container">
                        <img loading="lazy"src="{{ asset('images/hero_services/hero_serv1.webp') }}"
                            alt="Découvrir tous nos services" class="service-card__image" loading="lazy" width="300"
                            height="225">
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Découvrir plus de services</h3>
                        <p class="service-card__description">Explorez l'ensemble de nos services industrielles
                            professionnels</p>
                        <div class="service-card__footer">
                            <div class="service-card__button">
                                <span>Explorer Plus</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- Produits --}}
    <section class="home__products">
        <div class="home__products-container">
            <div class="home__products-header">
                <div class="home__products-text">
                    <span class="home__products-tag">Nos Produits</span>
                    <h2 class="home__products-title">Des Produits d'Excellence, Fabriqués avec Passion</h2>
                    <p class="home__products-description">
                        Découvrez notre sélection de produits haut de gamme conçus pour répondre à vos besoins les plus
                        exigeants.
                        Chaque pièce est le résultat d'un savoir-faire artisanal et d'une attention méticuleuse aux détails.
                        Que vous cherchiez des solutions durables ou des créations uniques, notre gamme saura vous
                        surprendre.
                    </p>
                    <div class="home__products-buttons">
                        <a href="{{ route('products') }}" class="button button--primary">Découvrir nos produits</a>
                        <a href="{{ route('contact') }}" class="button button--outline">Demander un devis</a>
                    </div>
                </div>

                <div class="home__products-image">
                    <img loading="lazy"src="{{ asset('images/home_products.webp') }}" alt="Aladam Group Products ">
                </div>
            </div>

            <div class="home__products-cards">
                @if ($products->count())

                    @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-200 flex flex-col h-full"
                            style="min-height: 420px;">
                            <!-- Product Image -->
                            @if (!empty($product->images) && is_array($product->images))
                                <div class="relative aspect-[4/3] overflow-hidden">
                                    <img loading="lazy"src="{{ Storage::url($product->images[0]) }}"
                                        alt="{{ $product->name }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="aspect-[4/3] bg-gray-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif

                            <!-- Product Info -->
                            <div class="p-4 flex-grow flex flex-col">
                                <!-- Tag/Badge -->
                                @if ($product->category)
                                    <span class="text-xs text-blue-600 font-medium mb-1">{{ $product->category }}</span>
                                @endif

                                <!-- Title -->
                                <h2 class="text-lg font-semibold text-gray-800 mb-2">
                                    <a href="{{ route('product.show', $product->slug) }}" class="hover:text-blue-600">
                                        {{ $product->name }}
                                    </a>
                                </h2>

                                <!-- Short Description -->
                                @if ($product->short_description)
                                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                        {{ $product->short_description }}
                                    </p>
                                @endif

                                <div class="mt-auto pt-2">
                                    <a href="{{ route('product.show', $product->slug) }}"
                                        class="block w-full bg-gray-100 hover:bg-blue-500 text-gray-800 hover:text-gray-100 text-center text-sm font-medium py-2 px-4 rounded transition-colors duration-200">
                                        Voir plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-12">
                        <h2 class="text-xl font-medium text-gray-600">Aucun produit trouvé</h2>
                        <p class="mt-2 text-gray-500">Revenez plus tard pour découvrir nos nouveautés</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Pourquoi Nous Choisir --}}
    <section class="home__why">
        <div class="home__why-container">
            <div class="home__why-text">
                <strong class="home__why-tag">Pourquoi Nous Choisir</strong>
                <h2 class="home__why-title">Une Différence Qui Se Voit et Se Vit</h2>
                <p class="home__why-description">
                    Chez Aladam Group, nous faisons plus que rénover ou aménager. Nous créons des espaces qui inspirent
                    confiance, renforcent votre image de marque, et améliorent votre quotidien. Notre réputation repose sur
                    des valeurs solides et des résultats concrets.
                </p>
            </div>

            <div class="home__why-grid">
                <div class="why-card">
                    <img loading="lazy"src="{{ asset('images/icons/badge.png') }}" alt="Qualité"
                        class="why-card__icon">
                    <h3 class="why-card__title">Qualité Garantie</h3>
                    <p class="why-card__text">Matériaux de premier choix, finitions impeccables et suivi rigoureux de
                        chaque étape du chantier.</p>
                </div>

                <div class="why-card">
                    <img loading="lazy"src="{{ asset('images/icons/management.png') }}" alt="Équipe"
                        class="why-card__icon">
                    <h3 class="why-card__title">Équipe Multidisciplinaire</h3>
                    <p class="why-card__text">Architectes, techniciens, artisans : un écosystème d’experts qui travaillent
                        main dans la main.</p>
                </div>

                <div class="why-card">
                    <img loading="lazy"src="{{ asset('images/icons/fast-time.png') }}" alt="Délais"
                        class="why-card__icon">
                    <h3 class="why-card__title">Respect des Délais</h3>
                    <p class="why-card__text">Nous livrons dans les temps. Ni plus, ni moins. Un planning clair et
                        respecté, quoi qu’il arrive.</p>
                </div>

                <div class="why-card">
                    <img loading="lazy"src="{{ asset('images/icons/customer-service.png') }}" alt="Support"
                        class="why-card__icon">
                    <h3 class="why-card__title">Accompagnement Complet</h3>
                    <p class="why-card__text">De la conception au service après-vente, vous avez un interlocuteur dédié à
                        chaque étape.</p>
                </div>
            </div>
        </div>
    </section>


    {{-- CTA --}}
    <section class="home__cta">
        <div class="cta__container">
            <div class="cta__content">
                <h2 class="cta__title">Prêt à Transformer Votre Espace ?</h2>
                <p class="cta__text">
                    Faites le premier pas vers un intérieur qui vous ressemble. Contactez notre équipe et obtenez un devis
                    personnalisé sous 48h.
                </p>
                <div class="cta__buttons">
                    <a href="{{ route('contact') }}" class="button button--primary">Demander un Devis</a>
                    <a href="{{ route('references') }}" class="button button--outline">Voir Nos Références</a>
                </div>
            </div>
        </div>
    </section>




@endsection
