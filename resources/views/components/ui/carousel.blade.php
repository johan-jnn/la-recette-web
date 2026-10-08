{{--
    Carrousel à défilement horizontal (scroll-snap) : flèches roses de part et d'autre
    et pastilles de pagination. Chaque élément est enveloppé dans <x-ui.carousel-item>.
--}}
<div
    {{ $attributes->merge(['class' => 'flex flex-col gap-8']) }}
    x-data="{
        page: 0,
        pages: 1,
        update() {
            const track = this.$refs.track;
            this.pages = Math.max(1, Math.ceil((track.scrollWidth - 1) / track.clientWidth));
            this.page = Math.min(this.pages - 1, Math.round(track.scrollLeft / track.clientWidth));
        },
        go(index) {
            const target = (index + this.pages) % this.pages;
            this.$refs.track.scrollTo({ left: target * this.$refs.track.clientWidth, behavior: 'smooth' });
        }
    }"
    x-init="$nextTick(() => update())"
    @resize.window.debounce.150ms="update()"
>
    <div class="flex items-center gap-4 lg:gap-11">
        <button
            type="button"
            class="hidden md:block shrink-0 cursor-pointer transition-opacity hover:opacity-80 disabled:opacity-0"
            :disabled="pages < 2"
            @click="go(page - 1)"
            aria-label="Précédent"
        >
            <img src="{{ asset('images/icons/arrow-circle.svg') }}" alt="" width="75" height="75" class="size-[75px]" />
        </button>

        <div x-ref="track" @scroll.debounce.100ms="update()" class="flex-1 min-w-0 overflow-x-auto scrollbar-none snap-x snap-mandatory">
            <div class="flex gap-6 lg:gap-11 w-max min-w-full justify-center">
                {{ $slot }}
            </div>
        </div>

        <button
            type="button"
            class="hidden md:block shrink-0 cursor-pointer transition-opacity hover:opacity-80 disabled:opacity-0"
            :disabled="pages < 2"
            @click="go(page + 1)"
            aria-label="Suivant"
        >
            <img src="{{ asset('images/icons/arrow-circle.svg') }}" alt="" width="75" height="75" class="size-[75px] rotate-180" />
        </button>
    </div>

    <div class="flex items-center justify-center gap-1" x-show="pages > 1">
        <template x-for="i in pages" :key="i">
            <button
                type="button"
                @click="go(i - 1)"
                class="rounded-pill bg-rose transition-all duration-300 cursor-pointer"
                :class="page === i - 1 ? 'w-9 h-3' : 'size-3.5'"
                :aria-label="'Aller à la page ' + i"
            ></button>
        </template>
    </div>
</div>
