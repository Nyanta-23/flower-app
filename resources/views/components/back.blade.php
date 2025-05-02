<section id="heading-back" class="z-2 btn-back py-3 {{ in_array(request()->route()->uri(), ['detail']) ? '' : 'bg-white-cust' }} shadow-sm">
    <div class="row">

        <div class="col-auto">
            <a href="{{ $linkTo }}"
                class="text-center btn bg-white-cust opacity-75 rounded-circle d-flex align-items-center justify-content-center"
                style="width: 36px; height: 36px">
                <img src="{{ URL('/icons/back.svg') }}" alt="icon-back" class="mx-auto">
            </a>
        </div>

        <div class="col-auto">
            <span class="fw-bolder fs-3">{{ $headingTitle }}</span>
        </div>

    </div>

</section>
