
document.addEventListener("DOMContentLoaded", () => {

    /* =========================
       COUNTER (IntersectionObserver)
    ========================= */
function animateCounter(el) {
    const target = +el.dataset.target;
    // Check if the HTML already has a "+" sign
    const hasPlus = el.textContent.includes('+'); 
    const speed = 200;
    const increment = target / speed;
    let count = 0;

    function update() {
        count += increment;
        if (count < target) {
            // Add "+" only if hasPlus is true
            el.textContent = Math.floor(count) + (hasPlus ? "+" : "");
            requestAnimationFrame(update);
        } else {
            // Final state
            el.textContent = target + (hasPlus ? "+" : "");
        }
    }
    update();
}

// Initialize all counters
document.querySelectorAll('.stat_counter').forEach(animateCounter);

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
        speed: 5000,
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
//     if (document.querySelector('.why_slider')) {
//     const currentNum = document.getElementById('current-num');
//     const totalNum = document.getElementById('total-num');
//     const mainImg = document.getElementById('main-why-img'); // Target the main image

//     new Swiper('.why_slider', {
//         slidesPerView: 1,
//         pagination: { el: '.swiper-pagination', clickable: true },
//         autoplay: {
//             delay: 4000,
//             disableOnInteraction: false,
//         },
//         on: {
//             init(swiper) {
//                 const total = swiper.slides.length;
//                 totalNum.textContent = total.toString().padStart(2, '0');
//                 currentNum.textContent = '01';
//             },
//             slideChange(swiper) {
//                 // 1. Update the number counter
//                 const index = swiper.activeIndex;
//                 currentNum.textContent = (index + 1).toString().padStart(2, '0');

//                 // 2. Get the image URL from the active slide's data attribute
//                 const activeSlide = swiper.slides[index];
//                 const newImgSrc = activeSlide.getAttribute('data-img');

//                 // 3. Update the main image with a smooth fade effect (optional)
//                 if (newImgSrc) {
//                     mainImg.style.opacity = '0.5'; // Start fade out
//                     setTimeout(() => {
//                         mainImg.src = newImgSrc;
//                         mainImg.style.opacity = '1'; // Fade back in
//                     }, 2000);
//                 }
//             }
//         }
//     });
// }

if (document.querySelector('.why_slider')) {

    const currentNum = document.getElementById('current-num');
    const totalNum = document.getElementById('total-num');
    const mainImg = document.getElementById('main-why-img');

    const swiper = new Swiper('.why_slider', {
        slidesPerView: 1,
        speed: 1000, 
        loop: true,

        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },

        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },

        on: {
            init(swiper) {
                const total = swiper.slides.length;
                totalNum.textContent = total.toString().padStart(2, '0');
                currentNum.textContent = '01';
            },

            slideChangeTransitionStart(swiper) {
                const index = swiper.realIndex;
                currentNum.textContent = (index + 1).toString().padStart(2, '0');

                const activeSlide = swiper.slides[swiper.activeIndex];
                const newImgSrc = activeSlide.getAttribute('data-img');

                if (newImgSrc && mainImg.src !== newImgSrc) {

                    // fade out
                    mainImg.classList.add('fade-out');

                    setTimeout(() => {
                        mainImg.src = newImgSrc;

                        // fade in
                        mainImg.classList.remove('fade-out');
                        mainImg.classList.add('fade-in');

                        setTimeout(() => {
                            mainImg.classList.remove('fade-in');
                        }, 600);

                    }, 400); // 👈 fast & smooth timing
                }
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
                delay: 3000,
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
                    slidesPerView: 3,
                },
                1536: {
                    slidesPerView: 3,
                },
                1600: {
                    slidesPerView: 3,
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
                card.style.flex = i === index ? '1.2' : '0.5';
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
                    autoplay: true,
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
        var $ymSlider = $('.ym_slider');

        function ymSliderUpdateDotWidth($slider) {
            var $dots = $slider.find('.slick-dots li');
            var count = $dots.length;
            if (count > 0) {
                var width = (100 / count) + '%';
                $dots.css({ width: width });
            }
        }

        $ymSlider.on('init reInit afterChange', function (event, slick, currentSlide) {
            ymSliderUpdateDotWidth($(this));
        });

        $ymSlider.slick({
            arrows: true,
            dots: true,
            infinite: true,
            speed: 400,
            autoplay: false,
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

    /* =========================
       PROJECT CARDS GIF EFFECT
    ========================= */
document.querySelectorAll('.project-card').forEach(card => {
    const img = card.querySelector('.category-img');
    if (!img) return;

    const originalSrc = img.src;
    let altImages = [];
    let interval = null;
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

    // 2. Stop Animation
    const stopAnimation = () => {
        if (interval) {
            clearInterval(interval);
            interval = null;
        }
        img.src = originalSrc;
    };

    // ✅ NEW: Stop if active
    const isActive = () => card.classList.contains('active');

    // 3. Start Animation
    const startAnimation = () => {
        if (!altImages.length || interval || isActive()) return;

        index = 0;
        interval = setInterval(() => {
            img.src = altImages[index];
            index = (index + 1) % altImages.length;
        }, 800);
    };

    // 4. Execution Logic
    const handleDisplay = () => {
        if (isActive()) {
            stopAnimation(); // ✅ STOP if active
            return;
        }

        if (window.innerWidth <= 577) {
            startAnimation(); // mobile auto
        } else {
            stopAnimation(); // desktop default
        }
    };

    // Init
    handleDisplay();

    // --- DESKTOP HOVER ---
    card.addEventListener('mouseenter', () => {
        if (window.innerWidth > 577 && !isActive()) {
            startAnimation();
        }
    });

    card.addEventListener('mouseleave', () => {
        if (window.innerWidth > 577) {
            stopAnimation();
        }
    });

    // --- RESIZE ---
    window.addEventListener('resize', handleDisplay);

    // ✅ NEW: Watch active class change (IMPORTANT)
    const observer = new MutationObserver(() => {
        if (isActive()) {
            stopAnimation();
        } else {
            handleDisplay();
        }
    });

    observer.observe(card, {
        attributes: true,
        attributeFilter: ['class']
    });
});
});
// ---------------------------------------------------------------------
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


// catalogue slider
$('.ym_cat').slick({
    arrows: false,
    dots: true,
    infinite: true,
    speed: 400,
    slidesToShow: 3,        // Default: 3 slides (Desktop > 1200px)
    slidesToScroll: 1,
    autoplay: true,
    cssEase: 'linear',
    autoplaySpeed: 3000,
    pauseOnHover: true,
    responsive: [
        {
            // At 1200px and below -> Show 2 slides
            breakpoint: 1201, 
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            // At 576px and below -> Show 1 slide
            breakpoint: 577, 
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false, // Hiding arrows on mobile as per your previous code
                dots: false
            }
        }
    ]
});
