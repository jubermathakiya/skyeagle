import $ from 'jquery';

const READ_MORE_MIN_CHARS = 200;
const EXPANDED_CLASS = 'is-expanded';
const SLIDER_SELECTOR = '.user-section .testimonial-slider';

function getPageJQuery() {
    return window.jQuery || $;
}

function shouldShowReadMore(textEl) {
    if (!textEl) {
        return false;
    }
    if (textEl.classList.contains(EXPANDED_CLASS)) {
        return true;
    }
    const plainText = (textEl.textContent || '').replace(/\s+/g, ' ').trim();
    if (plainText.length >= READ_MORE_MIN_CHARS) {
        return true;
    }
    return textEl.scrollHeight > textEl.clientHeight + 2;
}

function syncReadMoreToggle(card) {
    const textEl = card.querySelector('.testimonial-card__text');
    const toggleBtn = card.querySelector('.testimonial-card__toggle');
    const moreLabel = card.querySelector('.testimonial-card__toggle-more');
    const lessLabel = card.querySelector('.testimonial-card__toggle-less');

    if (!textEl || !toggleBtn) {
        return;
    }

    const showToggle = shouldShowReadMore(textEl);
    toggleBtn.classList.toggle('d-none', !showToggle);

    if (!showToggle) {
        textEl.classList.remove(EXPANDED_CLASS);
        card.classList.remove(EXPANDED_CLASS);
        toggleBtn.setAttribute('aria-expanded', 'false');
        moreLabel?.classList.remove('d-none');
        lessLabel?.classList.add('d-none');
    }
}

export function initAboutTestimonials() {
    document.querySelectorAll('.user-section .testimonial-card').forEach(syncReadMoreToggle);
}

window.initAboutTestimonials = initAboutTestimonials;

function showSliderNav($slider) {
    $slider.find('.owl-nav').removeClass('disabled').css('display', 'block');
}

function bindReadMoreClicks() {
    $(document).off('click.aboutTestimonials', '.user-section .testimonial-card__toggle');
    $(document).on('click.aboutTestimonials', '.user-section .testimonial-card__toggle', function (e) {
        e.preventDefault();
        e.stopPropagation();

        const card = this.closest('.testimonial-card');
        const textEl = card?.querySelector('.testimonial-card__text');
        const moreLabel = card?.querySelector('.testimonial-card__toggle-more');
        const lessLabel = card?.querySelector('.testimonial-card__toggle-less');

        if (!textEl || !card) {
            return;
        }

        const isExpanded = !textEl.classList.contains(EXPANDED_CLASS);
        textEl.classList.toggle(EXPANDED_CLASS, isExpanded);
        card.classList.toggle(EXPANDED_CLASS, isExpanded);
        this.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
        moreLabel?.classList.toggle('d-none', isExpanded);
        lessLabel?.classList.toggle('d-none', !isExpanded);
    });
}

function hookOwlCarousel() {
    const $page = getPageJQuery();
    const $slider = $page(SLIDER_SELECTOR);

    if (!$slider.length) {
        return;
    }

    $slider.on(
        'initialized.owl.carousel refreshed.owl.carousel translated.owl.carousel resized.owl.carousel',
        function () {
            showSliderNav($page(this));
            initAboutTestimonials();
        }
    );

    if ($slider.hasClass('owl-loaded')) {
        showSliderNav($slider);
        initAboutTestimonials();
    }
}

function refreshTestimonialSlider() {
    const $page = getPageJQuery();
    const $slider = $page(SLIDER_SELECTOR);

    if (!$slider.length || !$slider.hasClass('owl-loaded')) {
        return;
    }

    showSliderNav($slider);
    $slider.trigger('refresh.owl.carousel');
    initAboutTestimonials();
}

$(function () {
    if (!$(SLIDER_SELECTOR).length) {
        return;
    }

    bindReadMoreClicks();
    hookOwlCarousel();

    initAboutTestimonials();
    setTimeout(initAboutTestimonials, 100);
    setTimeout(initAboutTestimonials, 600);
    setTimeout(refreshTestimonialSlider, 300);
    setTimeout(refreshTestimonialSlider, 1000);

    $(window).on('load', function () {
        refreshTestimonialSlider();
        initAboutTestimonials();
    });
});
