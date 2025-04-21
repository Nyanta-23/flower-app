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

            <div class="col-12" id="history-card-wrapper">
                aaa
            </div>
        </div>
    </section>
    @push('script')
        <script>
            // const token = localStorage.getItem('token');
            // const historyCardWrapper = document.getElementById('history-card-wrapper');
            // const getFavorite = async () => {
            //     try {
            //         const response = await fetch('/api/getFavorite', {
            //             method: 'POST',
            //             headers: {
            //                 'Authorization': `Bearer ${token}`,
            //                 'Content-Type': 'application/json'
            //             }
            //         });

            //         if (!response.ok) {
            //             throw new Error('Failed to fetch history');
            //         }

            //         const data = await response.json();
            //         renderCard(data);
            //     } catch (error) {
            //         console.error('Error fetching history:', error);
            //     }
            // };

            // const renderCard = (data) => {
            //     if (data.length === 0) {
            //         historyCardWrapper.innerHTML = '<p>No history found.</p>';
            //         return;
            //     }

            //     data.forEach(item => {
            //         const card = document.createElement('div');
            //         const imageUrl = item.plant.images && item.plant.images.length > 0 ?
            //             `/${item.plant.images[0].image}` : '/images/tanaman-1.png';
            //         card.className = 'card mb-3 card-history-style';
            //         // card.innerHTML = `
            //         //     <div class="card mb-3 card-history-style">
            //         //         <div class="row d-flex align-items-center">
            //         //             <div class="col-4">
            //         //                 <img id="history-image" src="${imageUrl}"
            //         //                     class="img-fluid rounded-2 my-2 ms-2 object-fit-cover card-history-size" alt="...">
            //         //             </div>
            //         //             <div class="col-8">
            //         //                 <div class="card-body d-flex align-items-center gap-5">
            //         //                     <div>
            //         //                         <h5 class="card-title" id="history-title">
            //         //                             ${item.plant.name}
            //         //                         </h5>
            //         //                         <p class="card-text">
            //         //                             ${item.created_at}
            //         //                         </p>
            //         //                     </div>
            //         //                     <div>
            //         //                         ${item.plant.images && item.plant.images.length > 0 ? `<img src="/${imageUrl}" class="love-red" alt="...">` : ''}
            //         //                     </div>
            //         //                 </div>
            //         //             </div>
            //         //         </div>
            //         //     </div>
            //         // `;
            //         historyCardWrapper.appendChild(card);
            //     });
            // };

            // getFavorite();
        </script>
    @endpush
</x-layout>
