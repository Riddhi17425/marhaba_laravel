<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marhaba</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/front/img/favicon.png') }}">

    <!-- bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
        crossorigin="anonymous">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Familjen+Grotesk:wght@400;700&family=Playfair+Display:wght@400;900&display=swap"
        rel="stylesheet">

    <!-- Slick Slider CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- Swiper CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css') }}">
</head>

<body>
<header>
    <div class="container-fluid">
        <!-- Mobile Header -->
        <div class="row text-center heder_section d-flex d-md-none align-items-center">
            <div class="col-6 text-start">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('public/front/img/logo.svg') }}" alt="logo" class="img-fluid nav_logo">
                </a>
            </div>
            <div class="col-6 text-end">
                <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                    <i class="fas fa-bars fs-3"></i>
                </button>
            </div>
        </div>

        <!-- Desktop Header -->
        <div class="d-none d-md-flex justify-content-between align-items-center heder_section">
            <div class="social_items">
                <a href="#"><img src="{{ asset('public/front/img/facebook_icon.png') }}" alt="facebook" class="img-fluid"></a>
                <a href="#"><img src="{{ asset('public/front/img/linkedin_icon.png') }}" alt="linkedin" class="img-fluid"></a>
                <a href="#"><img src="{{ asset('public/front/img/insta_icon.png') }}" alt="instagram" class="img-fluid"></a>
            </div>
            <div class="text-center align-items-center mx-auto">
                <a href="#" class="me-4">
                    <img src="{{ asset('public/front/img/logo.svg') }}" alt="logo" class="img-fluid nav_logo">
                </a>
            </div>
            <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                <i class="fas fa-bars fs-3"></i>
            </button>
        </div>
    </div>
</header>

@php
use App\Models\Category;
use App\Models\Product;
use App\Models\ClothSize;

// Fetch all categories
$categories = Category::whereNull('deleted_at')->get();

// Fetch all products
$products = Product::whereNull('deleted_at')->get()->map(function($p){
    return [
        'id' => $p->id,
        'name' => $p->product_detail_name,
        'category_id' => $p->category_id,
        'url' => $p->url,
        'product_brand_size' => json_decode($p->product_brand_size, true) 
    ];
});

// Fetch all sizes
$sizes = ClothSize::all();
@endphp

<!-- Sidebar -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
  <div class="offcanvas-header">
    <button type="button" class="btn-close offcanvas_close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <div class="menu_container">
      <div class="menu_wrapper" id="menuWrapper">

        <!-- Level 1 -->
        <div class="menu_body">
          <ul class="list-unstyled sidemenu m-0 p-3">
            <li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link">About</a></li>

            @foreach($categories as $cat)
            <li>
                <a href="{{ route('products', $cat->url) }}"
                   class="nav-link d-inline-flex align-items-center next-menu"
                   data-category-id="{{ $cat->id }}">
                    <span class="category-name">{{ $cat->name }}</span>
                    <span class="category-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                            <path d="M6 12L10 8L6 4" stroke="#333" stroke-width="1.5" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </a>
            </li>
            @endforeach

            <li><a href="#" class="nav-link">Blogs</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
          </ul>
        </div>

        <!-- Level 2: Sizes -->
        <div class="menu_body sidebar_submenu">
          <div class="p-3">
            <button class="btn px-0 d-inline-flex align-items-center back-menu" data-target="0">
              <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                <path d="M10 4L6 8L10 12" stroke="#333" stroke-width="1.5" stroke-linejoin="round"></path>
              </svg> Back
            </button>
            <div class="menu_heade_mt">
              <a href="#" class="menu_heading">Size Range</a>
            </div>
            <img src="{{ asset('public/front/img/insta_kidswearpic.png') }}" alt="" class="img-fluid mb-4">
            <ul class="list-unstyled sidemenu m-0" id="sizeList">
              <!-- Sizes will be populated dynamically -->
            </ul>
          </div>
        </div>

        <!-- Level 3: Products -->
        <div class="menu_body sidebar_submenu">
          <div class="p-3">
            <button class="btn px-0 back-menu" data-target="1">
              <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                <path d="M10 4L6 8L10 12" stroke="#333" stroke-width="1.5" stroke-linejoin="round"></path>
              </svg> Back
            </button>
            <div class="menu_heade_mt">
              <a href="#" class="menu_heading">Categories</a>
            </div>
            <img src="{{ asset('public/front/img/kidswear_wholesale.png') }}" alt="" class="img-fluid mb-4">
            <ul class="list-unstyled sidemenu m-0" id="productList">
              <!-- Products will be populated dynamically -->
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<style>
.menu_container {
    overflow: hidden;
    position: relative;
}
.menu_wrapper {
    display: flex;
    transition: transform 0.8s cubic-bezier(0.5, 0, 0, 1);
}
.menu_body {
    width: 100%;
    flex-shrink: 0;
}
.sidemenu .nav-link {
    padding: 8px 0;
}
.sidemenu .category-arrow {
    display: none;
    margin-left: 8px;
}
.sidemenu .nav-link:hover .category-arrow {
    display: inline-block;
}
.sidemenu .category-arrow svg {
    cursor: pointer;
}
</style>

<script>
let level = 0;
const wrapper = document.getElementById("menuWrapper");
let selectedCategory = null;

document.addEventListener("click", function(e){
    const back = e.target.closest(".back-menu");
    const arrow = e.target.closest(".category-arrow svg");

    if(back){
        e.preventDefault();
        level--;
        if(level < 0) level = 0;
        wrapper.style.transform = `translateX(-${level * 100}%)`;
    }

    if(arrow){
        e.preventDefault(); // Prevent redirect
        const link = arrow.closest("a");
        const categoryId = Number(link.dataset.categoryId);

        // Filter products by category
        const categoryProducts = products.filter(p => p.category_id === categoryId);

        if(categoryProducts.length > 0){
            selectedCategory = categoryId;
            showSizes(categoryId);
            level = 1; // Move to size menu
            wrapper.style.transform = `translateX(-${level * 100}%)`;
        }
    }
});

const products = @json($products);
const sizes = @json($sizes);

function showSizes(categoryId){
    const sizeList = document.getElementById("sizeList");
    sizeList.innerHTML = '';

    const categoryProducts = products.filter(p => p.category_id == categoryId);

    // Get unique size IDs
    let sizeIds = [];
    categoryProducts.forEach(p => {
        p.product_brand_size.forEach(pb => {
            const sizeNum = Number(pb.size_id);
            if(!sizeIds.includes(sizeNum)) sizeIds.push(sizeNum);
        });
    });

    const categorySizes = sizes.filter(s => sizeIds.includes(Number(s.id)));

    categorySizes.forEach(s => {
        const li = document.createElement('li');
        li.innerHTML = `
            <a href="#" class="nav-link d-inline-flex align-items-center next-menu"
               onclick="showProducts(${s.id})">
                ${s.name}
                <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                    <path d="M6 12L10 8L6 4" stroke="#333" stroke-width="1.5" stroke-linejoin="round"></path>
                </svg>
            </a>
        `;
        sizeList.appendChild(li);
    });
}

function showProducts(sizeId){
    const productList = document.getElementById("productList");
    productList.innerHTML = '';

    const filteredProducts = products.filter(p => {
        if(p.category_id != selectedCategory) return false;
        return p.product_brand_size.some(pb => Number(pb.size_id) === sizeId);
    });

    filteredProducts.forEach(p => {
        const li = document.createElement('li');
        li.innerHTML = `<a href="{{ url('products-details') }}/${p.url}" class="nav-link">${p.name}</a>`;
        productList.appendChild(li);
    });

    wrapper.style.transform = `translateX(-200%)`;
}
</script>

</body>
</html>