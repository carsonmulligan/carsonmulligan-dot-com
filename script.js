// Vanilla JavaScript and jQuery implementation

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    // Fade in animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Observe all fade-in elements
    document.querySelectorAll('.fade-in').forEach(el => {
        observer.observe(el);
    });

    // Back to top button functionality
    const backToTopButton = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.style.display = 'flex';
        } else {
            backToTopButton.style.display = 'none';
        }
    });

    backToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Add active state to navigation based on scroll position
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('nav a');

    window.addEventListener('scroll', function() {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (pageYOffset >= (sectionTop - 100)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.style.color = '';
            if (link.getAttribute('href').slice(1) === current) {
                link.style.color = 'var(--primary-color)';
            }
        });
    });
});

// jQuery implementations
$(document).ready(function() {
    // Smooth scrolling for navigation links
    $('nav a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        
        const target = $(this.getAttribute('href'));
        
        if (target.length) {
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 800, 'swing');
        }
    });

    // Add hover effects to project cards with jQuery
    $('.project-card').hover(
        function() {
            $(this).find('.project-link').css('transform', 'translateX(5px)');
        },
        function() {
            $(this).find('.project-link').css('transform', 'translateX(0)');
        }
    );

    // Parallax effect for hero section
    $(window).on('scroll', function() {
        const scrolled = $(window).scrollTop();
        const parallaxSpeed = 0.5;
        
        $('.hero').css('transform', 'translateY(' + (scrolled * parallaxSpeed) + 'px)');
    });

    // Dynamic typing effect for hero title
    const heroTitle = $('.hero h1');
    const originalText = heroTitle.text();
    heroTitle.text('');
    
    let index = 0;
    const typingSpeed = 100;
    
    function typeWriter() {
        if (index < originalText.length) {
            heroTitle.text(heroTitle.text() + originalText.charAt(index));
            index++;
            setTimeout(typeWriter, typingSpeed);
        }
    }
    
    // Start typing effect when hero is visible
    const heroObserver = new IntersectionObserver(function(entries) {
        if (entries[0].isIntersecting) {
            typeWriter();
            heroObserver.disconnect();
        }
    });
    
    heroObserver.observe(document.querySelector('.hero'));

    // Add loading animation for project cards
    $('.project-card').each(function(index) {
        $(this).css({
            'animation-delay': (index * 0.1) + 's'
        });
    });

    // Enhanced social link interactions
    $('.social-link').on('mouseenter', function() {
        $(this).animate({
            'padding-left': '2rem',
            'padding-right': '2rem'
        }, 200);
    }).on('mouseleave', function() {
        $(this).animate({
            'padding-left': '1.5rem',
            'padding-right': '1.5rem'
        }, 200);
    });

    // Add ripple effect on click for buttons and cards
    $('.project-card, .social-link, #back-to-top').on('click', function(e) {
        const ripple = $('<span class="ripple"></span>');
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        
        const size = Math.max($(this).width(), $(this).height());
        const x = e.pageX - $(this).offset().left - size / 2;
        const y = e.pageY - $(this).offset().top - size / 2;
        
        ripple.css({
            width: size,
            height: size,
            left: x + 'px',
            top: y + 'px',
            position: 'absolute',
            background: 'rgba(255, 255, 255, 0.5)',
            borderRadius: '50%',
            transform: 'scale(0)',
            animation: 'ripple-animation 0.6s ease-out',
            pointerEvents: 'none'
        });
        
        $(this).append(ripple);
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    });

    // Preload images for smoother experience
    const imagesToPreload = [
        // Add any image URLs here if you add images later
    ];
    
    imagesToPreload.forEach(function(src) {
        const img = new Image();
        img.src = src;
    });

    // Mobile menu toggle (if needed in future)
    let mobileMenuOpen = false;
    
    // Easter egg: Konami code
    const konamiCode = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a'];
    let konamiIndex = 0;
    
    $(document).on('keydown', function(e) {
        if (e.key === konamiCode[konamiIndex]) {
            konamiIndex++;
            if (konamiIndex === konamiCode.length) {
                $('body').css('animation', 'rainbow 2s linear infinite');
                setTimeout(() => {
                    $('body').css('animation', '');
                    konamiIndex = 0;
                }, 3000);
            }
        } else {
            konamiIndex = 0;
        }
    });
});

// Add CSS for ripple animation dynamically
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes rainbow {
        0% { filter: hue-rotate(0deg); }
        100% { filter: hue-rotate(360deg); }
    }
    
    .project-card {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);

// Performance monitoring
if (window.performance && performance.navigation.type === 1) {
    console.log('Page reloaded');
}

// Lazy loading preparation for future images
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
    
    // Will be used when images are added
    document.querySelectorAll('img.lazy').forEach(img => {
        imageObserver.observe(img);
    });
}