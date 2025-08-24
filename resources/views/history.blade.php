<x-layout>

    <x-slot:title>Riwayat</x-slot:title>

    <section class="container mb-5 pb-5">

        <x-back headingTitle="Riwayat" linkTo="/" />

        <section class="overflow-y-auto overflow-x-hidden history-list">
            <div class="row mb-1">
                <p class="fw-bold fs-5">Total Riwayat: <span id="total-history">0</span></p>
            </div>
            <div class="row row-cols-2" id="history-row">
            </div>
        </section>


    </section>
    <script>
        const token = localStorage.getItem("token")
        const historyRow = document.getElementById('history-row')
        const totalHistory = document.getElementById('total-history')

        const fetchHistories = () => {
            const urlGetHistories = "{{ route('get-scans', parameters: '*') }}".replace("*", token)
            // fetch all favorites
            console.log(urlGetHistories)
            fetch(urlGetHistories, {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const parentEl = document.getElementById('history-row')
                    totalHistory.textContent = data.data.length
                    historyRow.innerHTML = ''

                    data.data.map((item) => {
                        historyRow.innerHTML += `<div class="col">
                            <div class="card mb-4 card-history-style">
                                <a href="/show-plant/${item.plant.slug}" class="row d-flex align-items-center text-decoration-none text-dark">
                                    <div class="col-12">
                                        <img src="/images/${item.plant.images[0].image}"
                                            class="img-fluid rounded-3 my-2 ms-2 object-fit-cover card-history-size"
                                            alt="...">
                                    </div>
                                    <div class="col-12">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                            ${item.plant.name}
                                            </h5>
                                            <p class="card-text">
                                            ${new Date(item.created_at).toLocaleString()}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>`
                    })
                })
                .catch(error => console.error('Error:', error));
        }

        fetchHistories()
    </script>

</x-layout>
