@php
    $isActive = request()->is(ltrim($href,'/'));
@endphp
<li>
    <a
        href="{{ $href }}"
        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $isActive ? 'bg-gray-200 dark:bg-gray-800' : '' }}"
    >
        <svg
            aria-hidden="true"
                @class([
                    'w-6 h-6 transition duration-75',
                    'bg-gray-100 text-gray-900 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white' => $isActive,
                    'text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white' => ! $isActive,
                ])

            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
           {!! $icon !!}
        </svg>
        <span class="ml-3">{{ $label }}</span>
    </a>
</li>
