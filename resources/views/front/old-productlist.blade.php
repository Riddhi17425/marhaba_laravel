@include('layouts.frontheader')

<section class="banner_head_section section_gradientbg position-relative overflow-hidden">
    <div class="product_banner_breadcrumb">
        <div class="row justify-content-between">
            <div class="col-md-3 text-center">
                <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                    </ol>
                </nav>
                <h2 class="mean_head text-white">{{ $category->name }}</h2>
            </div>
            <div class="col-md-4">
                <p class="text-white">{!! $category->description !!}</p>
                <a href="#" class="comman_btn3"><span>Enquire Now</span></a>
            </div>
        </div>
    </div>
    <img src="{{ asset('public/category_images/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid">
</section>

<section class="section_pt">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-3">
                <a data-bs-toggle="offcanvas" data-bs-target="#SortbyMenu" aria-controls="SortbyMenu" class="Sortby-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14" fill="none">
                        <path d="M0.865052 0C0.38804 0 0 0.375782 0 0.837616C0 1.29945 0.38809 1.67523 0.865052 1.67523H19.1349C19.612 1.67523 20 1.29945 20 0.837616C20 0.375782 19.6119 0 19.1349 0H0.865052ZM0.865052 6.16243C0.38804 6.16243 0 6.53822 0 7.00005C0 7.46188 0.38809 7.83762 0.865052 7.83762H11.7918C12.2688 7.83762 12.6569 7.46188 12.6569 7.00005C12.6569 6.53822 12.2688 6.16243 11.7918 6.16243H0.865052ZM0.865052 12.3248C0.38804 12.3248 0 12.7006 0 13.1624C0 13.6242 0.38809 14 0.865052 14H8.81811C9.29512 14 9.68316 13.6242 9.68316 13.1624C9.68316 12.7006 9.29507 12.3248 8.81811 12.3248H0.865052Z" fill="#4A4A4A" />
                    </svg>
                    <span>Sort by: </span>
                    <span id="selectedSortOption">Recommended</span>
                </a>
            </div>
            <div class="col-md-3 text-end">
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
                <div class="col-md-3">
                    <div class="product_wrapper">
                        <div class="Product_item">
                            <a href="{{ url('products-details/' . $product['url']) }}">
                                <img
                                    src="{{ asset('public/product_images/' . ($product['image'] ?? 'default.png')) }}"
                                    alt="{{ $product['name'] }}"
                                    class="img-fluid product_img w-100" />
                            </a>
                        </div>
                        <div class="product_item_details">
                            <a href="{{ url('products-details/' . $product['url']) }}">
                                <h3 class="product_card_title">{{ $product['name'] }}</h3>
                            </a>
                            <p class="product_card_text">
                                <b>Brand: </b>
                                @foreach($product['product_brand_size'] as $pbs)
                                    @foreach($brands as $brand)
                                        @if($brand->id == $pbs['brand_id'])
                                            {{ $brand->name }}
                                            @if(!$loop->last), @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            </p>
                            <a href="#" class="comman_btn"><span>Enquire Now</span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Sort Offcanvas -->
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

<!-- Filter Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="FiltersMenu" aria-labelledby="FiltersMenuLabel">
    <div class="offcanvas-header">
        <h5 id="FiltersMenuLabel">Filters</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body filter">
        <div class="menu_body">
            <div class="accordion" id="accordionExample">
                <!-- Brand Filter -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingBrand">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                            Brand
                        </button>
                    </h2>
                    <div id="collapseBrand" class="accordion-collapse collapse show" aria-labelledby="headingBrand" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach($brands as $brand)
                                <div class="form-check">
                                    <input class="form-check-input filter-checkbox" type="checkbox" value="{{ $brand->id }}" data-group="Brand" id="brand{{ $brand->id }}">
                                    <label class="form-check-label" for="brand{{ $brand->id }}">{{ $brand->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Color Filter -->
                <!--<div class="accordion-item">-->
                <!--    <h2 class="accordion-header" id="headingColor">-->
                <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseColor" aria-expanded="false" aria-controls="collapseColor">-->
                <!--            Color-->
                <!--        </button>-->
                <!--    </h2>-->
                <!--    <div id="collapseColor" class="accordion-collapse collapse" aria-labelledby="headingColor" data-bs-parent="#accordionExample">-->
                <!--        <div class="accordion-body">-->
                <!--            <div class="row g-3">-->
                <!--                @foreach($clothColors as $color)-->
                <!--                    <div class="col-md-4">-->
                <!--                        <div class="color-option-box">-->
                <!--                            <div class="color-option" data-value="{{ $color->id }}" data-id="color{{ $color->id }}" style="background-color: {{ $color->color_code }};" title="{{ $color->name }}"></div>-->
                <!--                        </div>-->
                <!--                        <p class="text-center mb-0">{{ $color->name }}</p>-->
                <!--                    </div>-->
                <!--                @endforeach-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sortRadios = document.querySelectorAll('.sort-option');
    const selectedSortOption = document.getElementById('selectedSortOption');
    const sortMenu = document.getElementById('SortbyMenu');
    const productList = document.getElementById('productList');
    const selectedFilters = document.getElementById('selectedFilters');
    const filterCountEl = document.querySelector('.filter-count');
    const checkboxes = document.querySelectorAll('.filter-checkbox');
    const colorOptions = document.querySelectorAll('.color-option');

    // Original products and brands data from PHP
    const products = @json($products);
    const brands = @json($brands);
    const colors = @json($clothColors);
    const categoryId = {{ $category->id }};

    // Toggle color selection
    colorOptions.forEach(option => {
        const box = option.parentElement;
        box.addEventListener('click', () => {
            box.classList.toggle('selected');
            updateProductList();
            updateSelectedFilters();
        });
    });

    // Sort option handler
    sortRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                selectedSortOption.textContent = this.value;
                updateProductList();
                const offcanvas = bootstrap.Offcanvas.getInstance(sortMenu);
                offcanvas.hide();
            }
        });
    });

    // Checkbox handler
    checkboxes.forEach(cb => cb.addEventListener('change', () => {
        updateProductList();
        updateSelectedFilters();
    }));

    function updateProductList() {
        // Collect selected filters
        const selectedBrands = Array.from(document.querySelectorAll('.filter-checkbox[data-group="Brand"]:checked')).map(cb => parseInt(cb.value));
        const selectedSizes = Array.from(document.querySelectorAll('.filter-checkbox[data-group="Size"]:checked')).map(cb => parseInt(cb.value));
        const selectedColors = Array.from(document.querySelectorAll('.color-option-box.selected .color-option')).map(option => parseInt(option.dataset.value));

        // Filter products
        let filteredProducts = products.filter(product => {
            const brandMatch = selectedBrands.length === 0 || product.product_brand_size.some(pbs => selectedBrands.includes(parseInt(pbs.brand_id)));
            const sizeMatch = selectedSizes.length === 0 || product.product_brand_size.some(pbs => selectedSizes.includes(parseInt(pbs.size_id)));
            const colorMatch = selectedColors.length === 0 || product.product_brand_size.some(pbs => selectedColors.includes(parseInt(pbs.color_id)));
            return brandMatch && sizeMatch && colorMatch && product.category_id === categoryId;
        });

        // Sort products
        const sortOption = document.querySelector('.sort-option:checked').value;
        filteredProducts.sort((a, b) => {
            if (sortOption === 'Newest') {
                return new Date(b.created_at) - new Date(a.created_at);
            }
            return 0; // Recommended (default order)
        });

        // Render products
        productList.innerHTML = '';
        filteredProducts.forEach(product => {
            const brandNames = product.product_brand_size
                .map(pbs => brands.find(brand => brand.id === parseInt(pbs.brand_id))?.name)
                .filter(name => name)
                .join(', ');
            const div = document.createElement('div');
            div.className = 'col-md-3';
            div.innerHTML = `
                <div class="product_wrapper">
                    <div class="Product_item">
                        <a href="/products-details/${product.url}">
                            <img src="/public/product_images/${product.image || 'default.png'}" alt="${product.name}" class="img-fluid product_img w-100" />
                        </a>
                    </div>
                    <div class="product_item_details">
                        <a href="/products-details/${product.url}">
                            <h3 class="product_card_title">${product.name}</h3>
                        </a>
                        <p class="product_card_text"><b>Brand: </b>${brandNames || 'N/A'}</p>
                        <a href="#" class="comman_btn"><span>Enquire Now</span></a>
                    </div>
                </div>
            `;
            productList.appendChild(div);
        });
    }

    function updateSelectedFilters() {
        selectedFilters.innerHTML = '';
        const activeFilters = [];

        // Collect selected brands
        document.querySelectorAll('.filter-checkbox[data-group="Brand"]:checked').forEach(cb => {
            activeFilters.push({
                group: 'Brand',
                value: cb.nextElementSibling.textContent,
                id: cb.id
            });
        });

        // Collect selected sizes
        document.querySelectorAll('.filter-checkbox[data-group="Size"]:checked').forEach(cb => {
            activeFilters.push({
                group: 'Size',
                value: cb.nextElementSibling.textContent,
                id: cb.id
            });
        });

        // Collect selected colors
        document.querySelectorAll('.color-option-box.selected .color-option').forEach(option => {
            const color = colors.find(c => c.id === parseInt(option.dataset.value));
            activeFilters.push({
                group: 'Color',
                value: color ? color.name : option.dataset.value,
                id: option.dataset.id
            });
        });

        // Update filter count
        if (activeFilters.length === 0) {
            if (filterCountEl) filterCountEl.textContent = '';
            return;
        } else {
            if (filterCountEl) filterCountEl.textContent = activeFilters.length;
        }

        // Add "Active Filter" label
        const countText = `${activeFilters.length} Active Filter${activeFilters.length > 1 ? 's' : ''}:`;
        const countLabel = document.createElement('span');
        countLabel.className = 'filter-count-label fw-semibold';
        countLabel.textContent = countText;
        selectedFilters.appendChild(countLabel);

        // Render selected tags
        activeFilters.forEach(filter => {
            const tag = document.createElement('div');
            tag.className = 'filter-tag';
            tag.innerHTML = `
                <button type="button" class="btn-close" aria-label="Remove" data-id="${filter.id}"></button>
                <span><strong>${filter.group}:</strong> ${filter.value}</span>
            `;
            selectedFilters.appendChild(tag);
        });

        // Add "Clear All" link
        const clearAll = document.createElement('span');
        clearAll.className = 'clear-filters ms-2';
        clearAll.textContent = 'Clear All Filters';
        clearAll.addEventListener('click', () => {
            checkboxes.forEach(c => (c.checked = false));
            document.querySelectorAll('.color-option-box.selected').forEach(b => b.classList.remove('selected'));
            updateProductList();
            updateSelectedFilters();
        });
        selectedFilters.appendChild(clearAll);

        // Individual remove
        selectedFilters.querySelectorAll('.btn-close').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.getAttribute('data-id');
                const input = document.getElementById(id);
                if (input) input.checked = false;
                const colorBox = document.querySelector(`.color-option[data-id="${id}"]`)?.parentElement;
                if (colorBox) colorBox.classList.remove('selected');
                updateProductList();
                updateSelectedFilters();
            });
        });
    }
});
</script>

@include('layouts.frontfooter')
