@props([
    'experience', // App\Models\Experience
])

<div {{ $attributes->merge(['class' => 'p-6 rounded-2xl bg-[#F9F9FB] border border-[#E5E5E5] flex flex-col gap-6']) }}>
    <div>
        <h3 class="text-lg font-bold text-[#171717] mb-2">Participer ou privatiser</h3>
        <p class="text-xs text-[#626262] leading-relaxed">
            Vous souhaitez réserver pour un groupe, une entreprise ou obtenir une date sur-mesure ?
        </p>
    </div>

    <div class="flex flex-col gap-3">
        @if ($experience->luma_event_id)
            <x-ui.button :url="'https://lu.ma/event/' . $experience->luma_event_id" variant="primary" target="_blank" rel="noopener noreferrer">
                Réserver ma place ↗
            </x-ui.button>
        @endif

        <x-ui.button :url="route('contact.index', ['experience' => $experience->id])" :variant="$experience->luma_event_id ? 'outline' : 'primary'">
            Faire une demande ↗
        </x-ui.button>
    </div>
</div>
