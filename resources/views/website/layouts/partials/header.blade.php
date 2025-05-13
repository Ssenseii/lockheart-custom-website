<header class="header">
    <div class="header__top">
        <div class="header__top-links">
            <a href="mailto:saadabou.labworks@gmail.com" class="header__top-links-action">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-mail">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                    <path d="M3 7l9 6l9 -6" />
                </svg>
                <span>saadabou.labworks@gmail.com</span>
            </a>
            <a href="tel:0602693390" class="header__top-links-action">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-phone-call">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                    <path d="M15 7a2 2 0 0 1 2 2" />
                    <path d="M15 3a6 6 0 0 1 6 6" />
                </svg>
                <span>0602693390</span>
            </a>
        </div>
        <div class="header__top-social">
            <a href="#" class="header__top-social-button">
                <img src="{{ asset('images/social-media/linkedin.svg') }}" alt="">
            </a>
            <a href="#" class="header__top-social-button">
                <img src="{{ asset('images/social-media/facebook.svg') }}" alt="">
            </a>
            <a href="#" class="header__top-social-button">
                <img src="{{ asset('images/social-media/instagram.svg') }}" alt="">
            </a>
            <a href="#" class="header__top-social-button">
                <img src="{{ asset('images/social-media/tiktok.svg') }}" alt="">
            </a>
        </div>
    </div>

    <div class="header__bottom">
        <div class="header__left">
            <a class="header__bottom-logo" href="{{ route('home') }}">
                <img src="{{ asset('images/logo_aladam.png') }}" alt="Logo">
            </a>
        </div>

        <div class="header__right">
            <nav class="header__navigation">
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('services') }}">Nos Services</a>
                <a href="{{ route('products') }}">Nos Produits</a>
                <a href="{{ route('about') }}">À propos</a>
                <a href="{{ route('references') }}">References</a>
            </nav>

            <div class="header__action">
                <a href="" class="button button--primary">
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
                    <span>Contactez Nous</span>
                </a>
            </div>
        </div>
    </div>
</header>
