@if(isset($filterProducts['products']) && is_countable($filterProducts['products']) && count($filterProducts['products']) > 0) 
 <section>
    <div class="desk_grid">
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
                                    <img src="{{ asset('public/product_images/' . $filteredImages[1]->product_image) }}"
                                        alt="{{ $vv->name }}" class="ym_cover_slider">
                                    <!-- ✅ SLICK SLIDER -->
                                    <div class="ym_slider">
                                        @foreach($filteredImages as $k => $v)
                                            @if($k == 1)
                                                @continue
                                            @endif
                                            @if($k == 4)
                                                @break
                                            @endif
                                            <div>
                                                <a href="{{ url('products-details/' . $vv['url'].'/'.$sizeId . '/' . $vv['id']) }}" target="_blank">
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
                                        class="ym_cover_slider" loading="lazy">
                                    <div class="ym_slider">
                                        <div>
                                            <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                                class="ym_slide_img" loading="lazy">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div>
                            <a href="{{ url('products-details/' . $vv['url'].'/'. $sizeId .'/' . $vv['id']) }}" target="_blank" class="prod_list_title">
                                <h4 style="font-weight:500;">@if(strtolower($vv->brand->name) != 'marhaba'){{$vv->brand->name ?? ''}}@endif {{$vv->name ?? ''}}</h4>
                                <p class="mb-0">{{$vk ?? ''}} <span class="mx-1">|</span>  {{$vv->category->name ?? ''}}</p>
                            </a> 
                            {{-- <a href="{{ url('products-details/' . $vv['url'].'/'.$sizeId. '/'. $vv['id']) }}" target="_blank" class="prod_list_title">                            
                                <h4 class="mb-0" style="font-weight:500;">@if(strtolower($vv->brand->name) != 'marhaba'){{$vv->brand->name ?? ''}}@endif {{$vv->name ?? ''}}</h4>
                                <p class="mb-0">{{$vk ?? ''}}</p>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
    <div class="mobile_grid">
        <div class="products_filter_grid">
            @foreach($filterProducts['products'] as $key => $val)
            @foreach($val as $vk => $vv)
            @php 
                $productImages = json_decode($vv->product_brand_size); 
                $size = \App\Models\Product::getSizeId($vk);
                $sizeId = $size->id;
                $filteredImages = collect($productImages)->where('size_id', (string)$sizeId)->values();
                if($filteredImages->count() > 1){
                    $humanImage = $filteredImages->pull(0); // remove human image
                    $filteredImages->splice(1, 0, [$humanImage]); // insert it at 2nd position
                }
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
                                        @foreach($filteredImages as $k => $v)
                                            @if($k == 4)
                                                @break
                                            @endif
                                            <div>
                                                <a href="{{ url('products-details/' . $vv['url'].'/'.$sizeId . '/' . $vv['id']) }}" target="_blank">
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
                                        class="ym_cover_slider" loading="lazy">
                                    <div class="ym_slider">
                                        <div>
                                            <img src="{{ asset('public/front/img/product-not-found.png') }}"
                                                class="ym_slide_img" loading="lazy">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div>
                            <a href="{{ url('products-details/' . $vv['url'].'/'.$sizeId. '/'. $vv['id']) }}" target="_blank" class="prod_list_title"> 
                                <h4 class="mb-0" style="font-weight:500;">@if(strtolower($vv->brand->name) != 'marhaba'){{$vv->brand->name ?? ''}}@endif{{$vv->name ?? ''}}</h4>
                                <p class="mb-0">{{$vk ?? ''}} <span class="mx-1">|</span>  {{$vv->category->name ?? ''}}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
</section>
@endif