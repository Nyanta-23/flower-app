<section id="navbar" class="container z-1">

    <div class="row border-top mt-5 py-4 rounded-5 rounded-bottom-0 shadow-navigation bg-light fixed-bottom mt-lg-0 py-xl-0 pt-xl-1">

        <div class="col-12">

            <ul class="z-10 d-flex justify-content-between align-items-center px-0 py-md-3">
                <li class="list-group-item mx-auto my-auto">
                    <a href="/"
                        class="{{ request()->path() === '/' ? 'navigation-link-active' : 'navigation-link' }} text-decoration-none rounded-pill px-3 py-2 d-flex align-self-center justify-content-center gap-2 px-md-4 py-md-3">
                        <img src="{{ URL('icons/navbar/home.svg') }}"
                            class="{{ request()->path() === '/' ? 'change-icon-to-home-white-navigation-active' : 'change-icon-to-home-white-navigation' }}"
                            alt="Icon Home" />

                        <span
                            class="{{ request()->path() === '/' ? 'navigation-hidden-text-active' : 'navigation-hidden-text d-none' }} fs-4 fw-bold text-light">Beranda</span>
                    </a>
                </li>
                <li class="list-group-item mx-auto">
                    <a href="/flower"
                        class="{{ request()->path() === 'flower' ? 'navigation-link-active' : 'navigation-link' }} text-decoration-none rounded-pill px-3 py-2 d-flex align-self-center justify-content-center gap-2 px-md-4 py-md-3">
                        <img src="{{ URL('icons/navbar/flower.svg') }}"
                            class="{{ request()->path() === 'flower' ? 'change-icon-to-flower-white-navigation-active' : 'change-icon-to-flower-white-navigation' }}"
                            alt="Icon Flower" />
                        <span
                            class="{{ request()->path() === 'flower' ? 'navigation-hidden-text-active' : 'navigation-hidden-text d-none' }} fs-4 fw-bold text-light">Tanaman</span>
                    </a>
                </li>
                <li class="list-group-item mx-auto">
                    <a href="/history"
                        class="{{ request()->path() === 'history' ? 'navigation-link-active' : 'navigation-link' }} text-decoration-none rounded-pill px-3 py-2 d-flex align-self-center justify-content-center gap-2 px-md-4 py-md-3">
                        <img src="{{ URL('icons/navbar/history.svg') }}"
                            class="{{ request()->path() === 'history' ? 'change-icon-to-history-white-navigation-active' : 'change-icon-to-history-white-navigation' }}"
                            alt="Icon History" />
                        <span
                            class="{{ request()->path() === 'history' ? 'navigation-hidden-text-active' : 'navigation-hidden-text d-none' }} fs-4 fw-bold text-light">Riwayat</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</section>
