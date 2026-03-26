@include('layouts.frontheader')

<link rel="stylesheet" href="{{ asset('public/front/css/hero_style.css') }}">
<link rel="stylesheet" href="{{ asset('public/front/css/hero_responsive.css') }}">
<style>
    @media (max-width: 1281px) and (min-width: 1020px) {
    .ym-container{max-width: calc(100% - 200px);}
    }
</style>
@php $param = 0; @endphp
<section class="ym_hero">
    <div class="ym_hero_slider_wrapper">
        <div class="gallery-container">
            <!-- Row 1: Left to Right -->
            <div class="swiper-row">
                <div class="swiper swiper-row-1">
                    <div class="swiper-wrapper">
                        @if(isset($homeSliderImgs) && is_countable($homeSliderImgs) && count($homeSliderImgs) > 0)
                            @for($i = 0; $i < 2; $i++)
                                @foreach($homeSliderImgs as $k => $v)
                                    @if($v->slider == 1)
                                        <div class="swiper-slide">
                                            <div class="image-card">
                                                @if(isset($v->image))
                                                    <img src="{{ asset('public/homeslider_images/' . $v->image) }}" width="100">
                                                @else
                                                    <img loading="lazy"
                                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=600&fit=crop"
                                                        alt="Person 1">
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endfor
                        @endif

                    </div>
                </div>
            </div>

            <!-- Row 2: Right to Left -->
            <div class="swiper-row">
                <div class="swiper swiper-row-2">
                    <div class="swiper-wrapper">
                        @if(isset($homeSliderImgs) && is_countable($homeSliderImgs) && count($homeSliderImgs) > 0)
                            @for($i = 0; $i < 2; $i++)
                                @foreach($homeSliderImgs as $k => $v)
                                    @if($v->slider == 2)
                                        <div class="swiper-slide">
                                            <div class="image-card">
                                                @if(isset($v->image))
                                                    <img src="{{ asset('public/homeslider_images/' . $v->image) }}" width="100">
                                                @else
                                                    <img loading="lazy"
                                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=600&fit=crop"
                                                        alt="Person 1">
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endfor
                        @endif

                    </div>
                </div>
            </div>

            <!-- Row 3: Left to Right -->
            <div class="swiper-row">
                <div class="swiper swiper-row-3">
                    <div class="swiper-wrapper">
                        @if(isset($homeSliderImgs) && is_countable($homeSliderImgs) && count($homeSliderImgs) > 0)
                            @for($i = 0; $i < 2; $i++)
                                @foreach($homeSliderImgs as $k => $v)
                                    @if($v->slider == 3)
                                        <div class="swiper-slide">
                                            <div class="image-card">
                                                @if(isset($v->image))
                                                    <img src="{{ asset('public/homeslider_images/' . $v->image) }}" width="100">
                                                @else
                                                    <img loading="lazy"
                                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=600&fit=crop"
                                                        alt="Person 1">
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endfor
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="hero_overlay">
            <div class="hero_overlay_ctnt">
                <h1 class="hero_overlay_ctnt_h1">Wholesale Children's Clothing</h1>
                <h1 class="hero_overlay_ctnt_h1"><em>Quality & Value</em></h1>
                <div class="hero_breadcrumb">
                    <span><a>Complete range from newborn to 14 years</a></span>
                    <span>|</span>
                    <span><a>Quality overseen from fabric to finish</a></span>
                    <span>|</span>
                    <span><a>Children's fashion — from Dubai to the world.</a></span>
                </div>
                <div class="btn_wrapper">
                    <a href="#collection" class="btn_1" >Browse Collections<img
                            loading="lazy" src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10"
                            width="10"></a>
                    <a href="#catalogue" class="btn_1">Request Latest Catalogues<img loading="lazy"
                            src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10" width="10"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ym_stats home_mt-100">
    <div class="ym-container">
        <div class="stats_wrapper text-center">
            <p class="title_30-raleway">Marhaba is a wholesale children's clothing distributor headquartered in
                Dubai, UAE. We manufacture our own lines, giving us direct control over quality, consistency,
                and pricing.</p>
            <p class="title_30-raleway">From baby essentials and casual wear to occasion pieces, versatile
                separates, and cozy homewear—our collections cover every moment of childhood, from first onesies
                to age 14.</p>
            <p class="title_30-raleway mb-0">Built on long-term partnerships. That's how we've operated since 1974.
                Ready inventory. Reliable supply. An experienced team. We're here to make sourcing simpler so
                you can focus on growing your business. Serving retailers across the Middle East, Africa, and
                Asia.</p>
            <div class="stat_box_wrapper">
                <div class="stats_box">
                    <div>
                        <h2 class="stat_counter" data-target="5000">+</h2>
                        <h3 class="counter_name">Design</h3>
                    </div>
                    <div class="stats_border"></div>
                    <p class="stats_des">New children's styles added weekly</p>
                </div>
                <div class="stats_box">
                    <div>
                        <h2 class="stat_counter" data-target="3"></h2>
                        <h3 class="counter_name">In-house Brands</h3>
                    </div>
                    <span class="stats_border"></span>
                    <p class="stats_des">Designed and manufactured by us</p>
                </div>
                <div class="stats_box">
                    <div>
                        <h2 class="stat_counter" data-target="45">+</h2>
                        <h3 class="counter_name">Countries</h3>
                    </div>
                    <span class="stats_border"></span>
                    <p class="stats_des">Trusted by wholesale partners worldwide</p>
                </div>
                <div class="stats_box">
                    <div>
                        <h2 class="stat_counter" data-target="50">+</h2>
                        <h3 class="counter_name">Years</h3>
                    </div>
                    <span class="stats_border"></span>
                    <p class="stats_des">Three generations in children's fashion</p>
                </div>
            </div>
        </div>
    </div>
</section>
@if(isset($brand) && is_countable($brand) && count($brand) > 0)
    <section class="home_mt-100">
        <h2 class="title_60lora text-center">In-House Brands</h2>
        <div class="yellow-gradient">
            <div class="ym-container">
                <div class="home_brand_bg">
                    @foreach($brand as $value)
                        <img loading="lazy" src="{{ asset('public/brand_images/' . $value->image) }}" alt="{{ $value->name }}"
                            class="img-fluid">
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
<!-- -----------------boy slider----------- -->
<section class="home_mt-100 d-none">
    <div class="ym-container">
        <div class="container_main_boy">
            <div class="col_small">
                <div>
                    <h2 class="title_60lora" style=" white-space: nowrap; ">Boys Collection </h2>
                    <a href="{{ route('get.products', ['type' => 'boy']) }}" class="btn_1 mx-auto" target="_blank">All
                        Boys Products<img loading="lazy" src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt=""
                            height="10" width="10"></a>
                </div>
                <div class="hero_img_wrapper">
                    <img loading="lazy" src="{{ asset('public/front/img/Home/all-boy.png') }}" alt="Boy jumping">
                </div>
            </div>

            <div class="col_big">
                <div class="product_grid">
                    @if(isset($boysCollection) && is_countable($boysCollection) && count($boysCollection) > 0)
                        @foreach($boysCollection as $key => $val)
                            @php $productImages = json_decode($val->product_brand_size); @endphp
                            <div class="product_wrapper">
                                <div class="ym_card">
                                    <div class="Product_item">
                                        <div class="ym_card_img">

                                            @if(isset($productImages) && is_countable($productImages) && count($productImages) > 0)

                                                <!-- ✅ COVER IMAGE (FIRST IMAGE ONLY) -->
                                                <img src="{{ asset('public/product_images/' . $productImages[0]->product_image) }}"
                                                    alt="{{ $val->name }}" class="ym_cover_slider">

                                                <!-- ✅ SLICK SLIDER -->
                                                <div class="ym_slider">
                                                    @foreach($productImages as $k => $v)
                                                        <div>
                                                            <a href="{{ url('products-details/' . $val['url'] .'/'. $param . '/' . $val['id']) }}"
                                                                target="_blank">
                                                                <img loading="lazy"
                                                                    src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                                    alt="{{ $val->name }}" class="ym_slide_img">
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            @else

                                                <!-- ✅ NO IMAGE CASE -->
                                                <img src="{{ asset('public/front/img/product-not-found.png') }}" alt="not found"
                                                    class="ym_cover_slider">

                                                <div class="ym_slider">
                                                    <div>
                                                        <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                                            class="ym_slide_img">
                                                    </div>
                                                </div>

                                            @endif

                                        </div>
                                    </div>

                                    <div>
                                        <a class="ym_info" href="{{ url('products-details/' . $val['url'] . '/' . $param . '/' . $val['id']) }}"
                                            target="_blank">
                                            <h3 class="ym_prod_name">{{$val->name ?? ''}}</h3>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <div class="d-flex justify-content-center align-items-center text-center"
                            style="min-height: 100vh;">
                            <div><img loading="lazy" src="{{ asset('public/front/img/product-not-found.png') }}"
                                    alt="not found"></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.boy-section')
@include('layouts.girl-section')
<!-- -------------girl slider--------------- -->
<section class="home_mt-100 d-none ">
    <div class="ym-container">
        <div class="container_main_girl">
            <div class="col_big">
                <div class="product_grid">
                    @if(isset($girlsCollection) && is_countable($girlsCollection) && count($girlsCollection) > 0)
                        @foreach($girlsCollection as $key => $val)
                            @php $productImages = json_decode($val->product_brand_size); @endphp
                            <div class="product_wrapper">
                                <div class="ym_card">
                                    <div class="Product_item">
                                        <div class="ym_card_img">

                                            @if(isset($productImages) && is_countable($productImages) && count($productImages) > 0)

                                                <!-- ✅ COVER IMAGE (FIRST IMAGE ONLY) -->
                                                <img src="{{ asset('public/product_images/' . $productImages[0]->product_image) }}"
                                                    alt="{{ $val->name }}" class="ym_cover_slider">

                                                <!-- ✅ SLICK SLIDER -->
                                                <div class="ym_slider">
                                                    @foreach($productImages as $k => $v)
                                                        <div>
                                                            <a href="{{ url('products-details/' . $val['url'] . '/' . $param . '/' . $val['id']) }}"
                                                                target="_blank">
                                                                <img loading="lazy"
                                                                    src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                                    alt="{{ $val->name }}" class="ym_slide_img">
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            @else

                                                <!-- ✅ NO IMAGE CASE -->
                                                <img src="{{ asset('public/front/img/product-not-found.png') }}" alt="not found"
                                                    class="ym_cover_slider">

                                                <div class="ym_slider">
                                                    <div>
                                                        <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                                            class="ym_slide_img">
                                                    </div>
                                                </div>

                                            @endif

                                        </div>
                                    </div>

                                    <div>
                                        <a class="ym_info" href="{{ url('products-details/' . $val['url'] . '/' . $param . '/' . $val['id']) }}"
                                            target="_blank">
                                            <h3 class="ym_prod_name">{{$val->name ?? ''}}</h3>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <div class="d-flex justify-content-center align-items-center text-center"
                            style="min-height: 100vh;">
                            <div><img loading="lazy" src="{{ asset('public/front/img/product-not-found.png') }}"
                                    alt="not found"></div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col_small">
                <div>
                    <h2 class="title_60lora" style=" white-space: nowrap; ">Girls Collection </h2>
                    <a href="{{ route('get.products', ['type' => 'girl']) }}" class="btn_1 mx-auto" target="_blank">All
                        Girls Products<img loading="lazy" src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt=""
                            height="10" width="10"></a>
                </div>
                <div class="hero_img_wrapper">
                    <img loading="lazy" src="{{ asset('public/front/img/Home/all-girl.png') }}" alt="all-girl">
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ----------------range------------ -->
<section id="categories" class="projects-section home_mt-100">
    <h2 class="title_60lora text-center">Age Ranges</h2>
    <div class="ym-container">
        <div class="projects-desktop">
            <!-- Baby -->
            <div class="project-card" data-index="0" style="background-color: #F3F2E7;">
                <div class="enquire-circle">
                    <div>Click Now</div>
                </div>
                <div class="project-bg bg-cream"></div>

                <div class="project-content">
                    <div>
                        <span class="card_title">Baby</span>
                        <p class="card_desc mt-2">Age Range : {{$ageSections['baby']['label']}}</p>
                        <div class="ym-project">
                        <h3 class="card_subtitle">Size Groups</h3>
                        <div class="tags">
                            @if(isset($groupedSizes) && is_countable($groupedSizes) && count($groupedSizes) > 0)
                                @foreach ($groupedSizes['baby'] as $val)
                                    <span class="card_pill">{{$val}}</span>
                                @endforeach
                            @endif
                        </div>
                        <h3 class="card_subtitle">Products:</h3>
                        <div class="tags">
                            @if(isset($productsByAge) && is_countable($productsByAge) && count($productsByAge) > 0)
                                @foreach ($productsByAge['baby'] as $key => $val)
                                    @if($key == 9)
                                        @break
                                    @endif
                                    <a><span class="p_type">{{$val->name}}</span></a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    </div>
                    <div>
                        <div class="btn_wrapper">
                            <a href="{{ route('get.products', ['type' => 'boy', 'size_range' => 'baby']) }}"
                                class="btn_1" target="_blank">Explore Baby Boy <img loading="lazy"
                                    src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10"
                                    width="10"></a>
                            <a href="{{ route('get.products', ['type' => 'girl', 'size_range' => 'baby']) }}"
                                class="btn_1" target="_blank">Explore Baby Girl<img loading="lazy"
                                    src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10"
                                    width="10"></a>
                        </div>
                    </div>
                </div>
                <div class="card_top">
                    <div class="card_top_head">
                        <span class="card_title">Baby</span>
                        <p class="card_desc">Age Range : {{$ageSections['baby']['label']}}</p>
                    </div>
                    <img loading="lazy" src="{{ asset('public/front/img/bannerKids_banner_3.png') }}"
                        class="category-img" alt="Baby" data-alt='[
                            "{{ asset('public/front/img/bannerKids_banner_3a.png') }}",
                            "{{ asset('public/front/img/bannerKids_banner_3b.png') }}",
                            "{{ asset('public/front/img/bannerKids_banner_3.png') }}"
                        ]'>
                    {{-- data-alt='["https://marhabafashion.com/public/front/img/bannerKids_banner_3a.png",
                    "https://marhabafashion.com/public/front/img/bannerKids_banner_3b.png",
                    "https://marhabafashion.com/public/front/img/bannerKids_banner_3.png"]'> --}}
                </div>
                <!-- <img loading="lazy" src="./images/baby_girl-1.png" class="category-img" alt="Baby"> -->
            </div>

            <!-- Toddler -->
            <div class="project-card" data-index="1" style="background-color: #EFE6F0;">
                <div class="enquire-circle">
                    <div>Click Now</div>
                </div>
                <div class="project-bg bg-light"></div>

                <div class="project-content">
                    <div>
                        <span class="card_title">Toddler & Little Kids</span>
                        <p class="card_desc mt-2">Age Range : {{$ageSections['kids']['label']}}</p>
                        <div class="ym-project">
                        <h3 class="card_subtitle">Size Groups</h3>
                        <div class="tags">
                            @if(isset($groupedSizes) && is_countable($groupedSizes) && count($groupedSizes) > 0)
                                @foreach ($groupedSizes['kids'] as $val)
                                    <span class="card_pill">{{$val}}</span>
                                @endforeach
                            @endif
                        </div>
                        <h3 class="card_subtitle">Products:</h3>
                        <div class="tags">
                            @if(isset($productsByAge) && is_countable($productsByAge) && count($productsByAge) > 0)
                                @foreach ($productsByAge['kids'] as $key => $val)
                                    @if($key == 9)
                                        @break
                                    @endif
                                    <a><span class="p_type">{{$val->name}}</span></a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    </div>
                    <div>
                        <div class="btn_wrapper">
                            <a href="{{ route('get.products', ['type' => 'boy', 'size_range' => 'kids']) }}"
                                class="btn_1" target="_blank">Explore Boy <img loading="lazy"
                                    src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10"
                                    width="10"></a>
                            <a href="{{ route('get.products', ['type' => 'girl', 'size_range' => 'kids']) }}"
                                class="btn_1" target="_blank">Explore Girl<img loading="lazy"
                                    src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10"
                                    width="10"></a>
                        </div>
                    </div>
                </div>

                <div class="card_top">
                    <div class="card_top_head">
                        <span class="card_title">Toddler & Little Kids</span>
                        <p class="card_desc">Age Range : {{$ageSections['kids']['label']}}</p>
                    </div>
                    <img loading="lazy" src="{{ asset('public/front/img/Home/tlk.png') }}" class="category-img"
                        alt="Toddler" {{--
                        data-alt='["https://marhabafashion.com/public/front/img/bannerKids_banner_1a.png", "https://marhabafashion.com/public/front/img/bannerKids_banner_1b.png", "https://marhabafashion.com/public/front/img/bannerKids_banner_1.png"]'>
                    --}}
                    data-alt='[
                    "{{ asset('public/front/img/bannerKids_banner_1a.png') }}",
                    "{{ asset('public/front/img/bannerKids_banner_1b.png') }}",
                    "{{ asset('public/front/img/bannerKids_banner_1.png') }}"
                    ]'>
                </div>
            </div>

            <!-- Kids -->
            <div class="project-card" data-index="2" style="background-color: #E6EFF2;">
                <div class="enquire-circle">
                    <div>Click Now</div>
                </div>
                <div class="project-bg bg-soft"></div>

                <div class="project-content">
                    <div>
                        <span class="card_title">Kids & Youth</span>
                        <p class="card_desc mt-2">Age Range : {{$ageSections['junior']['label']}}</p>
                        <div class="ym-project">
                        <h3 class="card_subtitle">Size Groups</h3>
                        <div class="tags">
                            @if(isset($groupedSizes) && is_countable($groupedSizes) && count($groupedSizes) > 0)
                                @foreach ($groupedSizes['junior'] as $val)
                                    <span class="card_pill">{{$val}}</span>
                                @endforeach
                            @endif
                        </div>
                        <h3 class="card_subtitle">Products:</h3>
                        <div class="tags">
                            @if(isset($productsByAge) && is_countable($productsByAge) && count($productsByAge) > 0)
                                @foreach ($productsByAge['junior'] as $key => $val)
                                    @if($key == 9)
                                        @break
                                    @endif
                                    <a><span class="p_type">{{$val->name}}</span></a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    </div>
                    <div>
                        <div class="btn_wrapper">
                            <a href="{{ route('get.products', ['type' => 'boy', 'size_range' => 'junior']) }}"
                                class="btn_1" target="_blank">Explore Boy <img loading="lazy"
                                    src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10"
                                    width="10"></a>
                            <a href="{{ route('get.products', ['type' => 'girl', 'size_range' => 'junior']) }}"
                                class="btn_1" target="_blank">Explore Girl<img loading="lazy"
                                    src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10"
                                    width="10"></a>
                        </div>
                    </div>
                </div>

                <div class="card_top">
                    <div class="card_top_head">
                        <span class="card_title">Kids & Youth</span>
                        <p class="card_desc">Age Range : {{$ageSections['junior']['label']}}</p>
                    </div>
                    <img loading="lazy" src="{{ asset('public/front/img/Home/ky.png') }}" class="category-img"
                        alt="Kids & Youth" {{--
                        data-alt='["https://marhabafashion.com/public/front/img/bannerKids_banner_4a.png", "https://marhabafashion.com/public/front/img/bannerKids_banner_4b.png", "https://marhabafashion.com/public/front/img/bannerKids_banner_4.png"]'>
                    --}}
                    data-alt='[
                    "{{ asset('public/front/img/bannerKids_banner_4a.png') }}",
                    "{{ asset('public/front/img/bannerKids_banner_4b.png') }}",
                    "{{ asset('public/front/img/bannerKids_banner_4.png') }}"
                    ]'>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ----------------catalogues------------ -->
@if(isset($catImgs) && is_countable($catImgs) && count($catImgs) > 0)
    <section class="home_mt-100" id="catalogue">
        <div class="hero_cat yellow-gradient">
            <div class="ym-container">
                <div class="hero_catologue_head col-lg-8">
                    <h2 class="title_60lora text-center">View Our Catalogues</h2>
                    <p class="title_24-raleway">Explore our newest collections, including Casual Wear Sets, Occasion Wear Sets, Homewear Sets, and Separates. Select your preferred styles and our wholesale team will connect with curated options tailored for your business.
                    </p>
                    <div class="btn_wrapper mt-0">
                        <a href="javascript:void(0);" class="btn_1" data-bs-toggle="modal"
                            data-bs-target="#enquiryModal">Request Latest Catalogues <img loading="lazy"
                                src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10" width="10"></a>
                        <a href="https://www.instagram.com/marhabafashionuae?igsh=cTluY2lzYTRpM2pp" class="btn_1"
                            target="_blank"><img loading="lazy" src="{{ asset('public/front/img/Home/purple-insta.png') }}"
                                alt="insta" height="16" width="16"> Follow us on Instagram</a>
                    </div>
                </div>
            </div>
            <!--<div class="swiper hero_cat_slider d-none">-->
            <!--    <div class="swiper-wrapper">-->
            <!--        @foreach ($catImgs as $val)-->
            <!--            <div class="swiper-slide">-->
            <!--                <img loading="lazy" src="{{ asset('public/catalogue_images/' . $val->image) }}" class="img-fluid">-->
            <!--            </div>-->
            <!--        @endforeach-->
            <!--    </div>-->
            <!--</div>-->
            <div class="ym_Cat_wrapper">
                <div class="ym_cat">
                    @foreach ($catImgs as $val)
                        <div class="div">
                            <div class="cat_img_parent">
                                <img loading="lazy" src="{{ asset('public/catalogue_images/' . $val->image) }}" class="img-fluid">
                                <div class="cat_overlay">{{$val->name ?? ''}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif

<!-- ----------------trusted------------ -->
@if(isset($trustedBy) && is_countable($trustedBy) && count($trustedBy) > 0)
    <section class="home_mt-100">
        <div class="ym-container">
            <h2 class="title_60lora text-center">Trusted by</h2>
            <p class="text-center mt-3 title_24-raleway">Whether you run a boutique, supply a regional network, or sell
                online—there's a place for
                you here.<br> Marhaba partners with businesses of every size, with terms shaped around your needs.</p>
            {{-- <a href="#" class="btn_1 mx-auto" data-bs-toggle="modal" 
            data-bs-target="#enquiryModal">Enquire Now  --}}
            <a href="{{ route('serve') }}" class="btn_1 mx-auto">Learn More 
                <img
                    loading="lazy" src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10"
                    width="10"></a>
            <div class="core_wrapper mt-5">
                @foreach($trustedBy as $key => $val)
                    <div class="comp_bus_child">
                        <div class="comp_bus_front">
                            <div class="comp_bus_fronts">
                                <span>
                                    {{-- <img loading="lazy" src="{{ asset('public/front/img/Home/ccs.png') }}" alt=""
                                        height="113" width="186"> --}}
                                    <img loading="lazy" src="{{ asset('public/trusted_by_images/' . $val->image) }}" alt=""
                                        height="113" width="186">
                                </span>
                                <h6 class="comp_bus_num">{{$val->title ?? ''}}</h6>
                            </div>
                        </div>
                        <div class="comp_bus_back">
                            <span>
                                <img loading="lazy" src="{{ asset('public/trusted_by_images/' . $val->image) }}" alt=""
                                    width="330" height="200">
                            </span>
                            <div class="comp_bus_back_bt">
                                <h6 class="comp_bus_num">{{$val->title ?? ''}}</h6>
                                <p class="comp_bus_ext">{{$val->desc ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endif
<!-- ----------------why choose------------ -->
@if(isset($whyChooseUs) && is_countable($whyChooseUs) && count($whyChooseUs) > 0)
    <section class="home_mt-100">
        <div class="ym-container">
            <h2 class="title_60lora text-center">Why Choose Us</h2>
            <p class="text-center title_24-raleway mt-3 ">Everything to build a children's department that sells — ages
                0–14Y, from one
                trusted source.</p>
            <div class="hero_why_wrapper d-none">
                <div class="d-flex align-items-center">
                    <img loading="lazy" src="{{ asset('public/front/img/Home/hero-why.png') }}" alt="img-fluid"
                        class="img-fluid">
                    <div class="hero_why_content">
                        <div class="swiper why_slider">
                            <div class="swiper_number_pagination">
                                <span id="current-num">01</span>
                                <span class="separator">-</span>
                                <span id="total-num">02</span>
                            </div>

                            <div class="swiper-wrapper">
                                @foreach($whyChooseUs as $k => $v)
                                    <div class="swiper-slide">
                                        <div class="why_slide">
                                            <h3 class="title_60lora">{{ $v->title ?? '' }}</h3>
                                            <p class="mb-0">{{ $v->desc ?? '' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero_why_wrapper">
                <div class="d-flex align-items-center">
                    <!--<img id="main-why-img" loading="lazy" src="{{ asset('public/front/img/Home/hero-why.png') }}" alt="Main Illustration" class="img-fluid">-->
                    <img id="main-why-img" loading="lazy" src="{{ asset('public/why_chooseus/' . $whyChooseUs[0]->image) }}" alt="Main Illustration" class="img-fluid">
                    <div class="hero_why_content">
                        <div class="swiper why_slider">
                            <div class="swiper_number_pagination">
                                <span id="current-num">01</span>
                                <span class="separator">-</span>
                                <span id="total-num">@if(count($whyChooseUs) < 10){{'0'}}@endif{{ count($whyChooseUs) }}</span>
                            </div>
            
                            <div class="swiper-wrapper">
                                @foreach($whyChooseUs as $k => $v)
                                <!--<div class="swiper-slide" data-img="{{ asset('public/front/img/Home/hero-why.png') }}">-->
                                <div class="swiper-slide" data-img="{{ asset('public/why_chooseus/' . $v->image) }}">
                                    <div class="why_slide">
                                        <h3 class="title_60lora">{{ $v->title ?? '' }}</h3>
                                        <p class="mb-0">{{ $v->desc ?? '' }}</p>
                                    </div>
                                </div>
                                @endforeach
                                <!--<div class="swiper-slide" data-img="{{ asset('public/front/img/Home/hero-why.png') }}">-->
                                <!--    <div class="why_slide">-->
                                <!--        <h3 class="title_60lora">Global Reach</h3>-->
                                <!--        <p class="mb-0">Trusted by wholesale partners across 45 countries.</p>-->
                                <!--    </div>-->
                                <!--</div>-->
            
                                <!--<div class="swiper-slide" data-img="{{ asset('public/front/img/Home/hero-why.png') }}">-->
                                <!--    <div class="why_slide">-->
                                <!--        <h3 class="title_60lora">Quality Build</h3>-->
                                <!--        <p class="mb-0">Designed and manufactured by our in-house brands.</p>-->
                                <!--    </div>-->
                                <!--</div>-->
            
                                <!--<div class="swiper-slide" data-img="{{ asset('public/front/img/Home/hero-why.png') }}">-->
                                <!--    <div class="why_slide">-->
                                <!--        <h3 class="title_60lora">Heritage</h3>-->
                                <!--        <p class="mb-0">Three generations of expertise in children's fashion.</p>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
            
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- ----------------grow------------ -->
<section class="home_mt-100">
    <div class="grow_wrapper yellow-gradient">
        <div class="ym-container">
            <div class="col-lg-10 mx-auto">
                <h2 class="title_60lora text-center">Let’s Grow Your Fashion Business Together</h2>
                <div class="ym_para_home">
                    <p class="title_24-raleway mt-3 mt-xl-4">Looking for premium baby and toddler wear that your
                    customers will love? </p> 
                <p class="title_24-raleway"> Marhaba Fashion partners with retailers, distributors, and wholesalers
                    worldwide to deliver high-quality, trend-led children’s apparel at competitive wholesale prices.
                </p>
                <p class="title_24-raleway">Share your requirements with us, and our team will get back to you with
                    catalogs, pricing, MOQs, and customization options.</p>
                </div>
                <div class="btn_wrapper">
                    <a href="" class="btn_1" data-bs-toggle="modal" data-bs-target="#enquiryModal">Enquire Now <img
                            loading="lazy" src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10"
                            width="10"></a>
                    <a href="{{ route('contact') }}" class="btn_1">Become a Distributor <img loading="lazy"
                            src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt="" height="10" width="10"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ----------------presence------------ -->
<section class="section_mt section_mb  global-presence">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mean_head section_pt scroll-text" animation="2" data-animate-on-scroll>Global Presence</h2>
                <div class="global_legend active">
                    <span class="legend-item">
                        <span class="color-box africa"></span>
                        <p class="mb-0">Africa</p>
                    </span>
                    <span class="legend-item">
                        <span class="color-box middle-east"></span>
                        <p class="mb-0">Middle East</p>
                    </span>
                    <span class="legend-item">
                        <span class="color-box south-asia"></span>
                        <p class="mb-0">South Asia</p>
                    </span>
                </div>
                <div class="global_presence_tab position-relative">
                    <ul class="nav nav-pills border-0 global_tab_item nav-tabs mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item global_tab_africa" role="presentation">
                            <button class="nav-link" id="pills-home-tab" data-region="africa" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="false">+</button>
                        </li>
                        <li class="nav-item global_tab_east" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-region="east" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">+</button>
                        </li>
                        <li class="nav-item global_tab_asia" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-region="asia" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">+</button>
                        </li>
                    </ul>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <!--<img loading="lazy" src="{{ asset('public/front/img/map-Frame.png') }}" alt="map" class="img-fluid">-->
                        <picture>
                            <source srcset="{{ asset('public/front/img/map-mobile-Frame.png') }}" type="image/png"
                                media="(max-width: 767px)">
                            <img loading="lazy" src="{{ asset('public/front/img/map-Frame.png') }}" alt="Global Map"
                                class="img-fluid" loading="lazy">
                        </picture>
                    </div>
                </div>
                <div class="global_presence_tabcontent">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="flg_itemlist">
                                        @foreach ($globalpresence->where('cat_title', 'Africa') as $item)
                                            <div class="flg_item">
                                                <img loading="lazy"
                                                    src="{{ asset('public/GlobalPresence_Logo_Image/' . $item->logo_image) }}"
                                                    alt="{{ $item->logo_name }}" class="img-fluid">
                                                <p class="flg_text">{{ $item->logo_name }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="flg_itemlist">
                                        @foreach ($globalpresence->where('cat_title', 'Middle East') as $item)
                                            <div class="flg_item">
                                                <img loading="lazy"
                                                    src="{{ asset('public/GlobalPresence_Logo_Image/' . $item->logo_image) }}"
                                                    alt="{{ $item->logo_name }}" class="img-fluid">
                                                <p class="flg_text">{{ $item->logo_name }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="flg_itemlist">
                                        @foreach ($globalpresence->where('cat_title', 'South Asia') as $item)
                                            <div class="flg_item">
                                                <img loading="lazy"
                                                    src="{{ asset('public/GlobalPresence_Logo_Image/' . $item->logo_image) }}"
                                                    alt="{{ $item->logo_name }}" class="img-fluid">
                                                <p class="flg_text">{{ $item->logo_name }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="globalPresenceModal" tabindex="-1" aria-labelledby="globalPresenceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="globalPresenceModalLabel">Global Presence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="globalPresenceModalContent">
                <!-- Dynamic content injected here -->
            </div>
        </div>
    </div>
</div>
@include('layouts.new-enquiry')


<script>
    // globalPresenceModal
    // document.addEventListener('DOMContentLoaded', function () {
    //     const modalEl = document.getElementById('globalPresenceModal');
    //     const modalContent = document.getElementById('globalPresenceModalContent');
    //     const globalButtons = document.querySelectorAll('.global_tab_item .nav-link');

    //     globalButtons.forEach(button => {
    //         button.addEventListener('click', function (e) {
    //             e.preventDefault();

    //             // For mobile view — open modal
    //             if (window.innerWidth <= 992) {
    //                 const region = button.getAttribute('data-region');
    //                 let content = '';

    //                 if (region === 'africa') {
    //                     content = document.querySelector('#pills-home').innerHTML;
    //                 } else if (region === 'east') {
    //                     content = document.querySelector('#pills-profile').innerHTML;
    //                 } else if (region === 'asia') {
    //                     content = document.querySelector('#pills-contact').innerHTML;
    //                 }

    //                 modalContent.innerHTML = content;
    //                 const modal = new bootstrap.Modal(modalEl);
    //                 modal.show();
    //             } else {
    //                 // Desktop: show tab normally
    //                 const target = button.getAttribute('data-bs-target');
    //                 if (target) {
    //                     const tab = new bootstrap.Tab(button);
    //                     tab.show();
    //                 }
    //             }
    //         });
    //     });
    // });

    // OLD CODE
    // document.addEventListener('DOMContentLoaded', function () {
    //     const modalEl = document.getElementById('globalPresenceModal');
    //     const modalContent = document.getElementById('globalPresenceModalContent');
    //     const globalButtons = document.querySelectorAll('.global_tab_item .nav-link');

    //     function handleClick(button) {
    //         if (window.innerWidth <= 992) {
    //             const region = button.getAttribute('data-region');
    //             let content = '';

    //             if (region === 'africa') {
    //                 content = document.querySelector('#pills-home').innerHTML;
    //             } else if (region === 'east') {
    //                 content = document.querySelector('#pills-profile').innerHTML;
    //             } else if (region === 'asia') {
    //                 content = document.querySelector('#pills-contact').innerHTML;
    //             }

    //             modalContent.innerHTML = content;
    //             const modal = new bootstrap.Modal(modalEl);
    //             modal.show();
    //         } else {
    //             // Desktop: show tab normally
    //             const tab = new bootstrap.Tab(button);
    //             tab.show();
    //         }
    //     }

    //     globalButtons.forEach(button => {
    //         button.addEventListener('click', function (e) {
    //             e.preventDefault();
    //             handleClick(button);
    //         });
    //     });

    //     const defaultButton = document.querySelector('[data-region="africa"]');
    //     if (defaultButton) {
    //         handleClick(defaultButton);
    //     }
    // });
    
    // NEW CODE

    
    document.addEventListener('DOMContentLoaded', function () {
        const modalEl = document.getElementById('globalPresenceModal');
        const modalContent = document.getElementById('globalPresenceModalContent');
        const globalButtons = document.querySelectorAll('.global_tab_item .nav-link');

        function handleClick(button) {
            const region = button.getAttribute('data-region'); 
            let content = ''; 

            if (region === 'africa') { 
                content = document.querySelector('#pills-home').innerHTML;
            } else if (region === 'east') { 
                content = document.querySelector('#pills-profile').innerHTML;
            } else if (region === 'asia') { 
                content = document.querySelector('#pills-contact').innerHTML;
            }

            // CHANGED CONDITION (separate desktop & mobile behaviour)
            if (window.innerWidth <= 992) {
                modalContent.innerHTML = content;
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            } else {
                const tab = new bootstrap.Tab(button);
                tab.show();
            }
        }

        globalButtons.forEach(button => {
            button.addEventListener('mouseenter', function () {
                if (window.innerWidth > 992) {
                    handleClick(button);
                }
            });
            button.addEventListener('click', function (e) {
                if (window.innerWidth <= 992) {
                    e.preventDefault();
                    handleClick(button);
                }
            });
        });

        // existing default logic
        const defaultButton = document.querySelector('[data-region="africa"]');
        if (defaultButton) {
            handleClick(defaultButton);
        }
    });
</script>
@include('layouts.frontfooter')