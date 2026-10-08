@extends('layouts.html')

@push('body')
    {{-- Rideau de transition entre les pages (animé par resources/js/animations/page-transition.js) --}}
    <div data-page-transition aria-hidden="true" class="page-transition fixed inset-0 z-[100] flex items-center justify-center bg-cream pointer-events-none">
        <img src="{{ asset('images/brand/logo-mark.svg') }}" alt="" width="74" height="75" class="w-[74px] h-[75px]" />
    </div>

    <x-layout.header :nav="$nav ?? null" :cta="$cta ?? null" :sticky="$navSticky ?? true" />

    {{-- Conteneurs du smooth scroll GSAP (ScrollSmoother) --}}
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main class="w-full">
                {{ $slot ?? '' }}
                @stack('main')
            </main>

            <x-layout.footer />
        </div>
    </div>
@endpush
