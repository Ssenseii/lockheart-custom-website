@extends('website.layouts.app')

@section('content')
    <!-- Hero Section with Service Image -->
    @if ($service->image_url)
        <div class="relative h-130 w-full overflow-hidden bg-gray-100">
            <img src="/{{ $service->image_url }}" alt="{{ $service->title }}"
                class="w-full h-full object-cover object-center">

            <div class="absolute inset-0 bg-slate-900/50 flex items-center justify-center">
                <div class="text-center px-4">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $service->title }}</h1>
                    @if ($service->short_description)
                        <p class="text-xl text-white max-w-3xl mx-auto">{{ $service->short_description }}</p>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Description Section -->
        @if ($service->description)
            <div class="mb-16">
                <div class="prose max-w-none lg:prose-xl">
                    {!! $service->description !!}
                </div>
            </div>
        @endif

        <!-- Pricing Section -->
        @if ($service->price || $service->pricing_note)
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8 mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Pricing</h2>
                <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                    <div>
                        @if ($service->price)
                            <div class="flex items-baseline gap-3">
                                @if ($service->discount_price)
                                    <span
                                        class="text-4xl font-bold text-gray-900">${{ number_format($service->discount_price, 2) }}</span>
                                    <span
                                        class="text-xl text-gray-500 line-through">${{ number_format($service->price, 2) }}</span>
                                @else
                                    <span
                                        class="text-4xl font-bold text-gray-900">${{ number_format($service->price, 2) }}</span>
                                @endif
                            </div>
                        @endif
                        @if ($service->pricing_note)
                            <p class="mt-2 text-gray-600">{{ $service->pricing_note }}</p>
                        @endif
                    </div>
                    <a href="{{ route('contact') }}"
                        class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200 whitespace-nowrap">
                        Get Started
                    </a>
                </div>
            </div>
        @endif

        <!-- Features Section -->
        @if ($service->features && count($service->features) > 0)
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Key Features</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($service->features as $feature)
                        <div
                            class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-200 border border-gray-100">
                            <div class="text-blue-600 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $feature['value'] ?? 'Feature' }}</h3>
                            <p class="text-gray-600">{{ $feature['description'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Workflow Section -->
        @if ($service->workflow_steps && count($service->workflow_steps) > 0)
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Process</h2>
                <div class="relative">
                    <!-- Timeline line -->
                    <div
                        class="hidden md:block absolute left-1/2 top-0 h-full w-0.5 bg-blue-200 transform -translate-x-1/2">
                    </div>

                    @foreach ($service->workflow_steps as $index => $step)
                        <div class="relative mb-8 md:mb-12">
                            <div
                                class="md:flex items-center {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}">
                                <!-- Step number -->
                                <div
                                    class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-600 text-white font-bold text-lg mx-auto md:mx-0 mb-4 md:mb-0 relative z-10">
                                    {{ $index + 1 }}
                                </div>

                                <!-- Step content -->
                                <div class="md:w-1/2 md:px-8 {{ $index % 2 === 0 ? 'md:pl-8' : 'md:pr-8' }}">
                                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                            {{ $step['title'] ?? 'Step ' . ($index + 1) }}</h3>
                                        <p class="text-gray-600">{{ $step['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Testimonials Section -->
        @if ($service->testimonials && count($service->testimonials) > 0)
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">What Our Clients Say</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @foreach ($service->testimonials as $testimonial)
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                            <div class="flex items-center mb-4">
                                <div class="text-yellow-400 flex">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < ($testimonial['rating'] ?? 5))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <blockquote class="text-gray-600 italic mb-4">"{{ $testimonial['quote'] }}"</blockquote>
                            <div class="flex items-center">
                                @if ($testimonial['avatar'] ?? false)
                                    <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}"
                                        class="w-10 h-10 rounded-full mr-3">
                                @endif
                                <div>
                                    <p class="font-medium text-gray-900">{{ $testimonial['name'] }}</p>
                                    @if ($testimonial['company'] ?? false)
                                        <p class="text-sm text-gray-500">{{ $testimonial['company'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Case Studies Section -->
        @if ($service->case_studies && count($service->case_studies) > 0)
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Case Studies</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($service->case_studies as $caseStudy)
                        <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
                            @if ($caseStudy['image'] ?? false)
                                <img src="{{ $caseStudy['image'] }}" alt="{{ $caseStudy['title'] }}"
                                    class="w-full h-48 object-cover">
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $caseStudy['title'] }}</h3>
                                <p class="text-gray-600 mb-4">{{ $caseStudy['excerpt'] ?? '' }}</p>
                                @if ($caseStudy['link'] ?? false)
                                    <a href="{{ $caseStudy['link'] }}"
                                        class="text-blue-600 font-medium hover:text-blue-800 transition duration-200">
                                        Read Case Study →
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- FAQs Section -->
        @if ($service->faqs && count($service->faqs) > 0)
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                <div class="max-w-3xl mx-auto">
                    @foreach ($service->faqs as $faq)
                        <div class="mb-4 border-b border-gray-200 pb-4">
                            <button
                                class="flex items-center justify-between w-full text-left font-medium text-gray-900 focus:outline-none">
                                <span>{{ $faq['question'] }}</span>
                                <svg class="h-5 w-5 text-gray-500 transform transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="mt-2 text-gray-600">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- CTA Section -->
        @if ($service->cta_text || $service->cta_button_label)
            <div class="bg-blue-600 rounded-xl p-8 md:p-12 text-center">
                <h2 class="text-3xl font-bold text-white mb-4">{{ $service->cta_text ?? 'Ready to get started?' }}</h2>
                @if ($service->cta_button_label)
                    <a href="{{ $service->cta_button_url ?? route('contact') }}"
                        class="inline-block px-8 py-3 bg-white text-blue-600 font-medium rounded-lg hover:bg-gray-100 transition duration-200">
                        {{ $service->cta_button_label }}
                    </a>
                @endif
            </div>
        @endif
    </div>
@endsection
