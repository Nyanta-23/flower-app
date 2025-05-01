@props(['value'])

<label {{ $attributes->merge(['class' => 'sr-only block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
