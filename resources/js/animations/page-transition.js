import { gsap } from 'gsap';

const DURATION = 0.7;
const EXCLUDED_PATHS = ['/redaction']; // panneau Filament

// Lien interne vers une autre page, ouvert dans l'onglet courant sans modificateur
function isPageLink(link, event) {
    if (event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
        return false;
    }
    if ((link.target && link.target !== '_self') || link.hasAttribute('download') || 'noTransition' in link.dataset) {
        return false;
    }

    const url = new URL(link.href, location.href);

    if (url.origin !== location.origin || EXCLUDED_PATHS.some((path) => url.pathname.startsWith(path))) {
        return false;
    }

    // Ancre sur la page courante : gérée par le smooth scroll
    return url.pathname !== location.pathname || url.search !== location.search;
}

/**
 * Rideau vert entre les pages : il couvre la page au chargement (CSS) puis se lève,
 * et redescend avant de suivre un lien interne.
 */
export function initPageTransition() {
    const curtain = document.querySelector('[data-page-transition]');

    if (!curtain) {
        return { enter: () => gsap.timeline() };
    }

    const mark = curtain.querySelector('img');

    const enter = () => gsap.timeline()
        .to(mark, { scale: 0.85, autoAlpha: 0, duration: 0.3, ease: 'power2.in' })
        .to(curtain, { yPercent: -100, duration: DURATION, ease: 'power4.inOut' }, '-=0.1')
        .set(curtain, { autoAlpha: 0 });

    const leave = (href) => gsap.timeline({ onComplete: () => location.assign(href) })
        .set(curtain, { autoAlpha: 1, yPercent: 100 })
        .set(mark, { scale: 0.85, autoAlpha: 0 })
        .to(curtain, { yPercent: 0, duration: DURATION, ease: 'power4.inOut' })
        .to(mark, { scale: 1, autoAlpha: 1, duration: 0.25, ease: 'power2.out' }, '-=0.2');

    document.addEventListener('click', (event) => {
        const link = event.target.closest('a[href]');

        if (link && isPageLink(link, event)) {
            event.preventDefault();
            leave(link.href);
        }
    });

    // Retour arrière depuis le cache du navigateur : la page revient avec le rideau baissé
    window.addEventListener('pageshow', (event) => {
        if (event.persisted) {
            gsap.set(curtain, { autoAlpha: 0 });
        }
    });

    return { enter };
}
