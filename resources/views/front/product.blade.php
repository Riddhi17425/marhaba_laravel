@include('layouts.frontheader')
<link rel="stylesheet" href="{{ asset('public/front/css/hero_style.css') }}">
<link rel="stylesheet" href="{{ asset('public/front/css/hero_responsive.css') }}">
<link rel="stylesheet" href="{{ asset('public/front/css/product_slider.css') }}">
<script src="https://unpkg.com/@zoom-image/core"></script>

<div class="product-slider">
    <div class="slider-wrapper">
        <div class="slides-track" id="track">
            <div class="slide">
                <div class="image-container">
                    <img src="{{ asset('public/front/img/product-detail/pd_1.png') }}" class="product-img" alt="View 1"
                        draggable="false">
                </div>
            </div>
            <div class="slide">
                <div class="image-container"><img src="{{ asset('public/front/img/product-detail/pd_2.png') }}"
                        class="product-img" alt="View 2" draggable="false"></div>
            </div>
            <div class="slide">
                <div class="image-container"><img src="{{ asset('public/front/img/product-detail/pd_3.png') }}"
                        class="product-img" alt="View 3" draggable="false"></div>
            </div>
            <div class="slide">
                <div class="image-container"><img src="{{ asset('public/front/img/product-detail/pd_4.png') }}"
                        class="product-img" alt="View 4" draggable="false"></div>
            </div>
            <div class="slide">
                <div class="image-container"><img src="{{ asset('public/front/img/product-detail/pd_5.png') }}"
                        class="product-img" alt="View 5" draggable="false"></div>
            </div>
            <div class="slide">
                <div class="image-container"><img src="{{ asset('public/front/img/product-detail/pd_3.png') }}"
                        class="product-img" alt="View 6" draggable="false"></div>
            </div>
        </div>


    </div>

    <div class="slid_bottom">
        <div class="thumbnails" id="thumbs"></div>
        <button class="slider_btn prev" id="prevBtn">‹</button>
        <button class="slider_btn next" id="nextBtn">›</button>
    </div>
</div>
<!-- banner -->
<div class="filter_banner">
    Select designs. Contact us for full collection.
</div>
<!-- prod-info -->
<section class="section_mt">
    <div class="container">
        <div class="product_detail_grid">
            <div class="pd_left">
                <div>
                    <h1 class="pd_name raleway_24">Baby Starters: 3-Pack Bodysuits</h1>
                </div>
                <div>
                    <p>Size Assortment : 0m-9m</p>
                    <table class="range-table">
                        <tr>
                            <td>0m-3m</td>
                            <td>3m-6m</td>
                            <td>6m-9m</td>
                        </tr>
                    </table>
                    <p class="pd_note">3 sizes premixed per dozen (12 pc pack)</p>
                </div>
                <div>
                    <section class="age_range_section">
                        <div class="age_range_box" style="background-color: rgb(243, 242, 231);">
                            <div class="age-card">
                                <p class="raleway_14 mb-0">MOQ</p>
                                <h3 class="fs_18">12 sets per design</h3>
                            </div>
                        </div>
                        <div class="age_range_box" style="background-color: rgb(239, 230, 240);">
                            <div class="age-card">
                                <img src="{{ asset('public/brand_images/smart_kids.png') }}" alt="" width="114"
                                    height="47">
                            </div>
                        </div>
                        <div class="age_range_box" style="background-color: rgb(230, 239, 242);">
                            <div class="age-card">
                                <p class="raleway_14 mb-0">Boy</p>
                                <h3 class="fs_18">Homeware</h3>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="pd_right">
                <div>
                    <a href="#" class="get-price">
                        <svg class="me-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.9731 2.57392C13.5045 1.10247 11.5543 0.200085 9.4741 0.0295217C7.39392 -0.141041 5.32078 0.43145 3.62861 1.64373C1.93644 2.85601 0.736645 4.62828 0.245641 6.64086C-0.245363 8.65343 0.00474622 10.7738 0.950854 12.6196L0.022131 17.0926C0.0124945 17.1371 0.0122216 17.1832 0.0213294 17.2278C0.0304373 17.2724 0.0487298 17.3147 0.0750631 17.352C0.11364 17.4086 0.168705 17.4522 0.232906 17.4769C0.297107 17.5017 0.367388 17.5064 0.434362 17.4904L4.85341 16.4513C6.70871 17.3662 8.83101 17.5983 10.8427 17.1065C12.8543 16.6147 14.6248 15.4308 15.8392 13.7655C17.0536 12.1003 17.633 10.0616 17.4744 8.01221C17.3158 5.96287 16.4295 4.0358 14.9731 2.57392ZM13.5953 13.4836C12.5792 14.4888 11.2707 15.1524 9.85434 15.3808C8.43796 15.6091 6.98504 15.3909 5.70033 14.7566L5.08439 14.4543L2.37522 15.0908L2.38324 15.0574L2.94464 12.3522L2.64309 11.7619C1.98666 10.4829 1.7551 9.0307 1.98157 7.6132C2.20804 6.19571 2.88093 4.88569 3.90384 3.8708C5.18914 2.59611 6.93215 1.88002 8.74956 1.88002C10.567 1.88002 12.31 2.59611 13.5953 3.8708C13.6062 3.88325 13.618 3.89495 13.6306 3.90581C14.8999 5.18379 15.6086 6.90778 15.602 8.70193C15.5953 10.4961 14.874 12.2149 13.5953 13.4836Z"
                                fill="white" />
                            <path
                                d="M13.3539 11.4996C13.0218 12.0184 12.4973 12.6533 11.8381 12.8108C10.6832 13.0877 8.91076 12.8204 6.70525 10.7804L6.67798 10.7565C4.73873 8.97269 4.23507 7.48804 4.35697 6.3105C4.42434 5.64217 4.98575 5.03749 5.45893 4.64286C5.53374 4.57952 5.62245 4.53442 5.71797 4.51117C5.81349 4.48793 5.91317 4.48718 6.00903 4.50898C6.10489 4.53078 6.19429 4.57454 6.27006 4.63674C6.34583 4.69895 6.40587 4.77788 6.4454 4.86722L7.15918 6.45849C7.20557 6.56167 7.22276 6.67543 7.20891 6.78756C7.19506 6.8997 7.1507 7.00598 7.08059 7.095L6.71968 7.55964C6.64224 7.65559 6.59552 7.77232 6.58551 7.89483C6.57551 8.01734 6.60268 8.14001 6.66354 8.24707C6.86565 8.59874 7.35006 9.1159 7.8874 9.59487C8.49051 10.1359 9.15939 10.6308 9.58284 10.7995C9.69615 10.8454 9.82073 10.8566 9.94052 10.8316C10.0603 10.8067 10.1698 10.7467 10.2549 10.6594L10.6736 10.2409C10.7544 10.1619 10.8548 10.1055 10.9647 10.0776C11.0746 10.0496 11.19 10.0511 11.2991 10.0818L12.9946 10.5592C13.0881 10.5876 13.1738 10.6369 13.2452 10.7033C13.3166 10.7697 13.3717 10.8514 13.4064 10.9421C13.441 11.0329 13.4543 11.1303 13.4452 11.2269C13.4361 11.3235 13.4049 11.4168 13.3539 11.4996Z"
                                fill="white" />
                        </svg>
                        Get Wholesale Pricing</a>
                </div>
                <div class="pd_right">
                    <div class="accordion" id="accordionExample">

                        <!-- Product Information -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed raleway_24 ps-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="false"
                                    aria-controls="collapseProduct">
                                    Product Information
                                </button>
                            </h2>
                            <div id="collapseProduct" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Soft, coordinated, and made for everyday comfort — this 3-pack of short-sleeve
                                    bodysuits keeps babies well-dressed from playtime to nap time. Each piece features
                                    smooth seams, durable snap closures, and uniform sizing for easy wear and
                                    presentation. Thoughtfully designed to keep little ones cozy and cared for through
                                    every moment of the day.
                                </div>
                            </div>
                        </div>

                        <!-- Buyer Information -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed raleway_24 ps-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseBuyer" aria-expanded="false"
                                    aria-controls="collapseBuyer">
                                    Buyer Information
                                </button>
                            </h2>
                            <div id="collapseBuyer" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h6>Packaging & Sizing</h6>
                                    <ul>
                                        <li>Export-ready packaging: Each set with hanger and protective sleeve</li>
                                        <li>Premixed sizing: Balanced distribution for retail coverage</li>
                                        <li>12 sets per design in single or pre-assorted colours</li>
                                    </ul>
                                    <a>Standard 12-Piece Assortment</a>
                                    <h6>Delivery & Shipping</h6>
                                    <ul>
                                        <li>Dubai: Delivered within 1-3 days after order confirmation</li>
                                        <li>Small orders: Collection can be arranged from showroom</li>
                                        <li>Custom orders: Lead time varies—contact for details</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="pd_social">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.11007 6.71402C7.96927 6.39299 7.81289 6.3852 7.67989 6.3852C7.56249 6.3774 7.43683 6.3774 7.30384 6.3774C7.1791 6.3774 6.96768 6.42418 6.78791 6.62C6.60768 6.81537 6.11514 7.27718 6.11514 8.22374C6.11514 9.17076 6.8035 10.0861 6.89752 10.2113C6.99107 10.3365 8.22747 12.3393 10.1839 13.1143C11.811 13.7559 12.1398 13.6307 12.492 13.5912C12.8438 13.5523 13.6266 13.1299 13.7908 12.6759C13.9472 12.2301 13.9472 11.8389 13.9004 11.7605C13.8536 11.6825 13.7202 11.6353 13.5326 11.5335C13.3368 11.4399 12.398 10.9703 12.2182 10.9075C12.038 10.8451 11.9128 10.8139 11.7876 11.0015C11.6624 11.1973 11.2946 11.6275 11.1777 11.7527C11.0676 11.8779 10.9507 11.8935 10.7626 11.7995C10.5673 11.7059 9.94907 11.5023 9.21347 10.8451C8.64205 10.3361 8.25865 9.70274 8.14125 9.51517C8.0321 9.31935 8.12566 9.21754 8.22747 9.12352C8.31369 9.03776 8.42329 8.89697 8.51731 8.78737C8.61086 8.6773 8.64205 8.59154 8.71267 8.46634C8.77504 8.34114 8.74386 8.22374 8.69708 8.13019C8.64984 8.04397 8.2825 7.09741 8.11007 6.71402Z"
                                stroke="#452667" stroke-linejoin="round" />
                        </svg>


                        <span><a href="">WhatsApp Catalogue: +971 56 923 3052</a></span>

                    </div>
                    <div class="pd_social">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.5707 5.42019C12.3064 5.56373 12.9825 5.92355 13.5126 6.45359C14.0426 6.98363 14.4024 7.65978 14.546 8.39549M11.5707 2.40723C13.0992 2.57703 14.5246 3.26153 15.6127 4.34833C16.7009 5.43514 17.3872 6.85964 17.5589 8.38796M8.69101 11.343C7.78593 10.4379 7.07127 9.41451 6.54701 8.3226C6.50192 8.22868 6.47937 8.18172 6.46205 8.12229C6.40049 7.91112 6.44471 7.65181 6.57277 7.47297C6.6088 7.42264 6.65186 7.37959 6.73796 7.29349C7.0013 7.03015 7.13297 6.89848 7.21905 6.76608C7.5437 6.26676 7.54369 5.62305 7.21905 5.12374C7.13297 4.99134 7.0013 4.85967 6.73796 4.59633L6.59118 4.44955C6.19087 4.04924 5.99072 3.84909 5.77576 3.74036C5.34825 3.52413 4.84338 3.52413 4.41587 3.74036C4.20091 3.84909 4.00076 4.04924 3.60045 4.44955L3.48171 4.56828C3.08278 4.96722 2.88331 5.16668 2.73097 5.43787C2.56193 5.7388 2.44039 6.20618 2.44141 6.55133C2.44234 6.86238 2.50268 7.07496 2.62335 7.50012C3.27187 9.785 4.49549 11.941 6.29421 13.7398C8.09294 15.5385 10.249 16.7621 12.5339 17.4106C12.959 17.5313 13.1716 17.5916 13.4827 17.5926C13.8278 17.5936 14.2952 17.4721 14.5961 17.303C14.8673 17.1507 15.0668 16.9512 15.4657 16.5523L15.5844 16.4335C15.9847 16.0332 16.1849 15.8331 16.2936 15.6181C16.5099 15.1906 16.5099 14.6857 16.2936 14.2582C16.1849 14.0433 15.9847 13.8431 15.5844 13.4428L15.4377 13.296C15.1743 13.0327 15.0427 12.901 14.9102 12.8149C14.4109 12.4903 13.7672 12.4903 13.2679 12.8149C13.1355 12.901 13.0038 13.0327 12.7405 13.296C12.6544 13.3821 12.6113 13.4252 12.561 13.4612C12.3822 13.5893 12.1229 13.6335 11.9117 13.5719C11.8523 13.5546 11.8053 13.5321 11.7114 13.487C10.6195 12.9627 9.59609 12.2481 8.69101 11.343Z"
                                stroke="#452667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span><a href="">Phone: +971 4 226 4582</a></span>

                    </div>
                    <div class="pd_social">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_452_826)">
                                <path
                                    d="M16.4294 7.14244C16.4294 10.6996 10.0008 19.2853 10.0008 19.2853C10.0008 19.2853 3.57227 10.6996 3.57227 7.14244C3.57227 5.43748 4.24956 3.80234 5.45515 2.59675C6.66074 1.39116 8.29587 0.713867 10.0008 0.713867C11.7058 0.713867 13.3409 1.39116 14.5465 2.59675C15.7521 3.80234 16.4294 5.43748 16.4294 7.14244V7.14244Z"
                                    stroke="#452667" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M10.0003 9.28571C11.1837 9.28571 12.1431 8.32632 12.1431 7.14286C12.1431 5.95939 11.1837 5 10.0003 5C8.81681 5 7.85742 5.95939 7.85742 7.14286C7.85742 8.32632 8.81681 9.28571 10.0003 9.28571Z"
                                    stroke="#452667" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_452_826">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span><a href="">Showroom: Murshid Bazaar, Deira, Dubai</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pd_view hero_cat yellow-gradient home_mt-100">
    <div class="ym-container">
        <div class="hero_catologue_head col-lg-6 mb-0">
            <h2 class="title_60lora text-center">View Our Catalogues</h2>
            <p class="title_24-raleway mt-4 mt-xl-5">Stay updated on our newest arrivals. Select your
                preferred products and our wholesale team will be in touch with curated children's clothing
                collections for your business.
            </p>
            <div class="btn_wrapper">
                <a href="javascript:void(0)" class="btn_1">Request Latest Catalogues <img loading="lazy"
                        src="http://localhost/marhaba_laravel/public/front/img/Home/blue-arr.svg" alt="" height="10"
                        width="10"></a>
            </div>
        </div>
    </div>
</section>
<!-- old section -->
<section class="home_mt-100 section_mb">
    <div class="container-fluid">
        <div class="row">
            <h2 class="mean_head text-center scroll-text mb-4" data-animate-on-scroll>Similar Products</h2>
            <div class="simple-slider">
                @forelse($similarProducts as $simProduct)
                    @php
                        $brand = $brands[$simProduct['brand_id']] ?? null;
                        $image = $simProduct['image'] ? asset('public/product_images/' . $simProduct['image']) : asset('public/front/img/product_detail_boy.png');
                    @endphp
                    <div class="col-md-3">
                        <div class="product_wrapper">
                            <div class="Product_item">
                                <a href="{{ route('productdetails', $simProduct['url']) }}">
                                    <img src="{{ $image }}" alt="{{ $simProduct['name'] }}"
                                        class="img-fluid product_img w-100" />
                                </a>
                            </div>
                            <div class="product_item_details">
                                <a href="{{ route('productdetails', $simProduct['url']) }}">
                                    <p class="mb-0" style="font-weight:500;">{{ $simProduct['name'] }}</p>
                                </a>
                                @if($brand)
                                    <p class="raleway_14 mb-0">{{ $brand->name }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No similar products found.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@include('layouts.frontfooter')

<!-- slider js -->
<script>
    // ── Core slider logic (unchanged from previous working version) ────────
    const track = document.getElementById('track');
    const slides = Array.from(track.children);
    const total = slides.length;
    let currentIndex = 0;
    let isDoubleMode = false;
    let isDesktop = window.innerWidth >= 1200;

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    // Thumbnails setup
    const thumbsContainer = document.getElementById('thumbs');
    slides.forEach((_, i) => {
        const thumb = document.createElement('div');
        thumb.className = 'thumb';
        thumb.innerHTML = `<img src="${slides[i].querySelector('img').src}" alt="">`;
        thumb.dataset.index = i;
        thumbsContainer.appendChild(thumb);
    });
    const thumbs = Array.from(thumbsContainer.children);

    function updateThumbs() {
        const active = isDesktop && isDoubleMode
            ? [currentIndex, currentIndex + 1]
            : [currentIndex];
        thumbs.forEach((t, i) => t.classList.toggle('active', active.includes(i % total)));
    }

    function positionSlides(animate = true) {
        slides.forEach((slide, i) => {
            let left = '100%';
            let w = isDesktop ? '50%' : '100%';

            if (!isDesktop) {
                left = (i === currentIndex) ? '0%' : (i < currentIndex ? '-100%' : '100%');
                w = '100%';
            } else if (isDoubleMode) {
                if (i === currentIndex) { left = '0%'; w = '50%'; }
                else if (i === currentIndex + 1) { left = '50%'; w = '50%'; }
                else if (i < currentIndex) { left = '-50%'; w = '50%'; }
                else { left = '100%'; w = '50%'; }
            } else {
                left = (i === currentIndex) ? '0%' : (i < currentIndex ? '-100%' : '100%');
                w = '100%';
            }

            slide.style.transition = animate ? '' : 'none';
            slide.style.left = left;
            slide.style.width = w;
        });
        updateThumbs();
    }

    function goNext() {
        if (!isDesktop) {
            currentIndex = (currentIndex + 1) % total;
            positionSlides(true);
            return;
        }

        if (!isDoubleMode) {
            if (currentIndex + 1 < total) isDoubleMode = true;
            else {
                currentIndex = 0; isDoubleMode = false;
                slides[0].style.left = '100%'; slides[0].style.transition = 'none';
                requestAnimationFrame(() => positionSlides(true));
                return;
            }
        } else {
            if (currentIndex + 2 < total) currentIndex++;
            else {
                currentIndex = 0; isDoubleMode = false;
                slides[0].style.left = '100%'; slides[0].style.transition = 'none';
                requestAnimationFrame(() => positionSlides(true));
                return;
            }
        }
        positionSlides(true);
    }

    function goPrev() {
        if (!isDesktop) {
            currentIndex = (currentIndex - 1 + total) % total;
            positionSlides(true);
            return;
        }

        if (isDoubleMode) {
            if (currentIndex === 0) {
                isDoubleMode = false; // collapse first pair → slide 1 full width
            } else currentIndex--;
        } else {
            if (currentIndex > 0) {
                currentIndex--;
                if (currentIndex + 1 < total) isDoubleMode = true;
            }
        }
        positionSlides(true);
    }

    // ── Fixed Zoom + Pan ───────────────────────────────────────────────────
    slides.forEach(slide => {
        const container = slide.querySelector('.image-container');
        const img = slide.querySelector('.product-img');
        let clickCount = 0;
        let timer = null;
        let isZoomed = false;
        function activateZoom(e) {
            isZoomed = !isZoomed;
            container.classList.toggle('zoomed', isZoomed);

            if (isZoomed) {
                const scale = 2;
                img.style.transition = 'transform 0.3s ease-out';
                img.style.transform = `scale(${scale})`;

                // Initial pan based on click position
                const rect = container.getBoundingClientRect();
                const x = (e.clientX || (e.touches && e.touches[0].clientX)) - rect.left;
                const y = (e.clientY || (e.touches && e.touches[0].clientY)) - rect.top;
                updatePan(x, y);

                container.addEventListener('mousemove', onMouseMove);
            } else {
                img.style.transition = 'transform 0.3s ease-out';
                img.style.transform = 'scale(1) translate(0, 0)';
                container.removeEventListener('mousemove', onMouseMove);
            }
        }

        function onMouseMove(e) {
            if (!isZoomed) return;
            const rect = container.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            updatePan(x, y);
        }

        function updatePan(x, y) {
            const scale = 2;
            const contW = container.clientWidth;
            const contH = container.clientHeight;

            // Percentage across the container
            const px = x / contW;
            const py = y / contH;

            // How much we need to shift (image is twice as big, so we can shift by 1x width/height)
            const tx = (px * (contW - contW * scale));
            const ty = (py * (contH - contH * scale));

            img.style.transition = 'none'; // No transition during mouse move for responsiveness
            img.style.transform = `translate(${tx}px, ${ty}px) scale(${scale})`;
        }

        // Double-click / double-tap detection
        container.addEventListener('click', e => {
            clickCount++;
            if (clickCount === 1) {
                timer = setTimeout(() => { clickCount = 0; }, 300);
            } else if (clickCount === 2) {
                clearTimeout(timer);
                clickCount = 0;
                e.preventDefault();
                activateZoom(e);
            }
        });

        container.addEventListener('touchstart', e => {
            if (e.touches.length > 1) return;
            clickCount++;
            if (clickCount === 1) {
                timer = setTimeout(() => { clickCount = 0; }, 300);
            } else if (clickCount === 2) {
                clearTimeout(timer);
                clickCount = 0;
                e.preventDefault();
                activateZoom(e);
            }
        }, { passive: false });
    });

    // ── Other init ─────────────────────────────────────────────────────────
    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => {
            const idx = parseInt(thumb.dataset.index);
            if (!isDesktop) {
                currentIndex = idx;
                isDoubleMode = false;
            } else {
                if (idx === 0) {
                    currentIndex = 0;
                    isDoubleMode = false;
                } else if (idx === total - 1 && total > 1) {
                    // If last thumb, show it with the previous one
                    currentIndex = idx - 1;
                    isDoubleMode = true;
                } else {
                    currentIndex = idx - 1;
                    isDoubleMode = true;
                }
            }
            positionSlides(true);
        });
    });

    window.addEventListener('resize', () => {
        const nowDesktop = window.innerWidth >= 1200;
        if (nowDesktop !== isDesktop) {
            isDesktop = nowDesktop;
            isDoubleMode = false;
            currentIndex = 0;
            positionSlides(false);
        }
    });

    positionSlides(false);
    prevBtn.addEventListener('click', goPrev);
    nextBtn.addEventListener('click', goNext);
</script>
<!-- slider js -->