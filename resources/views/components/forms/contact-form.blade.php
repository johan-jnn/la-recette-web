@props([
    'action' => null,
    'experiences' => null,
    'selectedExperiences' => [],
])

@php
    $action ??= route('contact.store');

    // Types de demande depuis l'enum ContactType (identique à l'admin Filament)
    $contactTypes = collect(\App\Enums\ContactType::cases())
        ->mapWithKeys(fn ($case) => [$case->value => $case->getLabel()])
        ->all();

    $experiences ??= \App\Models\Experience::query()->orderBy('title')->pluck('title', 'id')->all();
@endphp

<form action="{{ $action }}" method="POST" {{ $attributes->merge(['class' => 'flex flex-col gap-5 w-full']) }}>
    @csrf

    @if (session('success'))
        <div class="p-4 rounded-field bg-green-50 border border-green-200 text-green-800 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-forms.input-text name="last_name" label="Nom" placeholder="Nom" required />
        <x-forms.input-text name="first_name" label="Prénom" placeholder="Prénom" required />
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-forms.input-email name="email" label="Email" placeholder="Entre ton mail" required />
        <x-forms.input-tel name="phone" label="Numéro de téléphone" placeholder="xx xx xx xx xx" required />
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-forms.select name="type" label="Type de demande" :options="$contactTypes" placeholder="Choisissez un type" required />
        <x-forms.input-text name="company_name" label="Nom de l'entreprise (optionnel)" placeholder="Ex : Maison Dupont" />
    </div>

    @if (!empty($experiences))
        <x-forms.select-multiple
            name="experience_ids[]"
            label="Expériences concernées (optionnel)"
            :options="$experiences"
            :selected="$selectedExperiences"
            placeholder="Sélectionner une ou plusieurs expériences"
        />
    @endif

    <x-forms.input-text name="object" label="Sujet" placeholder="Ecris ton sujet" required />

    <x-forms.textarea name="message" label="Ton Message" placeholder="Ecris ici..." rows="4" required />

    <div class="pt-2">
        <x-forms.submit-button>Envoyer le message</x-forms.submit-button>
    </div>
</form>
