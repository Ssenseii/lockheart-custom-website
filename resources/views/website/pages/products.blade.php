@extends('website.layouts.app')

@section('title', 'Nos Produits')
@section('meta_description', 'Découvrez notre gamme de produits d\'excellence')
@section('meta_keywords', 'produits, aladam, groupe, catalogue')

@section('content')
    <main class="products">
        <!-- Hero Section -->
        <section class="products__hero">
            <div class="products__hero-content">
                <div class="products__tag">
                    <span class="contact__tag-pill">Notre Catalogue</span>
                </div>
                <h1 class="products__title">Nos Produits d'Excellence</h1>
                <p class="products__description">
                    Découvrez notre sélection de produits haut de gamme conçus pour répondre à vos besoins les plus
                    exigeants.
                </p>
            </div>
        </section>

        <!-- Products Grid -->
        <section class="products__grid-container">
            @if ($products->isEmpty())
                <div class="products__empty-state">
                    <svg class="products__empty-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2>Aucun produit disponible</h2>
                    <p>Nous mettons régulièrement à jour notre catalogue.</p>
                </div>
            @else
                <div class="products__grid">
                    @foreach ($products as $product)
                        <article class="product-card">
                            <figure class="product-card__image-wrapper">
                                @if (!empty($product->images) && is_array($product->images))
                                    <img src="{{ Storage::url($product->images[0]) }}" alt="{{ $product->name }}"
                                        class="product-card__image" loading="lazy">
                                @else
                                    <div class="product-card__image-placeholder">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </figure>

                            <div class="product-card__body">
                                @if ($product->category)
                                    <span class="product-card__category">{{ $product->category }}</span>
                                @endif

                                <h3 class="product-card__title">
                                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>

                                @if ($product->short_description)
                                    <p class="product-card__description">{{ Str::limit($product->short_description, 100) }}
                                    </p>
                                @endif

                                <div class="product-card__footer">
                                    <a href="{{ route('product.show', $product->slug) }}" class="product-card__cta">
                                        Voir les détails
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </main>
@endsection
