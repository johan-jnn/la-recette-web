@props([
    'action' => null,
    'theme' => 'light', // light (fond clair), dark (fond vert foncé — maquette "Toutes les expériences")
    'selectedType' => null,
    'experiences' => null,
    'selectedExperiences' => [],
    'submitLabel' => null,
])

@php
    use App\Enums\ContactType;

    $dark = $theme === 'dark';
    $action ??= route('contact.store');

    // Libellés propres à chaque thème (repris des maquettes / wireframes)
    $copy = $dark
        ? [
            'email' => ['label' => 'Email', 'placeholder' => 'Entre ton mail'],
            'object' => ['label' => 'Sujet', 'placeholder' => 'Ecris ton sujet'],
            'message' => ['label' => 'Ton message', 'placeholder' => 'Ecris ici...'],
            'submit' => 'Nous contacter',
        ]
        : [
            'email' => ['label' => 'Adresse e-mail', 'placeholder' => 'vous@exemple.fr'],
            'object' => ['label' => 'Sujet', 'placeholder' => 'En quelques mots'],
            'message' => ['label' => 'Votre message', 'placeholder' => 'Comment pouvons-nous vous aider ?'],
            'submit' => 'Envoyer mon message',
        ];

    // Types de demande depuis l'enum ContactType (identique à l'admin Filament)
    $contactTypes = collect(ContactType::cases())
        ->mapWithKeys(fn ($case) => [$case->value => $case->getLabel()])
        ->all();

    $experiences ??= \App\Models\Experience::query()->orderBy('title')->pluck('title', 'id')->all();
@endphp

{{-- Formulaire de contact (ContactController@store → ContactEntry), décliné en thème clair ou sombre --}}
@if (session('success'))
    {{-- Envoi réussi : seul le message de confirmation est affiché --}}
    <div role="status" {{ $attributes->merge(['class' => 'flex flex-col items-center gap-4 w-full py-10 text-center ' . ($dark ? 'text-cream' : 'text-forest')]) }}>
        <p class="text-subtitle font-bold">Message envoyé</p>
        <p class="text-body-lg max-w-xl">{{ session('success') }}</p>
    </div>
@else
<form action="{{ $action }}" method="POST" {{ $attributes->merge(['class' => 'flex flex-col w-full ' . ($dark ? 'gap-10' : 'gap-5')]) }}>
    @csrf

    @unless ($dark)
        <p class="text-sm leading-[1.55] text-muted">Les champs marqués <span class="text-red-500">*</span> sont obligatoires.</p>
    @endunless

    <div class="flex flex-col {{ $dark ? 'gap-6' : 'gap-5' }}">
        {{-- Identité --}}
        @if ($dark)
            <fieldset class="flex flex-col gap-2">
                <legend class="mb-2 text-base text-cream">Nom et prénom</legend>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-8">
                    <x-forms.input-text name="last_name" placeholder="Nom" aria-label="Nom" tone="dark" required />
                    <x-forms.input-text name="first_name" placeholder="Prénom" aria-label="Prénom" tone="dark" required />
                </div>
            </fieldset>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-forms.input-text name="first_name" label="Prénom" placeholder="Votre prénom" required />
                <x-forms.input-text name="last_name" label="Nom" placeholder="Votre nom" required />
            </div>
        @endif

        {{-- Coordonnées --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 {{ $dark ? 'gap-6 sm:gap-8' : 'gap-4' }}">
            <x-forms.input-email name="email" :label="$copy['email']['label']" :placeholder="$copy['email']['placeholder']" :tone="$theme" required />
            <x-forms.input-tel name="phone" label="Numéro de téléphone" placeholder="xx xx xx xx xx" :tone="$theme" required />
        </div>

        {{-- Type de demande & entreprise --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 {{ $dark ? 'gap-6 sm:gap-8' : 'gap-4' }}">
            <x-forms.select name="type" label="Objet de votre demande" :options="$contactTypes" :selected="$selectedType" placeholder="Choisir : question, devis, réservation…" :tone="$theme" required />
            <x-forms.input-text name="company_name" label="Nom de l'entreprise (optionnel)" placeholder="Ex : Maison Dupont" :tone="$theme" />
        </div>

        @if (!empty($experiences))
            <x-forms.select-multiple
                name="experience_ids[]"
                label="Expériences concernées (optionnel)"
                :options="$experiences"
                :selected="$selectedExperiences"
                placeholder="Sélectionner une ou plusieurs expériences"
                :tone="$theme"
            />
        @endif

        <x-forms.input-text name="object" :label="$copy['object']['label']" :placeholder="$copy['object']['placeholder']" :tone="$theme" required />
        <x-forms.textarea name="message" :label="$copy['message']['label']" :placeholder="$copy['message']['placeholder']" rows="5" :tone="$theme" required />

        <p class="text-sm leading-[1.55] {{ $dark ? 'text-cream' : 'text-muted' }}">
            Les données du formulaire servent uniquement à traiter votre demande.
        </p>
    </div>

    <div @class(['flex justify-center' => $dark])>
        <x-forms.submit-button :variant="$dark ? 'cream' : 'sage'">{{ $submitLabel ?? $copy['submit'] }}</x-forms.submit-button>
    </div>
</form>
@endif
