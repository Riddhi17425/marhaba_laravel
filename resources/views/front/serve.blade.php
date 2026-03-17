@include('layouts.frontheader')
<link rel="stylesheet" href="{{ asset('public/front/css/hero_style.css') }}">
<link rel="stylesheet" href="{{ asset('public/front/css/hero_responsive.css') }}">
<section class="banner_head_section section_gradientbg  ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                    <ol class="breadcrumb  justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Who we Serve</li>
                    </ol>
                </nav>
                <h2 class="mean_head scroll-text" data-animate-on-scroll>Who We Serve</h2>
            </div>
        </div>
    </div>
</section>
<section class="section_pt">
    <div class="container">
        <div class="serve_grid">
            <div>
                <img src="{{ asset('public/front/img/wws-1.png') }}" alt="Wholesale Distributors" class="img-fluid">
            </div>
            <div>
                <h2 class="title_48lora">Wholesale Distributors</h2>
                <h3 class="title_24-raleway">One Source. Your Entire Children's Range.</h3>
                <p class="mb-0">The strongest wholesale partnerships are built on breadth, reliability, and a supplier who delivers
                    both consistently. Our in-house brands span infant essentials through teenage fashion — giving
                    wholesale distributors and import merchants a complete children's range from a single, trusted
                    source in Dubai. Fewer complications and more confidence when serving your retail network. Season
                    after season.</p>
            </div>
        </div>
    </div>
</section>
<section class="section_pt">
    <div class="container">
        <div class="serve_grid serve_grid_2">
            <div>
                <h2 class="title_48lora">Children's Clothing Stores</h2>
                <h3 class="title_24-raleway">Styles That Sell. Stock That's There When You Need It.</h3>
                <p class="mb-0">Children's boutiques, baby stores, specialty stores, and fashion chains all share the same challenge — keeping the floor fresh without taking on unnecessary risk. Our range spans boys and girls from newborn to 14 years, with pre-mixed sizing assortments that take the guesswork out of buying. New styles arrive each season. Restocking is fast. The quality keeps customers coming back.</p>
            </div>
            <div>
                <img src="{{ asset('public/front/img/wws-2.png') }}" alt="Children's Clothing Stores" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="section_pt">
    <div class="container">
        <div class="serve_grid">
            <div>
                <img src="{{ asset('public/front/img/wws-3.png') }}" alt="Department Stores" class="img-fluid">
            </div>
            <div>
                <h2 class="title_48lora">Department Stores</h2>
                <h3 class="title_24-raleway">Baby to 14 Years. One Supplier.</h3>
                <p class="mb-0">Marhaba is built for the scale and consistency that department stores, supermarkets, hypermarkets, and retail chains demand. Three complementary brands cover the full children's section — Baby Starters' infant essentials, My Melody's everyday casualwear, and Smart Kids' fashion and occasionwear. One supplier, one standard of quality, across every location and every order.</p>
            </div>
        </div>
    </div>
</section>
<section class="section_pt section_mb">
    <div class="container">
        <div class="serve_grid serve_grid_2">
            <div>
                <h2 class="title_48lora">Online Sellers</h2>
                <h3 class="title_24-raleway">Stock You Can List With Confidence.</h3>
                <p class="mb-0">Reputation is everything in online retail. Our attractive designs, reliable quality, and ready-to-use product photography give e-commerce retailers, marketplace sellers, and social commerce sellers the foundation to build exactly that. Stock replenishes quickly from Dubai, listings stay accurate, and customers receive what they were shown — the kind of reliability that turns first-time buyers into repeat ones.</p>
            </div>
            <div>
                <img src="{{ asset('public/front/img/wws-4.png') }}" alt="Online Sellers" class="img-fluid">
            </div>
        </div>
    </div>
</section>

@include('layouts.frontfooter')