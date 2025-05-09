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

            @if ($blogs->count())
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($blogs as $blog)
                        <div
                            class="overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 bg-white">
                            @if ($blog->featured_image)
                                <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}"
                                    class="w-full h-48 object-cover">
                            @endif
                            <div class="p-6">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="px-3 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">
                                        {{ $blog->industry_sector }}
                                    </span>
                                    @if ($blog->is_published)
                                        <span
                                            class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                            Published
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 text-xs font-semibold text-gray-800 bg-gray-100 rounded-full">
                                            Draft
                                        </span>
                                    @endif
                                </div>

                                <h3 class="mb-2 text-xl font-bold text-gray-900">
                                    {{-- <a href="{{ route('blogs.show', $blog->slug) }}" class="hover:text-blue-600"> --}}
                                    <a href="#" class="hover:text-blue-600">
                                        {{ $blog->title }}
                                    </a>
                                </h3>

                                @if ($blog->excerpt)
                                    <p class="mb-4 text-gray-600">{{ $blog->excerpt }}</p>
                                @endif

                                @if ($blog->tags)
                                    <div class="flex flex-wrap gap-2 mt-4">
                                        @foreach (json_decode($blog->tags) as $tag)
                                            <span class="px-2 py-1 text-xs text-gray-600 bg-gray-100 rounded">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                                    <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                    {{-- <a href="{{ route('blogs.show', $blog->slug) }}" --}}
                                    <a href="#" class="font-medium text-blue-600 hover:text-blue-800">
                                        Read more →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-8 text-center bg-gray-100 rounded-lg">
                    <p class="text-gray-600">No blogs found.</p>
                </div>
            @endif

            @if ($references->count())
                <div class="container mx-auto px-4 py-12">
                    <h2 class="text-3xl font-bold text-center mb-12">Our References</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($references as $reference)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                @if ($reference->company_logo)
                                    <div class="p-6 flex justify-center bg-gray-50">
                                        <img src="{{ asset('storage/' . $reference->company_logo) }}"
                                            alt="{{ $reference->company_name }} logo" class="h-20 object-contain">
                                    </div>
                                @endif

                                <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-2">{{ $reference->company_name }}</h3>
                                    <h4 class="text-lg text-gray-600 mb-4">{{ $reference->title }}</h4>
                                    <p class="text-gray-700 mb-4">{{ Str::limit($reference->description, 150) }}</p>

                                    @if ($reference->is_published)
                                        <span
                                            class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                            Verified Reference
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($testimonials->count() > 0)
                <!-- Header -->
                <div class="text-center mb-12">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Testimonials</h1>
                </div>
                
                <!-- Testimonials Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($testimonials as $testimonial)
                        <div
                            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="p-6">
                                <!-- Rating -->
                                @if ($testimonial->rating)
                                    <div class="flex mb-4 text-yellow-400">
                                        @for ($i = 0; $i < $testimonial->rating; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                @endif

                                <!-- Testimonial Content -->
                                <p class="text-gray-600 mb-6 italic">"{{ $testimonial->content }}"</p>

                                <!-- Client Info -->
                                <div class="flex items-center">
                                    @if ($testimonial->avatar)
                                        <img class="w-12 h-12 rounded-full mr-4 object-cover"
                                            src="{{ asset('storage/' . $testimonial->avatar) }}"
                                            alt="{{ $testimonial->client_name }}">
                                    @else
                                        <div
                                            class="w-12 h-12 rounded-full mr-4 bg-gray-200 flex items-center justify-center">
                                            <i class="fas fa-user text-gray-500"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ $testimonial->client_name }}</h4>
                                        @if ($testimonial->client_title || $testimonial->client_company)
                                            <p class="text-sm text-gray-600">
                                                {{ $testimonial->client_title }}
                                                @if ($testimonial->client_title && $testimonial->client_company)
                                                    ,
                                                @endif
                                                {{ $testimonial->client_company }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Featured Badge -->
                                @if ($testimonial->is_featured)
                                    <div class="mt-4">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                </path>
                                            </svg>
                                            Featured
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Empty State (hidden) -->
            @else
                <div class="text-center py-16">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                        </path>
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">No testimonials yet</h3>
                    <p class="mt-1 text-gray-500">Check back later for customer feedback.</p>
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
