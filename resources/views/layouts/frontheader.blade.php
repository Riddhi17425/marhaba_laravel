<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $meta_title ?? 'Marhaba' }}</title>
    <meta name="description"
        content="{{ $meta_description ?? "Marhaba is a wholesale children's clothing distributor headquartered in Dubai, UAE. We manufacture our own lines, giving us direct control over quality, consistency, and pricing." }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/front/img/favicon.png') }}">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Familjen+Grotesk:ital,wght@0,400..700;1,400..700&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poltawski+Nowy:ital,wght@0,400..700;1,400..700&family=Sacramento&display=swap"
        rel="stylesheet">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/front/css/style.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('public/front/css/hero_style.css') }}">-->
    <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('public/front/css/hero_responsive.css') }}">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/css/intlTelInput.min.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <header>
        <div class="container-fluid">
            <!-- Mobile Header -->
            <div class="row text-center heder_section d-flex d-md-none align-items-center">
                <div class="col-6 text-start">
                @if (url()->current() === url('/'))
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('public/front/img/logo.svg') }}" alt="marhaba" class="img-fluid nav_logo color-head">
                        <img src="{{ asset('public/front/img/mobile-white-logo.png') }}" alt="marhaba" class="img-fluid nav_logo white-head">
                        <!--<img src="{{ asset('public/front/img/Home/white-logo.svg') }}" alt="marhaba" class="img-fluid nav_logo">-->
                    </a>
                    @else
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('public/front/img/logo.svg') }}" alt="marhaba" class="img-fluid nav_logo color-head d-block">
                    </a>
                    @endif
                </div>
                <div class="col-6 text-end">
                    @if (url()->current() === url('/'))
                        <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                            <i class="">
                                <svg class="home_menu" width="30" height="30" viewBox="0 0 34 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect y="2" width="34" height="2" />
                                    <rect y="14" width="34" height="2" />
                                    <rect y="26" width="34" height="2" />
                                </svg>

                            </i>
                        </button>
                    @else
                        <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                            <i class="">
                                <svg width="34" height="30" viewBox="0 0 34 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect y="2" width="34" height="2" fill="#452667" />
                                    <rect y="14" width="34" height="2" fill="#452667" />
                                    <rect y="26" width="34" height="2" fill="#452667" />
                                </svg>

                            </i>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Desktop Header -->
            <div class="d-none d-md-flex justify-content-between align-items-center heder_section">
                <div class="social_items">
                    <!--<a href="#"><img src="{{ asset('public/front/img/facebook_icon.png') }}" alt="facebook" class="img-fluid"></a>-->
                    <a href="https://www.linkedin.com/company/marhaba-llc/" target="_blank"><img
                            src="{{ asset('public/front/img/linkedin_icon.png') }}" alt="linkedin"
                            class="img-fluid color-head"></a>
                    <a href="https://www.instagram.com/marhabafashionuae?igsh=cTluY2lzYTRpM2pp" target="_blank"><img
                            src="{{ asset('public/front/img/insta_icon.png') }}" alt="instagram"
                            class="img-fluid color-head"></a>
                    @if (url()->current() === url('/'))
                        <a href="https://www.linkedin.com/company/marhaba-llc/" target="_blank">
                            <img src="{{ asset('public/front/img/Home/white-insta.svg') }}" alt="instagram"
                                class="img-fluid white-head">
                        </a>

                        <a href="https://www.instagram.com/marhabafashionuae?igsh=cTluY2lzYTRpM2pp" target="_blank">
                            <img src="{{ asset('public/front/img/Home/white-linkedin.svg') }}" alt="linkedin"
                                class="img-fluid white-head">
                        </a>
                    @else
                        {{-- Other pages icons --}}
                        <a href="https://www.instagram.com/marhabafashionuae?igsh=cTluY2lzYTRpM2pp" target="_blank">
                            <img src="{{ asset('public/front/img/insta_icon.png') }}" alt="instagram"
                                class="img-fluid white-head">
                        </a>

                        <a href="https://www.facebook.com/marhabafashionuae" target="_blank">
                            <img src="{{ asset('public/front/img/facebook_icon.png') }}" alt="faceook"
                                class="img-fluid white-head">
                        </a>
                        <a href="https://www.linkedin.com/company/marhaba-llc/" target="_blank">
                            <img src="{{ asset('public/front/img/linkedin_icon.png') }}" alt="linkedin"
                                class="img-fluid white-head">
                        </a>
                    @endif

                </div>
                <div class="text-center align-items-center mx-auto">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('public/front/img/Home/logo-minimal.svg') }}" alt="logo"
                            class="img-fluid nav_logo color-head" style="height:16px;">
                        @if (url()->current() === url('/'))
                            <img src="{{ asset('public/front/img/Home/white-logo.svg') }}" alt="logo"
                                class="img-fluid nav_logo white-head" style="height:60px;">
                        @else
                            <img src="{{ asset('public/front/img/purple-logo.svg') }}" alt="logo"
                                class="img-fluid nav_logo white-head" style="height:60px;">
                        @endif
                    </a>
                </div>
                @if (url()->current() === url('/'))
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-3 boy_girl">
                            <a href="{{ route('get.products', ['type' => 'boy']) }}">Boys</a>
                            <a href="{{ route('get.products', ['type' => 'girl']) }}">Girls</a>
                        </div>
                        <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                            <i>
                                <svg class="home_menu" width="30" height="30" viewBox="0 0 34 30" fill=""
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect y="2" width="34" height="2" />
                                    <rect y="14" width="34" height="2" />
                                    <rect y="26" width="34" height="2" />
                                </svg>

                            </i>
                        </button>
                    </div>
                @else
                    <div class="d-flex gap-4">
                        <div class="d-flex align-items-center gap-3 boy_girl">
                            <a href="{{ route('get.products', ['type' => 'boy']) }}" style=" color: #452667; ">Boys</a>
                            <a href="{{ route('get.products', ['type' => 'girl']) }}" style=" color: #452667; ">Girls</a>
                        </div>
                        <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                            <i>
                                <svg class="toggle_bars" width="30" height="30" viewBox="0 0 34 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect y="2" width="34" height="2" fill="#452667" />
                                    <rect y="14" width="34" height="2" fill="#452667" />
                                    <rect y="26" width="34" height="2" fill="#452667" />
                                </svg>

                            </i>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </header>

    @php
        use App\Models\Category;
        use App\Models\Product;
        use App\Models\ClothSize;
        use App\Models\MenuImage;

        $categories = Category::whereNull('deleted_at')->get();

        $products = Product::whereNull('deleted_at')->get()->map(function ($p) {
            return [
                'id' => $p->id,
                'product_detail_name' => $p->product_detail_name,
                'name' => $p->name,
                'category_id' => $p->category_id,
                'url' => $p->url,
                'product_brand_size' => json_decode($p->product_brand_size, true)
            ];
        });

        $sizes = ClothSize::all();

        $menu_images = MenuImage::whereNull('deleted_at')->get()->map(function ($img) {
            return [
                'type' => $img->type,
                'reference_id' => $img->reference_id,
                'image' => $img->image ? asset('public/menu_images/' . $img->image) : null
            ];
        });
    @endphp

    <!-- Sidebar -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="false" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header d-flex justify-content-between align-items-end">
            <h5 class="offcanvas-title lora_36" id="filterOffcanvasLabel">Menu</h5>
            <button type="button" class="btn d-flex align-items-center p-0 gap-2 border-0" data-bs-dismiss="offcanvas"
                aria-label="Close">
                <span>Close</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </button>
            <!--<p type="button" class="mb-0" id="clearFilters">Clear</button>-->
        </div>
        <div class="offcanvas-body">
            <div class="menu_body head_menu">
                <div>
                    <div class="accordion" id="accordionExample">
                        <!--Categories-->
                        @if(isset($menuTypes) && is_countable($menuTypes) && count($menuTypes) > 0)
                            @foreach($menuTypes as $key => $val)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingCat_{{ $key }}">
                                        <button
                                            class="ps-0 accordion-button raleway_24 collapsed"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseCat_{{ $key }}" aria-expanded="false"
                                            aria-controls="collapseCat_{{ $key }}">
                                            {{ $val ?? '' }}
                                        </button>
                                    </h2>
                                    <div id="collapseCat_{{ $key }}"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="headingCat_{{ $key }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-0">
                                            @php $ageSection = config('global_values.age_section'); @endphp
                                            @if(isset($ageSection) && is_countable($ageSection) && count($ageSection) > 0)
                                                @foreach($ageSection as $aKey => $aVal)
                                                    <div><a href="{{ route('get.products', ['type' => $key, 'size_range' => $aKey]) }}"
                                                            class="menu_text">{{ $aVal['label'] }}</a></div>
                                                @endforeach
                                            @endif
                                            {{-- <div><a href="{{ url('filter') }}" class="menu_text">2 years to 6 years</a>
                                            </div>
                                            <div><a href="{{ url('filter') }}" class="menu_text">6 years to 14 years</a></div>
                                            --}}
                                            <a href="{{ route('get.products', ['type' => $key]) }}" class="menu_view_all">View
                                                all</a>
                                            {{-- <img src="https://marhabafashion.com/public/menu_images/Boys.jpg"
                                                alt="Our Collections" class="img-fluid mt-3"> --}}
                                            @if($key == 'boy')
                                                <img src="{{ asset('public/front/img/menu_img_boy.jpg') }}" alt="Our Collections"
                                                    class="img-fluid mt-3">
                                            @else
                                                <img src="{{ asset('public/front/img/menu_img_girl.jpg') }}" alt="Our Collections"
                                                    class="img-fluid mt-3">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <!--Girls-->
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingBrand">
                                <button class="ps-0 accordion-button collapsed raleway_24" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="false"
                                    aria-controls="collapseBrand">
                                    Girls
                                </button>
                            </h2>

                            <div id="collapseBrand" class="accordion-collapse collapse" aria-labelledby="headingBrand"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body p-0">
                                    <div>
                                        <a href="{{ url('filter') }}" class="menu_text">0 month to 3 years</a>
                                    </div>

                                    <div>
                                        <a href="{{ url('filter') }}" class="menu_text">2 years to 6 years</a>
                                    </div>

                                    <div>
                                        <a href="{{ url('filter') }}" class="menu_text">6 years to 14 years</a>
                                    </div>
                                    <a href="{{ url('filter') }}" class="menu_view_all">View all</a>
                                    <img src="https://marhabafashion.com/public/menu_images/Girls.jpg"
                                        alt="Our Collections" class="img-fluid mt-3">
                                </div>
                            </div>
                        </div> --}}

                        <!--Resources-->
                        <div class="accordion-item d-none">
                            <h2 class="accordion-header" id="headingCategory">
                                <button class="ps-0 accordion-button collapsed raleway_24" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false"
                                    aria-controls="collapseCategory">
                                    Resources
                                </button>
                            </h2>

                            <div id="collapseCategory" class="accordion-collapse collapse"
                                aria-labelledby="headingCategory" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-0">
                                    <div>
                                        <a href="{{ url('about-us') }}" class="menu_text">About Us</a>
                                    </div>

                                    <div>
                                        <a href="{{ url('contact-us') }}" class="menu_text">Contact</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="{{ url('about-us') }}" class="menu_text_about">About Us</a>
                        </div>
                        <div>
                            <a href="{{ url('who-we-serve') }}" class="menu_text_about">Who we serve</a>
                        </div>

                        <div>
                            <a href="{{ url('contact-us') }}" class="menu_text_about">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header script -->
    <script>
        // gsap
        const header = document.querySelector("header");
        let lastScroll = 0;
        // Use a fixed value or get offset height once
        const headerHeight = header.offsetHeight;

        window.addEventListener("scroll", () => {
            const currentScroll = window.pageYOffset;

            // 1. SCROLL DOWN -> HIDE IMMEDIATELY
            if (currentScroll > lastScroll && currentScroll > headerHeight) {
                gsap.to(header, {
                    y: -headerHeight, // Simply slide up by its own height
                    duration: 0.35,
                    ease: "power2.out"
                });
            }

            // 2. SCROLL UP -> SHOW IMMEDIATELY
            else if (currentScroll < lastScroll) {
                gsap.to(header, {
                    y: 0,
                    duration: 0.35,
                    ease: "power2.out"
                });
                header.classList.add("sticky");
            }

            // 3. AT TOP -> RESET
            if (currentScroll <= 10) {
                header.classList.remove("sticky");
                // Ensure the header is visible at the very top
                gsap.to(header, { y: 0, duration: 0.2 });
            }

            lastScroll = currentScroll;
        });
        // gsap
    </script>
    <!-- header script -->

