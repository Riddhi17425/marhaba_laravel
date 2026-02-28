@include('layouts.frontheader')
<link rel="stylesheet" href="{{ asset('public/front/css/hero_style.css') }}">
<link rel="stylesheet" href="{{ asset('public/front/css/product_slider.css') }}">
<link rel="stylesheet" href="{{ asset('public/front/css/hero_responsive.css') }}">
<script src="https://unpkg.com/@zoom-image/core"></script>
@php 
            $productImages = json_decode($product->product_brand_size);
    $filteredImages = collect($productImages)->values();
@endphp

<section class="product_detail_intro">
    <div>
        <div class="product-slider">
            <div class="slider-wrapper">
                <div class="slides-track" id="track">
                    <div class="slide">
                        <div class="image-container">
                            <img src="{{ asset('public/product_images/' . $filteredImages[0]->product_image) }}"
                                class="product-img" alt="{{ $product->name }}" draggable="false">
                            {{-- <img src="{{ asset('public/front/img/product-detail/pd_1.png') }}" class="product-img"
                                alt="View 1" draggable="false"> --}}
                        </div>
                    </div>
                    @foreach($filteredImages as $k => $v)
                        @if($k == 6)
                            @break
                        @endif
                        <div class="slide">
                            <div class="image-container">
                                <img src="{{ asset('public/product_images/' . $v->product_image) }}" class="product-img"
                                    alt="{{ $product->name ?? 'Product Image' }}" draggable="false">
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="slide">
                        <div class="image-container"><img src="{{ asset('public/front/img/product-detail/pd_2.png') }}"
                                class="product-img" alt="View 2" draggable="false"></div>
                    </div>
                    <div class="slide">
                        <div class="image-container"><img src="{{ asset('public/front/img/product-detail/pd_3.png') }}"
                                class="product-img" alt="View 3" draggable="false"></div>
                    </div>
                    <div class="slide">
                        <div class="image-container"><img src="{{ asset('public/front/img/product-detail/pd_4.png') }}"
                                class="product-img" alt="View 4" draggable="false"></div>
                    </div>
                    <div class="slide">
                        <div class="image-container"><img src="{{ asset('public/front/img/product-detail/pd_5.png') }}"
                                class="product-img" alt="View 5" draggable="false"></div>
                    </div>
                    <div class="slide">
                        <div class="image-container"><img src="{{ asset('public/front/img/product-detail/pd_3.png') }}"
                                class="product-img" alt="View 6" draggable="false"></div>
                    </div> --}}
                </div>


            </div>

            <div class="slid_bottom">
                <div class="thumbnails" id="thumbs"></div>
                <button class="slider_btn prev" id="prevBtn">‹</button>
                <button class="slider_btn next" id="nextBtn">›</button>
            </div>
            <div class="slid_pagination_number">
                <button class="slider_btn prev" id="prevBtn2">‹</button>
                <span id="slideCounter">1 / 6</span>
                <button class="slider_btn next" id="nextBtn2">›</button>
            </div>
        </div>
        <!-- banner -->
        <div class="filter_banner">
            Select designs. Contact us for full collection.
        </div>
    </div>
</section>
<!-- prod-info -->
<section class="section_mt">
    <div class="ym-container">
        <div class="product_detail_grid">
            <div class="pd_left">
                <div>
                    <h1 class="pd_name raleway_24">{{ $product->name }}</h1>
                </div>
                <div>
                    <div class="range_table_head">
                        <p style="font-weight:500;">Size Assortment : {{ $smallest[0] ?? '' }}-{{$largest[1] ?? ''}}</p>
                        <a class="btn_1" data-bs-toggle="modal" data-bs-target="#size_popup">Product
                            Assortment</a>
                    </div>
                    <table class="range-table">
                        <tr>
                            @foreach($sizeList as $size)
                                <td>{{ $size->name }}</td>
                            @endforeach
                            {{-- <td>0m-3m</td>
                            <td>3m-6m</td>
                            <td>6m-9m</td> --}}
                        </tr>
                    </table>
                    <p class="pd_note">3 sizes premixed per dozen (12 pc pack)</p>
                </div>
                <div>
                    <section class="age_range_section">
                        <div class="age_range_box" style="background-color: rgb(239, 230, 240);">
                            <div class="age-card">
                                <p class="raleway_14 mb-0">MOQ</p>
                                <h3 class="fs_18">12 sets per design</h3>
                            </div>
                        </div>
                        <div class="age_range_box" style="background-color: rgb(243, 242, 231);">
                            <div class="age-card">
                                {{-- <img src="{{ asset('public/brand_images/smart_kids.png') }}" alt="" width="114"
                                    height="47"> --}}
                                <img loading="lazy" src="{{ asset('public/brand_images/' . $product->brand->image) }}"
                                    alt="{{ $product->brand->name }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="age_range_box" style="background-color: rgb(230, 239, 242);">
                            <div class="age-card">
                                <p class="raleway_14 mb-0">{{ ucfirst($product->type ?? '') }}</p>
                                <h3 class="fs_18">{{ $product->category->name ?? '' }}</h3>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="pd_right">
                <div>
                    @php
                        $message = "Hello, I'm visiting your website and would like to know more about " . $product->name;
                        $whatsappUrl = "https://api.whatsapp.com/send?phone=971569233052&text=" . urlencode($message);
                    @endphp
                    <a href="{{ $whatsappUrl }}" class="get_price">
                        <svg class="me-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.9731 2.57392C13.5045 1.10247 11.5543 0.200085 9.4741 0.0295217C7.39392 -0.141041 5.32078 0.43145 3.62861 1.64373C1.93644 2.85601 0.736645 4.62828 0.245641 6.64086C-0.245363 8.65343 0.00474622 10.7738 0.950854 12.6196L0.022131 17.0926C0.0124945 17.1371 0.0122216 17.1832 0.0213294 17.2278C0.0304373 17.2724 0.0487298 17.3147 0.0750631 17.352C0.11364 17.4086 0.168705 17.4522 0.232906 17.4769C0.297107 17.5017 0.367388 17.5064 0.434362 17.4904L4.85341 16.4513C6.70871 17.3662 8.83101 17.5983 10.8427 17.1065C12.8543 16.6147 14.6248 15.4308 15.8392 13.7655C17.0536 12.1003 17.633 10.0616 17.4744 8.01221C17.3158 5.96287 16.4295 4.0358 14.9731 2.57392ZM13.5953 13.4836C12.5792 14.4888 11.2707 15.1524 9.85434 15.3808C8.43796 15.6091 6.98504 15.3909 5.70033 14.7566L5.08439 14.4543L2.37522 15.0908L2.38324 15.0574L2.94464 12.3522L2.64309 11.7619C1.98666 10.4829 1.7551 9.0307 1.98157 7.6132C2.20804 6.19571 2.88093 4.88569 3.90384 3.8708C5.18914 2.59611 6.93215 1.88002 8.74956 1.88002C10.567 1.88002 12.31 2.59611 13.5953 3.8708C13.6062 3.88325 13.618 3.89495 13.6306 3.90581C14.8999 5.18379 15.6086 6.90778 15.602 8.70193C15.5953 10.4961 14.874 12.2149 13.5953 13.4836Z"
                                fill="white" />
                            <path
                                d="M13.3539 11.4996C13.0218 12.0184 12.4973 12.6533 11.8381 12.8108C10.6832 13.0877 8.91076 12.8204 6.70525 10.7804L6.67798 10.7565C4.73873 8.97269 4.23507 7.48804 4.35697 6.3105C4.42434 5.64217 4.98575 5.03749 5.45893 4.64286C5.53374 4.57952 5.62245 4.53442 5.71797 4.51117C5.81349 4.48793 5.91317 4.48718 6.00903 4.50898C6.10489 4.53078 6.19429 4.57454 6.27006 4.63674C6.34583 4.69895 6.40587 4.77788 6.4454 4.86722L7.15918 6.45849C7.20557 6.56167 7.22276 6.67543 7.20891 6.78756C7.19506 6.8997 7.1507 7.00598 7.08059 7.095L6.71968 7.55964C6.64224 7.65559 6.59552 7.77232 6.58551 7.89483C6.57551 8.01734 6.60268 8.14001 6.66354 8.24707C6.86565 8.59874 7.35006 9.1159 7.8874 9.59487C8.49051 10.1359 9.15939 10.6308 9.58284 10.7995C9.69615 10.8454 9.82073 10.8566 9.94052 10.8316C10.0603 10.8067 10.1698 10.7467 10.2549 10.6594L10.6736 10.2409C10.7544 10.1619 10.8548 10.1055 10.9647 10.0776C11.0746 10.0496 11.19 10.0511 11.2991 10.0818L12.9946 10.5592C13.0881 10.5876 13.1738 10.6369 13.2452 10.7033C13.3166 10.7697 13.3717 10.8514 13.4064 10.9421C13.441 11.0329 13.4543 11.1303 13.4452 11.2269C13.4361 11.3235 13.4049 11.4168 13.3539 11.4996Z"
                                fill="white" />
                        </svg>
                        Get Wholesale Pricing</a>
                </div>
                <div class="pd_right">
                    <div class="accordion" id="accordionExample">

                        <!-- Product Information -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed raleway_24 ps-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="false"
                                    aria-controls="collapseProduct">
                                    Product Information
                                </button>
                            </h2>
                            <div id="collapseProduct" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $product->description ?? '' !!}
                                </div>
                            </div>
                        </div>

                        <!-- Buyer Information -->
                        <div class="accordion-item pd_small_acc rounded-0">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed raleway_24 ps-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseBuyer" aria-expanded="false"
                                    aria-controls="collapseBuyer">
                                    Buyer Information
                                </button>
                            </h2>
                            <div id="collapseBuyer" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h6>Packaging & Sizing</h6>
                                    <ul class="pd_list">
                                        <li>Export-ready packaging: Each set with hanger and protective sleeve</li>
                                        <li>Premixed sizing: Balanced distribution for retail coverage</li>
                                        <li>12 sets per design in single or pre-assorted colours</li>
                                    </ul>
                                    <!-- <a class="prod_detail_a" data-bs-toggle="modal"
                                        data-bs-target="#size_popup">Standard 12-Piece Assortment</a> -->
                                    <h6>Delivery & Shipping</h6>
                                    <ul class="pd_list">
                                        <li>Dubai: Delivered within 1-3 days after order confirmation</li>
                                        <li>Small orders: Collection can be arranged from showroom</li>
                                        <li>Custom orders: Lead time varies—contact for details</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="pd_social">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.25391 0C10.4439 0 12.5036 0.850176 14.0527 2.39941L14.332 2.69043C14.9655 3.3864 15.4743 4.18809 15.835 5.05957C16.2468 6.05488 16.4564 7.12209 16.4531 8.19922C16.4531 12.7161 12.779 16.3906 8.26172 16.3906C6.95495 16.3906 5.67739 16.0808 4.52246 15.4844L0.626953 16.5078C0.45406 16.5532 0.270172 16.5021 0.144531 16.375C0.0190176 16.248 -0.0295968 16.0638 0.0175781 15.8916L1.05859 12.1045C0.451935 10.9851 0.114441 9.73983 0.0742188 8.46777L0.0703125 8.19922C0.0626641 3.67418 3.73736 9.49023e-05 8.25391 0ZM8.25391 1C4.2897 1.00009 1.06321 4.22618 1.07031 8.19824V8.2002C1.0687 9.46072 1.39997 10.6998 2.0293 11.792C2.09575 11.9076 2.11346 12.0452 2.07812 12.1738L1.21191 15.3193L4.45703 14.4688L4.55078 14.4531C4.64522 14.4468 4.74006 14.4676 4.82422 14.5137C5.87674 15.0907 7.05419 15.3906 8.26172 15.3906C12.2268 15.3906 15.4531 12.1638 15.4531 8.19922V8.19824C15.4562 7.2527 15.2717 6.3151 14.9102 5.44141C14.5487 4.56807 14.0177 3.77506 13.3477 3.1084L13.3467 3.10742C11.9856 1.74593 10.1799 1 8.25391 1ZM5.90723 4.14746L5.98145 4.14844C6.07487 4.15289 6.21989 4.17272 6.36816 4.25781C6.56527 4.37102 6.69693 4.55554 6.79199 4.77051H6.79297C6.88409 4.97311 7.02377 5.31667 7.1416 5.6084C7.2016 5.75693 7.25667 5.89373 7.2998 5.99902L7.3623 6.15234L7.37109 6.16895C7.45069 6.32822 7.55026 6.6246 7.3877 6.95117C7.3839 6.95879 7.37918 6.96622 7.375 6.97363C7.33936 7.03682 7.25982 7.21443 7.125 7.37305L7.12402 7.375C7.07353 7.43386 6.97273 7.55375 6.88281 7.6543C7.02265 7.87247 7.26486 8.22933 7.58887 8.55859L7.77344 8.7334V8.73438C8.37265 9.26971 8.86206 9.4605 9.12402 9.57422C9.17871 9.51172 9.25018 9.4326 9.32129 9.34668C9.44477 9.19748 9.54981 9.06286 9.59375 8.99414L9.59863 8.98535C9.71573 8.81005 9.895 8.65518 10.1533 8.62598C10.3533 8.60342 10.5363 8.67229 10.6084 8.69727H10.6104C10.7356 8.74103 11.0511 8.89295 11.3154 9.02148L11.9756 9.34473L11.998 9.35645C12.0375 9.37786 12.0752 9.39635 12.1143 9.41602C12.1505 9.4343 12.1958 9.4573 12.2363 9.47949C12.2827 9.50487 12.3832 9.55939 12.4727 9.65527L12.5566 9.76562V9.7666C12.6026 9.84369 12.622 9.91854 12.6309 9.95898C12.6414 10.007 12.6471 10.0554 12.6504 10.0986C12.6569 10.1854 12.6559 10.2826 12.6475 10.3838C12.6303 10.5878 12.582 10.8393 12.4893 11.1035L12.4883 11.1074C12.3482 11.4949 11.9921 11.7897 11.709 11.9717C11.4544 12.1353 11.1474 12.2778 10.8838 12.332L10.7744 12.3506C10.6275 12.3671 10.3819 12.4203 9.97656 12.3662C9.58851 12.3144 9.05622 12.1685 8.22754 11.8418L8.22656 11.8408C7.15089 11.4146 6.29228 10.6607 5.70117 10.0195C5.40332 9.69642 5.16682 9.39558 4.99902 9.16699C4.91496 9.05247 4.84867 8.95539 4.7998 8.88379C4.77565 8.8484 4.75535 8.81879 4.74121 8.79785C4.73099 8.78271 4.72555 8.77528 4.72363 8.77246V8.77148C4.66842 8.69795 4.45381 8.4121 4.25195 8.01367C4.05193 7.61886 3.8418 7.07113 3.8418 6.48535C3.84192 5.33096 4.46262 4.74332 4.64746 4.54297C4.9385 4.22649 5.29351 4.13965 5.53125 4.13965C5.65006 4.13965 5.78045 4.1404 5.90723 4.14746ZM5.51367 5.1416C5.50393 5.14343 5.49179 5.14611 5.47852 5.15137C5.45282 5.16159 5.41853 5.18082 5.38281 5.21973V5.2207C5.20721 5.41105 4.84191 5.74714 4.8418 6.48535C4.8418 6.84657 4.97687 7.2306 5.14453 7.56152C5.22671 7.72373 5.31139 7.86318 5.38086 7.96875L5.52441 8.17285L5.52539 8.17383C5.65682 8.34975 6.80162 10.2006 8.59473 10.9111L9.12988 11.1113C9.60446 11.2774 9.90606 11.3469 10.1094 11.374C10.3628 11.4078 10.458 11.3794 10.6631 11.3564H10.6641C10.7311 11.349 10.9394 11.2784 11.1689 11.1309C11.4061 10.9784 11.5238 10.8341 11.5479 10.7676C11.6102 10.5885 11.6391 10.4232 11.6494 10.3018C11.6184 10.2861 11.5826 10.2677 11.5439 10.2471L10.8779 9.9209C10.7379 9.85279 10.6001 9.78605 10.4873 9.7334C10.4309 9.70708 10.3822 9.6849 10.3438 9.66797C10.3424 9.66737 10.3412 9.66659 10.3398 9.66602C10.1585 9.91148 9.87121 10.2486 9.77051 10.3564L9.76855 10.3555C9.6607 10.4743 9.50328 10.5915 9.28418 10.6172C9.08115 10.6408 8.90367 10.576 8.77344 10.5117C8.61368 10.4354 7.91006 10.1964 7.1084 9.48047L6.88086 9.26465C6.37654 8.75292 6.04494 8.20272 5.94434 8.04199C5.93993 8.03494 5.93569 8.02777 5.93164 8.02051C5.82485 7.82891 5.77855 7.60212 5.8623 7.37207C5.92522 7.19938 6.04625 7.08245 6.10156 7.03125L6.36328 6.72559C6.38362 6.70166 6.39721 6.68163 6.41406 6.65137C6.42426 6.63305 6.43361 6.61382 6.44922 6.58398C6.45179 6.57906 6.45423 6.57368 6.45703 6.56836C6.4314 6.51179 6.39942 6.43992 6.37402 6.37793C6.32964 6.26959 6.27312 6.12911 6.21387 5.98242C6.09315 5.68356 5.96214 5.36139 5.88086 5.18066L5.87891 5.17676C5.87346 5.16435 5.86685 5.15454 5.8623 5.14551C5.76762 5.13974 5.66255 5.13965 5.53125 5.13965H5.52637C5.52332 5.13993 5.51857 5.14069 5.51367 5.1416Z"
                                fill="#452667" />
                        </svg>
                        <span><a href="">WhatsApp Catalogue: +971 56 923 3052</a></span>

                    </div>
                    <div class="pd_social">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.5707 5.42019C12.3064 5.56373 12.9825 5.92355 13.5126 6.45359C14.0426 6.98363 14.4024 7.65978 14.546 8.39549M11.5707 2.40723C13.0992 2.57703 14.5246 3.26153 15.6127 4.34833C16.7009 5.43514 17.3872 6.85964 17.5589 8.38796M8.69101 11.343C7.78593 10.4379 7.07127 9.41451 6.54701 8.3226C6.50192 8.22868 6.47937 8.18172 6.46205 8.12229C6.40049 7.91112 6.44471 7.65181 6.57277 7.47297C6.6088 7.42264 6.65186 7.37959 6.73796 7.29349C7.0013 7.03015 7.13297 6.89848 7.21905 6.76608C7.5437 6.26676 7.54369 5.62305 7.21905 5.12374C7.13297 4.99134 7.0013 4.85967 6.73796 4.59633L6.59118 4.44955C6.19087 4.04924 5.99072 3.84909 5.77576 3.74036C5.34825 3.52413 4.84338 3.52413 4.41587 3.74036C4.20091 3.84909 4.00076 4.04924 3.60045 4.44955L3.48171 4.56828C3.08278 4.96722 2.88331 5.16668 2.73097 5.43787C2.56193 5.7388 2.44039 6.20618 2.44141 6.55133C2.44234 6.86238 2.50268 7.07496 2.62335 7.50012C3.27187 9.785 4.49549 11.941 6.29421 13.7398C8.09294 15.5385 10.249 16.7621 12.5339 17.4106C12.959 17.5313 13.1716 17.5916 13.4827 17.5926C13.8278 17.5936 14.2952 17.4721 14.5961 17.303C14.8673 17.1507 15.0668 16.9512 15.4657 16.5523L15.5844 16.4335C15.9847 16.0332 16.1849 15.8331 16.2936 15.6181C16.5099 15.1906 16.5099 14.6857 16.2936 14.2582C16.1849 14.0433 15.9847 13.8431 15.5844 13.4428L15.4377 13.296C15.1743 13.0327 15.0427 12.901 14.9102 12.8149C14.4109 12.4903 13.7672 12.4903 13.2679 12.8149C13.1355 12.901 13.0038 13.0327 12.7405 13.296C12.6544 13.3821 12.6113 13.4252 12.561 13.4612C12.3822 13.5893 12.1229 13.6335 11.9117 13.5719C11.8523 13.5546 11.8053 13.5321 11.7114 13.487C10.6195 12.9627 9.59609 12.2481 8.69101 11.343Z"
                                stroke="#452667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span><a href="tel:971 4 226 4582">Phone: +971 4 226 4582</a></span>

                    </div>
                    <div class="pd_social">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_452_826)">
                                <path
                                    d="M16.4294 7.14244C16.4294 10.6996 10.0008 19.2853 10.0008 19.2853C10.0008 19.2853 3.57227 10.6996 3.57227 7.14244C3.57227 5.43748 4.24956 3.80234 5.45515 2.59675C6.66074 1.39116 8.29587 0.713867 10.0008 0.713867C11.7058 0.713867 13.3409 1.39116 14.5465 2.59675C15.7521 3.80234 16.4294 5.43748 16.4294 7.14244V7.14244Z"
                                    stroke="#452667" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M10.0003 9.28571C11.1837 9.28571 12.1431 8.32632 12.1431 7.14286C12.1431 5.95939 11.1837 5 10.0003 5C8.81681 5 7.85742 5.95939 7.85742 7.14286C7.85742 8.32632 8.81681 9.28571 10.0003 9.28571Z"
                                    stroke="#452667" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_452_826">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span><a href="https://maps.app.goo.gl/yNsyj9FukmZHos4K9">Showroom: Murshid Bazaar, Deira, Dubai</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pd_view hero_cat yellow-gradient home_mt-100">
    <div class="ym-container">
        <div class="hero_catologue_head col-lg-6 mb-0">
            <h2 class="title_60lora text-center">View Our Catalogues</h2>
            <p class="title_24-raleway mt-4 mt-xl-5">Stay updated on our newest arrivals. Select your
                preferred products and our wholesale team will be in touch with curated children's clothing
                collections for your business.
            </p>
            <div class="btn_wrapper">
                <a href="javascript:void(0)" class="btn_1">Request Latest Catalogues <img loading="lazy"
                        src="http://localhost/marhaba_laravel/public/front/img/Home/blue-arr.svg" alt="" height="10"
                        width="10"></a>
            </div>
        </div>
    </div>
</section>
<!-- old section -->
<section class="home_mt-100 section_mb">
    <div class="ym-container">
        <div class="row">
            <h2 class="mean_head text-center scroll-text mb-4" data-animate-on-scroll>Similar Products</h2>
            <div class="simple-slider">
                @forelse($similarProducts as $simProduct)
                    @php
                        //$brand = $brands[$simProduct['brand_id']] ?? null;
                        $image = $simProduct['image'] ? asset('public/product_images/' . $simProduct['image']) : asset('public/front/img/product_detail_boy.png');
                    @endphp
                    <div class="col-md-3">
                        <div class="product_wrapper">
                            <div class="">
                                <a href="{{ route('productdetails', $simProduct['url']) }}">
                                    <img src="{{ $image }}" alt="{{ $simProduct['name'] }}" class="img-fluid" />
                                </a>
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
@include('layouts.size-popup')
@include('layouts.frontfooter')

<!-- slider js -->
<script>
    // ── Core slider logic ────────────────────────────────────────────────────
    const track = document.getElementById('track');
    const slides = Array.from(track.children);
    const total = slides.length;
    let currentIndex = 0;
    let isDoubleMode = false;
    let isDesktop = window.innerWidth >= 1200;

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    // ── Config ────────────────────────────────────────────────────────────────
    const AUTOPLAY_SPEED = 3000; // ms between slides
    let autoplayTimer = null;

    // Pagination counter
    const slideCounter = document.getElementById('slideCounter');

    function updateCounter() {
        if (slideCounter) slideCounter.textContent = `${currentIndex + 1} / ${total}`;
    }

    // ── Autoplay ──────────────────────────────────────────────────────────────
    function startAutoplay() {
        stopAutoplay();
        autoplayTimer = setInterval(() => goNext(), AUTOPLAY_SPEED);
    }

    function stopAutoplay() {
        if (autoplayTimer) {
            clearInterval(autoplayTimer);
            autoplayTimer = null;
        }
    }

    function resetAutoplay() {
        stopAutoplay();
        startAutoplay();
    }

    // Thumbnails setup
    const thumbsContainer = document.getElementById('thumbs');
    slides.forEach((_, i) => {
        const thumb = document.createElement('div');
        thumb.className = 'thumb';
        thumb.innerHTML = `<img src="${slides[i].querySelector('img').src}" alt="">`;
        thumb.dataset.index = i;
        thumbsContainer.appendChild(thumb);
    });
    const thumbs = Array.from(thumbsContainer.children);

    function updateThumbs() {
        const active = isDesktop && isDoubleMode
            ? [currentIndex, currentIndex + 1]
            : [currentIndex];
        thumbs.forEach((t, i) => t.classList.toggle('active', active.includes(i % total)));
    }

    function positionSlides(animate = true) {
        slides.forEach((slide, i) => {
            let left = '100%';
            let w = isDesktop ? '50%' : '100%';

            if (!isDesktop) {
                left = (i === currentIndex) ? '0%' : (i < currentIndex ? '-100%' : '100%');
                w = '100%';
            } else if (isDoubleMode) {
                if (i === currentIndex) { left = '0%'; w = '50%'; }
                else if (i === currentIndex + 1) { left = '50%'; w = '50%'; }
                else if (i < currentIndex) { left = '-50%'; w = '50%'; }
                else { left = '100%'; w = '50%'; }
            } else {
                left = (i === currentIndex) ? '0%' : (i < currentIndex ? '-100%' : '100%');
                w = '100%';
            }

            slide.style.transition = animate ? '' : 'none';
            slide.style.left = left;
            slide.style.width = w;
        });
        updateThumbs();
        updateCounter();
    }

    // ── Wrap forward: exit last slide(s) LEFT, slide 0 enters from RIGHT ──────
    function wrapToStart() {
        // 1. Animate exit of current visible slide(s) to the left
        if (isDesktop && isDoubleMode) {
            slides[currentIndex].style.transition = '';
            slides[currentIndex].style.width = '50%';
            slides[currentIndex].style.left = '-50%';

            const second = currentIndex + 1;
            if (second < total) {
                slides[second].style.transition = '';
                slides[second].style.width = '50%';
                slides[second].style.left = '-50%';
            }
        } else {
            slides[currentIndex].style.transition = '';
            slides[currentIndex].style.width = '100%';
            slides[currentIndex].style.left = '-100%';
        }

        // 2. Silently park ALL other slides off-screen right — no transition so they don't fly across
        slides.forEach((slide, i) => {
            if (i === currentIndex) return;
            if (isDesktop && isDoubleMode && i === currentIndex + 1) return;
            slide.style.transition = 'none';
            slide.style.left = '100%';
            slide.style.width = '100%';
        });

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                currentIndex = 0;
                isDoubleMode = false;
                // 3. Only animate slide 0 in — rest are already silently parked off-screen
                slides[0].style.transition = '';
                slides[0].style.left = '0%';
                slides[0].style.width = '100%';
                updateThumbs();
                updateCounter();
            });
        });
    }

    // ── Wrap backward: exit slide 0 RIGHT, last slide enters from LEFT ─────────
    function wrapToEnd() {
        const lastIndex = total - 1;

        // 1. Animate current slide out to the right
        slides[currentIndex].style.transition = '';
        slides[currentIndex].style.width = '100%';
        slides[currentIndex].style.left = '100%';

        // 2. Silently park ALL other slides off-screen left — no transition so they don't fly across
        slides.forEach((slide, i) => {
            if (i === currentIndex) return;
            slide.style.transition = 'none';
            slide.style.left = '-100%';
            slide.style.width = '100%';
        });

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                currentIndex = lastIndex;
                isDoubleMode = false;
                // 3. Only animate last slide in — rest are already silently parked off-screen
                slides[lastIndex].style.transition = '';
                slides[lastIndex].style.left = '0%';
                slides[lastIndex].style.width = '100%';
                updateThumbs();
                updateCounter();
            });
        });
    }

    function goNext() {
        if (!isDesktop) {
            if (currentIndex + 1 < total) {
                currentIndex++;
                positionSlides(true);
            } else {
                wrapToStart();
            }
            return;
        }

        if (!isDoubleMode) {
            if (currentIndex + 1 < total) {
                isDoubleMode = true;
                positionSlides(true);
            } else {
                wrapToStart();
            }
        } else {
            if (currentIndex + 2 < total) {
                currentIndex++;
                positionSlides(true);
            } else {
                wrapToStart();
            }
        }
    }

    function goPrev() {
        if (!isDesktop) {
            if (currentIndex - 1 >= 0) {
                currentIndex--;
                positionSlides(true);
            } else {
                wrapToEnd();
            }
            return;
        }

        if (isDoubleMode) {
            if (currentIndex === 0) {
                isDoubleMode = false;
                positionSlides(true);
            } else {
                currentIndex--;
                positionSlides(true);
            }
        } else {
            if (currentIndex > 0) {
                currentIndex--;
                if (currentIndex + 1 < total) isDoubleMode = true;
                positionSlides(true);
            } else {
                wrapToEnd();
            }
        }
    }

    // ── Zoom + Pan (desktop mouse + mobile touch) ──────────────────────────────
    slides.forEach(slide => {
        const container = slide.querySelector('.image-container');
        const img = slide.querySelector('.product-img');
        let clickCount = 0;
        let timer = null;
        let isZoomed = false;

        function activateZoom(e) {
            isZoomed = !isZoomed;
            container.classList.toggle('zoomed', isZoomed);

            if (isZoomed) {
                stopAutoplay();
                const scale = 2;
                img.style.transition = 'transform 0.3s ease-out';
                img.style.transform = `scale(${scale})`;
                const rect = container.getBoundingClientRect();
                const x = (e.clientX || (e.touches && e.touches[0].clientX)) - rect.left;
                const y = (e.clientY || (e.touches && e.touches[0].clientY)) - rect.top;
                updatePan(x, y);
            } else {
                img.style.transition = 'transform 0.3s ease-out';
                img.style.transform = 'scale(1) translate(0, 0)';
                startAutoplay();
            }
        }

        function updatePan(x, y) {
            const scale = 2;
            const contW = container.clientWidth;
            const contH = container.clientHeight;
            const tx = (x / contW) * (contW - contW * scale);
            const ty = (y / contH) * (contH - contH * scale);
            img.style.transition = 'none';
            img.style.transform = `translate(${tx}px, ${ty}px) scale(${scale})`;
        }

        // ── Desktop: mousemove pans ────────────────────────────────────────────
        container.addEventListener('mousemove', e => {
            if (!isZoomed) return;
            const rect = container.getBoundingClientRect();
            updatePan(e.clientX - rect.left, e.clientY - rect.top);
        });

        // ── Mobile: touchmove pans ─────────────────────────────────────────────
        container.addEventListener('touchmove', e => {
            if (!isZoomed || e.touches.length > 1) return;
            e.preventDefault(); // prevent page scroll while panning
            const rect = container.getBoundingClientRect();
            const x = e.touches[0].clientX - rect.left;
            const y = e.touches[0].clientY - rect.top;
            updatePan(x, y);
        }, { passive: false });

        // ── Double-click (desktop) ─────────────────────────────────────────────
        container.addEventListener('click', e => {
            clickCount++;
            if (clickCount === 1) {
                timer = setTimeout(() => { clickCount = 0; }, 300);
            } else if (clickCount === 2) {
                clearTimeout(timer);
                clickCount = 0;
                e.preventDefault();
                activateZoom(e);
            }
        });

        // ── Double-tap (mobile) ────────────────────────────────────────────────
        container.addEventListener('touchstart', e => {
            if (e.touches.length > 1) return;
            clickCount++;
            if (clickCount === 1) {
                timer = setTimeout(() => { clickCount = 0; }, 300);
            } else if (clickCount === 2) {
                clearTimeout(timer);
                clickCount = 0;
                e.preventDefault();
                activateZoom(e);
            }
        }, { passive: false });
    });

    // ── Thumbnails ─────────────────────────────────────────────────────────────
    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => {
            const idx = parseInt(thumb.dataset.index);
            if (!isDesktop) {
                currentIndex = idx;
                isDoubleMode = false;
            } else {
                if (idx === 0) {
                    currentIndex = 0;
                    isDoubleMode = false;
                } else if (idx === total - 1 && total > 1) {
                    currentIndex = idx - 1;
                    isDoubleMode = true;
                } else {
                    currentIndex = idx - 1;
                    isDoubleMode = true;
                }
            }
            positionSlides(true);
            resetAutoplay();
        });
    });

    window.addEventListener('resize', () => {
        const nowDesktop = window.innerWidth >= 1200;
        if (nowDesktop !== isDesktop) {
            isDesktop = nowDesktop;
            isDoubleMode = false;
            currentIndex = 0;
            positionSlides(false);
        }
    });

    // ── Swipe (mouse + touch) on slider wrapper ────────────────────────────────
    const SWIPE_THRESHOLD = 50; // px — minimum drag distance to trigger a swipe
    const sliderWrapper = document.querySelector('.slider-wrapper');

    let swipeStartX = null;
    let swipeStartY = null;
    let isSwiping = false;

    // Shared: is any slide currently zoomed?
    function anyZoomed() {
        return Array.from(document.querySelectorAll('.image-container')).some(c => c.classList.contains('zoomed'));
    }

    sliderWrapper.addEventListener('pointerdown', e => {
        // If user is clicking directly on the image, skip swipe — let zoom handle it
        if (e.target.classList.contains('product-img') || e.target.classList.contains('image-container')) return;
        if (anyZoomed()) return;
        swipeStartX = e.clientX;
        swipeStartY = e.clientY;
        isSwiping = true;
        sliderWrapper.setPointerCapture(e.pointerId);
    }, { passive: true });

    sliderWrapper.addEventListener('pointermove', e => {
        if (!isSwiping || anyZoomed()) return;
        // Optional: could add live drag preview here in future
    }, { passive: true });

    sliderWrapper.addEventListener('pointerup', e => {
        if (!isSwiping || swipeStartX === null) return;
        isSwiping = false;

        const dx = e.clientX - swipeStartX;
        const dy = e.clientY - swipeStartY;
        swipeStartX = null;
        swipeStartY = null;

        // Only trigger if horizontal movement is dominant and exceeds threshold
        if (Math.abs(dx) < SWIPE_THRESHOLD || Math.abs(dx) < Math.abs(dy)) return;

        if (dx < 0) {
            goNext(); // swiped left → next
        } else {
            goPrev(); // swiped right → prev
        }
        resetAutoplay();
    });

    sliderWrapper.addEventListener('pointercancel', () => {
        isSwiping = false;
        swipeStartX = null;
        swipeStartY = null;
    });

    // ── Init ───────────────────────────────────────────────────────────────────
    positionSlides(false);

    prevBtn.addEventListener('click', () => { goPrev(); resetAutoplay(); });
    nextBtn.addEventListener('click', () => { goNext(); resetAutoplay(); });

    document.getElementById('prevBtn2')?.addEventListener('click', () => { goPrev(); resetAutoplay(); });
    document.getElementById('nextBtn2')?.addEventListener('click', () => { goNext(); resetAutoplay(); });

    startAutoplay();
</script>
<!-- slider js -->