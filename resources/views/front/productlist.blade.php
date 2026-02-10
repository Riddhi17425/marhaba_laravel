@include('layouts.frontheader')

<section class="banner_head_section section_gradientbg position-relative overflow-hidden">
    <div class="product_banner_breadcrumb">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-3 text-center left_breadcrumb">
                <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                    </ol>
                </nav>
                <h2 class="mean_head text-white mb-4 mb-md-2">{{ $category->name }}</h2>
            </div>
            <div class="col-md-4 text-center text-md-start right_breadcrumb">
                <p class="text-white d-none d-md-block">{!! $category->description !!}</p>
                <a href="https://api.whatsapp.com/send?phone=97142264582&text=Hello,%20I%27m%20visiting%20your%20website%20and%20would%20like%20to%20know%20more%22" class="comman_btn3"><span>Enquire Now</span></a>
            </div>
        </div>
    </div>
 
    <picture>
        <source 
            srcset="{{ $category->image ? asset('public/menu_category_images/' . $category->menu_image) : asset('public/front/img/product_banner_mobile.jpg') }}" 
            type="image/jpg" alt="{{ $category->name ?? 'Mobile Image' }}" 
            media="(max-width: 767px)">
            
        <img 
            src="{{ $category->image ? asset('public/category_images/' . $category->image) : asset('public/front/img/product_banner.png') }}" 
            alt="{{ $category->name ?? 'Desktop Image' }}" 
            class="img-fluid" 
            loading="lazy">
    </picture>
</section>

<section class="section_pt section_mb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-3 col-8">
                <a data-bs-toggle="offcanvas" data-bs-target="#SortbyMenu" aria-controls="SortbyMenu" class="Sortby-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14" fill="none">
                        <path d="M0.865052 0C0.38804 0 0 0.375782 0 0.837616C0 1.29945 0.38809 1.67523 0.865052 1.67523H19.1349C19.612 1.67523 20 1.29945 20 0.837616C20 0.375782 19.6119 0 19.1349 0H0.865052ZM0.865052 6.16243C0.38804 6.16243 0 6.53822 0 7.00005C0 7.46188 0.38809 7.83762 0.865052 7.83762H11.7918C12.2688 7.83762 12.6569 7.46188 12.6569 7.00005C12.6569 6.53822 12.2688 6.16243 11.7918 6.16243H0.865052ZM0.865052 12.3248C0.38804 12.3248 0 12.7006 0 13.1624C0 13.6242 0.38809 14 0.865052 14H8.81811C9.29512 14 9.68316 13.6242 9.68316 13.1624C9.68316 12.7006 9.29507 12.3248 8.81811 12.3248H0.865052Z" fill="#4A4A4A" />
                    </svg>
                    <span>Sort by: </span>
                    <span id="selectedSortOption">Recommended</span>
                </a>
            </div>
            <div class="col-md-3 text-end col-4">
                <a data-bs-toggle="offcanvas" data-bs-target="#FiltersMenu" aria-controls="FiltersMenu" class="filter-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M0.714286 3.33333H10.8157C11.135 4.48 12.2443 5.33333 13.5714 5.33333C14.8986 5.33333 16.0079 4.48 16.3271 3.33333H19.2857C19.68 3.33333 20 3.03467 20 2.66667C20 2.29867 19.68 2 19.2857 2H16.3271C16.0079 0.853333 14.8986 0 13.5714 0C12.2443 0 11.135 0.853333 10.8157 2H0.714286C0.32 2 0 2.29867 0 2.66667C0 3.03467 0.32 3.33333 0.714286 3.33333ZM13.5714 1.33333C14.3593 1.33333 15 1.93133 15 2.66667C15 3.402 14.3593 4 13.5714 4C12.7836 4 12.1429 3.402 12.1429 2.66667C12.1429 1.93133 12.7836 1.33333 13.5714 1.33333ZM19.2857 16.6667H16.3271C16.0079 15.52 14.8986 14.6667 13.5714 14.6667C12.2443 14.6667 11.135 15.52 10.8157 16.6667H0.714286C0.32 16.6667 0 16.9653 0 17.3333C0 17.7013 0.32 18 0.714286 18H10.8157C11.135 19.1467 12.2443 20 13.5714 20C14.8986 20 16.0079 19.1467 16.3271 18H19.2857C19.68 18 20 17.7013 20 17.3333C20 16.9653 19.68 16.6667 19.2857 16.6667ZM13.5714 18.6667C12.7836 18.6667 12.1429 18.0687 12.1429 17.3333C12.1429 16.598 12.7836 16 13.5714 16C14.3593 16 15 16.598 15 17.3333C15 18.0687 14.3593 18.6667 13.5714 18.6667ZM19.2857 9.33333H8.47C8.15071 8.18667 7.04143 7.33333 5.71429 7.33333C4.38714 7.33333 3.27786 8.18667 2.95857 9.33333H0.714286C0.32 9.33333 0 9.632 0 10C0 10.368 0.32 10.6667 0.714286 10.6667H2.95857C3.27786 11.8133 4.38714 12.6667 5.71429 12.6667C7.04143 12.6667 8.15071 11.8133 8.47 10.6667H19.2857C19.68 10.6667 20 10.368 20 10C20 9.632 19.68 9.33333 19.2857 9.33333ZM5.71429 11.3333C4.92643 11.3333 4.28571 10.7353 4.28571 10C4.28571 9.26467 4.92643 8.66667 5.71429 8.66667C6.50214 8.66667 7.14286 9.26467 7.14286 10C7.14286 10.7353 6.50214 11.3333 5.71429 11.3333Z" fill="#4A4A4A" />
                    </svg>
                    <span>Filters</span>
                    <span class="filter-count"></span>
                </a>
            </div>
        </div>

        <!-- Selected filters -->
        <div id="selectedFilters" class="selected-filters mt-2"></div>

        <!-- Product List -->
        <div class="row mt-4" id="productList">
            @foreach($products as $product)
                <div class="col-md-3 original-product" data-product-name="{{ $product['name'] }}">
                    <div class="product_wrapper">
                        <div class="Product_item">
                            <a href="{{ url('products-details/' . $product['url']) }}">
                                <img src="{{ asset('public/product_images/' . ($product['images'][0] ?? 'default.png')) }}" 
                                     alt="{{ $product['name'] }}" class="img-fluid product_img w-100" 
                                     onerror="this.src='{{ asset('public/front/img/default-product.jpg') }}'"/>
                            </a>
                        </div>
                        <div class="product_item_details">
                            <a href="{{ url('products-details/' . $product['url']) }}">
                                <h3 class="product_card_title">{{ $product['name'] }}</h3>
                            </a>
                            <p class="product_card_text">
                                <b>Brand: </b>
                                @php
                                    $brandNames = [];
                                    foreach($product['brand_ids'] as $bid) {
                                        $brand = $brands->firstWhere('id', $bid);
                                        if($brand) $brandNames[] = $brand->name;
                                    }
                                    echo implode(', ', $brandNames);
                                @endphp
                            </p>
                            <a href="https://api.whatsapp.com/send?phone=97142264582&text=Hello,%20I%27m%20visiting%20your%20website%20and%20would%20like%20to%20know%20more%22" class="comman_btn"><span>Enquire Now</span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Sort Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="SortbyMenu" aria-labelledby="SortbyMenuLabel">
    <div class="offcanvas-header">
        <h5 id="SortbyMenuLabel">Sort by</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body filter">
        <div class="menu_body">
            <div class="form-check">
                <input class="form-check-input sort-option" type="radio" name="sortOptions" id="sort1" value="Recommended" checked>
                <label class="form-check-label" for="sort1">Recommended</label>
            </div>
            <div class="form-check">
                <input class="form-check-input sort-option" type="radio" name="sortOptions" id="sort2" value="Newest">
                <label class="form-check-label" for="sort2">Newest</label>
            </div>
        </div>
    </div>
</div>

<!-- Filters Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="FiltersMenu" aria-labelledby="FiltersMenuLabel">
    <div class="offcanvas-header">
        <h5 id="FiltersMenuLabel">Filters</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body filter">
        <div class="menu_body">
            <div class="accordion" id="accordionExample">
                <!-- Product Name Filter -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingProductName">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProductName" aria-expanded="true" aria-controls="collapseProductName">
                            Category
                        </button>
                    </h2>
                    <div id="collapseProductName" class="accordion-collapse collapse show" aria-labelledby="headingProductName" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach($productNames as $index => $productName)
                                <div class="form-check">
                                    <input class="form-check-input filter-checkbox" type="checkbox" value="{{ $productName }}" data-group="ProductName" id="productName{{ $index }}">
                                    <label class="form-check-label" for="productName{{ $index }}">{{ $productName }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Size Filter -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSize">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSize" aria-expanded="false" aria-controls="collapseSize">
                            Size
                        </button>
                    </h2>
                    <div id="collapseSize" class="accordion-collapse collapse" aria-labelledby="headingSize" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach($clothSizes as $size)
                                <div class="form-check">
                                    <input class="form-check-input filter-checkbox" type="checkbox" value="{{ $size->id }}" data-group="Size" id="size{{ $size->id }}">
                                    <label class="form-check-label" for="size{{ $size->id }}">{{ $size->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add CSS for filter styling -->
<style>
.filter-tag {
    display: inline-flex;
    align-items: center;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 20px;
    padding: 5px 12px;
    margin: 2px;
    font-size: 14px;
}

.filter-tag .btn-close {
    margin-right: 8px;
    font-size: 10px;
}

.clear-filters {
    color: #007bff;
    cursor: pointer;
    text-decoration: underline;
}

.clear-filters:hover {
    color: #0056b3;
}

.selected-filters {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.filter-count {
    background-color: #007bff;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 12px;
    margin-left: 5px;
}

.original-product.hidden {
    display: none !important;
}

.filtered-product {
    display: block;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Data from PHP
    const products = @json($products) || [];
    const brands = @json($brands) || [];
    const categoryId = {{ $category->id ?? 0 }};

    console.log('Products loaded:', products.length);
    console.log('Category ID:', categoryId);
    console.log('Sample product structure:', products[0]);

    // Sort handler
    $('.sort-option').on('change', function() {
        if (this.checked) {
            $('#selectedSortOption').text(this.value);
            updateProductList();
            // Close offcanvas if Bootstrap is available
            if (typeof bootstrap !== 'undefined') {
                const offcanvas = bootstrap.Offcanvas.getInstance($('#SortbyMenu')[0]);
                if (offcanvas) offcanvas.hide();
            }
        }
    });

    // Filter checkbox handler
    $('.filter-checkbox').on('change', function() {
        updateProductList();
        updateSelectedFilters();
    });

    function updateProductList() {
        try {
            const selectedSizes = $('.filter-checkbox[data-group="Size"]:checked').map(function() {
                return parseInt($(this).val());
            }).get();
            
            const selectedProductNames = $('.filter-checkbox[data-group="ProductName"]:checked').map(function() {
                return $(this).val();
            }).get();

            console.log('Selected sizes:', selectedSizes);
            console.log('Selected product names:', selectedProductNames);

            // Check if any filters are active
            const hasActiveFilters = selectedSizes.length > 0 || selectedProductNames.length > 0;
            
            if (!hasActiveFilters) {
                // No filters active, show all original products
                showAllOriginalProducts();
                return;
            }

            // Filter products
            let filteredProducts = products.filter(function(product) {
                let matchCategory = true;
                let matchProductName = true;
                let matchSize = true;
                
                // Category match
                if (categoryId > 0) {
                    matchCategory = (product.category_id === categoryId);
                }
                
                // Product name match
                if (selectedProductNames.length > 0) {
                    matchProductName = selectedProductNames.includes(product.name);
                } else {
                    matchProductName = true; // No product name filter selected
                }
                
                // Size match - FIXED LOGIC
                if (selectedSizes.length > 0) {
                    matchSize = false; // Default to false when size filter is active
                    
                    // Check if product has size data
                    if (Array.isArray(product.product_brand_size) && product.product_brand_size.length > 0) {
                        // Check if any of the product's sizes match the selected sizes
                        matchSize = product.product_brand_size.some(function(pbs) {
                            const productSizeId = parseInt(pbs.size_id);
                            const sizeMatch = selectedSizes.includes(productSizeId);
                            
                            // Debug log for first few products
                            if (product.id <= 3) {
                                console.log(`Product: ${product.name}, Size ID: ${productSizeId}, Match: ${sizeMatch}`);
                            }
                            
                            return sizeMatch;
                        });
                    }
                    
                    console.log(`Product: ${product.name}, Has sizes: ${product.product_brand_size ? 'Yes' : 'No'}, Size match: ${matchSize}`);
                } else {
                    matchSize = true; // No size filter selected
                }
                
                // Product must match all active filters
                return matchCategory && matchProductName && matchSize;
            });

            // Sort products
            const sortOption = $('.sort-option:checked').val();
            if (sortOption === 'Newest') {
                filteredProducts.sort(function(a, b) {
                    return new Date(b.created_at || 0) - new Date(a.created_at || 0);
                });
            }

            console.log('Filtered products:', filteredProducts.length);
            console.log('Filtered product names:', filteredProducts.map(p => p.name));

            // Show filtered products
            showFilteredProducts(filteredProducts);
            
        } catch (error) {
            console.error('Error in updateProductList:', error);
        }
    }

    function showAllOriginalProducts() {
        // Remove any dynamic products
        $('#productList .dynamic-product').remove();
        // Show all original products
        $('#productList .original-product').show();
        console.log('Showing all original products:', $('#productList .original-product:visible').length);
    }

    function showFilteredProducts(filteredProducts) {
        // Remove any previously added dynamic products
        $('#productList .dynamic-product').remove();
        
        // Hide all original products first
        $('#productList .original-product').hide();
        
        // Show only matching original products based on product name
        filteredProducts.forEach(function(product) {
            const matchingElement = $('#productList .original-product').filter(function() {
                return $(this).data('product-name') === product.name;
            });
            
            if (matchingElement.length > 0) {
                matchingElement.show();
            } else {
                // If original product not found, create new element
                createAndAppendProduct(product);
            }
        });
        
        const visibleCount = $('#productList .original-product:visible').length + $('#productList .dynamic-product').length;
        console.log('Products displayed:', visibleCount);
        
        // Show message if no products found
        if (visibleCount === 0) {
            if ($('#productList .no-products-message').length === 0) {
                $('#productList').append('<div class="col-12 no-products-message text-center py-5"><p>No products found matching your filters.</p></div>');
            }
        } else {
            $('#productList .no-products-message').remove();
        }
    }

    function createAndAppendProduct(product) {
        const brandNames = Array.isArray(product.brand_ids)
            ? product.brand_ids.map(function(bid) {
                const brand = brands.find(function(b) { return b.id === bid; });
                return brand ? brand.name : null;
              }).filter(Boolean).join(', ')
            : 'N/A';
            
        // Fix image path
        const imageSrc = product.images && product.images[0] 
            ? `{{ asset('public/product_images/') }}/${product.images[0]}`
            : product.image
            ? `{{ asset('public/product_images/') }}/${product.image}`
            : `{{ asset('public/front/img/default-product.jpg') }}`;
            
        const productHTML = `
            <div class="col-md-3 dynamic-product" data-product-name="${product.name}" style="display: block;">
                <div class="product_wrapper">
                    <div class="Product_item">
                        <a href="{{ url('products-details/') }}/${product.url}">
                            <img src="${imageSrc}" alt="${product.name}" class="img-fluid product_img w-100" 
                                 onerror="this.src='{{ asset('public/front/img/default-product.jpg') }}'"/>
                        </a>
                    </div>
                    <div class="product_item_details">
                        <a href="{{ url('products-details/') }}/${product.url}">
                            <h3 class="product_card_title">${product.name}</h3>
                        </a>
                        <p class="product_card_text"><b>Brand: </b>${brandNames}</p>
                        <a href="https://api.whatsapp.com/send?phone=97142264582&text=Hello,%20I%27m%20visiting%20your%20website%20and%20would%20like%20to%20know%20more%22" class="comman_btn"><span>Enquire Now</span></a>
                    </div>
                </div>
            </div>
        `;
        
        $('#productList').append(productHTML);
    }

    function updateSelectedFilters() {
        try {
            $('#selectedFilters').empty();
            const activeFilters = [];

            // Collect selected filters
            $('.filter-checkbox[data-group="Size"]:checked').each(function() {
                activeFilters.push({
                    group: 'Size',
                    value: $(this).next('label').text(),
                    id: $(this).attr('id')
                });
            });

            $('.filter-checkbox[data-group="ProductName"]:checked').each(function() {
                activeFilters.push({
                    group: 'Category',
                    value: $(this).next('label').text(),
                    id: $(this).attr('id')
                });
            });

            // Update filter count
            $('.filter-count').text(activeFilters.length > 0 ? activeFilters.length : '');

            if (activeFilters.length === 0) return;

            // Add "Active Filter" label
            const countText = `${activeFilters.length} Active Filter${activeFilters.length > 1 ? 's' : ''}:`;
            $('#selectedFilters').append(`<span class="filter-count-label fw-semibold me-2">${countText}</span>`);

            // Render selected filter tags
            activeFilters.forEach(function(filter) {
                const tagHTML = `
                    <div class="filter-tag">
                        <button type="button" class="btn-close" aria-label="Remove" data-id="${filter.id}"></button>
                        <span><strong>${filter.group}:</strong> ${filter.value}</span>
                    </div>
                `;
                $('#selectedFilters').append(tagHTML);
            });

            // Add "Clear All" link
            $('#selectedFilters').append('<span class="clear-filters ms-2">Clear All Filters</span>');

            // Clear all filters handler
            $('#selectedFilters').off('click', '.clear-filters').on('click', '.clear-filters', function() {
                $('.filter-checkbox').prop('checked', false);
                updateProductList();
                updateSelectedFilters();
            });

            // Individual filter remove handlers
            $('#selectedFilters').off('click', '.btn-close').on('click', '.btn-close', function() {
                const id = $(this).data('id');
                $('#' + id).prop('checked', false);
                updateProductList();
                updateSelectedFilters();
            });
            
        } catch (error) {
            console.error('Error in updateSelectedFilters:', error);
        }
    }

    // Initialize
    updateSelectedFilters();
});
</script>

@include('layouts.enquiry-banner')
@include('layouts.enquiry')
@include('layouts.frontfooter')
