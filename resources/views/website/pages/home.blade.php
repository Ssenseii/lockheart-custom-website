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
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Page-specific scripts
    </script>
@endsection
