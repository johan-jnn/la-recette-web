@props([
    'action' => route('contact.index'),
    'method' => 'POST',
    'title' => 'Contactez-nous',
    'description' => null,
])

<form action="{{ $action }}" method="{{ $method }}" {{ $attributes->merge(['class' => 'flex flex-col gap-5 w-full']) }}>
    @csrf

    @if (session('success'))
        <div class="p-4 rounded-xl bg-green-50 border border-green-200 text-green-800 text-sm">
            {{ session('success') }}
        </div>
    @endif

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

    <x-forms.input-text
        name="object"
        label="Sujet"
        placeholder="Ecris ton sujet"
        required
    />

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
            class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-[#171717] text-white text-sm font-semibold hover:bg-black transition-colors cursor-pointer"
        >
            Envoyer le message
        </button>
    </div>
</form>
