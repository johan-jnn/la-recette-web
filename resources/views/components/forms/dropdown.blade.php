{{-- Panneau déroulant partagé par les selects custom (attend une variable Alpine "open") --}}
<div
    x-show="open"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0 translate-y-1"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-1"
    style="display: none;"
    {{ $attributes->merge(['class' => 'absolute left-0 top-full mt-1.5 w-full bg-white rounded-field border border-line shadow-lg z-30 max-h-60 overflow-y-auto py-1']) }}
>
    {{ $slot }}
</div>
