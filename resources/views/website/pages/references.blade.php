@extends('website.layouts.app')

@section('title', 'References')
@section('meta_description', 'Welcome to our references page with special offers')
@section('meta_keywords', 'testomnials, references, logos')

@section('content')
    <main class="references">
        <!-- Header Section -->
        <header class="references__header">
            <div class="references__tag">
                <span class="references__tag-pill">Nos Références</span>
            </div>
            <h1 class="references__title">Nos Partenaires & Collaborations</h1>
            <p class="references__description">
                Nous avons eu le privilège de travailler avec des entreprises exceptionnelles.
                Découvrez comment nous avons aidé nos clients à atteindre leurs objectifs.
            </p>
            <div class="references__buttons">
                <a href="{{route('contact')}}" class="references__button references__button--primary">Nous Rejoindre</a>
            </div>
        </header>

        <section class="references__showcase">
            @if ($references->count())
                <div class="references__centered-container">
                    <div class="references__showcase-header">
                        <strong>REFERENCES</strong>
                        <h2>Nos Réalisations & Témoignages</h2>
                        <div class="references__divider"></div>
                        <p>
                            Découvrez des projets concrets réalisés pour nos clients à Casablanca.
                            Des espaces commerciaux optimisés aux résidences sur mesure,
                            chaque réalisation reflète notre engagement qualité et savoir-faire.
                            Faites-nous confiance pour transformer vos idées en réalité.
                        </p>
                    </div>

                    <div class="references__stats">
                        <div class="stat__item">
                            <span class="stat__number">+120</span>
                            <span class="stat__label">Projets Livrés</span>
                        </div>
                        <div class="stat__item">
                            <span class="stat__number">95%</span>
                            <span class="stat__label">Clients Satisfaits</span>
                        </div>
                        <div class="stat__item">
                            <span class="stat__number">8</span>
                            <span class="stat__label">Années d'Expérience</span>
                        </div>
                    </div>

                    <div class="references__logos-grid">
                        @foreach ($references->where('is_published', true)->whereNotNull('company_logo') as $reference)
                            <div class="logo__item">
                                <img src="{{ asset('storage/' . $reference->company_logo) }}"
                                    alt="{{ $reference->company_name }} logo" class="logo__image">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </section>

    </main>
@endsection

@section('scripts')
@endsection
