{{-- <x-layout>

    <x-slot:title>Favorite</x-slot:title>

    <section class="container mb-5 pb-5">

        <x-back headingTitle="Favorite" linkTo="/" />

        <div class="row overflow-y-auto history-list">

            <div class="col-12">
                <div class="card mb-3 card-history-style">
                    <div class="row d-flex align-items-center">
                        <div class="col-4">
                            <img src="{{ URL('/images/tanaman-1.png') }}"
                                class="img-fluid rounded-2 my-2 ms-2 object-fit-cover card-history-size" alt="...">
                        </div>
                        <div class="col-8">
                            <div class="card-body d-flex align-items-center gap-5">
                                <div>
                                    <h5 class="card-title">
                                        Hanjuang
                                    </h5>
                                    <p class="card-text">
                                        13/10/24 18:30
                                    </p>
                                </div>
                                <div>
                                    <img src="{{ URL('/icons/love-red.svg') }}" class="love-red" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

</x-layout> --}}
<x-layout>

    <x-slot:title>Favorite</x-slot:title>

    <section class="container mb-5 pb-5">

        <x-back headingTitle="Favorite" linkTo="/" />

        <div class="row overflow-y-auto history-list">

            <div class="col-12" id="history-card-wrapper"></div>
        </div>
    </section>
    <script>
        const token = localStorage.getItem('token');
        const historyCardWrapper = document.getElementById('history-card-wrapper');

        const renderCard = () => {
            const data = JSON.parse(localStorage.getItem('favorites')) || [];
            historyCardWrapper.innerHTML = ''
            console.log(historyCardWrapper)
            if (data.length === 0) {
                historyCardWrapper.innerHTML = '<p class="text-center fs-6 my-4">No Favorites found.</p>';
                return;
            }
            console.log(data, data.length == 0)
            data.forEach(item => {
                console.log(item)
                const imageUrl = item.plant.images && item.plant.images.length > 0 ?
                    `/images/${item.plant.images[0].image}` : '/images/tanaman-1.png';
                historyCardWrapper.innerHTML += `
                        <a class="card mb-3 card-history-style p-1 text-decoration-none" href="/show-plant/${item.plant.slug}">
                            <div class="row d-flex align-items-center">
                                <div class="col-5">
                                    <img id="history-image" src="${imageUrl}"
                                        class="img-fluid rounded-3 my-2 ms-2 object-fit-cover card-history-size" alt="...">
                                </div>
                                <div class="col-7 d-flex justify-content-between align-items-center p-0">
                                    <div class="card border-0 shadow-none">
                                        <h5 class="card-title" id="history-title">
                                            ${item.plant.name}
                                        </h5>
                                        <p class="card-text">
                                            ${item.created_at}
                                        </p>
                                    </div>
                                    <div class="p-3 pe-5">
                                        <img src="{{ URL('/icons/love-red.svg') }}" class="love-red" alt="...">
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;
            });
        };

        renderCard();
    </script>
</x-layout>
