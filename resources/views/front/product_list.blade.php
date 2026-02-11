@include('layouts.frontheader')
@php 
$segments = request()->segments();
$categoryId = $segments[1] ?? null; // index may vary
$subcatVal = $segments[2] ?? '';
$subcatVal = preg_replace('/[\#].*$/', '', $subcatVal);
@endphp
<section class="banner_head_section section_gradientbg">
    <div class="filter_banner">
        Explore product samples. MOQ — 12 pcs per design.
    </div>
</section>
<div class="main_container">
    <div class="ym-container">
        <!--page header-->
        <section>
            <div class="product_head">
                <div>
                    <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$type}}</li>
                        </ol>
                    </nav>
                    <h1 class="lora_24">{{$type}} Wholesale Collection</h1>
                </div>
                <!-- Total Items Count -->
                <div>
                    <div class="items-count">
                        <span id="totalItems">{{ $totalProducts }} Items</span>
                    </div>
                </div>
                <!-- Filter Icon Button -->
                <div>
                    <div class="filter-button">
                        <button class="btn border-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#filterOffcanvas">
                            <svg width="21" height="15" viewBox="0 0 21 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.75 3.75H11.3565C11.6918 5.04 12.8565 6 14.25 6C15.6435 6 16.8082 5.04 17.1435 3.75H20.25C20.664 3.75 21 3.414 21 3C21 2.586 20.664 2.25 20.25 2.25H17.1435C16.8082 0.96 15.6435 0 14.25 0C12.8565 0 11.6918 0.96 11.3565 2.25H0.75C0.336 2.25 0 2.586 0 3C0 3.414 0.336 3.75 0.75 3.75ZM14.25 1.5C15.0773 1.5 15.75 2.17275 15.75 3C15.75 3.82725 15.0773 4.5 14.25 4.5C13.4228 4.5 12.75 3.82725 12.75 3C12.75 2.17275 13.4228 1.5 14.25 1.5Z"
                                    fill="#4A4A4A" />
                                <path
                                    d="M20.25 12.75H9.6435C9.30825 14.04 8.1435 15 6.75 15C5.3565 15 4.19175 14.04 3.8565 12.75H0.75C0.336 12.75 0 12.414 0 12C0 11.586 0.336 11.25 0.75 11.25H3.8565C4.19175 9.96 5.3565 9 6.75 9C8.1435 9 9.30825 9.96 9.6435 11.25H20.25C20.664 11.25 21 11.586 21 12C21 12.414 20.664 12.75 20.25 12.75ZM6.75 10.5C5.92275 10.5 5.25 11.1727 5.25 12C5.25 12.8273 5.92275 13.5 6.75 13.5C7.57725 13.5 8.25 12.8273 8.25 12C8.25 11.1727 7.57725 10.5 6.75 10.5Z"
                                    fill="#4A4A4A" />
                            </svg>
                            Filters
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!--age range section-->
        <section id="ageRangeLinks" class="age_range_section">
            <div class="age_range_box" style="background-color: rgb(243, 242, 231);">
                <div class="age-card" data-scroll-to="baby">
                    <h3 class="lora_24" stlye="background: linear-gradient(90deg, rgba(243, 242, 231, 0) 0%, #F3F2E7 50%, rgba(243, 242, 231, 0) 100%);"> Baby ({{$data['baby'] ?? 0}})</h3>
                    <p class="raleway_14 mb-0">Age Range: 0 Months to 3 Years</p>
                </div>
            </div>
            <div class="age_range_box" style="background-color: rgb(239, 230, 240);">
                <div class="age-card" data-scroll-to="toddler">
                    <h3 class="lora_24">Toddler & Little Kids ({{$data['kids'] ?? 0}})</h3>
                    <p class="raleway_14 mb-0">Age Range: 2 Years to 7 Years</p>
                </div>
            </div>
            <div class="age_range_box" style="background-color: rgb(230, 239, 242);">
                <div class="age-card" data-scroll-to="kids">
                    <h3 class="lora_24">Kids & Youth ({{$data['junior'] ?? 0}})</h3>
                    <p class="raleway_14 mb-0">Age Range: 6 Years to 14 Years</p>
                </div>
            </div>
        </section>
        <!-- Filters Pills Section ) -->
        <section id="activeFilters" class="active-filters-section mb-4 d-none">
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <!-- Filter pills  -->
            </div>
        </section>

        <div id="withFilterProduct" class="d-none">
           
        </div>

        <div id="withoutFilterProducts">
            <!-- Baby Section -->
            @if(isset($groupedProducts['baby']['products']) && is_countable($groupedProducts['baby']['products']) && count($groupedProducts['baby']['products']) > 0)
            <section id="baby" class="age_section" data-age="baby">
                <h2 class="title_48lora mb-0"
                    style="background: linear-gradient(90deg, rgba(243, 242, 231, 0) 0%, #F3F2E7 50%, rgba(243, 242, 231, 0) 100%);">
                    Baby</h2>
                <div class="products_filter_grid">
                    @foreach($groupedProducts['baby']['products'] as $key => $val)
                    @foreach($val as $vk => $vv)
                    @php 
                        $productImages = json_decode($vv->product_brand_size); 
                        $size = \App\Models\Product::getSizeId($vk);
                        $sizeId = $size->id;
                        $filteredImages = collect($productImages)->where('size_id', (string)$sizeId)->values();
                    @endphp
                    <div>
                        <div class="product_wrapper">
                            <div class="Product_item swiper prod_img_slider">
                                @if($filteredImages->count() > 0)
                                    <div class="swiper-wrapper">
                                        @foreach($filteredImages as $v)
                                            <div class="swiper-slide">
                                                <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank">
                                                    <img loading="lazy" src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                        alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img loading="lazy" src="{{ asset('public/front/img/product-not-found.png') }}"
                                                alt="not found" class="img-fluid product_img w-100">
                                        </div>
                                    </div>
                                @endif
                                {{-- <a href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png" alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100" onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a> --}}
                            </div>
                            <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank"><p class="mb-0" style="font-weight:500;">{{$vv->name ?? ''}}</p></a>
                            <p class="raleway_14 mb-0">{{$vk ?? ''}}</p>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                    {{-- <div>
                        <div class="product_wrapper">
                            <div class="Product_item">
                                <a
                                    href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png"
                                        alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100"
                                        onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a>
                            </div>
                            <p class="mb-0" style="font-weight:500;">Smart Kids Comfort Bodysuit Set</p>
                            <p class="raleway_14 mb-0">3m-12m</p>
                        </div>
                    </div>
                    <div>
                        <div class="product_wrapper">
                            <div class="Product_item">
                                <a
                                    href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png"
                                        alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100"
                                        onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a>
                            </div>
                            <p class="mb-0" style="font-weight:500;">Smart Kids Comfort Bodysuit Set</p>
                            <p class="raleway_14 mb-0">3m-12m</p>
                        </div>
                    </div>
                    <div>
                        <div class="product_wrapper">
                            <div class="Product_item">
                                <a
                                    href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png"
                                        alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100"
                                        onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a>
                            </div>
                            <p class="mb-0" style="font-weight:500;">Smart Kids Comfort Bodysuit Set</p>
                            <p class="raleway_14 mb-0">3m-12m</p>
                        </div>
                    </div> --}}
                </div>
            </section>
            @endif

            <!-- Toddler & Little Kids Section -->
            @if(isset($groupedProducts['kids']['products']) && is_countable($groupedProducts['kids']['products']) && count($groupedProducts['kids']['products']) > 0)
            <section id="toddler" class="age_section" data-age="toddler">
                <h2 class="title_48lora mb-0"
                    style="background: linear-gradient(90deg, rgba(239, 230, 240, 0) 0%, #EFE6F0 50%, rgba(239, 230, 240, 0) 100%);">
                    Toddler & Little Kids</h2>
                <div class="products_filter_grid">
                    @foreach($groupedProducts['kids']['products'] as $key => $val)
                    @foreach($val as $vk => $vv)
                    @php 
                        $productImages = json_decode($vv->product_brand_size);
                        $size = \App\Models\Product::getSizeId($vk);
                        $sizeId = $size->id;
                        $filteredImages = collect($productImages)->where('size_id', (string)$sizeId)->values();
                    @endphp
                    <div>
                        <div class="product_wrapper">
                            <div class="Product_item swiper prod_img_slider">
                                @if($filteredImages->count() > 0)
                                    <div class="swiper-wrapper">
                                        @foreach($filteredImages as $v)
                                            <div class="swiper-slide">
                                                <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank">
                                                    <img loading="lazy" src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                        alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img loading="lazy" src="{{ asset('public/front/img/product-not-found.png') }}"
                                                alt="not found" class="img-fluid product_img w-100">
                                        </div>
                                    </div>
                                @endif
                                {{-- <a href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png" alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100" onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a> --}}
                            </div>
                            <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank"><p class="mb-0" style="font-weight:500;">{{$vv->name ?? ''}}</p></a>
                            <p class="raleway_14 mb-0">{{$vk ?? ''}}</p>
                        </div>
                    </div>
                    @endforeach
                    @endforeach

                    {{-- <div>
                        <div class="product_wrapper">
                            <div class="Product_item">
                                <a
                                    href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png"
                                        alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100"
                                        onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a>
                            </div>
                            <p class="mb-0" style="font-weight:500;">Smart Kids Comfort Bodysuit Set</p>
                            <p class="raleway_14 mb-0">3m-12m</p>
                        </div>
                    </div>
                    <div>
                        <div class="product_wrapper">
                            <div class="Product_item">
                                <a
                                    href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png"
                                        alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100"
                                        onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a>
                            </div>
                            <p class="mb-0" style="font-weight:500;">Smart Kids Comfort Bodysuit Set</p>
                            <p class="raleway_14 mb-0">3m-12m</p>
                        </div>
                    </div>
                    <div>
                        <div class="product_wrapper">
                            <div class="Product_item">
                                <a
                                    href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png"
                                        alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100"
                                        onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a>
                            </div>
                            <p class="mb-0" style="font-weight:500;">Smart Kids Comfort Bodysuit Set</p>
                            <p class="raleway_14 mb-0">3m-12m</p>
                        </div>
                    </div> --}}
                </div>
            </section>
            @endif

            <!-- Kids & Youth Section -->
            @if(isset($groupedProducts['junior']['products']) && is_countable($groupedProducts['junior']['products']) && count($groupedProducts['junior']['products']) > 0)
            <section id="kids" class="age_section" data-age="kids">
                <h2 class="title_48lora mb-0" style="background: linear-gradient(90deg, rgba(230, 239, 242, 0) 0%, rgb(230, 239, 242) 50%, rgba(230, 239, 242, 0) 100%);"> Kids & Youth</h2>
                <div class="products_filter_grid">
                    @foreach($groupedProducts['junior']['products'] as $key => $val)
                    @foreach($val as $vk => $vv)
                    @php 
                        $productImages = json_decode($vv->product_brand_size); 
                        $size = \App\Models\Product::getSizeId($vk);
                        $sizeId = $size->id;
                        $filteredImages = collect($productImages)->where('size_id', (string)$sizeId)->values();
                    @endphp
                    <div>
                        <div class="product_wrapper">
                            <div class="Product_item swiper prod_img_slider">
                                {{-- @if(isset($productImages) && is_countable($productImages) && count($productImages) > 0) 
                                    <div class="swiper-wrapper">
                                        @foreach($productImages as $k => $v)
                                        <div class="swiper-slide">
                                                <a href="{{ url('products-details/' . $vv['url']) }}"><img loading="lazy" src="{{ asset('public/product_images/' . $v->product_image) }}" alt="{{ $vv->name }}" class="img-fluid product_img w-100"></a>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img loading="lazy" src="{{ asset('public/front/img/product-not-found.png') }}" alt="not found" class="img-fluid product_img w-100">
                                        </div>
                                    </div>
                                @endif --}}
                                @if($filteredImages->count() > 0)
                                    <div class="swiper-wrapper">
                                        @foreach($filteredImages as $v)
                                            <div class="swiper-slide">
                                                <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank">
                                                    <img loading="lazy" src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                        alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img loading="lazy" src="{{ asset('public/front/img/product-not-found.png') }}"
                                                alt="not found" class="img-fluid product_img w-100">
                                        </div>
                                    </div>
                                @endif

                                {{-- <a
                                    href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png" alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100" onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a> --}}
                            </div>
                            <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank"><p class="mb-0" style="font-weight:500;">{{$vv->name ?? ''}}</p></a>
                            <p class="raleway_14 mb-0">{{$vk ?? ''}}</p>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                    {{-- <div>
                        <div class="product_wrapper">
                            <div class="Product_item">
                                <a
                                    href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png"
                                        alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100"
                                        onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a>
                            </div>
                            <p class="mb-0" style="font-weight:500;">Smart Kids Comfort Bodysuit Set</p>
                            <p class="raleway_14 mb-0">3m-12m</p>
                        </div>
                    </div>
                    <div>
                        <div class="product_wrapper">
                            <div class="Product_item">
                                <a
                                    href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png"
                                        alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100"
                                        onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a>
                            </div>
                            <p class="mb-0" style="font-weight:500;">Smart Kids Comfort Bodysuit Set</p>
                            <p class="raleway_14 mb-0">3m-12m</p>
                        </div>
                    </div>
                    <div>
                        <div class="product_wrapper">
                            <div class="Product_item">
                                <a
                                    href="https://www.intelliworkz.co/marhaba_laravel/products-details/shirt-shorts-co-ord-set">
                                    <img src="https://www.intelliworkz.co/marhaba_laravel/public/product_images/Shirt-Shorts-Co-ord-set-2-5Y-1.png"
                                        alt="Shirt Shorts Co-ord Set" class="img-fluid product_img w-100"
                                        onerror="this.src='https://www.intelliworkz.co/marhaba_laravel/public/front/img/default-product.jpg'">
                                </a>
                            </div>
                            <p class="mb-0" style="font-weight:500;">Smart Kids Comfort Bodysuit Set</p>
                            <p class="raleway_14 mb-0">3m-12m</p>
                        </div>
                    </div> --}}
                </div>
            </section>
            @endif
        </div>
    </div>
</div>

<!-- Filter Offcanvas -->
<div class="offcanvas offcanvas-end filter_offcanvas" tabindex="-1" id="filterOffcanvas"
    aria-labelledby="filterOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title lora_36" id="filterOffcanvasLabel">Filters</h5>
        <!--<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>-->
        <p type="button" class="mb-0" id="clearFilters">Clear All</button>
    </div>
    <div class="offcanvas-body filter">
        <div class="menu_body">
            <div class="accordion" id="accordionExample">
                <!--age-->
                @if(isset($ageSection) && is_countable($ageSection) && count($ageSection) > 0)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAge">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseAge" aria-expanded="true" aria-controls="collapseAge">
                            Age Range
                        </button>
                    </h2>
                    <div id="collapseAge" class="accordion-collapse collapse show" aria-labelledby="headingAge" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach($ageSection as $key => $val)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="{{ $key }}" id="filterAge_{{ $key }}"
                                     name="ageRange[]" data-total="{{ $data[$key] }}" @if(isset($subcatVal) && strtolower($subcatVal) == strtolower($key)) {{ 'checked' }} @else {{ '' }} @endif>
                                <label class="form-check-label" for="filterAge_{{ $key }}">{{$val['label'] ?? ''}} ({{ $data[$key] }})</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!--brand-->
                @if(isset($brands) && is_countable($brands) && count($brands) > 0)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBrand">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
                            Brand
                        </button>
                    </h2>
                    <div id="collapseBrand" class="accordion-collapse collapse" aria-labelledby="headingBrand"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach($brands as $key => $val)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="{{ $val->id }}" id="filterBrand_{{ $val->id }}" name="brand[]" data-total="{{ $val->total_brand_product }}" data-text="{{ $val->name }}">
                                <label class="form-check-label" for="filterBrand_{{ $val->id }}">{{ $val->name ?? '' }} ({{ $val->total_brand_product }})</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($categories) && is_countable($categories) && count($categories) > 0)
                <!--category-->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingCategory">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                            Category
                        </button>
                    </h2>
                    <div id="collapseCategory" class="accordion-collapse collapse" aria-labelledby="headingCategory"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach($categories as $key => $val)
                            <div class="form-check mb-2">
                                <input class="form-check-input catFilter" type="checkbox" value="{{ $val->id }}"
                                    id="filterCategory_{{ $val->id }}" @if(isset($categoryId) && $categoryId == $val->id){{ 'checked' }} @else {{ '' }} @endif name="category[]" data-total="{{ $val->total_category_product }}" data-text="{{ $val->name }}">
                                <label class="form-check-label" for="filterCategory_{{ $val->id }}">
                                    {{ $val->name ?? '' }} ({{ $val->total_category_product }})
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

            </div>
            <!-- Apply Button -->
            <div class="">
                <a type="button" class="apply_btn" id="applyFilters" data-bs-dismiss="offcanvas">Show {{ $totalProducts }} Items</a>
            </div>
        </div>
    </div>
</div>

<script>

// State Management
const filterState = {
    ageRange: [],
    brand: [],
    category: []
};

const filterStateValue = {
    brand: [],
    category: []
};

// DOM Elements
const ageRangeLinks = document.getElementById('ageRangeLinks');
const withoutFilterProducts = document.getElementById('withoutFilterProducts');
const withFilterProduct = document.getElementById('withFilterProduct');

const activeFiltersSection = document.getElementById('activeFilters');
const ageSections = document.querySelectorAll('.age_section');
const applyFiltersBtn = document.getElementById('applyFilters');
const clearFiltersBtn = document.getElementById('clearFilters');
const totalItemsElement = document.getElementById('totalItems');
var totalProducts = @json($totalProducts);
var ageRangeLabelArr = @json($ageSection);

// Age Range Data FOR FILTER PILLS
const ageRangeLabels = {};
Object.keys(ageRangeLabelArr).forEach(key => {
    const item = ageRangeLabelArr[key];
    ageRangeLabels[key] = item.label;
});

// Initialize Event Listeners
function initEventListeners() {
    // Age card click - scroll to section
    // Scroll on click card
    document.querySelectorAll('.age-card').forEach(card => {
        card.addEventListener('click', function () {
            const targetSection = this.getAttribute('data-scroll-to');
            const section = document.getElementById(targetSection);

            if (section) {
                section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Apply Filters Button
    applyFiltersBtn.addEventListener('click', applyFilters);

    // Clear Filters Button
    clearFiltersBtn.addEventListener('click', clearAllFilters);

    // Filter checkboxes change - update button text
    // document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    //     checkbox.addEventListener('change', updateApplyButtonText);
    // });
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            updateApplyButtonText();
            applyFilters(); // ✅ ADD THIS LINE
        });
    });
}

// Update Filter State from Checkboxes
function updateFilterState() {
    // Reset state
    filterState.ageRange = [];
    filterState.brand = [];
    filterState.category = [];

    filterStateValue.brand = [];
    filterStateValue.category = [];

    // Get checked values
    document.querySelectorAll('input[name="ageRange[]"]:checked').forEach(cb => {
        filterState.ageRange.push(cb.value);
    });

    document.querySelectorAll('input[name="brand[]"]:checked').forEach(cb => {
        const text = cb.dataset.text; 
        filterState.brand.push(text);
        filterStateValue.brand.push(cb.value);
    });

    document.querySelectorAll('input[name="category[]"]:checked').forEach(cb => {
        const text = cb.dataset.text; 
        filterState.category.push(text);
        filterStateValue.category.push(cb.value);
    });
}

// function updateApplyButtonText() {
//     let total = 0;
//     // Count checked checkboxes
//     const checkedBoxes = document.querySelectorAll(
//         'input[name="ageRange[]"]:checked, input[name="brand[]"]:checked, input[name="category[]"]:checked'
//     );
//     checkedBoxes.forEach(cb => {
//         const count = parseInt(cb.getAttribute('data-total')) || 0;
//         total += count;
//     });
//     // If nothing selected → show total products
//     if (checkedBoxes.length === 0) {
//         total = totalProducts;
//     }
//     applyFiltersBtn.textContent = `Show ${total} Items`;
// }
function updateApplyButtonText() {
    const checkedBoxes = document.querySelectorAll(
        'input[name="ageRange[]"]:checked, input[name="brand[]"]:checked, input[name="category[]"]:checked'
    );
    if (checkedBoxes.length === 0) {
        applyFiltersBtn.textContent = `Show ${totalProducts} Items`;
    } else {
        applyFiltersBtn.textContent = `Loading...`;
    }
}

// Apply Filters - Main Function
function applyFilters() {
    updateFilterState();

    // Check if any filters are active
    const hasActiveFilters = filterState.ageRange.length > 0 ||
        filterState.brand.length > 0 ||
        filterState.category.length > 0;

    if (hasActiveFilters) {
        // Hide age range links section
        ageRangeLinks.classList.add('d-none');
        withoutFilterProducts.classList.add('d-none');
        withFilterProduct.classList.remove('d-none');
        // Show active filters section Pills
        activeFiltersSection.classList.remove('d-none');

        // Render filter pills
        renderFilterPills();

        loadFilterProducts();
    } else {
        // No filters active - show all sections
        showAllSections();
    }
}

function loadFilterProducts(){
    var ageFilter = filterState.ageRange;
    var brandFilter = filterStateValue.brand;
    var categoryFilter = filterStateValue.category;
    var type = @json($type).toLowerCase();
    $.ajax({
        url: "{{ route('get.products', ['type' => '__type__']) }}".replace('__type__', type),
        type: "GET",
        data: {
            ageFilter: ageFilter,
            brandFilter: brandFilter,
            categoryFilter: categoryFilter,
            //_token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            // withFilterProduct.innerHTML = response;
            withFilterProduct.innerHTML = response.html;
            totalItemsElement.textContent = response.totalProducts + ' Items';

            // Update Show Item button text
            applyFiltersBtn.textContent = 'Show ' + response.totalProducts + ' Items';
        },
        error: function (error) {
            console.log(error);
        }
    });
}

// Render Filter Pills
function renderFilterPills() {
    const pillsContainer = activeFiltersSection.querySelector('.d-flex');
    pillsContainer.innerHTML = '';

    // Age Range Pills
    filterState.ageRange.forEach(ageValue => {
        const pill = createFilterPill('Age Range', ageRangeLabels[ageValue], 'ageRange[]', ageValue);
        pillsContainer.appendChild(pill);
    });

    // Brand Pills
    filterStateValue.brand.forEach((brandId, idx) => {
        const label = filterState.brand[idx]; // get text label
        const pill = createFilterPill('Brand', label, 'brand[]', brandId);
        pillsContainer.appendChild(pill);
    });

    // Category Pills
    filterStateValue.category.forEach((catId, idx) => {
        const label = filterState.category[idx];
        const pill = createFilterPill('Category', label, 'category[]', catId);
        pillsContainer.appendChild(pill);
    });

    // Add Clear All button
    if (filterState.ageRange.length || filterState.brand.length || filterState.category.length) {
        const clearAllBtn = document.createElement('a');
        clearAllBtn.className = 'clear-all-btn';
        clearAllBtn.textContent = 'Clear';
        clearAllBtn.href = 'javascript:void(0)';
        clearAllBtn.addEventListener('click', clearAllFilters);
        pillsContainer.appendChild(clearAllBtn);
    }
}

// Create Filter Pill Element
function createFilterPill(label, valueLabel, filterType, filterValue) {
    const pill = document.createElement('div');
    pill.className = 'filter-pill';

    const labelSpan = document.createElement('span');
    labelSpan.className = 'filter-label';
    labelSpan.textContent = `${label}: `;

    const valueSpan = document.createElement('span');
    valueSpan.className = 'filter-value';
    valueSpan.textContent = valueLabel;

    const removeBtn = document.createElement('a');
    removeBtn.href = 'javascript:void(0)';
    removeBtn.className = 'remove-filter';
    removeBtn.innerHTML = `
        <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.5 0.5L8.5 8.5" stroke="#4A4A4A" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M8.5 0.5L0.5 8.5" stroke="#4A4A4A" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    `;
    removeBtn.addEventListener('click', () => removeFilter(filterType, filterValue));

    pill.appendChild(labelSpan);
    pill.appendChild(valueSpan);
    pill.appendChild(removeBtn);

    return pill;
}

function removeFilter(filterType, filterValue) {
    // Remove from filterState arrays
    if(filterType === 'ageRange[]') {
        const idx = filterState.ageRange.indexOf(filterValue);
        if(idx > -1) filterState.ageRange.splice(idx,1);
    }
    if(filterType === 'brand[]') {
        const idx = filterStateValue.brand.indexOf(filterValue);
        if(idx > -1) {
            filterStateValue.brand.splice(idx,1);
            filterState.brand.splice(idx,1); // remove text label as well
        }
    }
    if(filterType === 'category[]') {
        const idx = filterStateValue.category.indexOf(filterValue);
        if(idx > -1){
            filterStateValue.category.splice(idx,1);
            filterState.category.splice(idx,1);
        }
    }

    // Uncheck the checkbox
    const checkbox = document.querySelector(`input[name="${filterType}"][value="${filterValue}"]`);
    if(checkbox) checkbox.checked = false;
    // Check if no filters remain
    const noFiltersLeft =
        filterState.ageRange.length === 0 &&
        filterState.brand.length === 0 &&
        filterState.category.length === 0;

    // CHANGED: Added condition for last filter removal
    if (noFiltersLeft) {
        // Reset total item count
        totalItemsElement.textContent = totalProducts + ' Items';
        // Reset Apply button text
        applyFiltersBtn.textContent = 'Show ' + totalProducts + ' Items';
        // Show all default sections
        showAllSections();
    } else {
        // Reapply filters if still active
        applyFilters();
    }
}

// Clear All Filters
function clearAllFilters() {
    // Reset state
    filterState.ageRange = [];
    filterState.brand = [];
    filterState.category = [];

    // Uncheck all checkboxes
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.checked = false;
    });
    
    // Reset apply button text
    applyFiltersBtn.textContent = 'Show ' + totalProducts + ' Items';

    // Show all sections
    showAllSections();

    totalItemsElement.textContent = totalProducts + ' Items';
}

// Show All Sections
function showAllSections() {
    // Show age range links
    ageRangeLinks.classList.remove('d-none');

    // Hide active filters section
    activeFiltersSection.classList.add('d-none');

    withoutFilterProducts.classList.remove('d-none');
    withFilterProduct.classList.add('d-none');

    // Show all age sections
    ageSections.forEach(section => {
        section.classList.remove('hidden');
        section.style.display = 'block';
        
        // Show all products in each section
        const products = section.querySelectorAll('.product_wrapper');
        products.forEach(product => {
            product.style.display = 'block';
        });
    });
}

// Initialize on Page Load
document.addEventListener('DOMContentLoaded', function () {
    initEventListeners();
});

// Optional: Handle browser back button
window.addEventListener('popstate', function () {
    clearAllFilters();
});
</script>
<!--filter js-->
@include('layouts.frontfooter')