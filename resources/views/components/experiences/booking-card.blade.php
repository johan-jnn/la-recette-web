@props([
    'experience', // App\Models\Experience
])

<div {{ $attributes->merge(['class' => 'p-8 rounded-card bg-white flex flex-col gap-6']) }}>
    <div class="flex flex-col gap-3 text-forest">
        <h3 class="text-subtitle font-bold">Participer ou privatiser</h3>
        <p class="text-base leading-[1.55]">
            Teambuilding, séminaire, afterwork ou déjeuner : demandez un devis pour une expérience clé en main ou sur mesure.
        </p>
    </div>

    <div class="flex flex-col gap-3">
        @if ($experience->luma_event_id)
            <x-ui.button :url="'https://lu.ma/event/' . $experience->luma_event_id" variant="rose" external>
                Réserver l’expérience
            </x-ui.button>
        @endif

        <x-ui.button :url="route('contact.index', ['experience' => $experience->id])" :variant="$experience->luma_event_id ? 'outline' : 'rose'">
            Faire une demande
        </x-ui.button>
    </div>
</div>
