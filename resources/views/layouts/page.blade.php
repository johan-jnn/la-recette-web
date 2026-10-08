@extends('layouts.html')

@push('body')
    <x-header :nav="$nav ?? null" :cta="$cta ?? null" useSticky="{{ $navSticky ?? true }}" />

    <main class="w-full">
        {{ $slot ?? '' }}
        @stack('main')
    </main>

    <x-footer />
@endpush
