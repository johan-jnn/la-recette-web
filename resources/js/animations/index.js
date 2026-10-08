import { gsap } from 'gsap';
import { ScrollSmoother } from 'gsap/ScrollSmoother';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';

import { initPageTransition } from './page-transition';
import { introTimeline, prepareReveals } from './reveal';
import { initHeader, initSmoothScroll } from './smooth-scroll';

gsap.registerPlugin(ScrollTrigger, ScrollSmoother, SplitText);

export function initAnimations() {
    const root = document.documentElement;

    // Mouvement réduit : pas d'animation, le rideau est masqué en CSS
    if (matchMedia('(prefers-reduced-motion: reduce)').matches) {
        root.classList.add('animations-ready');
        return;
    }

    const transition = initPageTransition();

    initSmoothScroll();
    initHeader();

    const intro = introTimeline();
    const startReveals = prepareReveals();

    root.classList.add('animations-ready');

    transition.enter()
        .add(() => intro.play(), '-=0.45')
        .add(startReveals, '<');

    document.fonts?.ready.then(() => ScrollTrigger.refresh());
}
