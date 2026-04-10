@include('layouts.frontheader')
<link rel="stylesheet" href="{{ asset('public/front/css/hero_style.css') }}">
<link rel="stylesheet" href="{{ asset('public/front/css/hero_responsive.css') }}">
@php
$segments = request()->segments();
$categoryId = $segments[1] ?? null; // index may vary
$subcatVal = $segments[2] ?? '';
$subcatVal = preg_replace('/[\#].*$/', '', $subcatVal);
@endphp
<style>
.btn-loading {
    opacity: 0.5;
}
</style>
<section class="banner_head_section section_gradientbg">
    <div class="filter_banner">
        Explore product samples. MOQ — Only 12 pcs per design.
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
                            <li class="breadcrumb-item active" aria-current="page">{{$type}}s</li>
                        </ol>
                    </nav>
                    <h1 class="lora_24">{{$type}}s Wholesale Collection</h1>
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
            <div class="age_range_box" style="background-color: rgb(243, 242, 231); cursor:pointer;" data-scroll-to="baby">
                <div class="age-card">
                    <!-- <h3 class="lora_24" stlye="background: linear-gradient(90deg, rgba(243, 242, 231, 0) 0%, #F3F2E7 50%, rgba(243, 242, 231, 0) 100%);"> Baby ({{$data['baby'] ?? 0}})</h3> -->
                    <p class="raleway_14 mb-0"><b class="me-1">Baby {{$type}}
                        {{-- ({{$data['baby'] ?? 0}})  --}}
                        :</b> 0 M<span class="d-none d-lg-inline">onths</span> to
                        3 Y<span class="d-none d-lg-inline">ears</span> </p>
                </div>
            </div>
            <div class="age_range_box" style="background-color: rgb(239, 230, 240); cursor:pointer;" data-scroll-to="toddler">
                <div class="age-card">
                    <!-- <h3 class="lora_24">Toddler & Little Kids ({{$data['kids'] ?? 0}})</h3> -->
                    <p class="raleway_14 mb-0"> <b class="me-1">Toddler & Little Kids 
                        {{-- ({{$data['kids'] ?? 0}})  --}}
                        :</b> 2 Y <span class="d-none d-lg-inline">ears</span> to 6 Y <span class="d-none d-lg-inline">ears</span></p>
                </div>
            </div>
            <div class="age_range_box" style="background-color: rgb(230, 239, 242); cursor:pointer;" data-scroll-to="kids">
                <div class="age-card">
                    <!-- <h3 class="lora_24">Kids & Youth ({{$data['junior'] ?? 0}})</h3> -->
                    <p class="raleway_14 mb-0"> <b class="me-1">Kids & Youth 
                        {{-- ({{$data['junior'] ?? 0}})  --}}
                        :</b>
                        6 Y <span class="d-none d-lg-inline">ears</span> to 14 Y <span class="d-none d-lg-inline">ears</span></p>
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
    </div>
    <div class="ym-container mob_ym_container">
        <div id="withoutFilterProducts">
            <!-- Baby Section -->
            @if(isset($groupedProducts['baby']['products']) && is_countable($groupedProducts['baby']['products']) &&
            count($groupedProducts['baby']['products']) > 0)
            <section id="baby" class="age_section" data-age="baby">
                <h2 class="title_48lora mb-0"
                    style="background: linear-gradient(90deg, rgba(243, 242, 231, 0) 0%, #F3F2E7 50%, rgba(243, 242, 231, 0) 100%);">
                    Baby {{$type}}</h2>
                <div class="desk_grid">
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
                                <div class="ym_card">
                                    <div class="Product_item">
                                        <div class="ym_card_img">
                                            @if($filteredImages->count() > 0)
                                            <!-- ✅ COVER IMAGE (FIRST IMAGE ONLY) -->
                                            <img src="{{ asset('public/product_images/' . $filteredImages[1]->product_image) }}"
                                                alt="{{ $vv->name }}" class="ym_cover_slider" loading="lazy">
                                            <!-- ✅ SLICK SLIDER -->
                                            <div class="ym_slider">
                                                @foreach($filteredImages as $k => $v)
                                                @if($k == 1)
                                                @continue
                                                @endif
                                                @if($k == 4)
                                                @break
                                                @endif
                                                <div>
                                                    <a href="{{ url('products-details/' . $vv['url'].'/'. $sizeId . '/' . $vv['id']) }}"
                                                        target="_blank">
                                                        <img loading="lazy"
                                                            src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                            alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                            @else
                                            <!-- ✅ NO IMAGE CASE -->
                                            <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                                alt="not found" class="ym_cover_slider">

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
                                        <a href="{{ url('products-details/' . $vv['url'].'/'. $sizeId .'/' . $vv['id']) }}"
                                            target="_blank" class="prod_list_title">
                                            <h4 style="font-weight:500;">@if(strtolower($vv->brand->name) !=
                                                'marhaba'){{$vv->brand->name ?? ''}}@endif {{$vv->name ?? ''}}</h4>
                                            <p class="mb-0">{{$vk ?? ''}} <span class="mx-1">|</span>
                                                {{$vv->category->name ?? ''}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="mobile_grid">
                    <div class="products_filter_grid">
                        @foreach($groupedProducts['baby']['products'] as $key => $val)
                        @foreach($val as $vk => $vv)
                        @php
                        $productImages = json_decode($vv->product_brand_size);
                        $size = \App\Models\Product::getSizeId($vk);
                        $sizeId = $size->id;
                        $filteredImages = collect($productImages)->where('size_id', (string)$sizeId)->values();
                        if($filteredImages->count() > 1){
                        $humanImage = $filteredImages->pull(0); // remove human image
                        $filteredImages->splice(1, 0, [$humanImage]); // insert it at 2nd position
                        }
                        @endphp
                        <div>
                            <div class="product_wrapper">
                                <div class="ym_card">
                                    <div class="Product_item">
                                        <div class="ym_card_img">
                                            @if($filteredImages->count() > 0)
                                            <!-- ✅ COVER IMAGE (FIRST IMAGE ONLY) -->
                                            <img src="{{ asset('public/product_images/' . $filteredImages[0]->product_image) }}"
                                                alt="{{ $vv->name }}" class="ym_cover_slider" loading="lazy">
                                            <!-- ✅ SLICK SLIDER -->
                                            <div class="ym_slider">
                                                @foreach($filteredImages as $k => $v)
                                                @if($k == 4)
                                                @break
                                                @endif
                                                <div>
                                                    <a href="{{ url('products-details/' . $vv['url'].'/'. $sizeId . '/' . $vv['id']) }}"
                                                        target="_blank">
                                                        <img loading="lazy"
                                                            src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                            alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                            @else
                                            <!-- ✅ NO IMAGE CASE -->
                                            <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                                alt="not found" class="ym_cover_slider">

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
                                        <a href="{{ url('products-details/' . $vv['url'].'/'. $sizeId .'/' . $vv['id']) }}"
                                            target="_blank" class="prod_list_title">
                                            <h4 style="font-weight:500;">{{$vv->name ?? ''}}</h4>
                                            <p class="mb-0">{{$vk ?? ''}} <span class="mx-1">|</span>
                                                {{$vv->category->name ?? ''}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </section>
            @endif

            <!-- Toddler & Little Kids Section -->
            @if(isset($groupedProducts['kids']['products']) && is_countable($groupedProducts['kids']['products']) &&
            count($groupedProducts['kids']['products']) > 0)
            <section id="toddler" class="age_section" data-age="toddler">
                <h2 class="title_48lora mb-0"
                    style="background: linear-gradient(90deg, rgba(239, 230, 240, 0) 0%, #EFE6F0 50%, rgba(239, 230, 240, 0) 100%);">
                    Toddler & Little Kids</h2>
                <div class="desk_grid">
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
                                <div class="ym_card">
                                    <div class="Product_item">
                                        <div class="ym_card_img">
                                            @if($filteredImages->count() > 0)
                                            <!-- ✅ COVER IMAGE (FIRST IMAGE ONLY) -->
                                            <img src="{{ asset('public/product_images/' . $filteredImages[1]->product_image) }}"
                                                alt="{{ $vv->name }}" class="ym_cover_slider">
                                            <!-- ✅ SLICK SLIDER -->
                                            <div class="ym_slider">
                                                @foreach($filteredImages as $k => $v)
                                                @if($k == 1)
                                                @continue
                                                @endif
                                                @if($k == 4)
                                                @break
                                                @endif
                                                <div>
                                                    <a href="{{ url('products-details/' . $vv['url'].'/'. $sizeId . '/' . $vv['id']) }}"
                                                        target="_blank">
                                                        <img loading="lazy"
                                                            src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                            alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                            @else
                                            <!-- ✅ NO IMAGE CASE -->
                                            <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                                alt="not found" class="ym_cover_slider">

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
                                        <a href="{{ url('products-details/' . $vv['url'].'/'. $sizeId . '/' . $vv['id']) }}"
                                            target="_blank" class="prod_list_title">
                                            <h4 style="font-weight:500;">{{$vv->name ?? ''}}</h4>
                                            <p class="mb-0">{{$vk ?? ''}} <span class="mx-1">|</span>
                                                {{$vv->category->name ?? ''}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="mobile_grid">
                    <div class="products_filter_grid">
                        @foreach($groupedProducts['kids']['products'] as $key => $val)
                        @foreach($val as $vk => $vv)
                        @php
                        $productImages = json_decode($vv->product_brand_size);
                        $size = \App\Models\Product::getSizeId($vk);
                        $sizeId = $size->id;
                        $filteredImages = collect($productImages)->where('size_id', (string)$sizeId)->values();
                        if($filteredImages->count() > 1){
                        $humanImage = $filteredImages->pull(0); // remove human image
                        $filteredImages->splice(1, 0, [$humanImage]); // insert it at 2nd position

                        }
                        @endphp
                        <div>
                            <div class="product_wrapper">
                                <div class="ym_card">
                                    <div class="Product_item">
                                        <div class="ym_card_img">
                                            @if($filteredImages->count() > 0)
                                            <!-- ✅ COVER IMAGE (FIRST IMAGE ONLY) -->
                                            <img src="{{ asset('public/product_images/' . $filteredImages[0]->product_image) }}"
                                                alt="{{ $vv->name }}" class="ym_cover_slider">
                                            <!-- ✅ SLICK SLIDER -->
                                            <div class="ym_slider">
                                                @foreach($filteredImages as $k => $v)
                                                @if($k == 4)
                                                @break
                                                @endif
                                                <div>
                                                    <a href="{{ url('products-details/' . $vv['url'].'/'. $sizeId . '/' . $vv['id']) }}"
                                                        target="_blank">
                                                        <img loading="lazy"
                                                            src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                            alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                            @else
                                            <!-- ✅ NO IMAGE CASE -->
                                            <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                                alt="not found" class="ym_cover_slider">

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
                                        <a href="{{ url('products-details/' . $vv['url'].'/'. $sizeId . '/' . $vv['id']) }}"
                                            target="_blank" class="prod_list_title">
                                            <h4 style="font-weight:500;">{{$vv->name ?? ''}}</h4>
                                            <p class="mb-0">{{$vk ?? ''}} <span class="mx-1">|</span>
                                                {{$vv->category->name ?? ''}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </section>
            @endif

            <!-- Kids & Youth Section -->
            @if(isset($groupedProducts['junior']['products']) && is_countable($groupedProducts['junior']['products']) &&
            count($groupedProducts['junior']['products']) > 0)
            <section id="kids" class="age_section" data-age="kids">
                <h2 class="title_48lora mb-0"
                    style="background: linear-gradient(90deg, rgba(230, 239, 242, 0) 0%, rgb(230, 239, 242) 50%, rgba(230, 239, 242, 0) 100%);">
                    Kids & Youth</h2>
                <div class="desk_grid">
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
                                <div class="ym_card">
                                    <div class="Product_item">
                                        <div class="ym_card_img">
                                            @if($filteredImages->count() > 0)
                                            <!-- ✅ COVER IMAGE (FIRST IMAGE ONLY) -->
                                            <img src="{{ asset('public/product_images/' . $filteredImages[1]->product_image) }}"
                                                alt="{{ $vv->name }}" class="ym_cover_slider">
                                            <!-- ✅ SLICK SLIDER -->
                                            <div class="ym_slider">
                                                @foreach($filteredImages as $k => $v)
                                                @if($k == 1)
                                                @continue
                                                @endif
                                                @if($k == 4)
                                                @break
                                                @endif
                                                <div>
                                                    <a href="{{ url('products-details/' . $vv['url'].'/'.$sizeId .'/'. $vv['id']) }}"
                                                        target="_blank">
                                                        <img loading="lazy"
                                                            src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                            alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                            @else
                                            <!-- ✅ NO IMAGE CASE -->
                                            <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                                alt="not found" class="ym_cover_slider">
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
                                        <a href="{{ url('products-details/' . $vv['url'].'/'.$sizeId .'/'. $vv['id']) }}"
                                            target="_blank" class="prod_list_title">
                                            <h4 style="font-weight:500;">{{$vv->name ?? ''}}</h4>
                                            <p class="mb-0">{{$vk ?? ''}} <span class="mx-1">|</span>
                                                {{$vv->category->name ?? ''}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <!-- mobile grid -->
                <div class="mobile_grid">
                    <div class="products_filter_grid">
                        @foreach($groupedProducts['junior']['products'] as $key => $val)
                        @foreach($val as $vk => $vv)
                        @php
                        $productImages = json_decode($vv->product_brand_size);
                        $size = \App\Models\Product::getSizeId($vk);
                        $sizeId = $size->id;
                        $filteredImages = collect($productImages)->where('size_id', (string)$sizeId)->values();
                        if($filteredImages->count() > 1){
                        $humanImage = $filteredImages->pull(0); // remove human image
                        $filteredImages->splice(1, 0, [$humanImage]); // insert it at 2nd position
                        }
                        @endphp
                        <div>
                            <div class="product_wrapper">
                                <div class="ym_card">
                                    <div class="Product_item">
                                        <div class="ym_card_img">
                                            @if($filteredImages->count() > 0)
                                            <!-- ✅ COVER IMAGE (FIRST IMAGE ONLY) -->
                                            <img src="{{ asset('public/product_images/' . $filteredImages[0]->product_image) }}"
                                                alt="{{ $vv->name }}" class="ym_cover_slider">
                                            <!-- ✅ SLICK SLIDER -->
                                            <div class="ym_slider">
                                                @foreach($filteredImages as $k => $v)
                                                @if($k == 4)
                                                @break
                                                @endif
                                                <div>
                                                    <a href="{{ url('products-details/' . $vv['url'].'/'.$sizeId .'/'. $vv['id']) }}"
                                                        target="_blank">
                                                        <img loading="lazy"
                                                            src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                            alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                            @else
                                            <!-- ✅ NO IMAGE CASE -->
                                            <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                                alt="not found" class="ym_cover_slider">
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
                                        <a href="{{ url('products-details/' . $vv['url'].'/'.$sizeId .'/'. $vv['id']) }}"
                                            target="_blank" class="prod_list_title">
                                            <h4 style="font-weight:500;">{{$vv->name ?? ''}}</h4>
                                            <p class="mb-0">{{$vk ?? ''}} <span class="mx-1">|</span>
                                                {{$vv->category->name ?? ''}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
        </div>
    </div>
</div>

<style>
    .offcanvas-backdrop
    {
       background:url(../public/front/img/filter_blur_img.png) !important;
       background-size:cover !important;
    }
</style>

<!-- Filter Offcanvas -->
<div class="boys_girls_filter offcanvas offcanvas-end filter_offcanvas" tabindex="-1" id="filterOffcanvas"
    aria-labelledby="filterOffcanvasLabel">
    <div class="offcanvas-header ">
        <h5 class="offcanvas-title lora_36" id="filterOffcanvasLabel" style="font-size: 20px;">Filters</h5>
         <div class="d-flex align-items-center gap-3">
        <p type="button" class="mb-0 text-decoration-underline d-none" id="clearFilters">Clear All</p>
        <button type="button" class="sidebar_close btn d-flex align-items-center p-0 gap-2 border-0" data-bs-dismiss="offcanvas" aria-label="Close">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
        </button>
</div>
    </div>
    <div class="offcanvas-body filter">
        <div class="menu_body">
            <div class="accordion" id="accordionExample">
                <!--age-->
                @if(isset($ageSection) && is_countable($ageSection) && count($ageSection) > 0)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAge">
                        <button class="accordion-button ps-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseAge" aria-expanded="true" aria-controls="collapseAge">
                            <svg id="ageRangeDot" class="svg_filt_dot" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 16 16"
                                fill="none" aria-hidden="true">
                                <circle cx="8" cy="8" r="4" fill="#452667"></circle>
                            </svg><span> Age Range</span>
                        </button>
                    </h2>
                    <div id="collapseAge" class="accordion-collapse collapse show" aria-labelledby="headingAge"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body ps-0">
                            @foreach($ageSection as $key => $val)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="{{ $key }}"
                                    id="filterAge_{{ $key }}" name="ageRange[]" data-total="{{ $data[$key] }}"
                                    @if(isset($subcatVal) && strtolower($subcatVal)==strtolower($key)) {{ 'checked' }}
                                    @else {{ '' }} @endif>
                                <label class="form-check-label" for="filterAge_{{ $key }}">{{$val['label'] ?? ''}}
                                    ({{ $data[$key] }})</label>
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
                        <button class="accordion-button collapsed ps-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
                           
                             <svg id="brandDot" class="svg_filt_dot" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 16 16"
                                fill="none" aria-hidden="true">
                                <circle cx="8" cy="8" r="4" fill="#452667"></circle>
                            </svg><span> Brand</span>
                        </button>
                    </h2>
                    <div id="collapseBrand" class="accordion-collapse collapse" aria-labelledby="headingBrand"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body ps-0">
                            @foreach($brands as $key => $val)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="{{ $val->id }}"
                                    id="filterBrand_{{ $val->id }}" name="brand[]"
                                    data-total="{{ $val->total_brand_product }}" data-text="{{ $val->name }}">
                                <label class="form-check-label" for="filterBrand_{{ $val->id }}">{{ $val->name ?? '' }}
                                    ({{ $val->total_brand_product }})</label>
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
                        <button class="accordion-button collapsed ps-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                           
                             <svg id="categoryDot" class="svg_filt_dot" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 16 16"
                                fill="none" aria-hidden="true">
                                <circle cx="8" cy="8" r="4" fill="#452667"></circle>
                            </svg><span> Category</span>
                        </button>
                    </h2>
                    <div id="collapseCategory" class="accordion-collapse collapse" aria-labelledby="headingCategory"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body ps-0">
                            @foreach($categories as $key => $val)
                            <div class="form-check mb-2">
                                <input class="form-check-input catFilter" type="checkbox" value="{{ $val->id }}"
                                    id="filterCategory_{{ $val->id }}" @if(isset($categoryId) &&
                                    $categoryId==$val->id){{ 'checked' }} @else {{ '' }} @endif name="category[]"
                                data-total="{{ $val->total_category_product }}" data-text="{{ $val->name }}">
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
                <a type="button" class="apply_btn" id="applyFilters" data-bs-dismiss="offcanvas">Show
                    {{ $totalProducts }} Items</a>
            </div>
        </div>
    </div>
</div>

<script>
function updateAccordionActiveState() {
    document.querySelectorAll(".accordion-item").forEach(item => {
        const checked = item.querySelector("input[type='checkbox']:checked");

        if (checked) {
            item.classList.add("active");
        } else {
            item.classList.remove("active");
        }
    });
}
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const accordions = document.querySelectorAll("#accordionExample .accordion-collapse");

    accordions.forEach((item) => {
        item.addEventListener("show.bs.collapse", function() {
            accordions.forEach((other) => {
                if (other !== item) {
                    let bsCollapse = bootstrap.Collapse.getInstance(other);
                    if (!bsCollapse) {
                        bsCollapse = new bootstrap.Collapse(other, {
                            toggle: false
                        });
                    }
                    bsCollapse.hide();
                }
            });
        });
    });
});
</script>

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
const clearFiltersBtn = document.getElementById('clearFilters'); // Clear All button (hidden by default, shown when any filter is active)
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
    document.querySelectorAll('.age_range_box[data-scroll-to]').forEach(box => {
        box.addEventListener('click', function() {
            const targetSection = this.getAttribute('data-scroll-to');
            const section = document.getElementById(targetSection);

            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
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
        checkbox.addEventListener('change', function() {
            updateApplyButtonText();
            applyFilters(); // ✅ ADD THIS LINE
              updateAccordionActiveState();
              updateFilterDots();
        });
    });
}

function updateFilterDots() {
    const ageRangeDot = document.getElementById('ageRangeDot');
    const brandDot = document.getElementById('brandDot');
    const categoryDot = document.getElementById('categoryDot');

    const hasAgeRange = document.querySelectorAll('input[name="ageRange[]"]:checked').length > 0;
    const hasBrand = document.querySelectorAll('input[name="brand[]"]:checked').length > 0;
    const hasCategory = document.querySelectorAll('input[name="category[]"]:checked').length > 0;

    if (ageRangeDot) ageRangeDot.classList.toggle('d-none', !hasAgeRange);
    if (brandDot) brandDot.classList.toggle('d-none', !hasBrand);
    if (categoryDot) categoryDot.classList.toggle('d-none', !hasCategory);

    // Show/hide Clear All button based on whether any filter is active
    const hasAnyFilter = hasAgeRange || hasBrand || hasCategory;
    if (clearFiltersBtn) clearFiltersBtn.classList.toggle('d-none', !hasAnyFilter);
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
        applyFiltersBtn.classList.remove('btn-loading');
    } else {
        applyFiltersBtn.textContent = `Loading...`;
        applyFiltersBtn.classList.add('btn-loading');
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

        loadFilterOptions();
        loadFilterProducts();
    } else {
        // No filters active - show all sections
        showAllSections();
    }
}

function loadFilterProducts() {
    var ageFilter = filterState.ageRange;
    var brandFilter = filterStateValue.brand;
    var categoryFilter = filterStateValue.category;
    var type = @json($type).toLowerCase();

    // ← Set loading state BEFORE ajax starts
    applyFiltersBtn.textContent = 'Loading...';
    applyFiltersBtn.classList.add('btn-loading');
    applyFiltersBtn.disabled = true;

    $.ajax({
        url: "{{ route('get.products', ['type' => '__type__']) }}".replace('__type__', type),
        type: "GET",
        data: {
            ageFilter: ageFilter,
            brandFilter: brandFilter,
            categoryFilter: categoryFilter,
        },
        success: function(response) {
            withFilterProduct.innerHTML = response.html;
            totalItemsElement.textContent = response.totalProducts + ' Items';

            // ← Remove loading state AFTER ajax completes
            applyFiltersBtn.textContent = 'Show ' + response.totalProducts + ' Items';
            applyFiltersBtn.classList.remove('btn-loading');
            applyFiltersBtn.disabled = false;
        },
        error: function(error) {
            console.log(error);

            // ← Also remove on error so button doesn't stay stuck
            applyFiltersBtn.textContent = `Show ${totalProducts} Items`;
            applyFiltersBtn.classList.remove('btn-loading');
            applyFiltersBtn.disabled = false;
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
    if (filterType === 'ageRange[]') {
        const idx = filterState.ageRange.indexOf(filterValue);
        if (idx > -1) filterState.ageRange.splice(idx, 1);
    }
    if (filterType === 'brand[]') {
        const idx = filterStateValue.brand.indexOf(filterValue);
        if (idx > -1) {
            filterStateValue.brand.splice(idx, 1);
            filterState.brand.splice(idx, 1); // remove text label as well
        }
    }
    if (filterType === 'category[]') {
        const idx = filterStateValue.category.indexOf(filterValue);
        if (idx > -1) {
            filterStateValue.category.splice(idx, 1);
            filterState.category.splice(idx, 1);
        }
    }

    // Uncheck the checkbox
    const checkbox = document.querySelector(`input[name="${filterType}"][value="${filterValue}"]`);
    if (checkbox) checkbox.checked = false;
    updateAccordionActiveState();
    updateFilterDots();
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
        // ADD DOT REMOVE CODE
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


    // ✅ ADD THIS
    updateAccordionActiveState();
    updateFilterDots();
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

    resetFilterOptions();
}

// Initialize on Page Load
document.addEventListener('DOMContentLoaded', function() {
    initEventListeners();
    updateFilterDots();

    // Auto-apply age filter when arriving from a menu link (?preFilter=kids etc.)
    const urlParams = new URLSearchParams(window.location.search);
    const preFilter = urlParams.get('preFilter');
    if (preFilter) {
        const checkbox = document.getElementById('filterAge_' + preFilter);
        if (checkbox) {
            checkbox.checked = true;
            updateAccordionActiveState();
            updateFilterDots();
            applyFilters();
        }
    }
});

// Optional: Handle browser back button
window.addEventListener('popstate', function() {
    clearAllFilters();
});
</script>

<script>
// ── Dependent Filter Options ────────────────────────────────────────────────
var filterOptionsUrl = "{{ route('get.filter.options', ['type' => '__type__']) }}"
    .replace('__type__', @json($type).toLowerCase());

// Store original counts on page load so we can restore them when filters clear
const originalBrandData     = {};
const originalCategoryData  = {};
const originalAgeCounts     = {};

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('input[name="brand[]"]').forEach(cb => {
        originalBrandData[cb.value] = {
            name:  cb.dataset.text || '',
            count: parseInt(cb.getAttribute('data-total')) || 0
        };
    });
    document.querySelectorAll('input[name="category[]"]').forEach(cb => {
        originalCategoryData[cb.value] = {
            name:  cb.dataset.text || '',
            count: parseInt(cb.getAttribute('data-total')) || 0
        };
    });
    document.querySelectorAll('input[name="ageRange[]"]').forEach(cb => {
        originalAgeCounts[cb.value] = parseInt(cb.getAttribute('data-total')) || 0;
    });
});

// Fetch updated filter options from server based on current selections
function loadFilterOptions() {
    $.ajax({
        url: filterOptionsUrl,
        type: 'GET',
        data: {
            ageFilter:      filterState.ageRange,
            brandFilter:    filterStateValue.brand,
            categoryFilter: filterStateValue.category,
        },
        success: function (response) {
            updateBrandOptions(response.brands);
            updateCategoryOptions(response.categories);
            updateAgeCounts(response.ageCounts);
        }
    });
}

// Restore filter sidebar to original page-load state (called when all filters cleared)
function resetFilterOptions() {
    document.querySelectorAll('input[name="brand[]"]').forEach(cb => {
        const data = originalBrandData[cb.value];
        if (!data) return;
        cb.closest('.form-check').querySelector('.form-check-label').textContent =
            data.name + ' (' + data.count + ')';
        cb.disabled = false;
        cb.closest('.form-check').style.opacity = '1';
    });
    document.querySelectorAll('input[name="category[]"]').forEach(cb => {
        const data = originalCategoryData[cb.value];
        if (!data) return;
        cb.closest('.form-check').querySelector('.form-check-label').textContent =
            data.name + ' (' + data.count + ')';
        cb.disabled = false;
        cb.closest('.form-check').style.opacity = '1';
    });
    document.querySelectorAll('input[name="ageRange[]"]').forEach(cb => {
        const key   = cb.value;
        const count = originalAgeCounts[key] ?? 0;
        const label = ageRangeLabelArr[key] ? ageRangeLabelArr[key].label : '';
        cb.closest('.form-check').querySelector('.form-check-label').textContent =
            label + ' (' + count + ')';
        cb.disabled = false;
        cb.closest('.form-check').style.opacity = '1';
    });
}

// Update brand checkboxes — show count based on current age + category selection
function updateBrandOptions(brands) {
    document.querySelectorAll('input[name="brand[]"]').forEach(cb => {
        const brand = brands.find(b => String(b.id) === String(cb.value));
        const label = cb.closest('.form-check').querySelector('.form-check-label');
        if (brand) {
            label.textContent = brand.name + ' (' + brand.count + ')';
            cb.disabled = false;
            cb.closest('.form-check').style.opacity = '1';
        } else {
            label.textContent = (cb.dataset.text || '') + ' (0)';
            if (!cb.checked) {
                cb.disabled = true;
                cb.closest('.form-check').style.opacity = '0.4';
            }
        }
    });
}

// Update category checkboxes — show count based on current age + brand selection
function updateCategoryOptions(categories) {
    document.querySelectorAll('input[name="category[]"]').forEach(cb => {
        const cat = categories.find(c => String(c.id) === String(cb.value));
        const label = cb.closest('.form-check').querySelector('.form-check-label');
        if (cat) {
            label.textContent = cat.name + ' (' + cat.count + ')';
            cb.disabled = false;
            cb.closest('.form-check').style.opacity = '1';
        } else {
            label.textContent = (cb.dataset.text || '') + ' (0)';
            if (!cb.checked) {
                cb.disabled = true;
                cb.closest('.form-check').style.opacity = '0.4';
            }
        }
    });
}

// Update age range counts — show count based on current brand + category selection
function updateAgeCounts(ageCounts) {
    document.querySelectorAll('input[name="ageRange[]"]').forEach(cb => {
        const key = cb.value;
        if (!ageCounts.hasOwnProperty(key)) return;
        const count = ageCounts[key];
        const ageLabel = ageRangeLabelArr[key] ? ageRangeLabelArr[key].label : '';
        cb.closest('.form-check').querySelector('.form-check-label').textContent =
            ageLabel + ' (' + count + ')';
        if (count === 0 && !cb.checked) {
            cb.disabled = true;
            cb.closest('.form-check').style.opacity = '0.4';
        } else {
            cb.disabled = false;
            cb.closest('.form-check').style.opacity = '1';
        }
    });
}
</script>

<!--filter js-->
@include('layouts.frontfooter')