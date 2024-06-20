<div>
    <img class="{{ $attributes['class'] ?? '' }}" {{ $attributes->merge(['class' => '']) }}
        src="{{ asset('assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'logo' . DIRECTORY_SEPARATOR . 'logo.png') }}"
        alt="Logo">
        
</div>
