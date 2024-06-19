@props(['active' => false])

<li>
    <a
        {{ $attributes }}
        @class([
            'block py-2 px-3 rounded',
            'text-blue-500' => $active,
            'text-white hover:text-blue-500' => !$active,
        ])
        class="block py-2 px-3 rounded"
        aria-current="page"
    >
        {{ $slot }}
    </a>
</li>

