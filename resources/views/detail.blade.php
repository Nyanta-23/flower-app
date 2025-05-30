<x-layout>

    <x-slot:title>Detail</x-slot:title>

    <section class="mobile-wrapper">
        <div class="container">
            <x-back headingTitle="Detail" linkTo="{{ route('flower') }}" />
            <div class="row justify-content-center px-0 position-relative max-h-screen">
                {{-- <div id="detail-img" class="height-image z-1">
                    <img src="{{ $data->images->count() > 0 ? asset('images/' . $data->images[0]->image) : URL('images/tanaman-1.png') }}"
                        alt="..." class="img-fluid unzoom-image z-0 object-fit-cover" />
                </div> --}}

                <div class="col-auto z-0 px-0">
                    <div class="swiper mySwiper px-0">
                        <div class="swiper-wrapper">
                            @foreach ($data->images as $asset)
                                <div class="swiper-slide">
                                    <a href="{{ asset('images/' . $asset->image) }}"
                                        data-fancybox="gallery">
                                        <img src="{{ asset('images/' . $asset->image) }}" alt="{{ $asset->caption }}"
                                            class="img-fluid w-100 h-100 object-fit-cover" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 bg-white-cust pt-3 px-4 border rounded-5 rounded-bottom-0 pb-5 z-1 card-overlay">
                    <div class="d-flex align-items-center justify-content-between gap-5 mb-4 pt-4">

                        <h1 class="fw-bold fs-3 mb-0">
                            {{ $data->name }}
                        </h1>
                        <div class="d-flex align-items-center gap-1">
                            <div id="btn-speak" class="btn btn-link">
                                <img id="img-speak" src="{{ URL('icons/sound-green-muted.svg') }}" alt="..." />
                            </div>
                            <div id="btn-love" class="btn btn-link">
                                <img id="img-love" src="{{ URL('icons/love-green.svg') }}" alt="..." />
                            </div>
                        </div>
                    </div>

                    <div class="mx-1 mb-5 fw-normal text-justify-to-child detail-text fs-6 pb-5">
                        {!! $data->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const btnSpeak = document.getElementById('btn-speak');
        const textToSpeak = `{!! strip_tags($data->description) !!}`;
        const plantId = "{{ $data->id }}";
        const btnLove = document.getElementById('btn-love');
        const imgLove = document.getElementById('img-love')
        const checkLikeStatus = () => {
            const favorites = JSON.parse(localStorage.getItem("favorites"));
            const isFavorite = favorites.some(favorite => favorite.plant_id == plantId);
            console.log("checking", favorites, isFavorite)
            if (isFavorite) {
                imgLove.src = "{{ URL('icons/love-red.svg') }}"
            } else {
                imgLove.src = "{{ URL('icons/love-green.svg') }}"
            }
        }

        btnSpeak.addEventListener('click', (el) => {
            const utterance = new SpeechSynthesisUtterance(textToSpeak);
            const img = document.getElementById('img-speak');
            utterance.lang = 'id-ID'; // Set the language to Indonesian

            if (speechSynthesis.speaking) {
                speechSynthesis.cancel(); // Stop any ongoing speech
                img.src = "{{ URL('icons/sound-green-muted.svg') }}";
            } else {
                speechSynthesis.speak(utterance);
                img.src = "{{ URL('icons/sound-green.svg') }}";
            }
        });

        btnLove.onclick = () => {
            const img = imgLove;
            const isAdd = img.src.includes('love-green');
            const url = isAdd ? '/api/addFavorite' : '/api/deleteFavorite';

            fetch(url, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        plant_id: plantId,
                        device_id: token,
                    })
                })
                .then(response => response.json())
                .then(async data => {
                    await fetchFavorites();
                    checkLikeStatus();

                    if (isAdd) {
                        img.src = "{{ URL('icons/love-red.svg') }}"
                    } else {
                        img.src = "{{ URL('icons/love-green.svg') }}"
                    }
                })
                .catch(error => console.error('Error:', error));
        };

        checkLikeStatus()


        const detailImg = document.getElementById('detail-img');
        const headingBack = document.getElementById('heading-back');

        detailImg.addEventListener('click', () => {


            detailImg.getElementsByTagName('img')[0].classList.toggle('zoom-image');
            detailImg.getElementsByTagName('img')[0].classList.toggle('unzoom-image');
            detailImg.classList.toggle('z-0');
            detailImg.classList.toggle('z-3');
            headingBack.classList.toggle('d-none');
        });
    </script>
</x-layout>
