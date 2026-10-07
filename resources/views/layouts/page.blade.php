@extends('layouts.html')

@push('body')
    <x-header :nav="$nav ?? null" :cta="$cta ?? null" useSticky="{{ $navSticky ?? false ? true : false }}" />

    {{ $slot ?? '' }}
    @stack('main')

    <x-footer />
@endpush
