<x-layout>

    <x-slot:title>Home</x-slot:title>

    <x-layout-scan>

        <section class="container overflow-y-auto">
            
            <section class="row mx-2 mb-3 mt-3 mb-md-5 mt-md-5 align-items-lg-top">
                <div class="col-8">
                    <h4 class="fw-bold heading-home">
                        Mari temukan tanaman!
                    </h4>
                </div>

                <div class="mt-2 col-4 home-icons">
                    <div class="d-flex justify-content-end gap-2 gap-md-4">
                        {{-- <a href="#" class="d-block">
                            <img src="{{ URL('icons/bell.svg') }}" class="w-100" alt="bell" />
                        </a> --}}
                        <a href="/favorite" class="d-block">
                            <img src="{{ URL('icons/heart.svg') }}" class="w-100" alt="heart" />
                        </a>
                        
                    </div>
                </div>
                
            </section>

            <section class="row my-md-4">
                <div class="col-12">
                    <div id="scanner" class="d-flex justify-content-center mx-3 position-relative">
                        <div id="reader"
                            class="border rounded-4 mx-auto mx-md-0 d-flex align-items-center justify-content-center">
                        </div>
                        <div id="error-scanner" class="position-absolute top-50 end-25 z-1"></div>
                    </div>
                </div>
            </section>

            <section id="controller-app" class="row mb-5">

                <div class="col-12 mb-5">
                    <div class="my-5 d-flex justify-content-center gap-4 gap-md-5">

                        <input type="file" id="file-input-scanner" class="d-none" accept="image/*" />
                        <button id="select-image-btn" class="btn">
                            <img src="{{ URL('icons/select-image.svg') }}" alt="select-image-icon">
                        </button>
                        
                        
                        <div class="scanner-icon rounded-circle py-2 px-1">
                            <button class="btn" id="access-camera-btn">
                                <img src="{{ URL('icons/scanner.svg') }}" alt="scanner-icon">
                            </button>
                        </div>

                        <button id="flip-camera-btn" class="btn">
                            <img src="{{ URL('icons/change-camera.svg') }}" alt="change-camera-icon">
                        </button>
                    </div>
                </div>
            </section>
        </section>
        
    </x-layout-scan>

</x-layout>
