<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Marhaba</title>

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
    <style>
        .error{
            color:red;
        }
    </style>
</head>

<body>
    <header>
        <div class="container-fluid">
            <!-- Mobile Header -->
            <div class="row text-center heder_section d-flex d-md-none align-items-center">
                <div class="col-6 text-start">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('public/front/img/logo.svg') }}" alt="marhaba" class="img-fluid nav_logo">
                        <!--<img src="{{ asset('public/front/img/Home/white-logo.svg') }}" alt="marhaba" class="img-fluid nav_logo">-->
                    </a>
                </div>
                <div class="col-6 text-end">
                    <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                        <i class="fas fa-bars fs-3"></i>
                    </button>
                </div>
            </div>

            <!-- Desktop Header -->
            <div class="d-none d-md-flex justify-content-between align-items-center heder_section">
                <div class="social_items">
                    <!--<a href="#"><img src="{{ asset('public/front/img/facebook_icon.png') }}" alt="facebook" class="img-fluid"></a>-->
                    <a href="#"><img src="{{ asset('public/front/img/linkedin_icon.png') }}" alt="linkedin"
                            class="img-fluid color-head"></a>
                    <a href="#"><img src="{{ asset('public/front/img/insta_icon.png') }}" alt="instagram"
                            class="img-fluid color-head"></a>
                    @if (url()->current() === url('landing'))
                    <a href="#">
                        <img src="{{ asset('public/front/img/Home/white-insta.svg') }}" alt="instagram"
                            class="img-fluid white-head">
                    </a>

                    <a href="#">
                        <img src="{{ asset('public/front/img/Home/white-linkedin.svg') }}" alt="linkedin"
                            class="img-fluid white-head">
                    </a>
                    @else
                    {{-- Other pages icons --}}
                    <a href="#">
                        <img src="{{ asset('public/front/img/insta_icon.png') }}" alt="instagram"
                            class="img-fluid white-head">
                    </a>

                    <a href="#">
                        <img src="{{ asset('public/front/img/linkedin_icon.png') }}" alt="linkedin"
                            class="img-fluid white-head">
                    </a>
                    @endif

                </div>
                <div class="text-center align-items-center mx-auto">
                    <a href="{{ url('/') }}" class="me-4">
                        <img src="{{ asset('public/front/img/Home/logo-minimal.svg') }}" alt="logo"
                            class="img-fluid nav_logo color-head" style="height:16px;">
                        @if (url()->current() === url('landing'))
                        <img src="{{ asset('public/front/img/Home/white-logo.svg') }}" alt="logo"
                            class="img-fluid nav_logo white-head" style="height:60px;">
                        @else
                        <img src="{{ asset('public/front/img/purple-logo.svg') }}" alt="logo"
                            class="img-fluid nav_logo white-head" style="height:60px;">
                        @endif
                    </a>
                </div>
                @if (url()->current() === url('landing'))
                <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu">
                    <i class="fas fa-bars fs-3"></i>
                </button>
                @else
                <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu">
                    <i class="fas fa-bars fs-3" style="color:#452667;"></i>
                </button>
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

    $products = Product::whereNull('deleted_at')->get()->map(function($p){
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

    $menu_images = MenuImage::whereNull('deleted_at')->get()->map(function($img){
    return [
    'type' => $img->type,
    'reference_id' => $img->reference_id,
    'image' => $img->image ? asset('public/menu_images/' . $img->image) : null
    ];
    });
    @endphp

    <!-- Sidebar -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title lora_36" id="filterOffcanvasLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
                                    <h2 class="accordion-header" id="headingAge">
                                        <button class="ps-0 accordion-button raleway_24 {{ !$loop->first ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseCat_{{ $key }}" aria-expanded="true" aria-controls="collapseCat_{{ $key }}">
                                            {{ $val ?? '' }}
                                        </button>
                                    </h2>
                                    <div id="collapseCat_{{ $key }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="headingAge"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-0">
                                            @php $ageSection = config('global_values.age_section'); @endphp
                                            @if(isset($ageSection) && is_countable($ageSection) && count($ageSection) > 0)
                                                @foreach($ageSection as $aKey => $aVal)
                                                    <div><a href="{{ route('get.products', ['type' => $key,'size_range' => $aKey]) }}" class="menu_text">{{ $aVal['label'] }}</a></div>
                                                @endforeach
                                            @endif
                                            {{-- <div><a href="{{ url('filter') }}" class="menu_text">2 years to 6 years</a></div>
                                            <div><a href="{{ url('filter') }}" class="menu_text">6 years to 14 years</a></div> --}}
                                            <a href="{{ route('get.products', ['type' => $key]) }}" class="menu_view_all">View all</a>
                                            {{-- <img src="https://marhabafashion.com/public/menu_images/Boys.jpg" alt="Our Collections" class="img-fluid mt-3"> --}}
                                            @if($key == 'boy')
                                            <img src="{{ asset('public/front/img/menu_img_boy.jpg') }}" alt="Our Collections" class="img-fluid mt-3">
                                            @else
                                            <img src="{{ asset('public/front/img/menu_img_girl.jpg') }}" alt="Our Collections" class="img-fluid mt-3">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <!--Girls-->
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingBrand">
                                <button class="ps-0 accordion-button collapsed raleway_24" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
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
                                    <img src="https://marhabafashion.com/public/menu_images/Girls.jpg" alt="Our Collections" class="img-fluid mt-3">
                                </div>
                            </div>
                        </div> --}}

                        <!--Resources-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCategory">
                                <button class="ps-0 accordion-button collapsed raleway_24" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseCategory" aria-expanded="false"
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const header = document.querySelector("header");
            const headerHeight = header.offsetHeight;

            let lastScrollY = window.scrollY;

            window.addEventListener("scroll", function () {
                const currentScrollY = window.scrollY;

                // Sticky logic
                if (currentScrollY > headerHeight) {
                    header.classList.add("sticky");
                    document.body.classList.add("has-sticky");
                } else {
                    header.classList.remove("sticky");
                    document.body.classList.remove("has-sticky");
                    header.style.transform = "translateY(0)";
                }

                // Scroll direction logic
                if (currentScrollY > lastScrollY && currentScrollY > headerHeight) {
                    // scrolling DOWN
                    header.style.transform = "translateY(-100%)";
                } else {
                    // scrolling UP
                    header.style.transform = "translateY(0)";
                }

                lastScrollY = currentScrollY;
            });
        });
    </script>

</body>
