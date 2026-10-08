import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';

const HIDDEN = { autoAlpha: 0, y: 40 };
const SHOWN = { autoAlpha: 1, y: 0, scale: 1, duration: 0.9, ease: 'power3.out', overwrite: true };
const START = 'top 92%';

// Évite d'animer un élément déjà animé par un parent
const isNested = (element) => Boolean(element.parentElement?.closest('[data-reveal], [data-reveal-stagger]'));

/**
 * Entrée de la première section (hero / en-tête de page) : titre mot à mot,
 * puis textes et boutons. Retourne une timeline en pause, jouée à la levée du rideau.
 */
export function introTimeline() {
    const section = document.querySelector('main')?.firstElementChild;
    const timeline = gsap.timeline({ paused: true });

    if (!section) {
        return timeline;
    }

    const title = section.querySelector('h1');
    const background = section.querySelector(':scope > [aria-hidden="true"] img');
    const items = [...section.querySelectorAll('nav, p, .btn')].filter(
        (element) => !title?.contains(element) && !element.closest('[data-reveal]'),
    );

    if (background) {
        timeline.from(background, { scale: 1.15, duration: 1.8, ease: 'power2.out' }, 0);
    }

    if (title) {
        const split = SplitText.create(title, { type: 'words', mask: 'words' });
        timeline.from(split.words, { yPercent: 110, duration: 0.9, ease: 'power4.out', stagger: 0.05 }, 0.1);
    }

    if (items.length) {
        timeline.from(items, { ...HIDDEN, y: 24, duration: 0.7, ease: 'power3.out', stagger: 0.08 }, 0.35);
    }

    return timeline;
}

/**
 * Apparition au scroll : [data-reveal] (bloc seul, "scale" pour un léger zoom)
 * et [data-reveal-stagger] (enfants en cascade). L'état masqué est appliqué tout de suite,
 * les déclencheurs sont créés par la fonction retournée.
 */
export function prepareReveals() {
    const singles = gsap.utils.toArray('[data-reveal]').filter((element) => !isNested(element));
    const groups = gsap.utils.toArray('[data-reveal-stagger]').filter((element) => !isNested(element));
    const children = groups.flatMap((group) => [...group.children]);

    singles.forEach((element) => gsap.set(element, { ...HIDDEN, scale: element.dataset.reveal === 'scale' ? 0.94 : 1 }));
    gsap.set(children, HIDDEN);

    // Léger dézoom des visuels pendant le défilement
    gsap.utils.toArray('[data-media] > img').forEach((image) => gsap.fromTo(
        image,
        { scale: 1.12 },
        { scale: 1, ease: 'none', scrollTrigger: { trigger: image.parentElement, start: 'top bottom', end: 'bottom top', scrub: true } },
    ));

    return () => {
        singles.forEach((element) => gsap.to(element, {
            ...SHOWN,
            scrollTrigger: { trigger: element, start: START, once: true },
        }));

        ScrollTrigger.batch(children, {
            start: START,
            once: true,
            onEnter: (batch) => gsap.to(batch, { ...SHOWN, duration: 0.8, stagger: 0.12 }),
        });
    };
}
