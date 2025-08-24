<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-danger w-50 mx-auto text-white']) }}>
    {{ $slot }}
</button>
