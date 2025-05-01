<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'confirmation app-btn-primary btn w-50 theme-btn mx-auto']) }}
    data-text="{{ $text }}" data-icon="{{ $icon }}" data-title="{{ $title }}">
    {{ $slot }}
</button>
