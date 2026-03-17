
document.addEventListener("DOMContentLoaded", () => {

    /* =========================
       COUNTER (IntersectionObserver)
    ========================= */
    function animateCounter(el) {
        const target = +el.dataset.target;
        const speed = 200;
        const increment = target / speed;
        let count = 0;

        function update() {
            count += increment;
            if (count < target) {
                el.textContent = Math.floor(count) + "+";
                requestAnimationFrame(update);
            } else {
                el.textContent = target + "+";
            }
        }
        update();
    }

    const counters = document.querySelectorAll('.stat_counter');
    if (counters.length) {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('started')) {
                    entry.target.classList.add('started');
                    animateCounter(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(c => observer.observe(c));
    }


    /* =========================
       MARQUEE SWIPERS
    ========================= */
    const marqueeConfig = {
        slidesPerView: 'auto',
        spaceBetween: 20,
        speed: 3000,
        loop: true,
        allowTouchMove: false,
        freeMode: { enabled: true, momentum: false },
        autoplay: { delay: 1, disableOnInteraction: false }
    };

    if (document.querySelector('.swiper-row-1')) new Swiper('.swiper-row-1', marqueeConfig);
    if (document.querySelector('.swiper-row-2')) new Swiper('.swiper-row-2', {
        ...marqueeConfig,
        autoplay: { ...marqueeConfig.autoplay, reverseDirection: true }
    });
    if (document.querySelector('.swiper-row-3')) new Swiper('.swiper-row-3', marqueeConfig);


    /* =========================
       BUSINESS CARDS (DESKTOP vs MOBILE)
    ========================= */
    // const cards = document.querySelectorAll(".comp_bus_child");
    // const mqCards = window.matchMedia("(min-width: 1281px)");

    // function activateCard(card) {
    //     cards.forEach(c => c.classList.remove("expanded"));
    //     card.classList.add("expanded");
    // }

    // function setupCards() {
    //     if (!cards.length) return;

    //     if (mqCards.matches) {
    //         cards.forEach(c => c.classList.remove("expanded"));
    //         activateCard(cards[0]);

    //         cards.forEach(card => {
    //             card.onclick = () => activateCard(card);
    //         });
    //     } else {
    //         cards.forEach(card => {
    //             card.classList.add("expanded");
    //             card.onclick = null;
    //         });
    //     }
    // }

    // setupCards();
    // mqCards.addEventListener("change", setupCards);


    /* =========================
       WHY SLIDER WITH COUNTER
    ========================= */
    if (document.querySelector('.why_slider')) {
        const currentNum = document.getElementById('current-num');
        const totalNum = document.getElementById('total-num');

        new Swiper('.why_slider', {
            slidesPerView: 1,
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
            },
            pagination: { el: '.swiper-pagination', clickable: true },
            on: {
                init(swiper) {
                    const total = swiper.slides.length;
                    totalNum.textContent = total.toString().padStart(2, '0');
                    currentNum.textContent = '01';
                },
                slideChange(swiper) {
                    currentNum.textContent = (swiper.activeIndex + 1).toString().padStart(2, '0');
                }
            }
        });
    }


    /* =========================
       HERO CATEGORY SLIDER
    ========================= */
    if (document.querySelector('.hero_cat_slider')) {
        new Swiper('.hero_cat_slider', {
            loop: true,
            centeredSlides: false,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                991: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1280: {
                    slidesPerView: 2.5,
                },
                1536: {
                    slidesPerView: 3,
                },
                1600: {
                    slidesPerView: 2.8,
                },
            }
        });
    }



    /* =========================
       PROJECT CARDS (AUTO + HOVER DESKTOP / CLICK MOBILE)
    ========================= */
    /* =========================
   PROJECT CARDS (CLICK ONLY - DESKTOP & MOBILE)
========================= */

    let projectCards = document.querySelectorAll('.project-card');
    let activeIndex = 0;

    function setActiveProject(index) {
        activeIndex = index;
        const isDesktop = window.innerWidth >= 992;

        projectCards.forEach((card, i) => {
            card.classList.toggle('active', i === index);

            // Expand only on desktop
            if (isDesktop) {
                card.style.flex = i === index ? '1.1' : '0.5';
            } else {
                card.style.flex = '';
            }
        });
    }

    function initProjectCards() {
        if (!projectCards.length) return;

        const isDesktop = window.innerWidth >= 992;

        // Reset styles
        projectCards.forEach(card => {
            card.classList.remove('active');
            card.style.flex = '';
        });

        // Set first active by default (optional)
        // if (isDesktop) {
        //     setActiveProject(0);
        // }

        // Click handler for BOTH desktop & mobile
        projectCards.forEach((card, i) => {
            card.onclick = () => setActiveProject(i);
        });
    }

    initProjectCards();

    window.addEventListener('resize', () => {
        clearTimeout(window.__pcResize);
        window.__pcResize = setTimeout(initProjectCards, 200);
    });


    /* =========================
       PRODUCT GRID (MOBILE SLICK)
    ========================= */
    /* =========================
       PRODUCT GRID (MOBILE SLICK)
    ========================= */
    // const productGrids = document.querySelectorAll('.product_grid');
    // const mqGrid = window.matchMedia('(max-width: 768px)'); // < 769px

    // function handleProductGrid(e) {
    //     if (!productGrids.length) return;

    //     productGrids.forEach(grid => {
    //         const $grid = $(grid);
    //         if (e.matches) {
    //             grid.classList.add('is-mobile');
    //             if (!$grid.hasClass('slick-initialized')) {
    //                 $grid.slick({
    //                     slidesToShow: 1,
    //                     arrows: false,
    //                     dots: true,
    //                     infinite: true,
    //                     swipe: true,
    //                     draggable: true,
    //                     autoplay: false,
    //                     autoplaySpeed: 2000,
    //                     responsive: [
    //                         {
    //                             breakpoint: 576,
    //                             settings: {
    //                                 slidesToShow: 1,
    //                             }
    //                         }
    //                     ]
    //                 });
    //             }
    //         } else {
    //             if ($grid.hasClass('slick-initialized')) {
    //                 $grid.slick('unslick');
    //             }
    //             grid.classList.remove('is-mobile');
    //         }
    //     });
    // }

    // handleProductGrid(mqGrid);
    // mqGrid.addEventListener('change', handleProductGrid);


    /* =========================
       CORE WRAPPER (SLICK)
    ========================= */
    const coreWrapper = document.querySelector('.core_wrapper');
    const mqCore = window.matchMedia('(max-width: 991px)');

    function handleCoreSlider() {
        if (!coreWrapper || typeof $ === 'undefined') return;

        if (mqCore.matches) {
            if (!$(coreWrapper).hasClass('slick-initialized')) {
                $(coreWrapper).slick({
                    slidesToShow: 3,
                    arrows: false,
                    dots: false,
                    infinite: false,
                    autoplay: false,
                    autoplaySpeed: 2000,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: { slidesToShow: 2 }
                        },
                        {
                            breakpoint: 577,
                            settings: { slidesToShow: 1 }
                        }
                    ]
                });
            }
        } else {
            if ($(coreWrapper).hasClass('slick-initialized')) {
                $(coreWrapper).slick('unslick');
            }
        }
    }

    handleCoreSlider();
    mqCore.addEventListener('change', handleCoreSlider);


    /* =========================
       MISC SLIDERS & EFFECTS
    ========================= */
    // Product Image Slider
    

    // Project Cards Hover Reveal (Enquire Circle)
    document.querySelectorAll('.project-card').forEach(wrapper => {
        const circle = wrapper.querySelector('.enquire-circle');
        if (!circle) return;

        wrapper.addEventListener('mouseenter', () => {
            circle.style.opacity = 1;
        });

        wrapper.addEventListener('mousemove', (e) => {
            const rect = wrapper.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            circle.style.left = `${x}px`;
            circle.style.top = `${y}px`;
        });

        wrapper.addEventListener('mouseleave', () => {
            circle.style.opacity = 0;
        });
    });


    // YM Slider (Slick) the product slider
    if (typeof $ !== 'undefined' && $('.ym_slider').length) {
        $('.ym_slider').slick({
            arrows: true,
            dots: true,
            infinite: true,
            speed: 400,
            autoplay:false,
            autoplaySpeed: 2000,
            pauseOnHover: false,
            responsive: [
                            {
                                breakpoint: 576,
                                settings: {                                    
                                    arrows: false,
                                    dots:true,
                                }
                            }
                        ]
        });
    }

    /* =========================
       PROJECT CARDS GIF EFFECT
    ========================= */
    document.querySelectorAll('.project-card').forEach(card => {
    const img = card.querySelector('.category-img');
    if (!img) return;

    const originalSrc = img.src;
    let altImages = [];
    let interval;
    let index = 0;

    // 1. Data Parsing & Preloading
    try {
        const altData = img.getAttribute('data-alt');
        if (altData) {
            altImages = JSON.parse(altData);
            altImages.forEach(src => {
                const pi = new Image();
                pi.src = src;
            });
        }
    } catch (e) {
        console.error("Invalid data-alt:", img);
    }

    // 2. Animation Logic Functions
    const startAnimation = () => {
        if (!altImages.length || interval) return;
        index = 0;
        
        interval = setInterval(() => {
            img.src = altImages[index];
            index = (index + 1) % altImages.length;
        }, 800);
    };

    const stopAnimation = () => {
        if (interval) {
            clearInterval(interval);
            interval = null;
        }
        img.src = originalSrc;
    };

    // 3. Execution Logic
    const handleDisplay = () => {
        if (window.innerWidth <= 577) {
            // Auto-run on mobile
            startAnimation();
        } else {
            // Ensure animation is stopped on desktop unless hovering
            stopAnimation();
        }
    };

    // Run immediately on load
    handleDisplay();

    // --- DESKTOP HOVER EVENTS ---
    card.addEventListener('mouseenter', () => {
        if (window.innerWidth > 577) startAnimation();
    });

    card.addEventListener('mouseleave', () => {
        if (window.innerWidth > 577) stopAnimation();
    });

    // Handle window resizing (if user flips phone or resizes browser)
    window.addEventListener('resize', handleDisplay);
});

});

function initYmSlider() {

    $('.ym_slider').not('.slick-initialized').slick({
        arrows: true,
        dots: true,
        infinite: true,
        speed: 400,
        autoplay: true,
        autoplaySpeed: 2000,
        pauseOnHover: false,
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    arrows: false,
                    dots: true,
                }
            }
        ]
    });
}

$(document).ready(function () {
    initYmSlider();
});

$(document).ajaxComplete(function () {
    initYmSlider();
});
