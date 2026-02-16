<footer class="section_pt footer_section">
    <div class="container-fluid">
        <div class="row gx-md-4 mb-4 mb-md-5">
            <div class="col-md-4 text-start">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('public/front/img/Home/home_ft.svg') }}" alt="footer logo"
                        class="ft_logo img-fluid mb-xxl-5 mb-4">
                </a>
            </div>
            <div class="col-md-8">
                <p class="mb-0">
                    Since 1974, Najmuddin LLC has supplied thoughtfully designed children’s
                    apparel to retailers and boutique owners across the Middle East and Africa.
                    Blending regional aesthetics with practical durability, our collections are
                    made to last through childhood’s adventures.<a class="fw-bold"> marhabafashion.com</a>, operated by
                    Najmuddin, continues this tradition—offering commercially smart collections
                    with the integrity our partners have trusted for generations.
                </p>
            </div>
        </div>
        @php
        use App\Models\Category;

        $categories = Category::whereNull('deleted_at')->get();
        @endphp

        <div class="row align-items-center gx-md-4">
            <div class="col-md-12 d-flex justify-content-between text_ft_items">
                <div class="text_ft col-6 col-md-4 col-lg-2 ">
                    <div class="ft_menu">
                        <h3 class="ft_menu_title">Quick links</h3>
                        <ul class="ft_list">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <!--<li><a href="#">Blogs</a></li>-->
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="text_ft col-6 col-md-4 col-lg-2">
                    <div class="ft_menu">
                        <h3 class="ft_menu_title">Collections</h3>
                        {{-- <ul class="ft_list">
                            @foreach($categories as $category)
                                <li><a href="{{ route('products', $category->url) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul> --}}
                        <ul class="ft_list">
                            @php $collection = config('global_values.product_type') @endphp
                            @foreach($collection as $key => $val)
                                {{-- <li><a href="{{ route('products', $key) }}">{{ $val }}</a></li> --}}
                                <li><a href="{{ route('get.products', ['type' => $key]) }}">{{ $val }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!--<div class="text_ft col-6 col-md-4 col-lg-2">-->
                <!--    <div class="ft_menu">-->
                <!--        <h3 class="ft_menu_title">Resources</h3>-->
                <!--        <ul class="ft_list">-->
                <!--            <li><a href="{{ route('shippingpolicy') }}">Shipping Policy</a></li>-->
                <!--            <li><a href="#">Privacy Policy</a></li>-->
                <!--            <li><a href="#">Terms & Conditions</a></li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="text_ft col-6 col-md-4 col-lg-2">
                    <div class="ft_menu">
                        <h3 class="ft_menu_title">Follow Us</h3>
                        <div class="d-flex gap-3">
                            <a href="https://www.linkedin.com/company/marhaba-llc/" target="_blank">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M33.3352 0H2.65781C1.18828 0 0 1.16016 0 2.59453V33.3984C0 34.8328 1.18828 36 2.65781 36H33.3352C34.8047 36 36 34.8328 36 33.4055V2.59453C36 1.16016 34.8047 0 33.3352 0ZM10.6805 30.6773H5.33672V13.493H10.6805V30.6773ZM8.00859 11.1516C6.29297 11.1516 4.90781 9.76641 4.90781 8.05781C4.90781 6.34922 6.29297 4.96406 8.00859 4.96406C9.71719 4.96406 11.1023 6.34922 11.1023 8.05781C11.1023 9.75937 9.71719 11.1516 8.00859 11.1516ZM30.6773 30.6773H25.3406V22.3242C25.3406 20.3344 25.3055 17.768 22.5633 17.768C19.7859 17.768 19.3641 19.9406 19.3641 22.1836V30.6773H14.0344V13.493H19.1531V15.8414H19.2234C19.9336 14.4914 21.6773 13.0641 24.2719 13.0641C29.6789 13.0641 30.6773 16.6219 30.6773 21.2484V30.6773V30.6773Z" fill="#D7C7E9"/>
                                </svg>
                            </a>
                            <a  href="https://www.instagram.com/marhabafashionuae?igsh=cTluY2lzYTRpM2pp" target="_blank">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_266_1115)">
                                    <path d="M18 3.24141C22.8094 3.24141 23.3789 3.2625 25.2703 3.34687C27.0281 3.42422 27.9773 3.71953 28.6102 3.96563C29.4469 4.28906 30.0516 4.68281 30.6773 5.30859C31.3102 5.94141 31.6969 6.53906 32.0203 7.37578C32.2664 8.00859 32.5617 8.96484 32.6391 10.7156C32.7234 12.6141 32.7445 13.1836 32.7445 17.9859C32.7445 22.7953 32.7234 23.3648 32.6391 25.2563C32.5617 27.0141 32.2664 27.9633 32.0203 28.5961C31.6969 29.4328 31.3031 30.0375 30.6773 30.6633C30.0445 31.2961 29.4469 31.6828 28.6102 32.0062C27.9773 32.2523 27.0211 32.5477 25.2703 32.625C23.3719 32.7094 22.8023 32.7305 18 32.7305C13.1906 32.7305 12.6211 32.7094 10.7297 32.625C8.97188 32.5477 8.02266 32.2523 7.38984 32.0062C6.55313 31.6828 5.94844 31.2891 5.32266 30.6633C4.68984 30.0305 4.30312 29.4328 3.97969 28.5961C3.73359 27.9633 3.43828 27.007 3.36094 25.2563C3.27656 23.3578 3.25547 22.7883 3.25547 17.9859C3.25547 13.1766 3.27656 12.607 3.36094 10.7156C3.43828 8.95781 3.73359 8.00859 3.97969 7.37578C4.30312 6.53906 4.69688 5.93437 5.32266 5.30859C5.95547 4.67578 6.55313 4.28906 7.38984 3.96563C8.02266 3.71953 8.97891 3.42422 10.7297 3.34687C12.6211 3.2625 13.1906 3.24141 18 3.24141ZM18 0C13.1133 0 12.5016 0.0210937 10.582 0.105469C8.66953 0.189844 7.35469 0.499219 6.21563 0.942187C5.02734 1.40625 4.02188 2.01797 3.02344 3.02344C2.01797 4.02187 1.40625 5.02734 0.942188 6.20859C0.499219 7.35469 0.189844 8.6625 0.105469 10.575C0.0210938 12.5016 0 13.1133 0 18C0 22.8867 0.0210938 23.4984 0.105469 25.418C0.189844 27.3305 0.499219 28.6453 0.942188 29.7844C1.40625 30.9727 2.01797 31.9781 3.02344 32.9766C4.02188 33.975 5.02734 34.5937 6.20859 35.0508C7.35469 35.4937 8.6625 35.8031 10.575 35.8875C12.4945 35.9719 13.1062 35.993 17.993 35.993C22.8797 35.993 23.4914 35.9719 25.4109 35.8875C27.3234 35.8031 28.6383 35.4937 29.7773 35.0508C30.9586 34.5937 31.9641 33.975 32.9625 32.9766C33.9609 31.9781 34.5797 30.9727 35.0367 29.7914C35.4797 28.6453 35.7891 27.3375 35.8734 25.425C35.9578 23.5055 35.9789 22.8937 35.9789 18.007C35.9789 13.1203 35.9578 12.5086 35.8734 10.5891C35.7891 8.67656 35.4797 7.36172 35.0367 6.22266C34.5938 5.02734 33.982 4.02187 32.9766 3.02344C31.9781 2.025 30.9727 1.40625 29.7914 0.949219C28.6453 0.50625 27.3375 0.196875 25.425 0.1125C23.4984 0.0210938 22.8867 0 18 0Z" fill="#D7C7E9"/>
                                    <path d="M18 8.75391C12.8953 8.75391 8.75391 12.8953 8.75391 18C8.75391 23.1047 12.8953 27.2461 18 27.2461C23.1047 27.2461 27.2461 23.1047 27.2461 18C27.2461 12.8953 23.1047 8.75391 18 8.75391ZM18 23.9977C14.6883 23.9977 12.0023 21.3117 12.0023 18C12.0023 14.6883 14.6883 12.0023 18 12.0023C21.3117 12.0023 23.9977 14.6883 23.9977 18C23.9977 21.3117 21.3117 23.9977 18 23.9977Z" fill="#D7C7E9"/>
                                    <path d="M29.7703 8.38809C29.7703 9.5834 28.8 10.5467 27.6117 10.5467C26.4164 10.5467 25.4531 9.57637 25.4531 8.38809C25.4531 7.19277 26.4234 6.22949 27.6117 6.22949C28.8 6.22949 29.7703 7.19981 29.7703 8.38809Z" fill="#D7C7E9"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_266_1115">
                                    <rect width="36" height="36" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text_ft col-12 col-md-12 col-lg-4 mt-md-0 mt-3">
                    <div class="d-flex flex-md-row  flex-column  gap-md-4 gap-3">
                        <div class="text-md-center">
                            <p class="mb-0">2883595863</p>
                            <img src="{{ asset('public/front/img/Home/home_qr.svg') }}" alt="Isolation Mode"
                                class="img-fluid">
                            <p class="mb-0">2883595863</p>
                        </div>
                        <div>
                            <b>Address :</b>
                            <p><a href="https://maps.app.goo.gl/yNsyj9FukmZHos4K9">Shop No. 2 & 3, Maeen Hotel Building
                                Murshid Bazar, Deira, Dubai – U.A.E</a></p>
                            <p><b>Landline:</b> <a href="tel:+97142264582" class="">+971 4 226 4582</a></p>
                            <p><b>Email:</b> <a href="mailto:info@marhabafashion.com" class="">info@marhabafashion.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <p class="mb-0">© {{ date('Y') }} Najmuddin Trading Co. LLC. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<div class="float-buttons">
    <div class="WhatsAppButton">
        <a href="https://api.whatsapp.com/send?phone=97142264582&text=Hello,%20I%27m%20visiting%20your%20website%20and%20would%20like%20to%20know%20more%22" id="whatsapp" aria-label="WhatsApp +971 4 226 4582" rel="nofollow" target="_blank">
            <i class="fab fa-whatsapp"></i>
            <span>WhatsApp<br><small>+971 4 226 4582</small></span>
        </a>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>





<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var sitePath = "{{ url('/') }}";
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollSmoother.min.js"></script>
<script src="{{ asset('public/front/js/main.js') }}"></script>
<script src="{{ asset('public/front/js/home.js') }}"></script>

