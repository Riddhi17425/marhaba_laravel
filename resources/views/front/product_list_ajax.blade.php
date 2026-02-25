@if(isset($filterProducts['products']) && is_countable($filterProducts['products']) && count($filterProducts['products']) > 0) 
 <section>
    <div class="products_filter_grid">
        @foreach($filterProducts['products'] as $key => $val)
        @foreach($val as $vk => $vv)
        @php 
            $productImages = json_decode($vv->product_brand_size); 
            $size = \App\Models\Product::getSizeId($vk);
            $sizeId = $size->id;
            $filteredImages = collect($productImages)->where('size_id', (string)$sizeId)->values();
        @endphp
        <div>
            <div class="product_wrapper">
                <div class="ym_card">
                    <div class="Product_item">
                        <div class="ym_card_img">
                            @if($filteredImages->count() > 0)
                                {{-- <div class="swiper-wrapper">
                                    @foreach($filteredImages as $v)
                                        <div class="swiper-slide">
                                            <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank">
                                                <img loading="lazy" src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                    alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                            </a>
                                        </div>
                                    @endforeach
                                </div> --}}
                                <!-- ✅ COVER IMAGE (FIRST IMAGE ONLY) -->
                                <img src="{{ asset('public/product_images/' . $filteredImages[0]->product_image) }}"
                                    alt="{{ $vv->name }}" class="ym_cover_slider">
                                <!-- ✅ SLICK SLIDER -->
                                <div class="ym_slider">
                                    @foreach($filteredImages as $v)
                                        <div>
                                            <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank">
                                                <img loading="lazy" src="{{ asset('public/product_images/' . $v->product_image) }}"
                                                    alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                {{-- <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img loading="lazy" src="{{ asset('public/front/img/product-not-found.png') }}"
                                            alt="not found" class="img-fluid product_img w-100">
                                    </div>
                                </div> --}}
                                <img src="{{ asset('public/front/img/product-not-found.png') }}" alt="not found"
                                    class="ym_cover_slider">
                                <div class="ym_slider">
                                    <div>
                                        <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                            class="ym_slide_img">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank"><p class="mb-0" style="font-weight:500;">{{$vv->name ?? ''}}</p></a>
                    <p class="raleway_14 mb-0">{{$vk ?? ''}}</p>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>
</section>
@endif