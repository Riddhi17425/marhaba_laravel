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
                <div class="Product_item swiper prod_img_slider">
                    @if($filteredImages->count() > 0)
                        <div class="swiper-wrapper">
                            @foreach($filteredImages as $v)
                                <div class="swiper-slide">
                                    <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank">
                                        <img loading="lazy" src="{{ asset('public/product_images/' . $v->product_image) }}"
                                            alt="{{ $vv->name }}" class="img-fluid product_img w-100">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img loading="lazy" src="{{ asset('public/front/img/product-not-found.png') }}"
                                    alt="not found" class="img-fluid product_img w-100">
                            </div>
                        </div>
                    @endif
                </div>
                <a href="{{ url('products-details/' . $vv['url'].'/'. $vv['id']) }}" target="_blank"><p class="mb-0" style="font-weight:500;">{{$vv->name ?? ''}}</p></a>
                <p class="raleway_14 mb-0">{{$vk ?? ''}}</p>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>
</section>