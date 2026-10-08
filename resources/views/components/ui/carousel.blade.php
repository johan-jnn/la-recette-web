@props([
    'count' => 0,
])

{{--
    Carrousel responsive (1 / 2 / 3 éléments visibles).
    Slots : "header" (reçoit le scope Alpine, ex. <x-ui.carousel-controls />) et le slot par défaut (éléments).
    Chaque élément doit être enveloppé dans <x-ui.carousel-item>.
--}}
<div
    {{ $attributes }}
    x-data="{
        currentSlide: 0,
        totalItems: {{ (int) $count }},
        perPage() {
            return window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
        },
        maxIndex() {
            return Math.max(0, this.totalItems - this.perPage());
        },
        next() {
            this.currentSlide = this.currentSlide < this.maxIndex() ? this.currentSlide + 1 : 0;
        },
        prev() {
            this.currentSlide = this.currentSlide > 0 ? this.currentSlide - 1 : this.maxIndex();
        }
    }"
    @resize.window="currentSlide = Math.min(currentSlide, maxIndex())"
>
    {{ $header ?? '' }}

    <div class="relative overflow-hidden py-2 -mx-2 px-2">
        <div
            class="flex gap-6 transition-transform duration-500 ease-out"
            :style="'transform: translateX(calc(-' + currentSlide + ' * (100% + 24px) / ' + perPage() + '))'"
        >
            {{ $slot }}
        </div>
    </div>

    <div class="flex items-center justify-center gap-2 mt-8" x-show="maxIndex() > 0">
        <template x-for="i in (maxIndex() + 1)" :key="i">
            <button
                type="button"
                @click="currentSlide = i - 1"
                class="transition-all duration-300 rounded-full cursor-pointer h-2"
                :class="currentSlide === (i - 1) ? 'w-6 bg-[#1C4937]' : 'w-2 bg-[#D6D6D6] hover:bg-[#808080]'"
                :aria-label="'Aller à la vue ' + i"
            ></button>
        </template>
    </div>
</div>
