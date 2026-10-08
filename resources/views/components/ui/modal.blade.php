@props([
    'title',
    'description' => null,
])

{{--
    Popup accessible (Alpine.js). Slots : "trigger" (élément qui ouvre la popup) et contenu par défaut.
    Le panneau est téléporté dans <body> pour échapper aux sections en overflow-hidden.
--}}
<div {{ $attributes }} x-data="{ open: false }" x-effect="document.body.classList.toggle('overflow-hidden', open)" @keydown.escape.window="open = false">
    <div @click="open = true">
        {{ $trigger }}
    </div>

    <template x-teleport="body">
        <div
            x-show="open"
            x-transition.opacity
            x-cloak
            class="fixed inset-0 z-[60] flex items-center justify-center bg-forest/60 p-4"
            @click.self="open = false"
            role="dialog"
            aria-modal="true"
            aria-label="{{ $title }}"
        >
            <div
                x-show="open"
                x-transition
                class="relative w-full max-w-lg rounded-card bg-cream p-6 md:p-8 shadow-xl text-forest"
                x-init="$watch('open', value => value && $nextTick(() => $el.querySelector('input:not([type=hidden])')?.focus()))"
            >
                <button type="button" @click="open = false" class="absolute right-4 top-4 flex size-9 items-center justify-center rounded-pill text-forest hover:bg-white cursor-pointer" aria-label="Fermer">
                    <span aria-hidden="true" class="text-2xl leading-none">×</span>
                </button>

                <div class="mb-6 flex flex-col gap-2 pr-8">
                    <h2 class="text-subtitle font-bold">{{ $title }}</h2>
                    @if ($description)
                        <p class="text-base leading-[1.55]">{{ $description }}</p>
                    @endif
                </div>

                {{ $slot }}
            </div>
        </div>
    </template>
</div>
