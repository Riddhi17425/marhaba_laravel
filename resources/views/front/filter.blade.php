@include('layouts.frontheader')
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
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                    <h1 class="lora_24">Boys Wholesale Collection</h1>
                </div>
                <!-- Total Items Count -->
                <div>
                    <div class="items-count">
                        <span id="totalItems">120 Items</span>
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
                    <h3 class="lora_24"
                        stlye="background: linear-gradient(90deg, rgba(243, 242, 231, 0) 0%, #F3F2E7 50%, rgba(243, 242, 231, 0) 100%);">
                        Baby</h3>
                    <p class="raleway_14 mb-0">Age Range: 0 Months to 3 Years</p>
                </div>
            </div>
            <div class="age_range_box" style="background-color: rgb(239, 230, 240);">
                <div class="age-card" data-scroll-to="toddler">
                    <h3 class="lora_24">Toddler & Little Kids</h3>
                    <p class="raleway_14 mb-0">Age Range: 2 Years to 7 Years</p>
                </div>
            </div>
            <div class="age_range_box" style="background-color: rgb(230, 239, 242);">
                <div class="age-card" data-scroll-to="kids">
                    <h3 class="lora_24">Kids & Youth</h3>
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
        <!-- Baby Section -->
        <section id="baby" class="age_section" data-age="baby">
            <h2 class="title_48lora mb-0"
                style="background: linear-gradient(90deg, rgba(243, 242, 231, 0) 0%, #F3F2E7 50%, rgba(243, 242, 231, 0) 100%);">
                Baby</h2>
            <div class="products_filter_grid">
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
                </div>
            </div>
        </section>
        <!-- Toddler & Little Kids Section -->
        <section id="toddler" class="age_section" data-age="toddler">
            <h2 class="title_48lora mb-0"
                style="background: linear-gradient(90deg, rgba(239, 230, 240, 0) 0%, #EFE6F0 50%, rgba(239, 230, 240, 0) 100%);">
                Toddler & Little Kids</h2>
            <div class="products_filter_grid">
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
                </div>
            </div>
        </section>
        <!-- Kids & Youth Section -->
        <section id="kids" class="age_section" data-age="kids">
            <h2 class="title_48lora mb-0"
                style="background: linear-gradient(90deg, rgba(230, 239, 241, 0) 0%, #E6EFF1 50%, rgba(230, 239, 241, 0) 100%);">
                Kids & Youth</h2>
            <div class="products_filter_grid">
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
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Filter Offcanvas -->
<div class="offcanvas offcanvas-end filter_offcanvas" tabindex="-1" id="filterOffcanvas"
    aria-labelledby="filterOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title lora_36" id="filterOffcanvasLabel">Filters</h5>
        <!--<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>-->
        <p type="button" class="mb-0" id="clearFilters">Clear</button>
    </div>
    <div class="offcanvas-body filter">
        <div class="menu_body">
            <div class="accordion" id="accordionExample">
                <!--age-->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAge">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseAge" aria-expanded="true" aria-controls="collapseAge">
                            Age
                        </button>
                    </h2>

                    <div id="collapseAge" class="accordion-collapse collapse show" aria-labelledby="headingAge"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="baby" id="filterBaby"
                                    name="ageRange">
                                <label class="form-check-label" for="filterBaby">0 to 3 y</label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="toddler" id="filterToddler"
                                    name="ageRange">
                                <label class="form-check-label" for="filterToddler">2 to 7 y</label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="kids" id="filterKids"
                                    name="ageRange">
                                <label class="form-check-label" for="filterKids">6 to 14 y</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--brand-->
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
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="my melody" id="filterBrand1"
                                    name="brand">
                                <label class="form-check-label" for="filterBrand1">my melody</label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="smart kids" id="filterBrand2"
                                    name="brand">
                                <label class="form-check-label" for="filterBrand2">smart kids</label>
                            </div>
                        </div>
                    </div>
                </div>

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
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="Casual Wear Sets"
                                    id="filterCategory1" name="category">
                                <label class="form-check-label" for="filterCategory1">
                                    Casual Wear Sets
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Apply Button -->
            <div class="">
                <a type="button" class="apply_btn" id="applyFilters" data-bs-dismiss="offcanvas">Show 120 Items</a>
            </div>
        </div>
    </div>
</div>
<!--filter js-->
<script>
    // Product Listing Filter System

// State Management
const filterState = {
    ageRange: [],
    brand: [],
    category: []
};

// DOM Elements
const ageRangeLinks = document.getElementById('ageRangeLinks');
const activeFiltersSection = document.getElementById('activeFilters');
const ageSections = document.querySelectorAll('.age_section');
const applyFiltersBtn = document.getElementById('applyFilters');
const clearFiltersBtn = document.getElementById('clearFilters');
const totalItemsElement = document.getElementById('totalItems');

// Age Range Data
const ageRangeLabels = {
    'baby': '0 to 3 y',
    'toddler': '2 to 7 y',
    'kids': '6 to 14 y'
};

// Initialize Event Listeners
function initEventListeners() {
    // Age card click - scroll to section
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
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', updateApplyButtonText);
    });
}

// Update Filter State from Checkboxes
function updateFilterState() {
    // Reset state
    filterState.ageRange = [];
    filterState.brand = [];
    filterState.category = [];

    // Get checked values
    document.querySelectorAll('input[name="ageRange"]:checked').forEach(cb => {
        filterState.ageRange.push(cb.value);
    });

    document.querySelectorAll('input[name="brand"]:checked').forEach(cb => {
        filterState.brand.push(cb.value);
    });

    document.querySelectorAll('input[name="category"]:checked').forEach(cb => {
        filterState.category.push(cb.value);
    });
}

// Update Apply Button Text
function updateApplyButtonText() {
    updateFilterState();
    
    // Count visible items based on filters
    let itemCount = 0;
    
    if (filterState.ageRange.length > 0) {
        // If age range is selected, count only those sections
        itemCount = filterState.ageRange.length * 12; // Assuming 12 items per section
    } else {
        // If no age range selected, count all sections
        itemCount = 120;
    }
    
    applyFiltersBtn.textContent = `Show ${itemCount} Items`;
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

        // Show active filters section
        activeFiltersSection.classList.remove('d-none');

        // Render filter pills
        renderFilterPills();

        // Filter sections
        filterSections();

        // Update item count
        updateItemCount();
    } else {
        // No filters active - show all sections
        showAllSections();
    }
}

// Main Filter Logic
function filterSections() {
    ageSections.forEach(section => {
        const ageType = section.getAttribute('data-age');
        let shouldShow = false;

        // RULE 1: If age range is selected, only show selected age ranges
        if (filterState.ageRange.length > 0) {
            if (filterState.ageRange.includes(ageType)) {
                shouldShow = true;
            } else {
                shouldShow = false;
            }
        } else {
            // If no age range filter, show all age sections by default
            shouldShow = true;
        }

        // RULE 2 & 3: Filter by brand and category within the section
        if (shouldShow && (filterState.brand.length > 0 || filterState.category.length > 0)) {
            // Check if section has matching products
            const hasMatchingProducts = checkSectionHasMatchingProducts(section);
            
            // RULE 4: Hide section if no matching products found
            if (!hasMatchingProducts) {
                shouldShow = false;
            }
        }

        // Show or hide the section
        if (shouldShow) {
            section.classList.remove('hidden');
            section.style.display = 'block';
        } else {
            section.classList.add('hidden');
            section.style.display = 'none';
        }
    });
}

// Check if section has products matching brand/category filters
function checkSectionHasMatchingProducts(section) {
    // Get all products in the section
    const products = section.querySelectorAll('.product_wrapper');
    
    if (products.length === 0) {
        return false;
    }

    // If no brand or category filter, return true
    if (filterState.brand.length === 0 && filterState.category.length === 0) {
        return true;
    }

    // Check each product for matching attributes
    let hasMatch = false;
    
    products.forEach(product => {
        let productMatches = true;

        // Check brand filter
        if (filterState.brand.length > 0) {
            const productBrand = product.getAttribute('data-brand') || '';
            if (!filterState.brand.includes(productBrand.toLowerCase())) {
                productMatches = false;
            }
        }

        // Check category filter
        if (filterState.category.length > 0 && productMatches) {
            const productCategory = product.getAttribute('data-category') || '';
            if (!filterState.category.includes(productCategory)) {
                productMatches = false;
            }
        }

        if (productMatches) {
            hasMatch = true;
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });

    return hasMatch;
}

// Render Filter Pills
function renderFilterPills() {
    const pillsContainer = activeFiltersSection.querySelector('.d-flex');
    pillsContainer.innerHTML = '';

    // Add age range pills
    filterState.ageRange.forEach(ageValue => {
        const pill = createFilterPill('Age Range', ageRangeLabels[ageValue], 'ageRange', ageValue);
        pillsContainer.appendChild(pill);
    });

    // Add brand pills
    filterState.brand.forEach(brandValue => {
        const pill = createFilterPill('Brand', brandValue, 'brand', brandValue);
        pillsContainer.appendChild(pill);
    });

    // Add category pills
    filterState.category.forEach(categoryValue => {
        const pill = createFilterPill('Category', categoryValue, 'category', categoryValue);
        pillsContainer.appendChild(pill);
    });

    // Add Clear All button if there are filters
    if (filterState.ageRange.length > 0 || filterState.brand.length > 0 || filterState.category.length > 0) {
        const clearAllBtn = document.createElement('a');
        clearAllBtn.className = 'clear-all-btn';
        clearAllBtn.textContent = 'Clear';
        clearAllBtn.href = 'javascript:void(0)';
        clearAllBtn.addEventListener('click', clearAllFilters);
        pillsContainer.appendChild(clearAllBtn);
    }
}

// Create Filter Pill Element
function createFilterPill(label, value, filterType, filterValue) {
    const pill = document.createElement('div');
    pill.className = 'filter-pill';

    // Label span
    const labelSpan = document.createElement('span');
    labelSpan.className = 'filter-label';
    labelSpan.textContent = `${label}: `;

    // Value span
    const valueSpan = document.createElement('span');
    valueSpan.className = 'filter-value';
    valueSpan.textContent = value;

    // Remove button
    const removeBtn = document.createElement('a');
    removeBtn.href = 'javascript:void(0)';
    removeBtn.className = 'remove-filter';

    removeBtn.innerHTML = `
        <svg width="9" height="9" viewBox="0 0 9 9" fill="none"
             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M0.5 0.5L8.5 8.5"
                  stroke="#4A4A4A"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>
            <path d="M8.5 0.5L0.5 8.5"
                  stroke="#4A4A4A"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    `;

    removeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        removeFilter(filterType, filterValue);
    });

    pill.appendChild(labelSpan);
    pill.appendChild(valueSpan);
    pill.appendChild(removeBtn);

    return pill;
}

// Remove Single Filter
function removeFilter(filterType, filterValue) {
    // Update state
    const index = filterState[filterType].indexOf(filterValue);
    if (index > -1) {
        filterState[filterType].splice(index, 1);
    }

    // Update checkbox
    const checkbox = document.querySelector(`input[name="${filterType}"][value="${filterValue}"]`);
    if (checkbox) {
        checkbox.checked = false;
    }

    // Re-apply filters
    applyFilters();

    // If no filters left, show all sections
    if (filterState.ageRange.length === 0 &&
        filterState.brand.length === 0 &&
        filterState.category.length === 0) {
        showAllSections();
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
    applyFiltersBtn.textContent = 'Show 120 Items';

    // Show all sections
    showAllSections();
}

// Show All Sections
function showAllSections() {
    // Show age range links
    ageRangeLinks.classList.remove('d-none');

    // Hide active filters section
    activeFiltersSection.classList.add('d-none');

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

    // Reset item count
    totalItemsElement.textContent = '120 Items';
}

// Update Item Count
function updateItemCount() {
    let visibleSections = 0;
    let totalVisibleProducts = 0;

    ageSections.forEach(section => {
        if (!section.classList.contains('hidden') && section.style.display !== 'none') {
            visibleSections++;
            
            // Count visible products in this section
            const visibleProducts = section.querySelectorAll('.product_wrapper:not([style*="display: none"])');
            totalVisibleProducts += visibleProducts.length;
        }
    });

    // Update item count display
    totalItemsElement.textContent = `${totalVisibleProducts} Items`;
}

// Initialize on Page Load
document.addEventListener('DOMContentLoaded', function () {
    initEventListeners();
    console.log('Product Listing Page Initialized');
});

// Optional: Handle browser back button
window.addEventListener('popstate', function () {
    clearAllFilters();
});
</script>
<!--filter js-->
@include('layouts.frontfooter')