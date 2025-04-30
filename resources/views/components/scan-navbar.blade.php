<section id="scan-navbar" class="container d-none">

    <div class="row rounded-5 rounded-bottom-0 shadow-navigation scan-result position-absolute bg-white bottom-0 start-0 py-5">

        <div class="col-12">
            <div class="w-100">
                <img id="scan-nav-img" src="{{ URL('/images/tanaman-1.png') }}" class="img-width-scan rounded-2" alt="..." />
            </div>
        </div>
        <div class="col-12">
            <div class="fw-normal fs-5 text-center mt-3">
                <h5 id="scan-nav-title" class="text-bold"></h6>
                <p id="scan-nav-detail"></p>
                <a class="btn btn-sm btn-secondary px-3 rounded-4 me-2" href="/">
                    &larr; Kembali
                </a>
                <a id="scan-nav-link" class="btn btn-sm btn-success px-3 rounded-4" href="/flower">
                    Lihat detail &rarr;
                </a>
            </div>
        </div>

    </div>

</section>