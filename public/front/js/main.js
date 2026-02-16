
// document.addEventListener("DOMContentLoaded", function () {
//   const cards = document.querySelectorAll(".card-wrapper");

//   cards.forEach((card) => {
//     const img = card.querySelector(".trendsetters_img");
//     if (!img) return;

//     const altImages = JSON.parse(img.getAttribute("data-alt") || "[]");
//     let index = 0;
//     let interval;

//     function startLoop() {
//       interval = setInterval(() => {
//         index = (index + 1) % altImages.length;
//         img.src = altImages[index];
//       }, 1000); // change every 2s
//     }

//     function stopLoop() {
//       clearInterval(interval);
//     }

//     // start loop by default
//     startLoop();

//     // pause when hover (overlay or enquire button)
//     card.addEventListener("mouseenter", stopLoop);
//     card.addEventListener("mouseleave", startLoop);
//   });
// });

document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card-wrapper');

    cards.forEach(card => {
        const img = card.querySelector('.trendsetters_img');
        if (!img) return;

        let interval;
        let originalSrc = img.src;
        let altImages;

        // Preload images
        try {
            altImages = JSON.parse(img.getAttribute('data-alt'));
            if (altImages && altImages.length > 0) {
                altImages.forEach(src => {
                    const preloadImg = new Image();
                    preloadImg.src = src;
                });
            }
        } catch (e) {
            console.error("Invalid data-alt for image:", img);
            return;
        }

        // Mouse enter on whole card
        card.addEventListener('mouseenter', () => {
            if (!altImages || altImages.length === 0) return;

            let index = 0;
            interval = setInterval(() => {
                img.src = altImages[index];
                index = (index + 1) % altImages.length;
            }, 400);
        });

        // Mouse leave on whole card
        card.addEventListener('mouseleave', () => {
            clearInterval(interval);
            img.src = originalSrc;
        });
    });
});
// insta skider
document.addEventListener('DOMContentLoaded', function () {
 const instaSwiper = new Swiper('.insta-swiper', {
    slidesPerView: 4,
    spaceBetween: 10,
    loop: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: true, // stops autoplay when user interacts
        pauseOnMouseEnter: true,    // pause when hovering
    },
    navigation: false,
    breakpoints: {
        0: { slidesPerView: 2 },
        576: { slidesPerView: 2.5 },
        768: { slidesPerView: 3.5 },
        1024: { slidesPerView: 4 }
    }
});

});
  document.addEventListener('DOMContentLoaded', function () {
      const swiper = new Swiper('.about-slider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
        speed: 1000,
        // autoplay: {
        //   delay: 2000,
        //   disableOnInteraction: false,
        //   pauseOnMouseEnter: false
        // },
        pagination: {
          el: '.about-slider .swiper-pagination',
          clickable: true
        },
        // no arrows (navigation) as in your config
        breakpoints: {
          1024: { slidesPerView: 1 },
          768:  { slidesPerView: 1 },
          480:  { slidesPerView: 1 }
        }
      });
    });
// why choose card 
 document.addEventListener("DOMContentLoaded", function() {
        gsap.registerPlugin(ScrollTrigger);

  gsap.from(".goal_crad", {
  scrollTrigger: {
    trigger: ".goal_crad",
    start: "top 25%",
  },
  opacity: 0,
  filter: "blur(20px)",
  duration: 1,
  ease: "power3.out",
  stagger: 0.25
});
});
// tab slide js
document.addEventListener("DOMContentLoaded", function() {
  const tabs = document.querySelectorAll('#productTab button');
  const tabContent = document.getElementById("productTabContent");
  let index = 0;
  let interval;

  function startSlider() {
    interval = setInterval(() => {
      index = (index + 1) % tabs.length;
      const tabTrigger = new bootstrap.Tab(tabs[index]);
      tabTrigger.show();
    }, 5000);
  }

  function stopSlider() {
    clearInterval(interval);
  }

  startSlider();

  // Hover events (tabs + tabContent)
  [...tabs].forEach(tab => {
    tab.addEventListener("mouseenter", stopSlider);
    tab.addEventListener("mouseleave", startSlider);
  });
  tabContent.addEventListener("mouseenter", stopSlider);
  tabContent.addEventListener("mouseleave", startSlider);

  // Intersection Observer to check if tab section is in viewport
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if(entry.isIntersecting){
        // section visible, check if mouse is over it
        const rect = tabContent.getBoundingClientRect();
        const mouseX = window.mouseX || -1;
        const mouseY = window.mouseY || -1;
        if(mouseX >= rect.left && mouseX <= rect.right &&
           mouseY >= rect.top && mouseY <= rect.bottom){
             stopSlider(); // pause if mouse already over section
        }
      }
    });
  }, { threshold: 0.1 });

  observer.observe(tabContent);

  // track mouse position
  window.addEventListener("mousemove", e => {
    window.mouseX = e.clientX;
    window.mouseY = e.clientY;
  });
});

// mobile slider product
document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('#productTab button');

    tabButtons.forEach(button => {
        button.addEventListener('shown.bs.tab', function (e) {
            const tabPane = document.querySelector(e.target.getAttribute('data-bs-target'));
            const swiperEl = tabPane.querySelector('.mobile_slider_product');

            if (swiperEl && !swiperEl.classList.contains('swiper-initialized')) {
                new Swiper(swiperEl, {
                    slidesPerView: 1,
                    loop: true,
                    centeredSlides: true,
                    pagination: {
                        el: swiperEl.querySelector('.swiper-pagination'),
                        clickable: true
                    },
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false
                    },
                    speed: 800
                });
            }
        });
    });

    // Optionally, initialize Swiper for the default active tab on page load
    const activeTab = document.querySelector('#productTab button.active');
    if (activeTab) {
        const tabPane = document.querySelector(activeTab.getAttribute('data-bs-target'));
        const swiperEl = tabPane.querySelector('.mobile_slider_product');
        if (swiperEl && !swiperEl.classList.contains('swiper-initialized')) {
            new Swiper(swiperEl, {
                slidesPerView: 1,
                loop: true,
                centeredSlides: true,
                pagination: {
                    el: swiperEl.querySelector('.swiper-pagination'),
                    clickable: true
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                speed: 800
            });
        }
    }
});


// CARD EFFECT
document.querySelectorAll('.card-wrapper').forEach(wrapper => {
    const circle = wrapper.querySelector('.enquire-circle');

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

// mobile view slider
 $('.mobile_slider').slick({
    slidesToShow: 1,
    centerMode: true,
    centerPadding: '0px',
    arrows: false,
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 800,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  // product detail
$(document).ready(function(){
$('.simple-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 500,
    pauseOnHover: true,
    responsive: [
        { breakpoint: 992, settings: { slidesToShow: 3 } },
        { breakpoint: 768, settings: { slidesToShow: 2 } },
        { breakpoint: 576, settings: { slidesToShow: 1 } }
    ]
});
});

// Intersection Observer — Animate Once
document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll("[data-animate-on-scroll]");

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;

        // Optional: use "animation" attribute for custom duration
        const duration = el.getAttribute("animation") || 1.2; 
        el.style.transitionDuration = `${duration}s`;

        el.setAttribute("data-animate", "true");
        obs.unobserve(el); // animate once
      }
    });
  }, { threshold: 0.3 });

  elements.forEach(el => observer.observe(el));
});

