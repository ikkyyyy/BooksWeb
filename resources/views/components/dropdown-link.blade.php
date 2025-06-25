@props(['href'])

<a {{ $attributes->merge(['href' => $href, 'class' => 'block px-4 py-2 text-sm text-gray-700']) }}>
    {{ $slot }}
</a>
