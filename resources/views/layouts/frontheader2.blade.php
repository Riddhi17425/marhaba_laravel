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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- Swiper CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/front/css/style.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('public/front/css/hero_style.css') }}">-->
    <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('public/front/css/hero_responsive.css') }}">-->
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
                <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                    <i class="fas fa-bars fs-3"></i>
                </button>
            </div>
        </div>

        <!-- Desktop Header -->
        <div class="d-none d-md-flex justify-content-between align-items-center heder_section">
            <div class="social_items">
                <!--<a href="#"><img src="{{ asset('public/front/img/facebook_icon.png') }}" alt="facebook" class="img-fluid"></a>-->
                <a href="#"><img src="{{ asset('public/front/img/linkedin_icon.png') }}" alt="linkedin" class="img-fluid color-head"></a>
                <a href="#"><img src="{{ asset('public/front/img/insta_icon.png') }}" alt="instagram" class="img-fluid color-head"></a>
                @if (url()->current() === url('landing'))
                    <a href="#">
                        <img src="{{ asset('public/front/img/Home/white-insta.svg') }}" 
                             alt="instagram" 
                             class="img-fluid white-head">
                    </a>
                
                    <a href="#">
                        <img src="{{ asset('public/front/img/Home/white-linkedin.svg') }}" 
                             alt="linkedin" 
                             class="img-fluid white-head">
                    </a>
                @else
                    {{-- Other pages icons --}}
                    <a href="#">
                        <img src="{{ asset('public/front/img/insta_icon.png') }}" 
                             alt="instagram" 
                             class="img-fluid white-head">
                    </a>
                
                    <a href="#">
                        <img src="{{ asset('public/front/img/linkedin_icon.png') }}" 
                             alt="linkedin" 
                             class="img-fluid white-head">
                    </a>
                @endif

            </div>
            <div class="text-center align-items-center mx-auto">
                <a href="{{ url('/') }}" class="me-4">
                    <img src="{{ asset('public/front/img/Home/logo-minimal.svg') }}" alt="logo" class="img-fluid nav_logo color-head" style="height:16px;">
                    @if (url()->current() === url('landing'))
                        <img src="{{ asset('public/front/img/Home/white-logo.svg') }}" alt="logo" class="img-fluid nav_logo white-head" style="height:60px;">
                    @else
                        <img src="{{ asset('public/front/img/purple-logo.svg') }}" alt="logo" class="img-fluid nav_logo white-head" style="height:60px;">
                    @endif
                </a>
            </div>
            @if (url()->current() === url('landing'))
            <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                <i class="fas fa-bars fs-3"></i>
            </button>
            @else
            <button class="btn p-0 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
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
    <button type="button" class="btn-close offcanvas_close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <div class="menu_container">
      <div class="menu_wrapper" id="menuWrapper">

        <!-- Level 1 -->
        <div class="menu_body">
          <ul class="list-unstyled sidemenu m-0 p-3">
            <!--<li><a href="{{ url('/') }}" class="nav-link">Home</a></li>-->
            <!--<li><a href="{{ route('about') }}" class="nav-link">About</a></li>-->

            @foreach($categories as $cat)
            <li>
                <a href="#" class="nav-link d-inline-flex align-items-center next-menu" onclick="showSizes({{ $cat->id }})">
                    {{ $cat->name }}
                    <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                      <path d="M6 12L10 8L6 4" stroke="#333" stroke-width="1.5" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </li>
            @endforeach

            <!--<li><a href="#" class="nav-link">Blogs</a></li>-->
            <!--<li><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>-->
          </ul>
        </div>

        <!-- Level 2 -->
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
            <img id="sizeImage" src="{{ asset('public/front/img/insta_kidswearpic.png') }}" alt="Size Image" class="img-fluid mb-4">
            <ul class="list-unstyled sidemenu m-0" id="sizeList">
              <!-- Sizes will be populated here dynamically -->
            </ul>
          </div>
        </div>

        <!-- Level 3 -->
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
            <img id="productImage" src="{{ asset('public/front/img/kidswear_wholesale.png') }}" alt="Product Image" class="img-fluid mb-4">
            <ul class="list-unstyled sidemenu m-0" id="productList">
              <!-- Products will be populated here dynamically -->
            </ul>
          </div>
        </div>

        <!-- Level 4: Sub-products for grouped names -->
        <div class="menu_body sidebar_submenu">
          <div class="p-3">
            <button class="btn px-0 back-menu" data-target="2">
              <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                <path d="M10 4L6 8L10 12" stroke="#333" stroke-width="1.5" stroke-linejoin="round"></path>
              </svg> Back
            </button>
            <div class="menu_heade_mt">
              <a href="#" class="menu_heading">Product Variants</a>
            </div>
            <img id="subProductImage" src="{{ asset('public/front/img/kidswear_wholesale.png') }}" alt="Sub-Product Image" class="img-fluid mb-4">
            <ul class="list-unstyled sidemenu m-0" id="subProductList">
              <!-- Sub-products will be populated here dynamically -->
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
</style>
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


<script>
let level = 0;
const wrapper = document.getElementById("menuWrapper");
const sidebar = document.getElementById("sidebarMenu");

let selectedCategory = null;
let selectedSize = null;
let selectedGroupName = null;

document.addEventListener("click", function(e){
  const next = e.target.closest(".next-menu");
  const back = e.target.closest(".back-menu");

  if(next){
    e.preventDefault();
    level++;
    wrapper.style.transform = `translateX(-${level * 100}%)`;
      const currentMenu = wrapper.querySelectorAll(".menu_body")[level];
    if (currentMenu) currentMenu.scrollTop = 0;
  }

  if(back){
    e.preventDefault();
    level--;
    if(level < 0) level = 0;
    wrapper.style.transform = `translateX(-${level * 100}%)`;
      const currentMenu = wrapper.querySelectorAll(".menu_body")[level];
    if (currentMenu) currentMenu.scrollTop = 0;
  }
});
sidebarMenu.addEventListener("hidden.bs.offcanvas", () => {
  // Reset to main menu
  level = 0;
  wrapper.style.transform = "translateX(0%)";

  // Scroll every submenu to top
  const allMenus = wrapper.querySelectorAll(".menu_body, .sidebar_submenu");
  allMenus.forEach(menu => {
    menu.scrollTop = 0; // instantly jump to top
  });
});

const products = @json($products);
const sizes = @json($sizes);
const menuImages = @json($menu_images);

function showSizes(categoryId){
    selectedCategory = categoryId;

    const sizeList = document.getElementById("sizeList");
    sizeList.innerHTML = '';

    // Set dynamic image for category (Layer 2)
    const categoryImage = menuImages.find(img => img.type === 'category' && img.reference_id == categoryId);
    const sizeImageElement = document.getElementById("sizeImage");
    sizeImageElement.src = categoryImage && categoryImage.image ? categoryImage.image : "{{ asset('public/front/img/insta_kidswearpic.png') }}";
    sizeImageElement.alt = categoryImage ? `Category ${categoryId} Image` : "Size Image";

    // Filter products by category
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
            <a href="#" class="nav-link d-inline-flex align-items-center next-menu" data-target="2"
               onclick="showProducts(${s.id})">
                ${s.name}
                <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                  <path d="M6 12L10 8L6 4" stroke="#333" stroke-width="1.5" stroke-linejoin="round"></path>
                </svg>
            </a>
        `;
        sizeList.appendChild(li);
    });

    wrapper.style.transform = `translateX(-100%)`;
}

function showProducts(sizeId){
    selectedSize = sizeId;
    const productList = document.getElementById("productList");
    productList.innerHTML = '';

    // Set dynamic image for size (Layer 3)
    const sizeImage = menuImages.find(img => img.type === 'size' && img.reference_id == sizeId);
    const productImageElement = document.getElementById("productImage");
    productImageElement.src = sizeImage && sizeImage.image ? sizeImage.image : "{{ asset('public/front/img/kidswear_wholesale.png') }}";
    productImageElement.alt = sizeImage ? `Size ${sizeId} Image` : "Product Image";

    const filteredProducts = products.filter(p => {
        if(p.category_id != selectedCategory) return false;
        return p.product_brand_size.some(pb => Number(pb.size_id) === sizeId);
    });

    // Group products by product_detail_name
    const grouped = {};
    filteredProducts.forEach(p => {
        if (!grouped[p.product_detail_name]) grouped[p.product_detail_name] = [];
        grouped[p.product_detail_name].push(p);
    });

    Object.keys(grouped).sort().forEach(detailName => {
        const group = grouped[detailName];
        const li = document.createElement('li');
        if (group.length === 1) {
            li.innerHTML = `<a href="{{ url('products-details') }}/${group[0].url}" class="nav-link">${detailName}</a>`;
        } else {
            li.innerHTML = `
                <a href="#" class="nav-link d-inline-flex align-items-center next-menu" onclick="showSubProducts('${detailName.replace(/'/g, "\\'")}')">
                    ${detailName}
                    <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                      <path d="M6 12L10 8L6 4" stroke="#333" stroke-width="1.5" stroke-linejoin="round"></path>
                    </svg>
                </a>
            `;
        }
        productList.appendChild(li);
    });

    wrapper.style.transform = `translateX(-200%)`;
}

function showSubProducts(groupName){
    selectedGroupName = groupName;
    const subProductList = document.getElementById("subProductList");
    subProductList.innerHTML = '';

    const filteredSub = products.filter(p => 
        p.category_id == selectedCategory && 
        p.product_detail_name === groupName && 
        p.product_brand_size.some(pb => Number(pb.size_id) === selectedSize)
    );

    // Set dynamic image for product (Layer 4)
    const productImage = menuImages.find(img => img.type === 'product' && img.reference_id == filteredSub[0]?.id);
    const subProductImageElement = document.getElementById("subProductImage");
    subProductImageElement.src = productImage && productImage.image ? productImage.image : "{{ asset('public/front/img/kidswear_wholesale.png') }}";
    subProductImageElement.alt = productImage ? `Product ${filteredSub[0]?.id} Image` : "Sub-Product Image";

    filteredSub.forEach(p => {
        const li = document.createElement('li');
        li.innerHTML = `<a href="{{ url('products-details') }}/${p.url}" class="nav-link">${p.name}</a>`;
        subProductList.appendChild(li);
    });

    wrapper.style.transform = `translateX(-300%)`;
}

</script>

</body>
</html>