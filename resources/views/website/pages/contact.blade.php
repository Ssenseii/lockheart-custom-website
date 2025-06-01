@extends('website.layouts.app')

@section('title', 'Nos Services - Aménagement Professionnel et Particulier à Casablanca')
@section('meta_description', 'Découvrez nos services d’aménagement pour commerces, bureaux, maisons et restaurants à Casablanca.')
@section('meta_keywords', 'services aménagement Casablanca, agencement professionnel, design intérieur, Aladam Groupe')

@section('content')

    @if (session('success'))
        <div class="p-4 bg-green-100 text-green-700 rounded text-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class=" p-4 bg-red-100 text-red-700 text-center rounded">
            {{ session('error') }}
        </div>
    @endif
    <main class="contact contact_page">
        <!-- Header Section -->
        <header class="contact__header">
            <span class="contact__tag">
                <span class="contact__tag-pill">Contact</span>
            </span>

            <h1 class="contact__title">Nous sommes là pour vous aider</h1>
            <p class="contact__description">Aladam Groupe propose des solutions complètes d’aménagement professionnel et particulier à Casablanca.
                Notre équipe est spécialisée dans la conception, l’agencement et la rénovation de tous types d'espaces.</p>
            <div class="contact__buttons">
                <a href="{{ route('products') }}" class="contact__button contact__button--products">Nos produits</a>
                <a href="{{ route('services') }}" class="contact__button contact__button--services">Nos services</a>
            </div>
        </header>

        <!-- Contact Form & Info Section -->
        <section class="contact__form-section">
            <div class="contact__form-header">
                <span class="contact__form-tag">
                    <span class="contact__form-tag-pill">Formulaire</span>
                </span>
                <h2 class="contact__form-title">Envoyez-nous un message</h2>
                <p class="contact__form-description">Remplissez le formulaire ci-dessous et nous vous répondrons dans les
                    plus brefs délais.</p>
            </div>

            <div class="contact__form-container">
                <form class="contact__form" action="{{ route('contact.send') }}" method="POST">
                    @csrf

                    <div class="contact__form-group">
                        <label for="name" class="contact__form-label">Nom complet</label>
                        <input type="text" id="name" name="name" class="contact__form-input"
                            placeholder="Votre nom" required>
                    </div>

                    <div class="contact__form-group">
                        <label for="email" class="contact__form-label">Email</label>
                        <input type="email" id="email" name="email" class="contact__form-input"
                            placeholder="votre@email.com" required>
                    </div>

                    <div class="contact__form-group">
                        <label for="subject" class="contact__form-label">Sujet</label>
                        <input type="text" id="subject" name="subject" class="contact__form-input"
                            placeholder="Objet de votre message" required>
                    </div>

                    <div class="contact__form-group">
                        <label for="message" class="contact__form-label">Message</label>
                        <textarea id="message" name="message" class="contact__form-textarea" placeholder="Votre message..." required></textarea>
                    </div>


                    <button type="submit" class="contact__form-submit">Envoyer le message</button>
                </form>



                <div class="contact__info">
                    <div class="contact__info-item">
                        <h3 class="contact__info-title"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                <path
                                    d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                            </svg>
                            Localisation
                        </h3>
                        <div class="contact__info-content">
                            <p class="contact__info-text">
                                {{$settings->contact_address_1 }}
                            </p>
                        </div>
                    </div>

                    <div class="contact__info-item">
                        <h3 class="contact__info-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-phone-ringing">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M20 4l-2 2" />
                                <path d="M22 10.5l-2.5 -.5" />
                                <path d="M13.5 2l.5 2.5" />
                                <path
                                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2c-8.072 -.49 -14.51 -6.928 -15 -15a2 2 0 0 1 2 -2" />
                            </svg>
                            Téléphone
                        </h3>
                        <div class="contact__info-content">
                            <a href="tel:{{ $settings->contact_phone_2 }}" class="contact__info-contact">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-device-landline-phone">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M20 3h-2a2 2 0 0 0 -2 2v14a2 2 0 0 0 2 2h2a2 2 0 0 0 2 -2v-14a2 2 0 0 0 -2 -2z" />
                                    <path d="M16 4h-11a3 3 0 0 0 -3 3v10a3 3 0 0 0 3 3h11" />
                                    <path d="M12 8h-6v3h6z" />
                                    <path d="M12 14v.01" />
                                    <path d="M9 14v.01" />
                                    <path d="M6 14v.01" />
                                    <path d="M12 17v.01" />
                                    <path d="M9 17v.01" />
                                    <path d="M6 17v.01" />
                                </svg>
                                {{ $settings->contact_phone_2 }}

                            </a>
                            <a href="tel:{{ $settings->contact_phone_1 }}" class="contact__info-contact">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-device-mobile">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z" />
                                    <path d="M11 4h2" />
                                    <path d="M12 17v.01" />
                                </svg>
                                {{ $settings->contact_phone_1 }}
                            </a>
                        </div>
                    </div>

                    <div class="contact__info-item">
                        <h3 class="contact__info-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-mailbox">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 21v-6.5a3.5 3.5 0 0 0 -7 0v6.5h18v-6a4 4 0 0 0 -4 -4h-10.5" />
                                <path d="M12 11v-8h4l2 2l-2 2h-4" />
                                <path d="M6 15h1" />
                            </svg>
                            Email
                        </h3>
                        <div class="contact__info-content">
                            <a href="mailto:{{ $settings->email_main }}" class="contact__info-contact">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-mail">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                    <path d="M3 7l9 6l9 -6" />
                                </svg>
                                {{ $settings->email_main }}
                            </a>

                            <a href="mailto:{{ $settings->email_info }}" class="contact__info-contact">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-mail">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                    <path d="M3 7l9 6l9 -6" />
                                </svg>
                                {{ $settings->email_info }}

                            </a>
                            <a href="mailto:{{ $settings->email_support }}" class="contact__info-contact">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-help-circle">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                    <path d="M12 16v.01" />
                                    <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                                </svg>
                                {{ $settings->email_support }}

                            </a>
                        </div>
                    </div>

                    <div class="contact__info-item">
                        <h3 class="contact__info-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-social">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M5 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M19 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M12 14m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M12 7l0 4" />
                                <path d="M6.7 17.8l2.8 -2" />
                                <path d="M17.3 17.8l-2.8 -2" />
                            </svg>
                            Réseaux sociaux
                        </h3>
                        <div class="contact__social">
                            <a href="https://www.facebook.com/{{ $settings->social_facebook }}" target="_blank" rel="noreferrer" class="contact__social-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                </svg>
                                Facebook
                            </a>

                            <a href="https://www.linkedin.com/{{ $settings->social_linkedin }}" target="_blank" rel="noreferrer" class="contact__social-link">                            
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 11v5" />
                                    <path d="M8 8v.01" />
                                    <path d="M12 16v-5" />
                                    <path d="M16 16v-3a2 2 0 1 0 -4 0" />
                                    <path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" />
                                </svg>
                                LinkedIn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="contact__map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937586!2d2.292292615509614!3d48.85837007928746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1623251234567!5m2!1sfr!2sfr"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>

        <!-- FAQ Section -->
        <section class="contact__faq">
            <div class="contact__faq-header">
                <span class="contact__faq-tag">
                    <span class="contact__faq-tag-pill">Support</span>
                </span>
                <h2 class="contact__faq-title">Questions Fréquentes</h2>
                <p class="contact__faq-subtitle">Trouvez rapidement les réponses à vos questions</p>
                <p class="contact__faq-description">Notre équipe a compilé les questions les plus courantes pour vous
                    aider. Si vous ne trouvez pas ce que vous cherchez, n'hésitez pas à nous contacter directement.</p>
            </div>

            <div class="contact__faq-grid">
                <div class="contact__faq-card">
                    <div class="contact__faq-card-header">
                        <h3 class="contact__faq-card-title">Horaires d'ouverture</h3>
                        <div class="contact__faq-card-icon">?</div>
                    </div>
                    <div class="contact__faq-card-content">
                        <p>Nos bureaux sont ouverts du lundi au vendredi, de 9h à 18h. Nous sommes fermés les week-ends et
                            jours fériés.</p>
                    </div>
                </div>

                <div class="contact__faq-card">
                    <div class="contact__faq-card-header">
                        <h3 class="contact__faq-card-title">Délai de réponse</h3>
                        <div class="contact__faq-card-icon">!</div>
                    </div>
                    <div class="contact__faq-card-content">
                        <p>Nous nous engageons à répondre à toutes les demandes dans un délai maximum de 48 heures
                            ouvrables. Pour les urgences, privilégiez notre numéro de téléphone.</p>
                    </div>
                </div>

                <div class="contact__faq-card">
                    <div class="contact__faq-card-header">
                        <h3 class="contact__faq-card-title">Support technique</h3>
                        <div class="contact__faq-card-icon">?</div>
                    </div>
                    <div class="contact__faq-card-content">
                        <p>Notre équipe technique est disponible du lundi au vendredi de 8h à 19h. Contactez-nous par
                            téléphone ou via notre chat en ligne pour une assistance rapide.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        function contactForm() {
            return {
                form: {
                    name: '',
                    email: '',
                    subject: '',
                    message: '',
                },
                loading: false,
                successMessage: '',
                errorMessage: '',

                async submitForm() {
                    this.loading = true;
                    this.successMessage = '';
                    this.errorMessage = '';

                    try {
                        const response = await fetch("{{ route('contact.send') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content')
                            },
                            body: JSON.stringify(this.form)
                        });

                        const data = await response.json();

                        if (response.ok) {
                            this.successMessage = data.message;
                            this.form = {
                                name: '',
                                email: '',
                                subject: '',
                                message: ''
                            };
                        } else {
                            this.errorMessage = data.message || 'Erreur lors de l’envoi.';
                        }
                    } catch (error) {
                        this.errorMessage = 'Erreur réseau.';
                    } finally {
                        this.loading = false;
                    }
                }
            };
        }
    </script>
@endsection
