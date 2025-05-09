@extends('website.layouts.app')

@section('title', 'Homepage')
@section('meta_description', 'Welcome to our homepage with special offers')
@section('meta_keywords', 'home, welcome, offers')

@section('content')
    <div class="container mx-auto px-4">
        <h1>Welcome to {{ config('site.name') }}</h1>
        <!-- Your content here -->


        <div class="max-w-7xl mx-auto px-4 py-10">
            <h1 class="text-3xl font-bold mb-8 text-center">Our Services</h1>

            @if ($services->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($services as $service)
                        <div class="bg-white shadow rounded-xl overflow-hidden hover:shadow-lg transition">
                            @if ($service->image_url)
                                <img src="{{ $service->image_url }}" alt="{{ $service->title }}"
                                    class="w-full h-48 object-cover">
                            @endif

                            <div class="p-5 space-y-2">
                                <h2 class="text-xl font-semibold text-gray-800">{{ $service->title }}</h2>
                                <p class="text-sm text-gray-500">{{ $service->category }}</p>
                                <p class="text-gray-700 text-sm">{{ $service->description ?? 'No description available.' }}
                                </p>

                                @if ($service->features)
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-700 mt-4">Features:</h4>
                                        <ul class="list-disc list-inside text-sm text-gray-600">
                                            @foreach ($service->features as $feature)
                                                @php
                                                    $text = is_array($feature) ? $feature['value'] ?? null : $feature;
                                                @endphp
                                                @if (!empty($text))
                                                    <li>{{ $text }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="flex items-center gap-2 mt-4">
                                    <span class="text-lg font-bold text-green-600">${{ $service->price }}</span>
                                    @if ($service->discount_price)
                                        <span
                                            class="text-sm line-through text-gray-400">${{ $service->discount_price }}</span>
                                    @endif
                                </div>

                                @if ($service->tags)
                                    <div class="flex flex-wrap gap-2 mt-4">
                                        @foreach ($service->tags as $tag)
                                            <span
                                                class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                @if ($service->seo_keywords)
                                    <div class="mt-4">
                                        <h4 class="text-sm font-medium text-gray-700">SEO Keywords:</h4>
                                        <p class="text-xs text-gray-500">{{ implode(', ', $service->seo_keywords) }}</p>
                                    </div>
                                @endif

                                @if ($service->meta)
                                    <div class="mt-4">
                                        <h4 class="text-sm font-medium text-gray-700">Meta:</h4>
                                        <ul class="text-xs text-gray-600 list-disc list-inside">
                                            @foreach ($service->meta as $key => $value)
                                                <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <p class="text-xs text-gray-400 mt-4">Added on {{ $service->created_at->format('F j, Y') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500">No services available at the moment.</p>
            @endif

            @if ($products->count())
                <div class="container mx-auto px-4 py-8">
                    <h1 class="text-3xl font-bold text-gray-800 mb-8">Our Products</h1>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($products as $product)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                <!-- Product Image -->
                                @if (!empty($product->images) && is_array($product->images))
                                    <div class="relative h-48 overflow-hidden group">
                                        <!-- Main Image -->
                                        <img src="{{ Storage::url($product->images[0]) }}" alt="{{ $product->name }}"
                                            class="w-full h-full object-cover transition-opacity duration-300">

                                        <!-- Image Gallery Indicators (shown on hover) -->
                                        <div
                                            class="absolute bottom-2 left-0 right-0 flex justify-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            @foreach ($product->images as $index => $image)
                                                <button
                                                    class="w-2 h-2 rounded-full bg-white bg-opacity-80 {{ $index === 0 ? 'ring-2 ring-blue-500' : '' }}"
                                                    aria-label="View image {{ $index + 1 }}"></button>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <!-- Fallback when no images -->
                                    <div class="h-48 bg-gray-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                <!-- Badges -->
                                <div class="px-4 pt-3 flex gap-2">
                                    @if ($product->is_featured)
                                        <span
                                            class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Featured</span>
                                    @endif
                                    @if ($product->is_bestseller)
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Bestseller</span>
                                    @endif
                                    @if ($product->is_new)
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">New</span>
                                    @endif
                                </div>

                                <!-- Product Info -->
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h2 class="text-lg font-semibold text-gray-800">
                                            {{-- <a href="{{ route('products.show', $product->slug) }}" --}}
                                            <a href="#" class="hover:text-blue-600">
                                                {{ $product->name }}
                                            </a>
                                        </h2>
                                        @if ($product->brand)
                                            <span
                                                class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">{{ $product->brand }}</span>
                                        @endif
                                    </div>

                                    @if ($product->category)
                                        <p class="text-sm text-gray-500 mb-2">{{ $product->category }}</p>
                                    @endif

                                    @if ($product->short_description)
                                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                            {{ $product->short_description }}</p>
                                    @endif

                                    <!-- Pricing -->
                                    <div class="mb-3">
                                        @if ($product->sale_price)
                                            <div class="flex items-center gap-2">
                                                <span
                                                    class="text-xl font-bold text-gray-900">${{ number_format($product->sale_price, 2) }}</span>
                                                <span
                                                    class="text-sm text-gray-500 line-through">${{ number_format($product->price, 2) }}</span>
                                                @if ($product->price > 0)
                                                    <span class="text-xs bg-red-100 text-red-800 px-1.5 py-0.5 rounded">
                                                        {{ round(100 - ($product->sale_price / $product->price) * 100) }}%
                                                        OFF
                                                    </span>
                                                @endif
                                            </div>
                                        @else
                                            <span
                                                class="text-xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                                        @endif
                                    </div>

                                    <!-- Rating -->
                                    @if ($product->rating)
                                        <div class="flex items-center mb-3">
                                            <div class="flex">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($product->rating))
                                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                            </path>
                                                        </svg>
                                                    @elseif ($i == ceil($product->rating) && $product->rating - floor($product->rating) > 0)
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
                                            <span class="text-xs text-gray-500 ml-1">{{ $product->rating }}
                                                ({{ $product->reviews ? count($product->reviews) : 0 }}
                                                reviews)
                                            </span>
                                        </div>
                                    @endif

                                    <!-- Stock Status -->
                                    <div class="mb-3">
                                        @if ($product->stock_quantity > 0)
                                            <span class="text-green-600 text-sm font-medium">In Stock
                                                ({{ $product->stock_quantity }} available)</span>
                                        @else
                                            <span class="text-red-600 text-sm font-medium">Out of Stock</span>
                                        @endif
                                    </div>

                                    <!-- Additional Info -->
                                    <div class="text-xs text-gray-500 space-y-1">
                                        @if ($product->color)
                                            <div>Color: {{ $product->color }}</div>
                                        @endif
                                        @if ($product->weight)
                                            <div>Weight: {{ $product->weight }}g</div>
                                        @endif
                                        @if ($product->material)
                                            <div>Material: {{ $product->material }}</div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="px-4 pb-4">
                                    <button
                                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition-colors duration-300">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <h2 class="text-xl font-medium text-gray-600">No products found</h2>
                    <p class="mt-2 text-gray-500">Check back later for new products</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Page-specific scripts
    </script>
@endsection
