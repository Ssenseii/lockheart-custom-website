@extends('website.layouts.app')

@section('content')
    <!-- Hero Section with Service Image -->
    @if ($service->image_url)
        <div class="relative h-130 w-full overflow-hidden bg-gray-100 service_page">
            <img src="/{{ $service->image_url }}" alt="{{ $service->title }}" class="w-full h-full object-cover object-center">

            <div class="absolute inset-0 bg-slate-900/50 flex items-center justify-center">
                <div class="text-center px-4">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $service->title }}</h1>
                    @if ($service->short_description)
                        <p class="text-xl text-white max-w-3xl mx-auto">{{ $service->short_description }}</p>
                    @endif
                    <div class="about__buttons mt-8">
                        <a href="{{ route('services') }}" class="button button--primary w-fit">Voir tous les services</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Description Section -->
        @if ($service->description)
            <div class="mb-16 px-4 sm:px-6 lg:px-8">
                <div
                    class="prose prose-slate max-w-none lg:prose-xl 
                   mx-auto text-center 
                   prose-headings:text-slate-700
                   prose-p:text-slate-600 prose-p:leading-[1.4] text-[1.2rem] 
                   prose-strong:text-blue-600
                   prose-a:text-blue-500 hover:prose-a:text-blue-700
                   prose-blockquote:border-l-blue-300 prose-blockquote:text-slate-600
                   prose-ul:marker:text-blue-400
                   dark:prose-invert dark:prose-headings:text-slate-300 dark:prose-p:text-slate-400">
                    {!! $service->description !!}
                </div>
            </div>
        @endif

        <!-- Features Section -->
        @if ($service->features && count($service->features) > 0)
            <div class="mb-16">
                <div class="text-center mb-8">
                    <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full mb-3">
                        Fonctionnalités
                    </span>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Caractéristiques Clés</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        Découvrez les particularités qui font la différence dans notre approche
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($service->features as $feature)
                        <div
                            class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-200 border border-gray-100">
                            <div class="text-blue-600 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-sparkles">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16 18a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm0 -12a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm-7 12a6 6 0 0 1 6 -6a6 6 0 0 1 -6 -6a6 6 0 0 1 -6 6a6 6 0 0 1 6 6z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $feature }}</h3>
                            <p class="text-gray-600">{{ $feature['description'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <br />

        <!-- Workflow Section -->
        @if ($service->workflow_steps && count($service->workflow_steps) > 0)
            <div class="mb-16">
                <div class="text-center mb-8">
                    <span
                        class="inline-block bg-indigo-100 text-indigo-800 text-sm font-semibold px-3 py-1 rounded-full mb-3">
                        Méthodologie
                    </span>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Notre Processus</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        Une approche structurée pour des résultats optimaux
                    </p>
                </div>

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
                                            {{-- {{ $step['title'] ?? 'Step ' . ($index + 1) }}</h3> --}}
                                            {{ $step }}</h3>
                                        <p class="text-gray-600">{{ $step['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <br />

        {{-- <!-- FAQs Section -->
        @if ($service->faqs && count($service->faqs) > 0)
            <div class="mb-16">
                <div class="text-center mb-8">
                    <span
                        class="inline-block bg-purple-200 text-purple-800 text-sm font-semibold px-3 py-1 rounded-full mb-3">
                        Questions
                    </span>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Questions Fréquentes</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        Trouvez des réponses aux interrogations les plus courantes
                    </p>
                </div>
                <div class="max-w-3xl mx-auto space-y-6">
                    @foreach ($service->faqs as $faq)
                        <div class="border border-gray-200 rounded-lg p-6 transition-all hover:border-gray-300">
                            <div class="font-medium text-gray-900 text-lg">
                                {{ $faq['question'] }}
                            </div>
                            <div class="mt-4 text-gray-600">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif --}}

        <!-- CTA Section -->
        @if ($service->cta_text || $service->cta_button_label)
            <section class="services__cta rounded-lg">
                <div class="services__cta-content">
                    <h2 class="services__cta-title">{{ $service->cta_text ?? 'Prêt à transformer votre espace ?' }}</h2>

                    <a href="{{ route('contact') }}" class="services__cta-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-phone-ringing">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M20 4l-2 2" />
                            <path d="M22 10.5l-2.5 -.5" />
                            <path d="M13.5 2l.5 2.5" />
                            <path
                                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2c-8.072 -.49 -14.51 -6.928 -15 -15a2 2 0 0 1 2 -2" />
                        </svg>
                        {{ $service->cta_button_label }}
                    </a>
                </div>
            </section>
        @endif
    </div>
@endsection
