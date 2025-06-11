// Main JavaScript for Ukrainian Catholic Holy Ghost Church website

document.addEventListener('DOMContentLoaded', function() {
    // Add language class to body for CSS targeting
    const html = document.documentElement;
    const lang = html.getAttribute('lang');
    if (lang) {
        document.body.classList.add(`lang-${lang}`);
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Enhanced carousel auto-play pause on hover
    const carousel = document.querySelector('#heroCarousel');
    if (carousel) {
        carousel.addEventListener('mouseenter', function() {
            const carouselInstance = bootstrap.Carousel.getInstance(carousel);
            if (carouselInstance) {
                carouselInstance.pause();
            }
        });

        carousel.addEventListener('mouseleave', function() {
            const carouselInstance = bootstrap.Carousel.getInstance(carousel);
            if (carouselInstance) {
                carouselInstance.cycle();
            }
        });
    }

    // Add loading class removal for fade-in animations
    setTimeout(() => {
        document.body.classList.add('loaded');
    }, 100);

    // Handle language switching
    document.querySelectorAll('[data-lang-switch]').forEach(link => {
        link.addEventListener('click', function(e) {
            // Store current scroll position
            sessionStorage.setItem('scrollPosition', window.scrollY);
        });
    });

    // Restore scroll position after language switch
    const savedScrollPosition = sessionStorage.getItem('scrollPosition');
    if (savedScrollPosition) {
        window.scrollTo(0, parseInt(savedScrollPosition));
        sessionStorage.removeItem('scrollPosition');
    }

    // Accessibility improvements
    // Add keyboard navigation for carousel
    if (carousel) {
        carousel.addEventListener('keydown', function(e) {
            const carouselInstance = bootstrap.Carousel.getInstance(carousel);
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                carouselInstance.prev();
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                carouselInstance.next();
            }
        });
    }

    // Add focus management for modals
    document.addEventListener('shown.bs.modal', function (e) {
        const modal = e.target;
        const focusableElements = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
        if (focusableElements.length > 0) {
            focusableElements[0].focus();
        }
    });

    // Performance optimization: Lazy loading for images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
}); 