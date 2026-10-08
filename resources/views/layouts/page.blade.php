@extends('layouts.html')

@push('body')
    <x-layout.header :nav="$nav ?? null" :cta="$cta ?? null" :sticky="$navSticky ?? true" />

    <main class="w-full">
        {{ $slot ?? '' }}
        @stack('main')
    </main>

    <x-layout.footer />
@endpush
