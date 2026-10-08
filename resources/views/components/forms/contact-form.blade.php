@props([
    'action' => route('contact.index'),
    'method' => 'POST',
    'title' => 'Contactez-nous',
    'description' => null,
    'experiences' => null,
])

@php
    // Options du type de contact depuis l'Enum ContactType
    $contactTypes = [];
    foreach (\App\Enums\ContactType::cases() as $case) {
        $contactTypes[$case->value] = $case->getLabel();
    }

    // Récupération des expériences existantes pour sélection multiple/optionnelle
    if ($experiences === null) {
        try {
            $experiences = \App\Models\Experience::query()->pluck('title', 'id')->toArray();
        } catch (\Throwable $e) {
            $experiences = [];
        }
    }
@endphp

<form action="{{ $action }}" method="{{ $method }}" {{ $attributes->merge(['class' => 'flex flex-col gap-5 w-full']) }}>
    @csrf

    @if (session('success'))
        <div class="p-4 rounded-xl bg-green-50 border border-green-200 text-green-800 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Nom & Prénom --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-forms.input-text
            name="last_name"
            label="Nom"
            placeholder="Nom"
            required
        />

        <x-forms.input-text
            name="first_name"
            label="Prénom"
            placeholder="Prénom"
            required
        />
    </div>

    {{-- Email & Téléphone --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-forms.input-email
            name="email"
            label="Email"
            placeholder="Entre ton mail"
            required
        />

        <x-forms.input-tel
            name="phone"
            label="Numéro de téléphone"
            placeholder="xx xx xx xx xx"
        />
    </div>

    {{-- Type de demande (Select custom) & Entreprise --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-forms.select
            name="type"
            label="Type de demande"
            :options="$contactTypes"
            placeholder="Choisissez un type"
            required
        />

        <x-forms.input-text
            name="company_name"
            label="Nom de l'entreprise (optionnel)"
            placeholder="Ex : Maison Dupont"
        />
    </div>

    {{-- Expériences associées (Select Multiple custom) --}}
    @if (!empty($experiences))
        <x-forms.select-multiple
            name="experience_ids[]"
            label="Expériences concernées (optionnel)"
            :options="$experiences"
            placeholder="Sélectionner une ou plusieurs expériences"
        />
    @endif

    {{-- Sujet --}}
    <x-forms.input-text
        name="object"
        label="Sujet"
        placeholder="Ecris ton sujet"
        required
    />

    {{-- Message --}}
    <x-forms.textarea
        name="message"
        label="Ton Message"
        placeholder="Ecris ici..."
        rows="4"
        required
    />

    <div class="pt-2">
        <button
            type="submit"
            class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-[#1C4937] text-white text-sm font-semibold hover:bg-[#143628] transition-colors cursor-pointer shadow-sm"
        >
            Envoyer le message
        </button>
    </div>
</form>
