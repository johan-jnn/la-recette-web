import { gsap } from 'gsap';
import { ScrollSmoother } from 'gsap/ScrollSmoother';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

const PIN_OFFSET = 112; // équivalent de md:top-28

/**
 * Smooth scroll (ScrollSmoother). Le header est sorti du flux (fixe) car
 * position: sticky ne fonctionne pas dans le contenu transformé.
 */
export function initSmoothScroll() {
    if (!document.querySelector('#smooth-wrapper')) {
        return null;
    }

    const smoother = ScrollSmoother.create({
        wrapper: '#smooth-wrapper',
        content: '#smooth-content',
        smooth: 1.1,
        smoothTouch: 0.1,
        effects: true,
    });

    document.documentElement.classList.add('has-smoother');

    const header = document.querySelector('[data-site-header]');
    const offset = () => (header?.firstElementChild?.offsetHeight ?? 0) + 16;

    const scrollToHash = (hash, smooth) => {
        const target = hash.length > 1 && document.getElementById(decodeURIComponent(hash.slice(1)));

        if (target) {
            smoother.scrollTo(target, smooth, `top ${offset()}px`);
        }

        return Boolean(target);
    };

    // Ancres de la page courante (#contact, #experiences…)
    document.addEventListener('click', (event) => {
        const link = event.target.closest('a[href*="#"]');

        if (!link || event.defaultPrevented) {
            return;
        }

        const url = new URL(link.href, location.href);

        if (url.origin === location.origin && url.pathname === location.pathname && url.search === location.search && scrollToHash(url.hash, true)) {
            event.preventDefault();
            history.pushState(null, '', url.hash);
        }
    });

    // Ancre dans l'URL à l'arrivée (ex. /podcast#episodes)
    window.addEventListener('load', () => {
        smoother.wrapper().scrollTop = 0;

        if (location.hash) {
            scrollToHash(location.hash, false);
        }
    });

    // Effets de profondeur sur les formes décoratives
    smoother.effects('[data-parallax]', { speed: 0.88 });

    // Remplace le sticky de la carte de réservation (fiche expérience)
    gsap.matchMedia().add('(min-width: 768px)', () => {
        gsap.utils.toArray('[data-pin]').forEach((element) => {
            ScrollTrigger.create({
                trigger: element,
                pin: true,
                pinSpacing: false,
                start: `top ${PIN_OFFSET}px`,
                endTrigger: element.parentElement,
                end: () => `bottom ${PIN_OFFSET + element.offsetHeight}px`,
            });
        });
    });

    // Les FAQ (<details>) changent la hauteur de la page
    document.addEventListener('toggle', () => ScrollTrigger.refresh(), true);

    return smoother;
}

/**
 * Header masqué en descendant, réaffiché en remontant.
 */
export function initHeader() {
    const header = document.querySelector('[data-site-header]');

    if (!header) {
        return;
    }

    const show = gsap.from(header, { yPercent: -100, duration: 0.35, ease: 'power2.out', paused: true }).progress(1);

    ScrollTrigger.create({
        start: 0,
        end: 'max',
        onUpdate: (self) => {
            const menuOpen = window.Alpine?.$data(header)?.open;

            if (menuOpen || self.direction < 0 || self.scroll() < 200) {
                show.play();
            } else {
                show.reverse();
            }
        },
    });
}
