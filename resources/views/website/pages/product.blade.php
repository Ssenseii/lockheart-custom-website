@extends('website.layouts.app')

@section('content')
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif
    <div class="bg-white product_page">
        <!-- Product Header Section -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Product Images -->
                    <div class="w-full md:w-1/2">
                        @if (isset($product->images) && count($product->images) > 0)
                            <!-- Main Image -->
                            <div class="mb-4 aspect-w-4 aspect-h-3 bg-gray-100 rounded-lg overflow-hidden">
                                <img src="/{{ $product->images[0] }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover">
                            </div>

                            <!-- Thumbnails -->
                            @if (count($product->images) > 1)
                                <div class="grid grid-cols-4 gap-2">
                                    @foreach ($product->images as $image)
                                        <div class="aspect-w-4 aspect-h-3 bg-gray-100 rounded overflow-hidden">
                                            <img src="/{{ $image }}" alt="{{ $product->name }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <!-- Placeholder -->
                            <div class="aspect-w-4 aspect-h-3 bg-gray-100 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400">Aucune image disponible</span>
                            </div>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="w-full md:w-1/2">
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if ($product->is_featured)
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Produit
                                    vedette</span>
                            @endif
                            @if ($product->is_bestseller)
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Meilleur
                                    vendeur</span>
                            @endif
                            @if ($product->is_new)
                                <span
                                    class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Nouveau</span>
                            @endif
                        </div>

                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>

                        @if (isset($product->brand))
                            <p class="text-gray-600 mb-4">Marque: <span class="font-medium">{{ $product->brand }}</span></p>
                        @endif

                        @if (isset($product->short_description))
                            <p class="text-gray-700 mb-6">{{ $product->short_description }}</p>
                        @endif

                        <div class="mb-6">
                            @if (isset($product->stock_quantity) && $product->stock_quantity > 0)
                                <span class="text-green-600 font-medium">En stock</span>
                            @endif
                        </div>

                        <a href="{{ route('contact') }}?product={{ urlencode($product->name) }}"
                            class="w-full md:w-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition duration-200">
                            Commander ce produit
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Description Section -->
        @if (isset($product->description))
            <section class="py-12 bg-gray-50">
                <div class="container mx-auto px-4">
                    <div class="max-w-3xl mx-auto">
                        <div class="flex items-center gap-2 mb-4">
                            <h2 class="text-2xl font-bold text-gray-900">Description</h2>
                            <span
                                class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Détails</span>
                        </div>
                        <div class="prose max-w-none text-gray-700">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- Specifications Section -->
        {{-- @if (isset($product->specifications))
            <section class="py-12 bg-white">
                <div class="container mx-auto px-4">
                    <div class="max-w-3xl mx-auto">
                        <div class="flex items-center gap-2 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">Spécifications techniques</h2>
                            <span
                                class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Caractéristiques</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($product->specifications as $key => $value)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $key }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $value }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        @endif --}}

        <!-- Features Section -->
        @if (isset($product->features) && count($product->features) > 0)
            <section class="py-12 bg-gray-50">
                <div class="container mx-auto px-4">
                    <div class="max-w-3xl mx-auto">
                        <div class="flex items-center gap-2 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">Fonctionnalités</h2>
                            <span
                                class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Avantages</span>
                        </div>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($product->features as $feature)
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-blue-500 mt-0.5 mr-2" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-gray-700">{{ $feature['value'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endif

        <!-- Physical Attributes Section -->
        <section class="py-12 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto">
                    <div class="flex items-center gap-2 mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Caractéristiques physiques</h2>
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Dimensions</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if (isset($product->weight))
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Poids</h3>
                                <p class="text-gray-700">{{ $product->weight }} grammes</p>
                            </div>
                        @endif

                        @if (isset($product->dimensions))
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Dimensions</h3>
                                <p class="text-gray-700">
                                    {{ $product->dimensions['length'] ?? 'N/A' }} cm (L) ×
                                    {{ $product->dimensions['width'] ?? 'N/A' }} cm (l) ×
                                    {{ $product->dimensions['height'] ?? 'N/A' }} cm (H)
                                </p>
                            </div>
                        @endif

                        @if (isset($product->material))
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Matériau</h3>
                                <p class="text-gray-700">{{ $product->material }}</p>
                            </div>
                        @endif

                        @if (isset($product->color))
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Couleur</h3>
                                <p class="text-gray-700">{{ $product->color }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Warranty & Shipping Section -->
        @if (isset($product->warranty) || isset($product->shipping_details))
            <section class="py-12 bg-gray-50">
                <div class="container mx-auto px-4">
                    <div class="max-w-3xl mx-auto">
                        <div class="flex items-center gap-2 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">Garantie & Livraison</h2>
                            <span
                                class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Services</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @if (isset($product->warranty))
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Garantie</h3>
                                    <p class="text-gray-700">{{ $product->warranty }}</p>
                                </div>
                            @endif

                            @if (isset($product->shipping_details))
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Livraison</h3>
                                    <p class="text-gray-700">{{ $product->shipping_details }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- Reviews Section -->
        @if (isset($product->reviews) && count($product->reviews) > 0)
            <section class="py-12 bg-white">
                <div class="container mx-auto px-4">
                    <div class="max-w-3xl mx-auto">
                        <div class="flex items-center gap-2 mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">Avis clients</h2>
                            <span
                                class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Opinions</span>
                        </div>

                        @if (isset($product->rating))
                            <div class="flex items-center mb-6">
                                <div class="flex items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= floor($product->rating))
                                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                        @elseif($i - 0.5 <= $product->rating)
                                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="ml-2 text-gray-600">{{ number_format($product->rating, 1) }} sur 5</span>
                            </div>
                        @endif

                        <div class="space-y-6">
                            @foreach ($product->reviews as $review)
                                <div class="bg-gray-50 p-6 rounded-lg">
                                    <div class="flex items-center mb-4">
                                        <div class="font-medium text-gray-900">{{ $review['author'] ?? 'Anonyme' }}</div>
                                        @if (isset($review['rating']))
                                            <div class="flex ml-4">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review['rating'])
                                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                            </path>
                                                        </svg>
                                                    @else
                                                        <svg class="w-4 h-4 text-gray-300" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                            </path>
                                                        </svg>
                                                    @endif
                                                @endfor
                                            </div>
                                        @endif
                                    </div>
                                    <p class="text-gray-700">{{ $review['comment'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- Order Form Section -->
        <section class="py-12 bg-blue-50">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto">
                    <div class="flex items-center gap-2 mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Commander ce produit</h2>
                        <span
                            class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Formulaire</span>
                    </div>

                    <form action="{{ route('product.buy') }}" method="POST" class="bg-white p-6 rounded-lg shadow-sm">
                        @csrf
                        <input type="hidden" name="product" value="{{ $product->name }}">

                        <div class="mb-4">
                            <label for="product" class="block text-sm font-medium text-gray-700 mb-1">Produit</label>
                            <input type="text" id="product" value="{{ $product->name }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed"
                                disabled>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Votre nom
                                    *</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Votre email
                                    *</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Votre
                                téléphone</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantité souhaitée
                                *</label>
                            <input type="number" id="quantity" name="quantity" min="1" value="1" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Informations
                                supplémentaires</label>
                            <textarea id="message" name="message" rows="4"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition duration-200">
                            Envoyer la demande
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
