<footer class="footer">
    <div class="footer__container">
        <div class="footer__row">
            <img loading="lazy"src="{{ asset($settings->logo_path ?? 'images/logo_aladam.webp') }}"
                alt="Logo {{ config('site.name') }}" class=" h-16">
        </div>
        <div class="footer__row">
            <div class="footer__col footer__col--brand">
                <div class="footer__brand">

                    <a href="{{ route('home') }}" class="footer__logo">Aladam Group</a>
                    <p class="footer__description">
                        Spécialistes en aménagement d’espaces professionnels et résidentiels au Maroc,
                        nous conjuguons tradition artisanale et technologies de pointe pour créer des
                        environnements uniques et fonctionnels.
                    </p>
                </div>
            </div>

            <div class="footer__col footer__col--menu">
                <h3 class="footer__heading">Navigation</h3>
                <ul class="footer__menu">
                    <li><a href="{{ route('about') }}" class="footer__menu-link">À propos</a></li>
                    <li><a href="{{ route('services') }}" class="footer__menu-link">Services</a></li>
                    <li><a href="{{ route('products') }}" class="footer__menu-link">Produits</a></li>
                    <li><a href="{{ route('references') }}" class="footer__menu-link">Références</a></li>
                    <li><a href="{{ route('contact') }}" class="footer__menu-link">Contact</a></li>
                </ul>
            </div>

            <div class="footer__col footer__col--menu">
                <h3 class="footer__heading">Nos Services</h3>
                <ul class="footer__menu">
                    <li><a href="/services/amenagement-professionnel" class="footer__menu-link">Aménagement
                            professionnel</a></li>
                    <li><a href="/services/amenagement-particulier" class="footer__menu-link">Aménagement
                            particulier</a></li>
                    <li><a href="/services/cloison" class="footer__menu-link">Cloison</a></li>
                    <li><a href="/services/faux-plafond" class="footer__menu-link">Faux Plafond</a></li>
                    <li><a href="/services/revetement-mural-sol" class="footer__menu-link">Revêtement Mural & Sol</a>
                    </li>
                    <li><a href="/services/climatisation" class="footer__menu-link">Climatisation</a></li>
                    <li><a href="/services/electricite" class="footer__menu-link">Électricité</a></li>
                    <li><a href="/services/plomberie" class="footer__menu-link">Plomberie</a></li>
                    <li><a href="/services/menuiserie" class="footer__menu-link">Menuiserie</a></li>
                    <li><a href="/services/multiservices" class="footer__menu-link">Multiservices</a></li>
                </ul>
            </div>

            <div class="footer__col footer__col--menu">
                <h3 class="footer__heading">Assistance</h3>
                <ul class="footer__menu">
                    <li class="footer__menu-item">
                        <a href="{{ route('contact') }}" class="footer__menu-link">FAQ</a>
                    </li>
                    <li class="footer__menu-item">
                        <a href="{{ route('contact') }}" class="footer__menu-link">Conditions de location</a>
                    </li>
                    <li class="footer__menu-item">
                        <a href="{{ route('contact') }}" class="footer__menu-link">Assistance routière</a>
                    </li>
                    <li class="footer__menu-item">
                        <a href="{{ route('contact') }}" class="footer__menu-link">Support client</a>
                    </li>
                    <li class="footer__menu-item">
                        <a href="{{ route('contact') }}" class="footer__menu-link">Informations assurance</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer__row footer__row--border">
            <div class="footer__col">
                <div class="footer__divider"></div>
            </div>
        </div>

        <div class="footer__row">
            <div class="footer__col footer__col--legal">
                <ul class="footer__legal-menu">
                    <li class="footer__legal-item">
                        <span class="footer__copyright">© 2025 Aladam Group</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer__row">
            <div class="footer__col">
                <p class="footer__disclaimer">
                    Powered by <a href="https://www.lockheart.org" target="_blank" rel="noreferrer"
                        class="footer__disclaimer-link">Lockheart Labworks</a>.
                </p>
            </div>
        </div>
    </div>
</footer>
