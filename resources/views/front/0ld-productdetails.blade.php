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
                <img id="mainBoyImg" src="{{ $mainImage }}" alt="{{ $product->product_detail_name }}" class="img-fluid">
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
                        <h2 class="mean_head">{{ $product->product_detail_name }}</h2>
                    </div>
                    <div class="col-md-2">
                        <img id="brandLogo" src="{{ asset('public/brand_images/' . $brandList->first()->image) }}" 
                            alt="Brand Logo" class="img-fluid">
                    </div>
                </div>

                <!-- Description -->
                <p class="detail_text">{!! $product->description !!}</p>
                <a href="#" class="comman_btn2 border-0"><span>Enquire Now</span></a>

                <!-- Sizes & Brands -->
                <div class="mt-5">
                    <div class="d-flex">
                        <!-- Sizes -->
                        <div>
                            <h5 class="mb-3">Available Sizes:</h5>
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

                        <div class="mx-5" style="border-left: 1px solid #999;"></div>

                        <!-- Brands -->
                        <div>
                            <h5 class="mb-3">Available Brands:</h5>
                            <div class="available_detail_btn" role="group" id="brandTabs">
                                @foreach($brandList as $brand)
                                    <button type="button"
                                            class="btn {{ $loop->first ? 'active' : '' }}"
                                            data-id="{{ $brand->id }}">
                                        {{ $brand->name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Product Variants -->
                    <div class="row g-3 mb-5 mt-4" id="tabContent">
                        @foreach($productVariants as $variant)
                            @php
                                $image = asset('public/product_images/' . $variant['product_image']);
                                $brand = $brandList->where('id', $variant['brand_id'])->first();
                            @endphp
                            <div class="col-md-3 col-6"
                                 data-size="{{ $variant['size_id'] }}"
                                 data-brand="{{ $variant['brand_id'] }}"
                                 data-brand-img="{{ $brand ? asset('public/brand_images/' . $brand->image) : '' }}">
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
                    </div>
                </div>

                <!-- Catalog + Features -->
                <div>
                    <p class="f_16">
                        These are sample designs. To explore our full collection, please
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M15.4002 2.64751C13.8898 1.13399 11.8839 0.205805 9.74435 0.0303657C7.60484 -0.145074 5.47255 0.443785 3.73211 1.69072C1.99168 2.93766 0.757658 4.7606 0.252648 6.83071C-0.252362 8.90083 0.0048816 11.0818 0.977977 12.9804L0.0227623 17.5813C0.0128509 17.6271 0.0125702 17.6744 0.0219379 17.7203C0.0313056 17.7662 0.0501198 17.8097 0.0772043 17.8481C0.116881 17.9063 0.173517 17.9511 0.23955 17.9766C0.305582 18.002 0.377867 18.0069 0.446752 17.9905L4.99186 16.9217C6.90008 17.8627 9.08292 18.1015 11.152 17.5956C13.221 17.0897 15.042 15.872 16.291 14.1591C17.54 12.4462 18.136 10.3492 17.9729 8.24127C17.8098 6.13334 16.8982 4.15119 15.4002 2.64751Z" fill="#29A71A"/>
                            </svg>
                        </span>
                        WhatsApp us at +971 4 226 4582 to receive the catalog.
                    </p>

                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="5" height="6" viewBox="0 0 5 6" fill="none">
                            <circle cx="2.5" cy="3" r="2.5" fill="#4A4A4A" />
                        </svg>
                        <p class="fw-bold mb-0 ms-2">Key Features</p>
                    </div>
                    {!! $product->key_features !!}

                    <hr style="margin: 2rem 0;">

                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="5" height="6" viewBox="0 0 5 6" fill="none">
                            <circle cx="2.5" cy="3" r="2.5" fill="#4A4A4A" />
                        </svg>
                        <p class="fw-bold mb-0 ms-2">More Information</p>
                    </div>
                    {!! $product->more_information !!}
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.frontfooter')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainImg = document.getElementById('mainBoyImg');
    const sizeButtons = document.querySelectorAll('#sizeTabs button');
    const brandButtons = document.querySelectorAll('#brandTabs button');
    const items = document.querySelectorAll('#tabContent [data-size]');

    // Initial selected size & brand
    let selectedSize = document.querySelector('#sizeTabs .active')?.getAttribute('data-id') || null;
    let selectedBrand = null; // null = show all brands initially

    // Update visible items based on selected size and brand
    function updateContent() {
        let firstVisible = null;

        items.forEach(item => {
            const size = item.getAttribute('data-size');
            const brand = item.getAttribute('data-brand');

            // Show all items for selected size if brand is null
            if (size === selectedSize && (!selectedBrand || brand === selectedBrand)) {
                item.style.display = 'block';
                if (!firstVisible) firstVisible = item;
            } else {
                item.style.display = 'none';
            }
        });

        if (firstVisible) {
            const img = firstVisible.querySelector('.product_img');
            const boyImg = img.getAttribute('data-boy') || img.src;

            // Update main image with fade effect
            mainImg.style.opacity = 0;
            setTimeout(() => {
                mainImg.src = boyImg;
                mainImg.alt = img.alt;
                mainImg.style.opacity = 1;
            }, 200);

            // Update active size & brand buttons
            const sizeId = firstVisible.getAttribute('data-size');
            const brandId = firstVisible.getAttribute('data-brand');

            sizeButtons.forEach(b => b.classList.toggle('active', b.getAttribute('data-id') === sizeId));
            brandButtons.forEach(b => b.classList.toggle('active', b.getAttribute('data-id') === brandId));

            selectedSize = sizeId;
            selectedBrand = selectedBrand && brandButtonsAreMatching() ? selectedBrand : null;
        }
    }

    // Check if selectedBrand still exists in visible items
    function brandButtonsAreMatching() {
        return Array.from(items).some(item => 
            item.getAttribute('data-size') === selectedSize &&
            item.getAttribute('data-brand') === selectedBrand
        );
    }

    // Initial display
    updateContent();

    // Click on size button
    sizeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            selectedSize = this.getAttribute('data-id');
            selectedBrand = null; // reset brand filter
            brandButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            updateContent();
        });
    });

    // Click on brand button
    brandButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            selectedBrand = this.getAttribute('data-id');
            brandButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            updateContent();
        });
    });

    // Click on product image
    items.forEach(item => {
        const img = item.querySelector('.product_img');
        img.addEventListener('click', function() {
            const boyImg = img.getAttribute('data-boy') || img.src;

            mainImg.style.opacity = 0;
            setTimeout(() => {
                mainImg.src = boyImg;
                mainImg.alt = img.alt;
                mainImg.style.opacity = 1;
            }, 200);

            // Update buttons to match clicked variant
            const sizeId = item.getAttribute('data-size');
            const brandId = item.getAttribute('data-brand');

            sizeButtons.forEach(b => b.classList.toggle('active', b.getAttribute('data-id') === sizeId));
            brandButtons.forEach(b => b.classList.toggle('active', b.getAttribute('data-id') === brandId));

            selectedSize = sizeId;
            selectedBrand = brandId;
        });
    });
});
</script>

