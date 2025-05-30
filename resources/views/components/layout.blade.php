<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flower App | {{ $title }}</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])


    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <script defer src="/theme/plugins/fontawesome/js/all.min.js"></script>


    @laravelPWA
</head>

<body class="overflow-y-auto mobile-wrapper">

    <section class="{{ in_array(request()->route()->uri(), ['history', 'favorite']) ? '' : '' }} min-h-screen">
        {{ $slot }}
    </section>

    @if (!in_array(request()->route()->uri(), ['detail']))
        <x-navbar />
    @endif

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>


    <script src="js/script.js"></script>

    <script>
        // localStorage.getItem("token") == null ? window.location.href = "/" : "";

        const token = localStorage.getItem("token");
        const favorites = localStorage.getItem("favorites");

        // if token empty, this function will call an API to generate token, so the DB will remember who you are
        if (token == null) {
            fetch("{{ route(name: 'get-new-device-id') }}", {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    localStorage.setItem("token", data.token);
                })
                .catch(error => console.error('Error:', error));
        }

        const fetchFavorites = () => {
            const urlGetFavorite = "{{ route('get-favorite', '*') }}".replace("*", token)
            // fetch all favorites
            fetch(urlGetFavorite, {

                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    localStorage.setItem("favorites", JSON.stringify(data.data || []))
                })
                .catch(error => console.error('Error:', error));
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchFavorites()
        });


        let swiper = new Swiper(".mySwiper", {
            loop: true
        });

        Fancybox.bind("[data-fancybox]", {
            Toolbar: {
                display: {
                    left: [],
                    middle: ["download", "iterateZoom", "close"],
                    right: [],
                },
            },
            Image: {
                zoom: true,
                Panzoom: {
                    maxScale: 2,
                    zoom: true,
                    touch: true
                },
            },
        });
    </script>
    @stack('scripts')

</body>

</html>
