/**
 * Main JavaScript File
 * Author Website Interactions
 */

(function() {
    'use strict';

    // Mobile Navigation Toggle
    const mobileNavToggle = document.getElementById('mobileNavToggle');
    const mainNav = document.getElementById('mainNav');
    const mobileNavOverlay = document.getElementById('mobileNavOverlay');

    if (mobileNavToggle && mainNav && mobileNavOverlay) {
        mobileNavToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            mobileNavOverlay.classList.toggle('active');
            document.body.style.overflow = mainNav.classList.contains('active') ? 'hidden' : '';
        });

        mobileNavOverlay.addEventListener('click', function() {
            mainNav.classList.remove('active');
            mobileNavOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });

        // Close nav when clicking a link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                mainNav.classList.remove('active');
                mobileNavOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }

    // Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Fade-in on Scroll (IntersectionObserver)
    const fadeElements = document.querySelectorAll('.fade-in');
    
    if ('IntersectionObserver' in window) {
        const fadeObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    fadeObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        fadeElements.forEach(element => {
            fadeObserver.observe(element);
        });
    } else {
        // Fallback for browsers without IntersectionObserver
        fadeElements.forEach(element => {
            element.classList.add('visible');
        });
    }

    // Contact Form Validation
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Reset previous errors
            const errorElements = contactForm.querySelectorAll('.form-error');
            errorElements.forEach(el => {
                el.classList.remove('show');
                el.textContent = '';
            });
            
            const inputs = contactForm.querySelectorAll('.form-input, .form-textarea');
            inputs.forEach(input => {
                input.classList.remove('error');
                
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('error');
                    const errorId = input.id + 'Error';
                    const errorEl = document.getElementById(errorId);
                    if (errorEl) {
                        errorEl.textContent = 'Ова поле е задолжително.';
                        errorEl.classList.add('show');
                    }
                }
                
                // Email validation
                if (input.type === 'email' && input.value.trim()) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(input.value)) {
                        isValid = false;
                        input.classList.add('error');
                        const errorEl = document.getElementById('emailError');
                        if (errorEl) {
                            errorEl.textContent = 'Ве молиме внесете валидна е-пошта.';
                            errorEl.classList.add('show');
                        }
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                // Scroll to first error
                const firstError = contactForm.querySelector('.error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstError.focus();
                }
            }
        });

        // Real-time validation
        const inputs = contactForm.querySelectorAll('.form-input, .form-textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (!this.value.trim()) {
                    this.classList.add('error');
                    const errorId = this.id + 'Error';
                    const errorEl = document.getElementById(errorId);
                    if (errorEl) {
                        errorEl.textContent = 'Ова поле е задолжително.';
                        errorEl.classList.add('show');
                    }
                } else {
                    this.classList.remove('error');
                    const errorId = this.id + 'Error';
                    const errorEl = document.getElementById(errorId);
                    if (errorEl) {
                        errorEl.classList.remove('show');
                    }
                }
            });

            input.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('error');
                    const errorId = this.id + 'Error';
                    const errorEl = document.getElementById(errorId);
                    if (errorEl) {
                        errorEl.classList.remove('show');
                    }
                }
            });
        });
    }

    // Add slide-up animation to elements on load
    window.addEventListener('load', function() {
        const slideElements = document.querySelectorAll('.book-card, .category-card');
        slideElements.forEach((element, index) => {
            setTimeout(() => {
                element.classList.add('slide-up');
            }, index * 100);
        });
    });
})();









