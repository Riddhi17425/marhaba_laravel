@include('layouts.frontheader')

@php
    $firstVariant = $productVariants[0] ?? null;
    $mainImage = $firstVariant
        ? asset('public/product_images/' . $firstVariant['product_image'])
        : asset('public/front/img/product_detail_boy.png');
@endphp

<section class="section_pt section_gradientbg_product">
    <div class="container-fluid">
        <div class="row">
            <!-- Main Image -->
            <div class="col-md-4">
                <img id="mainBoyImg" src="{{ $mainImage }}" alt="{{ $product->product_detail_name }}" class="img-fluid mb-md-0 mb-4 scroll-image" animation="1" data-animate-on-scroll>
            </div>

            <!-- Product Info -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-10">
                        <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-start">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item">
                                    <a href="#">{{ $product->category->name ?? 'Category' }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $product->product_detail_name }}
                                </li>
                            </ol>
                        </nav>
                        <h2 class="mean_head scroll-text" data-animate-on-scroll>{{ $product->name }}</h2>
                    </div>
                    <div class="col-md-2 col-4">
                        <img id="brandLogo" src="{{ asset('public/brand_images/' . $brandList->first()->image) }}" 
                            alt="Brand Logo" class="img-fluid">
                    </div>
                </div>

                <!-- Description -->
                <p class="detail_text scroll-subtext " data-animate-on-scroll>{!! $product->description !!}</p>
                <!--<a href="" class="comman_btn2 border-0" data-bs-target="#enquiryform" data-bs-toggle="modal"><span>Enquire Now</span></a>-->
                <a href="https://api.whatsapp.com/send?phone=971569233052&text=Hello,%20I%27m%20visiting%20your%20website%20and%20would%20like%20to%20know%20more%22" class="comman_btn2 border-0"><span>Enquire Now</span></a>

                <!-- Sizes & Brands -->
                <div class="mt-md-4 mt-3">
                    <div class="d-md-flex d-block">
                        <!-- Sizes -->
                        <div class="mb-md-0 mb-4">
                            <p class="mb-2 fw-bold">Available Sizes:</p>
                            <div class="available_detail_btn" role="group" id="sizeTabs">
                                @foreach($sizeList as $size)
                                    <button type="button"
                                            class="btn {{ $loop->first ? 'active' : '' }}"
                                            data-id="{{ $size->id }}">
                                        {{ $size->name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div class="mx-5 d-md-block d-none" style="border-left: 1px solid #999;"></div>

                        <!-- Brands -->
                        <div class="mb-md-0 mb-4">
                            <p class="mb-2 fw-bold">Available Brands:</p>
                            <div class="available_detail_btn" role="group" id="brandTabs">
                                @foreach($brandList as $brand)
                                    <button type="button"
                                            class="btn {{ $loop->first ? 'active' : '' }}"
                                            data-id="{{ $brand->id }}"
                                            data-brand-img="{{ asset('public/brand_images/' . $brand->image) }}">
                                        {{ $brand->name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row gx-3 mb-2 mt-4" id="tabContent">
                        <p class="mb-2 fw-bold">Samples:</p>
                        @foreach($productVariants as $variant)
                            @php
                                $image = asset('public/product_images/' . $variant['product_image']);
                                $brand = $brandList->where('id', $variant['brand_id'])->first();
                            @endphp
                            <div class="col-md-3 col-6"
                                 data-size="{{ $variant['size_id'] }}"
                                 data-brand="{{ $variant['brand_id'] }}"
                                 data-brand-img="{{ $brand ? asset('public/brand_images/' . $brand->image) : '' }}"
                                 data-image-src="{{ $image }}">
                                <div class="product_wrapper_detail">
                                    <div class="Product_item">
                                        <a>
                                            <img src="{{ $image }}"
                                                 data-boy="{{ $image }}"
                                                 alt="{{ $product->product_detail_name }}"
                                                 class="img-fluid product_img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 text-center" id="noProductMessage" style="display: none;">
                            <p class="text-danger fw-bold">Product Not Available</p>
                        </div>
                    </div>
                </div>

                <!-- Catalog + Features -->
                <div>
                    <p class="f_16 mb-1">
                        These are sample designs. To explore our full collection,
                       
                    </p>
                    <p class="f_16">
                         please
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M15.4002 2.64751C13.8898 1.13399 11.8839 0.205805 9.74435 0.0303657C7.60484 -0.145074 5.47255 0.443785 3.73211 1.69072C1.99168 2.93766 0.757658 4.7606 0.252648 6.83071C-0.252362 8.90083 0.0048816 11.0818 0.977977 12.9804L0.0227623 17.5813C0.0128509 17.6271 0.0125702 17.6744 0.0219379 17.7203C0.0313056 17.7662 0.0501198 17.8097 0.0772043 17.8481C0.116881 17.9063 0.173517 17.9511 0.23955 17.9766C0.305582 18.002 0.377867 18.0069 0.446752 17.9905L4.99186 16.9217C6.90008 17.8627 9.08292 18.1015 11.152 17.5956C13.221 17.0897 15.042 15.872 16.291 14.1591C17.54 12.4462 18.136 10.3492 17.9729 8.24127C17.8098 6.13334 16.8982 4.15119 15.4002 2.64751ZM13.9831 13.8691C12.938 14.9031 11.5922 15.5856 10.1354 15.8205C8.67865 16.0554 7.18429 15.8309 5.86294 15.1785L5.22943 14.8675L2.44297 15.5222L2.45122 15.4879L3.02864 12.7054L2.71848 12.0981C2.04333 10.7826 1.80516 9.28888 2.03809 7.83086C2.27103 6.37284 2.96311 5.02536 4.0152 3.98146C5.33716 2.67033 7.12989 1.93377 8.99914 1.93377C10.8684 1.93377 12.6611 2.67033 13.9831 3.98146C13.9943 3.99427 14.0065 4.0063 14.0194 4.01747C15.325 5.33199 16.0538 7.10527 16.047 8.95072C16.0402 10.7962 15.2983 12.5641 13.9831 13.8691Z" fill="#29A71A" />
                                <path d="M13.7321 11.8279C13.3906 12.3615 12.8511 13.0146 12.1731 13.1766C10.9852 13.4614 9.16224 13.1864 6.89382 11.0881L6.86577 11.0636C4.8712 9.22875 4.35317 7.70165 4.47856 6.49045C4.54785 5.80301 5.12527 5.18104 5.61195 4.77513C5.68889 4.70998 5.78013 4.66359 5.87838 4.63968C5.97662 4.61577 6.07914 4.61499 6.17774 4.63742C6.27634 4.65985 6.36828 4.70485 6.44621 4.76884C6.52414 4.83282 6.5859 4.91401 6.62655 5.00591L7.3607 6.64267C7.40841 6.7488 7.42609 6.86581 7.41184 6.98115C7.3976 7.09649 7.35198 7.20581 7.27986 7.29737L6.90866 7.7753C6.82901 7.87399 6.78095 7.99406 6.77066 8.12007C6.76037 8.24608 6.78832 8.37226 6.85092 8.48238C7.05879 8.84411 7.55702 9.37605 8.10969 9.86872C8.73 10.4252 9.41796 10.9342 9.8535 11.1077C9.97004 11.155 10.0982 11.1665 10.2214 11.1408C10.3446 11.1152 10.4572 11.0535 10.5447 10.9637L10.9753 10.5332C11.0584 10.452 11.1617 10.394 11.2748 10.3652C11.3878 10.3365 11.5065 10.338 11.6187 10.3696L13.3626 10.8606C13.4587 10.8899 13.5469 10.9406 13.6203 11.0088C13.6937 11.0771 13.7504 11.1611 13.7861 11.2545C13.8218 11.3478 13.8354 11.448 13.8261 11.5474C13.8167 11.6468 13.7846 11.7427 13.7321 11.8279Z" fill="#29A71A" />
                            </svg>
                        </span>
                        WhatsApp us at <a href="tel:+97142264582">+971 4 226 4582</a> to receive the catalog.
                    </p>
                    @if(!empty($product->key_features))
                    <div class="d-flex align-items-center mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="5" height="6" viewBox="0 0 5 6" fill="none">
                            <circle cx="2.5" cy="3" r="2.5" fill="#4A4A4A" />
                        </svg>
                        <p class="fw-bold mb-0 ms-2 scroll-text" data-animate-on-scroll>Key Features</p>
                    </div>
                    {!! $product->key_features !!}
                     <hr style="margin: 2rem 0;">
                    @endif
                   
                    @if(!empty($product->more_information))
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="5" height="6" viewBox="0 0 5 6" fill="none">
                            <circle cx="2.5" cy="3" r="2.5" fill="#4A4A4A" />
                        </svg>
                        <p class="fw-bold mb-0 ms-2 scroll-text" data-animate-on-scroll>More Information</p>
                    </div>
                    {!! $product->more_information !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- copied section -->
<section class="section_pt  section_mb">
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
                                    <img src="{{ $image }}" alt="{{ $simProduct['name'] }}" class="img-fluid product_img w-100" />
                                </a>
                            </div>
                            <div class="product_item_details">
                                <a href="{{ route('productdetails', $simProduct['url']) }}">
                                    <h3 class="product_card_title">{{ $simProduct['name'] }}</h3>
                                </a>
                                @if($brand)
                                    <p class="product_card_text"><b>Brand: </b>{{ $brand->name }}</p>
                                @endif
                                <a href="#" class="comman_btn"><span>Enquire Now</span></a>
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
<!-- copied section -->

@include('layouts.enquiry')

@include('layouts.frontfooter')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainImg = document.getElementById('mainBoyImg');
    const brandLogo = document.getElementById('brandLogo');
    const sizeButtons = document.querySelectorAll('#sizeTabs button');
    const brandButtons = document.querySelectorAll('#brandTabs button');
    const items = document.querySelectorAll('#tabContent [data-size]');
    const noProductMessage = document.getElementById('noProductMessage');

    let selectedSize = document.querySelector('#sizeTabs .active')?.getAttribute('data-id') || null;
    let selectedBrand = document.querySelector('#brandTabs .active')?.getAttribute('data-id') || null;

    function updateContent() {
        let firstVisible = null;
        let hasVisibleItems = false;

        items.forEach(item => {
            const size = item.getAttribute('data-size');
            const brand = item.getAttribute('data-brand');

            if (size === selectedSize && brand === selectedBrand) {
                if (!firstVisible) {
                    // This is the first matching variant: set as main image
                    const img = item.querySelector('.product_img');
                    updateMainImage(img.getAttribute('data-boy'), img.alt);
                    firstVisible = item;
                    item.style.display = 'none'; // Hide from samples since it's main
                } else {
                    // Show all other matching variants as samples
                    item.style.display = 'block';
                }
                hasVisibleItems = true;
            } else {
                item.style.display = 'none';
            }
        });

        noProductMessage.style.display = hasVisibleItems ? 'none' : 'block';

        // Update brand logo
        const selectedBrandButton = document.querySelector(`#brandTabs button[data-id="${selectedBrand}"]`);
        const brandImg = selectedBrandButton?.getAttribute('data-brand-img') || '';
        updateBrandLogo(brandImg);
    }

    function updateMainImage(src, alt) {
        mainImg.style.opacity = 0;
        setTimeout(() => {
            mainImg.src = src;
            mainImg.alt = alt;
            mainImg.style.opacity = 1;
        }, 200);
    }

    function updateBrandLogo(src) {
        if (!brandLogo) return;
        brandLogo.style.opacity = 0;
        setTimeout(() => {
            brandLogo.src = src;
            brandLogo.style.opacity = 1;
        }, 200);
    }

    sizeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            selectedSize = this.getAttribute('data-id');
            sizeButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            updateContent();
        });
    });

    brandButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            selectedBrand = this.getAttribute('data-id');
            brandButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            updateContent();
        });
    });

    updateContent();
});

</script>