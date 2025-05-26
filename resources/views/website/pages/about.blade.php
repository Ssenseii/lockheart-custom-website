@extends('website.layouts.app')

@section('title', 'À propos de Nous')
@section('meta_description', 'Welcome to our about page with special offers')
@section('meta_keywords', 'about, aladam, groupe')

@section('content')
    <main class="about">
        <!-- Header Section -->
        <header class="about__header">
            <div class="about__tag">
                <span class="about__tag-pill">Notre Histoire</span>
            </div>
            <h1 class="about__title">Aladam Group: L'Excellence en Aménagement d'Espaces</h1>
            <p class="about__description">
                Depuis notre création, nous transformons les espaces avec une approche unique alliant savoir-faire
                traditionnel et innovation technique.
            </p>
            <div class="about__buttons">
                <a href="#" class="about__button about__button--primary">Contactez-Nous</a>
            </div>
        </header>

        <!-- Company Overview Section -->
        <section class="home__about">
            <div class="home__about__container">
                <div class="home__about__content">
                    <strong class="home__about__tag">Présentation</strong>
                    <h2 class="home__about__tagline">Aladam Group en Quelques Mots</h2>
                    <p class="home__about__subtitle">Expertise et Passion Réunies</p>
                    <div class="home__about__image">
                        <img src="{{ asset('images/about__overview.jpg') }}" alt="Équipe Aladam Group">
                    </div>
                    <p class="home__about__description">
                        Fondé avec la vision de redéfinir les standards de l'aménagement intérieur au Maroc, Aladam Group
                        s'est imposé comme un acteur clé dans les domaines des cloisons, faux plafonds, et solutions
                        acoustiques. Notre équipe pluridisciplinaire combine ingénieurs, designers et artisans pour offrir
                        des solutions sur mesure.
                    </p>

                    <div class="home__about__differentiators">
                        <h3 class="home__about__differentiators-title">Nos Domaines d'Expertise :</h3>
                        <ul class="home__about__points">
                            <li class="home__about__point">
                                <span class="home__about__point-icon">
                                    <img src="{{ asset('images/icons/partitions.png') }}" alt="Cloisons icon">
                                </span>
                                <span class="home__about__point-title">Cloisons Sur Mesure</span>
                                <span class="home__about__point-text">Solutions modulaires adaptées à tous types d'espaces
                                    professionnels.</span>
                            </li>
                            <li class="home__about__point">
                                <span class="home__about__point-icon">
                                    <img src="{{ asset('images/icons/ceiling.png') }}" alt="Plafonds icon">
                                </span>
                                <span class="home__about__point-title">Faux Plafonds Innovants</span>
                                <span class="home__about__point-text">Systèmes intégrant acoustique, éclairage et
                                    climatisation.</span>
                            </li>
                            <li class="home__about__point">
                                <span class="home__about__point-icon">
                                    <img src="{{ asset('images/icons/acoustic.png') }}" alt="Acoustique icon">
                                </span>
                                <span class="home__about__point-title">Solutions Acoustiques</span>
                                <span class="home__about__point-text">Optimisation du confort sonore pour une meilleure
                                    productivité.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Banner -->
        <div class="about__services-banner">
            <div class="about__services-banner__content">
                <p>Découvrez comment nous transformons les espaces avec nos solutions sur mesure</p>
                <a href="{{ route('services') }}" class="button button--primary">Explorer Nos Services →</a>
            </div>
        </div>

        <!-- History Section -->
        <section class="home__about">
            <div class="home__about__container">
                <div class="home__about__content">
                    <strong class="home__about__tag">Notre Parcours</strong>
                    <h2 class="home__about__tagline">Une Croissance Marquée Par L'Innovation</h2>
                    <p class="home__about__subtitle">De 2018 à Aujourd'hui</p>
                    <div class="home__about__image">
                        <img src="{{ asset('images/about__history.jpg') }}" alt="Évolution d'Aladam Group">
                    </div>
                    <p class="home__about__description">
                        Depuis notre création en 2018, nous avons constamment repoussé les limites de l'aménagement
                        particulière et professionelle au Maroc, accumulant des réalisations prestigieuses et développant des partenariats
                        stratégiques.
                    </p>

                    <div class="home__about__differentiators">
                        <h3 class="home__about__differentiators-title">Nos Principales Réalisations :</h3>
                        <ul class="home__about__points">
                            <li class="home__about__point">
                                <span class="home__about__point-icon">
                                    <img src="{{ asset('images/icons/trophy.png') }}" alt="Trophée icon">
                                </span>
                                <span class="home__about__point-title">2015 - Certification ISO 9001</span>
                                <span class="home__about__point-text">Reconnaissance de notre système de management de la
                                    qualité.</span>
                            </li>
                            <li class="home__about__point">
                                <span class="home__about__point-icon">
                                    <img src="{{ asset('images/icons/building.png') }}" alt="Bâtiment icon">
                                </span>
                                <span class="home__about__point-title">2018 - Projet Phare</span>
                                <span class="home__about__point-text">Aménagement de 25,000 m² pour un groupe bancaire
                                    leader.</span>
                            </li>
                            <li class="home__about__point">
                                <span class="home__about__point-icon">
                                    <img src="{{ asset('images/icons/management.png') }}" alt="Équipe icon">
                                </span>
                                <span class="home__about__point-title">2022 - Expansion</span>
                                <span class="home__about__point-text">Ouverture de notre deuxième agence à
                                    Casablanca.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="home__about__credo">
                        <p class="home__about__credo-text">"Chaque projet est une nouvelle opportunité de repousser les
                            limites de l'innovation."</p>
                        <a href="{{ route('references') }}" class="button button--primary">Voir Nos Références →</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Banner -->
        <div class="about__services-banner">
            <div class="about__services-banner__content">
                <p>Nos solutions sur mesure s'adaptent à tous vos besoins d'aménagement</p>
                <a href="{{ route('services') }}" class="button button--primary">Découvrir Nos Services →</a>
            </div>
        </div>

        <!-- Mission & Values Section -->
        <section class="about-dna">
            <div class="dna-container">
                <!-- Header with Animated Tagline -->
                <div class="dna-header">
                    <strong class="home__about__tag">Notre ADN</strong>
                    <h2 class="home__about__tagline">Ce Qui Nous Guide Au Quotidien</h2>
                    <p class="home__about__subtitle">Mission, Vision & Valeurs</p>
                    <p class="home__about__description">
                        Notre succès repose sur des fondations solides : une mission claire, une vision ambitieuse et
                        des valeurs partagées par toute notre équipe.
                    </p>
                </div>

                <!-- Grid Layout: Image + Text -->
                <div class="dna-grid">
                    <!-- Left Column: Image with Hover Effect -->
                    <div class="dna-image-wrapper">
                        <img src="{{ asset('images/about__values.jpeg') }}" alt="Valeurs Aladam Group" class="dna-image">
                        <div class="image-overlay"></div>
                    </div>

                    <!-- Right Column: Mission/Vision/Values Cards -->
                    <div class="dna-values">
                        <p class="dna-description">
                        </p>

                        <!-- Animated Value Cards -->
                        <div class="value-cards">
                            <!-- Mission Card -->
                            <div class="value-card" data-aos="fade-up">
                                <div class="card-icon">
                                    <img src="{{ asset('images/icons/mission.png') }}" alt="Mission">
                                </div>
                                <h3 class="card-title">Notre Mission</h3>
                                <p class="card-text">
                                    Transformer les espaces de travail en environnements inspirants et fonctionnels.
                                </p>
                            </div>

                            <!-- Vision Card -->
                            <div class="value-card" data-aos="fade-up" data-aos-delay="100">
                                <div class="card-icon">
                                    <img src="{{ asset('images/icons/vision.png') }}" alt="Vision">
                                </div>
                                <h3 class="card-title">Notre Vision</h3>
                                <p class="card-text">
                                    Devenir le référent en aménagement intérieur en Afrique du Nord d'ici 2030.
                                </p>
                            </div>

                            <!-- Values Card -->
                            <div class="value-card" data-aos="fade-up" data-aos-delay="200">
                                <div class="card-icon">
                                    <img src="{{ asset('images/icons/values.png') }}" alt="Valeurs">
                                </div>
                                <h3 class="card-title">Nos Valeurs</h3>
                                <p class="card-text">
                                    Innovation, Intégrité, Excellence, Collaboration, Engagement client.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Catalogue Banner -->
        <section class="about__catalogue">
            <div class="about__catalogue__container">
                <div class="about__catalogue__content">
                    <h2 class="about__catalogue__title">Téléchargez Notre Catalogue Complet</h2>
                    <p class="about__catalogue__description">
                        Découvrez l'étendue de nos solutions d'aménagement intérieur dans notre catalogue 2023.
                    </p>
                    <a href="{{ asset('pdf/catalogue-aladam-2023.pdf') }}" class="button button--primary" style="width: fit-content;" download>
                        Télécharger le PDF →
                    </a>
                </div>
                <div class="about__catalogue__image">
                    <img src="{{ asset('images/logo_aladam.png') }}" alt="Catalogue Aladam Group">
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="about__cta">
            <div class="about__cta__container">
                <h2 class="about__cta__title">Prêt à Transformer Votre Espace ?</h2>
                <p class="about__cta__text">
                    Notre équipe est à votre disposition pour discuter de votre projet et vous proposer des solutions sur
                    mesure.
                </p>
                <div class="about__cta__buttons">
                    <a href="{{ route('contact') }}" class="button button--primary">Contactez-Nous</a>
                    {{-- <a href="tel:+212522000000" class="button button--secondary">
                        <span class="icon-phone"></span> +212 522 000 000
                    </a> --}}
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
@endsection
