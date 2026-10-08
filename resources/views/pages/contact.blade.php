@extends('layouts.page')

@section('title', 'Maison La Recette — Contact')
@section('description', 'Contactez-nous pour toute question, devis entreprise ou information sur nos ateliers et podcasts.')

@push('main')
    <div class="w-full bg-[#171717] text-white pt-32 pb-16 px-6 md:px-16 text-center">
        <div class="max-w-4xl mx-auto">
            <span class="text-xs uppercase tracking-widest font-semibold text-[#C8C8C8] block mb-3">
                Nous contacter
            </span>
            <h1 class="text-4xl md:text-5xl font-semibold tracking-tight mb-4">
                Parlons de votre projet
            </h1>
            <p class="text-base md:text-lg text-[#C8C8C8] max-w-xl mx-auto">
                Une question sur un atelier, une privatisation ou un épisode ? Écrivez-nous et nous vous répondrons rapidement.
            </p>
        </div>
    </div>

    <section class="w-full py-16 px-6 md:px-16 bg-[#F9F9FB]">
        <div class="max-w-3xl mx-auto">
            <div class="p-8 md:p-12 rounded-3xl bg-white border border-[#E5E5E5] shadow-sm">
                <x-forms.contact-form />
            </div>
        </div>
    </section>

    {{-- FAQ & Réseaux réutilisables --}}
    <x-sections.home.faq />
    <x-sections.home.socials />
@endpush
