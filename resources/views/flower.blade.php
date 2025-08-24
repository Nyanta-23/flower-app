<x-layout>

    <x-slot:title>Flower</x-slot:title>

    <section class="container mb-5 pb-5">

        {{-- Search box --}}
        <section class="row mt-4">
            <div class="col-12">

                <form method="GET" action="{{route('flower')}}" class="d-flex justify-content-between gap-2" role="search">
                    <div class="search-input d-flex rounded-4 w-100">
                        {{-- <div class="position-relative px-4 overflow-hidden search-box-icon rounded-start-0">
                            <svg width="23" height="23" class="position-absolute top-50 start-50 translate-middle" viewBox="0 0 23 23" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.742 19.1196C22.1283 19.5489 22.1283 20.1928 21.699 20.5792L20.4971 21.7812C20.1107 22.2105 19.4668 22.2105 19.0375 21.7812L14.7876 17.5313C14.573 17.3167 14.4871 17.0591 14.4871 16.8015V16.0718C12.9417 17.2737 11.0529 17.9606 8.99237 17.9606C4.05565 17.9606 0.0633545 13.9683 0.0633545 9.03158C0.0633545 4.13779 4.05565 0.102563 8.99237 0.102563C13.8862 0.102563 17.9214 4.13779 17.9214 9.03158C17.9214 11.135 17.1916 13.0239 16.0326 14.5264H16.7194C16.977 14.5264 17.2345 14.6551 17.4492 14.8269L21.742 19.1196ZM8.99237 14.5264C11.9973 14.5264 14.4871 12.0795 14.4871 9.03158C14.4871 6.02662 11.9973 3.5368 8.99237 3.5368C5.94449 3.5368 3.49759 6.02662 3.49759 9.03158C3.49759 12.0795 5.94449 14.5264 8.99237 14.5264Z"
                                    fill="#D9D9D9" />
                            </svg>
                        </div> --}}

                        <input class="form-control border-0 fw-bolder fs-6 search-input py-3 rounded-4" type="search" name="search"
                            placeholder="Cari tanaman" aria-label="Search" value="{{ request('search') }}"/>
                    </div>
                    <button class="btn btn-success px-4 rounded-4" type="submit">
                        <i class="fa fa-search text-white"></i>
                    </button>
                </form>

            </div>
        </section>

        {{-- List Flower --}}
        <section class="row row-cols-2 mt-4 mb-5 px-1 h-100">
            @foreach ($datas as $data)
                <div class="col">
                    <a href="{{ route('show-plant', ['slug' => $data->slug]) }}"
                        class="card mt-3 border-top-0 rounded-top-4 rounded-bottom-3 border-0 text-decoration-none">
                        @if($data->images->count() > 0)
                            <img src="{{ asset("images/" . $data->images[0]->image) }}"
                                class="card-img-top rounded-top-4 card-list-size object-fit-cover" alt="...">
                        @else
                            <img src="{{ URL('/images/tanaman-1.png') }}"
                                class="card-img-top rounded-top-4 card-list-size object-fit-cover" alt="...">
                        @endif
                        <div class="card-body text-center py-4">
                            <p class="card-text fw-bolder fs-6">
                                {{ $data->name }}<br>
                                <i class="fs-6 fw-light">({{ $data->scientific_name }})</i>
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
            {{-- <div class="col">
                <a href="/detail" class="card mt-3 border-top-0 rounded-top-4 rounded-bottom-3 border-0 text-decoration-none">
                    <img src="{{ URL('/images/tanaman-2.jpg') }}"
                        class="card-img-top rounded-top-4 card-list-size object-fit-cover" alt="...">
                    <div class="card-body text-center py-4">
                        <p class="card-text fw-bolder fs-6">Sri Rejeki</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/detail" class="card mt-3 border-top-0 rounded-top-4 rounded-bottom-3 border-0 text-decoration-none">
                    <img src="{{ URL('/images/tanaman-3.jpeg') }}"
                        class="card-img-top rounded-top-4 card-list-size object-fit-cover" alt="...">
                    <div class="card-body text-center py-4">
                        <p class="card-text fw-bolder fs-6">Sri Rejeki</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/detail" class="card mt-3 border-top-0 rounded-top-4 rounded-bottom-3 border-0 text-decoration-none">
                    <img src="{{ URL('/images/tanaman-4.jpg') }}"
                        class="card-img-top rounded-top-4 card-list-size object-fit-cover" alt="...">
                    <div class="card-body text-center py-4">
                        <p class="card-text fw-bolder fs-6">Sri Rejeki</p>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="/detail" class="card mt-3 border-top-0 rounded-top-4 rounded-bottom-3 border-0 text-decoration-none">
                    <img src="{{ URL('/images/tanaman-4.jpg') }}"
                        class="card-img-top rounded-top-4 card-list-size object-fit-cover" alt="...">
                    <div class="card-body text-center py-4">
                        <p class="card-text fw-bolder fs-6">Sri Rejeki</p>
                    </div>
                </a>
            </div> --}}
        </section>
    </section>

    <x-navbar />
</x-layout>
