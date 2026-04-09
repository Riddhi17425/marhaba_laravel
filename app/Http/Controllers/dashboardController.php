<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Models\AboutImage;
use App\Models\GlobalPresence;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\{ClothSize, CatalogueImage, TrustedBy, WhyChooseUs, Contact, HomeSliderImage, WhatsappInquiry, ProductInquiry, CollectionRandomImage};
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        return view('auth.login');
    }
    public function admin(){
        return view('admin.admin');
    }
    
    public function landing(){  
        $catImgs = CatalogueImage::select('id', 'image', 'name')->get();
        $trustedBy = TrustedBy::select('id', 'image', 'title', 'desc')->take(5)->get();
        $whyChooseUs = WhyChooseUs::select('id', 'title', 'desc', 'image')->get();
        $brand = Brand::select('id', 'name', 'image')->where('deleted_at', null)->limit(3)->get();
         $collection = Product::select('id', 'type', 'category_id','name','url','image','product_brand_size')->whereNull('deleted_at')->where('show_homepage', 1)->latest()->take(6);
        $boysCollection = (clone $collection)->where('type', 'boy')->get();
        $girlsCollection = (clone $collection)->where('type', 'girl')->get();
        $globalpresence = GlobalPresence::where('deleted_at', null)->get();
        $ageSections = config('global_values.age_section');
        $homeSliderImgs = HomeSliderImage::whereNull('deleted_at')->get();
        
        $products = Product::select('id', 'type', 'brand_id', 'category_id','name','url','image','product_brand_size', 'translations')->orderBy('created_at', 'desc')->whereNull('deleted_at')->where('is_active', 1)->get();
        
        // Collect size IDs from products
        $sizeIds = collect();
        foreach ($products as $product) {
            $sizes = json_decode($product->product_brand_size, true) ?? [];
            if(isset($product->product_brand_size) && $product->product_brand_size != null){
                foreach ($sizes as $row) {
                    if (!empty($row['size_id'])) {
                        $sizeIds->push($row['size_id']);
                    }
                }
            }
        }
        
        // Fetch size names
        $sizes = ClothSize::whereIn('id', $sizeIds->unique())->pluck('name')->toArray();
        // Group sizes by age section
        $groupedSizes = $this->groupSizesByAge($sizes, $ageSections);
        $allSizes = collect($groupedSizes)->flatten()->unique()->values();
        $sizes = ClothSize::whereIn('name', $allSizes)->pluck('id', 'name'); 
        $productsByAge = [];
        // SORTED AGE GROUP
        foreach ($groupedSizes as $group => $sizesArr) {
            usort($sizesArr, function ($a, $b) {
                $toMinMax = function ($size) {
                    if (!preg_match('/^(\d+)(m|Y)?\s*-\s*(\d+)(m|Y)?$/i', trim($size), $matches)) {
                        return [0, 0];
                    }
                    $minUnit = !empty($matches[2]) ? strtolower($matches[2]) : 'y';
                    $maxUnit = !empty($matches[4]) ? strtolower($matches[4]) : 'y';
                    $min = $minUnit === 'y' ? (int)$matches[1] * 12 : (int)$matches[1];
                    $max = $maxUnit === 'y' ? (int)$matches[3] * 12 : (int)$matches[3];
                    return [$min, $max];
                };
                [$minA, $maxA] = $toMinMax($a);
                [$minB, $maxB] = $toMinMax($b);
                return $minA !== $minB ? $minA <=> $minB : $maxA <=> $maxB;
            });
            $groupedSizes[$group] = $sizesArr;
        }

        foreach ($groupedSizes as $group => $sizesArr) {
            $sizeIds = collect($sizesArr)->map(fn ($size) => $sizes[$size] ?? null)->filter()->values();
            if ($sizeIds->isEmpty()) {
                $productsByAge[$group] = collect();
                continue;
            }
            $query = Product::select('id', 'name', 'url');
            $query->where(function ($q) use ($sizeIds) {
                foreach ($sizeIds as $id) {
                    $q->orWhereRaw("JSON_SEARCH(product_brand_size, 'one', ?, NULL, '$[*].size_id') IS NOT NULL",[(string) $id]);
                }
            });
            $productsByAge[$group] = $query->distinct()->where('is_active', 1)->get();
        }

        $girlCollectionRandomImage = CollectionRandomImage::select('id', 'image', 'name')->where('section', 1)->get();
        $boyCollectionRandomImage = CollectionRandomImage::select('id', 'image', 'name')->where('section', 2)->get();

        $boysRandomImg = $boyCollectionRandomImage->map(function($item){
            return [
                'src' => asset('public/collection_random_image/'.$item->image),
                'name' => $item->name
            ];
        })->toArray();
        $girlsRandomImg = $girlCollectionRandomImage->map(function($item){
            return [
                'src' => asset('public/collection_random_image/'.$item->image),
                'name' => $item->name
            ];
        })->toArray();
      
        return view('front.home', compact('brand', 'boysCollection', 'girlsCollection', 'globalpresence', 'ageSections', 'groupedSizes', 'productsByAge', 'catImgs', 'trustedBy', 'whyChooseUs', 'homeSliderImgs', /*'productData', 'productTranslations',*/ 'boysRandomImg', 'girlsRandomImg'));
    }

    private function groupSizesByAge(array $sizes, array $ageSections)
    {
        $result = [];
        uasort($ageSections, fn($a, $b) => $a['min'] <=> $b['min']);
        foreach ($sizes as $size) {
            $range = $this->sizeToMonths($size);
            if (!$range) {
                continue;
            }
            $matched = false;
            foreach ($ageSections as $key => $section) {
                if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
                    $result[$key][] = $size;
                    $matched = true;
                    break;
                }
            }
            // Fallback for wide-spanning sizes (e.g. 1-10Y, 4-14Y):
            // assign to the section whose range contains the midpoint of the size range
            if (!$matched) {
                $midpoint = ($range['min'] + $range['max']) / 2;
                foreach ($ageSections as $key => $section) {
                    if ($midpoint >= $section['min'] && $midpoint <= $section['max']) {
                        $result[$key][] = $size;
                        break;
                    }
                }
            }
        }
        
        return $result;
    }

    public function getProducts(Request $request, $type, $size_range = null){
        // AJAX CALL REQUEST
        $ageFilter = $request->ageFilter ?? null;
        $brandFilter = $request->brandFilter ?? null;
        $categoryFilter = $request->categoryFilter ?? null;

        $brands = Brand::select('id', 'name')->where('deleted_at', null)->get();
        if(isset($brands) && is_countable($brands) && count($brands)){
            foreach($brands as $key => $val){
                $val->total_brand_product = $this->getTotalProductByBrand($val->id, $type);
            }
        }
        $type = ucFirst($type);
        $products = Product::select('id', 'type', 'brand_id', 'category_id', 'name', 'url', 'product_brand_size')->where('type', $type);
        if(isset($brandFilter) && is_countable($brandFilter) && count($brandFilter) > 0){
            $products = $products->whereIn('brand_id', $brandFilter);
        }
        if(isset($categoryFilter) && is_countable($categoryFilter) && count($categoryFilter) > 0){
            $products = $products->whereIn('category_id', $categoryFilter);
        }
        $products = $products->whereNull('deleted_at')->where('is_active', 1)->get();
        
        $categories = Category::select('id', 'name', 'url')->whereNull('deleted_at')->get();
        if(isset($categories) && is_countable($categories) && count($categories)){
            foreach($categories as $key => $val){
                $val->total_category_product = $this->getTotalProductByCategory($val->id, $type);
            }
        }
        $clothsizes = ClothSize::all()->keyBy('id');
        $groupedProducts = $filterProducts = [];
        $ageSections = config('global_values.age_section');
        // If Size range filter apply kept match key only in age section
        if($ageFilter != null){
            $filters = array_filter(array_unique(array_merge(
                (array) $ageFilter,
                $size_range ? [$size_range] : []
            )));
            $filters = array_map('strtolower', $filters);
            if (!empty($filters)) {
                $ageSections = array_intersect_key($ageSections, array_flip($filters));
            }
        }else{
            if (isset($size_range) && $size_range != null) {
                $size_range = strtolower($size_range);
                $ageSections = array_filter($ageSections, function($section, $key) use ($size_range) {
                    return strtolower($key) === $size_range;
                }, ARRAY_FILTER_USE_BOTH);
            }
        }

        foreach ($ageSections as $key => $section) {
            $groupedProducts[$key] = [
                'label' => $section['label'],
                'products' => [],
            ];
        }
        
        $totalProducts = 0;
        $data = ['baby' => 0,  'kids' => 0, 'junior' => 0];
        
        foreach ($products as $product) {
            $brandSizes = json_decode($product->product_brand_size, true);
            if (!is_array($brandSizes)) {
                continue;
            }
            $brandSizes = collect($brandSizes)->groupBy('size_id');
            
            // Check all sizes in product_brand_size
            foreach ($brandSizes as $bk => $bs) {
                $sizeId = $bk ? (int)$bk : null;
                if (!$sizeId || !isset($clothsizes[$sizeId])) {
                    continue;
                }
                $size = $clothsizes[$sizeId];
                $sizeName = trim($size->name); 
                $range = $this->sizeToMonths($sizeName);
                if (!$range) {
                    continue;
                }

                // Check if size fits into any age section
                $sectionMatched = false;
                foreach ($ageSections as $sectionKey => $section) {
                    // Strict containment: size must be fully within section
                    if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
                        if(strtolower($sectionKey) == 'baby'){
                            $data['baby'] += 1;
                        }elseif(strtolower($sectionKey) == 'kids'){
                            $data['kids'] += 1;
                        }elseif(strtolower($sectionKey) == 'junior'){
                            $data['junior'] += 1;
                        }
                        $totalProducts += 1; 
                        $groupedProducts[$sectionKey]['products'][][$sizeName] = $product;
                        $filterProducts['products'][][$sizeName] = $product;
                        $sectionMatched = true;
                        break;
                    }
                }

                // Fallback for wide-spanning sizes (e.g. 1-10Y, 4-14Y):
                // assign to the section whose range contains the midpoint of the size range
                if (!$sectionMatched) {
                    $midpoint = ($range['min'] + $range['max']) / 2;
                    foreach ($ageSections as $sectionKey => $section) {
                        if ($midpoint >= $section['min'] && $midpoint <= $section['max']) {
                            if(strtolower($sectionKey) == 'baby'){
                                $data['baby'] += 1;
                            }elseif(strtolower($sectionKey) == 'kids'){
                                $data['kids'] += 1;
                            }elseif(strtolower($sectionKey) == 'junior'){
                                $data['junior'] += 1;
                            }
                            $totalProducts += 1;
                            $groupedProducts[$sectionKey]['products'][][$sizeName] = $product;
                            $filterProducts['products'][][$sizeName] = $product;
                            break;
                        }
                    }
                }
            }
        }
        
        // SORTED by Age Range
        foreach ($groupedProducts as $sectionKey => &$sectionData) {
            if (empty($sectionData['products'])) {
                continue;
            }
            usort($sectionData['products'], function ($itemA, $itemB) {
                // Each item has ONE size key
                $sizeA = array_key_first($itemA);
                $sizeB = array_key_first($itemB);
                $rangeA = $this->sizeToMonths($sizeA);
                $rangeB = $this->sizeToMonths($sizeB);
                $minA = $rangeA['min'] ?? 0;
                $minB = $rangeB['min'] ?? 0;
                if ($minA !== $minB) {
                    return $minA <=> $minB;
                }
                return ($rangeA['max'] ?? 0) <=> ($rangeB['max'] ?? 0);
            });
        }
        unset($sectionData);
        $ageSection = config('global_values.age_section');

        if($request->ajax()){
            //Sorted by age range
            if (!empty($filterProducts['products'])) {
                usort($filterProducts['products'], function ($itemA, $itemB) {
                    $sizeA = array_key_first($itemA);
                    $sizeB = array_key_first($itemB);
                    $rangeA = $this->sizeToMonths($sizeA);
                    $rangeB = $this->sizeToMonths($sizeB);
                    $minA = $rangeA['min'] ?? 0;
                    $minB = $rangeB['min'] ?? 0;
                    if ($minA !== $minB) {
                        return $minA <=> $minB;
                    }
                    return ($rangeA['max'] ?? 0) <=> ($rangeB['max'] ?? 0);
                });
            }

            return response()->json([
                'filterProducts' => $filterProducts,
                'totalProducts' => $totalProducts,
                'html' => view('front.product_list_ajax', compact('filterProducts'))->render()
            ]);
        }
      
        return view('front.product_list', compact('groupedProducts', 'totalProducts', 'type', 'data', 'brands', 'categories', 'ageSection'));
    }

    public function getFilterOptions(Request $request, $type)
    {
        $ageFilter      = $request->ageFilter      ? (array)$request->ageFilter      : [];
        $brandFilter    = $request->brandFilter    ? (array)$request->brandFilter    : [];
        $categoryFilter = $request->categoryFilter ? (array)$request->categoryFilter : [];

        $type        = ucFirst($type);
        $ageSections = config('global_values.age_section');
        $clothsizes  = ClothSize::all()->keyBy('id');

        // Active age sections determined by the current age filter selection
        $activeAgeSections = !empty($ageFilter)
            ? array_intersect_key($ageSections, array_flip(array_map('strtolower', $ageFilter)))
            : $ageSections;

        // Helper: does this product have at least one size that falls within the given age sections?
        $matchesAge = function ($product, array $sections) use ($clothsizes) {
            $brandSizes = json_decode($product->product_brand_size, true);
            if (!is_array($brandSizes)) return false;
            foreach (collect($brandSizes)->groupBy('size_id') as $sizeId => $bs) {
                $sizeId = (int)$sizeId;
                if (!$sizeId || !isset($clothsizes[$sizeId])) continue;
                $range = $this->sizeToMonths(trim($clothsizes[$sizeId]->name));
                if (!$range) continue;
                // Strict containment
                foreach ($sections as $section) {
                    if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) return true;
                }
                // Midpoint fallback for wide-spanning sizes
                $mid = ($range['min'] + $range['max']) / 2;
                foreach ($sections as $section) {
                    if ($mid >= $section['min'] && $mid <= $section['max']) return true;
                }
            }
            return false;
        };

        // All non-deleted products of this gender type
        $allProducts = Product::select('id', 'brand_id', 'category_id', 'product_brand_size')
            ->where('type', $type)
            ->whereNull('deleted_at')
            ->get();

        // ── Brands: filtered by active age sections + selected categories (NOT brand itself) ──
        $brandsBase = $allProducts;
        if (!empty($categoryFilter)) {
            $brandsBase = $brandsBase->whereIn('category_id', $categoryFilter);
        }
        if (!empty($ageFilter)) {
            $brandsBase = $brandsBase->filter(fn($p) => $matchesAge($p, $activeAgeSections));
        }
        $availableBrandIds = $brandsBase->pluck('brand_id')->unique()->filter()->values()->toArray();

        $brands = Brand::select('id', 'name')
            ->whereIn('id', $availableBrandIds)
            ->whereNull('deleted_at')
            ->get()
            ->map(function ($brand) use ($brandsBase, $clothsizes, $ageSections) {
                $count = 0;
                foreach ($brandsBase->where('brand_id', $brand->id) as $product) {
                    $brandSizes = json_decode($product->product_brand_size, true);
                    if (!is_array($brandSizes)) continue;
                    foreach (collect($brandSizes)->groupBy('size_id') as $sizeId => $bs) {
                        $sizeId = (int)$sizeId;
                        if (!$sizeId || !isset($clothsizes[$sizeId])) continue;
                        $range = $this->sizeToMonths(trim($clothsizes[$sizeId]->name));
                        if (!$range) continue;
                        $matched = false;
                        foreach ($ageSections as $section) {
                            if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
                                $count++; $matched = true; break;
                            }
                        }
                        if (!$matched) {
                            $mid = ($range['min'] + $range['max']) / 2;
                            foreach ($ageSections as $section) {
                                if ($mid >= $section['min'] && $mid <= $section['max']) {
                                    $count++; break;
                                }
                            }
                        }
                    }
                }
                $brand->count = $count;
                return $brand;
            })
            ->values();

        // ── Categories: filtered by active age sections + selected brands (NOT category itself) ──
        $catsBase = $allProducts;
        if (!empty($brandFilter)) {
            $catsBase = $catsBase->whereIn('brand_id', $brandFilter);
        }
        if (!empty($ageFilter)) {
            $catsBase = $catsBase->filter(fn($p) => $matchesAge($p, $activeAgeSections));
        }
        $availableCatIds = $catsBase->pluck('category_id')->unique()->filter()->values()->toArray();

        $categories = Category::select('id', 'name')
            ->whereIn('id', $availableCatIds)
            ->whereNull('deleted_at')
            ->get()
            ->map(function ($cat) use ($catsBase, $clothsizes, $ageSections) {
                $count = 0;
                foreach ($catsBase->where('category_id', $cat->id) as $product) {
                    $brandSizes = json_decode($product->product_brand_size, true);
                    if (!is_array($brandSizes)) continue;
                    foreach (collect($brandSizes)->groupBy('size_id') as $sizeId => $bs) {
                        $sizeId = (int)$sizeId;
                        if (!$sizeId || !isset($clothsizes[$sizeId])) continue;
                        $range = $this->sizeToMonths(trim($clothsizes[$sizeId]->name));
                        if (!$range) continue;
                        $matched = false;
                        foreach ($ageSections as $section) {
                            if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
                                $count++; $matched = true; break;
                            }
                        }
                        if (!$matched) {
                            $mid = ($range['min'] + $range['max']) / 2;
                            foreach ($ageSections as $section) {
                                if ($mid >= $section['min'] && $mid <= $section['max']) {
                                    $count++; break;
                                }
                            }
                        }
                    }
                }
                $cat->count = $count;
                return $cat;
            })
            ->values();

        // ── Age counts: filtered by selected brands + categories (NOT age itself) ──
        $ageBase = $allProducts;
        if (!empty($brandFilter)) {
            $ageBase = $ageBase->whereIn('brand_id', $brandFilter);
        }
        if (!empty($categoryFilter)) {
            $ageBase = $ageBase->whereIn('category_id', $categoryFilter);
        }

        $ageCounts = array_fill_keys(array_keys($ageSections), 0);
        foreach ($ageBase as $product) {
            $brandSizes = json_decode($product->product_brand_size, true);
            if (!is_array($brandSizes)) continue;
            foreach (collect($brandSizes)->groupBy('size_id') as $sizeId => $bs) {
                $sizeId = (int)$sizeId;
                if (!$sizeId || !isset($clothsizes[$sizeId])) continue;
                $range = $this->sizeToMonths(trim($clothsizes[$sizeId]->name));
                if (!$range) continue;
                $matched = false;
                foreach ($ageSections as $key => $section) {
                    if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
                        $ageCounts[$key]++;
                        $matched = true;
                        break;
                    }
                }
                if (!$matched) {
                    $mid = ($range['min'] + $range['max']) / 2;
                    foreach ($ageSections as $key => $section) {
                        if ($mid >= $section['min'] && $mid <= $section['max']) {
                            $ageCounts[$key]++;
                            break;
                        }
                    }
                }
            }
        }

        return response()->json([
            'brands'     => $brands,
            'categories' => $categories,
            'ageCounts'  => $ageCounts,
        ]);
    }

    protected function getTotalProductByBrand($brandId, $type)
    {
        $products = Product::where(['brand_id' => $brandId,'type' => $type])->whereNull('deleted_at')->get(['product_brand_size']);
        $clothsizes = ClothSize::all()->keyBy('id');
        $ageSections = config('global_values.age_section');
        $total = 0;
        foreach ($products as $product) {
            $brandSizes = json_decode($product->product_brand_size, true);
            if (!is_array($brandSizes)) continue;
            $brandSizes = collect($brandSizes)->groupBy('size_id');
            foreach ($brandSizes as $sizeId => $bs) {
                $sizeId = (int)$sizeId;
                if (!$sizeId || !isset($clothsizes[$sizeId])) continue;
                $sizeName = trim($clothsizes[$sizeId]->name);
                $range = $this->sizeToMonths($sizeName);
                if (!$range) continue;
                foreach ($ageSections as $section) {
                    if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
                        $total++; // Count per size match
                        break;
                    }
                }
            }
        }

        return $total;
    }

    protected function getTotalProductByCategory($categoryId, $type)
    {
        $products = Product::where([
                'category_id' => $categoryId,
                'type' => $type,
            ])
            ->whereNull('deleted_at')
            ->where('is_active', 1)
            ->get(['product_brand_size']);

        $clothsizes = ClothSize::all()->keyBy('id');
        $ageSections = config('global_values.age_section');

        $total = 0;
        foreach ($products as $product) {
            $brandSizes = json_decode($product->product_brand_size, true);
            if (!is_array($brandSizes)) continue;

            $brandSizes = collect($brandSizes)->groupBy('size_id');
            foreach ($brandSizes as $sizeId => $bs) {
                $sizeId = (int) $sizeId;
                if (!$sizeId || !isset($clothsizes[$sizeId])) continue;

                $sizeName = trim($clothsizes[$sizeId]->name);
                $range = $this->sizeToMonths($sizeName);

                if (!$range) continue;

                $matched = false;
                foreach ($ageSections as $section) {
                    if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
                        $total++;
                        $matched = true;
                        break;
                    }
                }

                // Fallback for wide-spanning sizes (e.g. 2-5Y, 4-14Y): use midpoint
                if (!$matched) {
                    $midpoint = ($range['min'] + $range['max']) / 2;
                    foreach ($ageSections as $section) {
                        if ($midpoint >= $section['min'] && $midpoint <= $section['max']) {
                            $total++;
                            break;
                        }
                    }
                }
            }
        }

        return $total;
    }

    public function index()
    {   
        $globalpresence = GlobalPresence::where('deleted_at', null)->get();
        $brand = Brand::where('deleted_at', null)->limit(3)->get();
        $product = Product::where('deleted_at', null)->get();
        $category = Category::where('deleted_at', null)->get();    
        // dd($category);
        return view('front.dashboard', compact('globalpresence', 'brand', 'product', 'category'));
    }
    public function about()
    {   
        $aboutimage = AboutImage::where('deleted_at', null)->get();
        // dd($aboutimage);
        return view('front.about',compact('aboutimage'));
    }
    public function contact()
    {   
        return view('front.contact');
    }
    public function shippingpolicy()
    {   
        return view('front.shippingpolicy');
    }
    public function filter()
    {   
        return view('front.filter');
    }
    public function serve()
    {   
        return view('front.serve');
    }
    
    public function product($url, $listSizeId = 0, $id = null)
    {   
        // OLD
        // $product = Product::where('url', $url);
        // if($id != null){
        //     $product = $product->where('id', $id);        
        // }        
        // $product = $product->firstOrFail();
        // $productVariants = json_decode($product->product_brand_size, true);
        // $sizeIds = array_unique(array_column($productVariants, 'size_id'));
        // $brandIds = array_unique(array_column($productVariants, 'brand_id'));
        // $sizeList = ClothSize::whereIn('id', $sizeIds)->get();
        // $brandList = Brand::whereIn('id', $brandIds)->get();
        // $similarProducts = Product::where('category_id', $product->category_id)
        //     ->where('id', '!=', $product->id)
        //     ->whereNull('deleted_at')
        //     ->get()
        //     ->map(function($p) {
        //         $pbsArray = json_decode($p->product_brand_size, true);
        //         return [
        //             'id' => $p->id,
        //             'name' => $p->name,
        //             'url' => $p->url,
        //             'image' => $pbsArray[1]['product_image'] ?? $pbsArray[0]['product_image'] ?? null, // second image if exists
        //             'brand_id' => $pbsArray[1]['brand_id'] ?? $pbsArray[0]['brand_id'] ?? null,
        //         ];
        //     });
        // $brandIdsForSimilar = $similarProducts->pluck('brand_id')->filter()->unique()->toArray();
        // $brands = Brand::whereIn('id', $brandIdsForSimilar)->get()->keyBy('id');

        // return view('front.product', compact(
        //     'product', 'productVariants', 'sizeList', 'brandList', 'similarProducts', 'brands'
        // ));

        // NEW
        $product = Product::where('url', $url)->with('category', 'brand');
        if($id != null){
            $product = $product->where('id', $id);        
        }        
        $product = $product->firstOrFail();
        $similarProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->whereNull('deleted_at')
            ->latest()
            ->take(10)
            ->get()
            ->map(function($p) {
                $pbsArray = json_decode($p->product_brand_size, true);
                return [
                    'id' => $p->id,
                    'name' => $p->name,
                    'url' => $p->url,
                    'image' => $pbsArray[1]['product_image'] ?? $pbsArray[0]['product_image'] ?? null, // second image if exists
                ];
            });

        $productVariants = json_decode($product->product_brand_size, true);
        $sizeIds = array_unique(array_column($productVariants, 'size_id'));
        $sizeGroups = array_unique(array_column($productVariants, 'size_group'));
        $sizeGroups = explode(',', implode(',', $sizeGroups));
        // $sizeList = ClothSize::select('id', 'name')->whereIn('id', $sizeIds)->get();
        $sizeList = ClothSize::select('id', 'name')->whereIn('id', $sizeIds)->get()
            ->map(function ($item) {
                preg_match('/(\d+)(m|Y)-(\d+)(m|Y)/i', $item->name, $matches);
                if (!empty($matches)) {
                    $startValue = (int) $matches[1];
                    $startUnit  = strtolower($matches[2]);
                    $endValue = (int) $matches[3];
                    $endUnit  = strtolower($matches[4]);
                    // Convert everything to months
                    $startInMonths = $startUnit === 'y' ? $startValue * 12 : $startValue;
                    $endInMonths   = $endUnit === 'y' ? $endValue * 12 : $endValue;
                    $item->start_months = $startInMonths;
                    $item->end_months   = $endInMonths;
                } else {
                    $item->start_months = 0;
                    $item->end_months   = 0;
                }
                return $item;
            })->sortBy('start_months')->values();

        $sizeListFirst = $sizeList->first();
        $sizeListLast  = $sizeList->last();
        $smallest = $sizeListFirst->name;
        $largest  = $sizeListLast->name;
        $smallest = explode('-', $smallest);
        $largest = explode('-', $largest);

        // FOR ENQUIRY POPUP
        // $filterProducts = [];
        // $clothsizes = ClothSize::all()->keyBy('id');
        // $enquiryPopupAgeSections = config('global_values.inquiry_popup_age_section');
        // $data = ['baby' => 0,  'toddler' => 0, 'kids' => 0];
        // $productsArr = Product::select('id', 'type', 'brand_id', 'category_id','name','url','image','product_brand_size')->orderBy('created_at', 'desc')->whereNull('deleted_at')->get();
        // foreach ($productsArr as $pv) {
        //     $brandSizes = json_decode($pv->product_brand_size, true);
        //     if (!is_array($brandSizes)) {
        //         continue;
        //     }
        //     $brandSizes = collect($brandSizes)->groupBy('size_id');
        //     // Check all sizes in product_brand_size
        //     foreach ($brandSizes as $bk => $bs) {
        //         $sizeId = $bk ? (int)$bk : null;
        //         if (!$sizeId || !isset($clothsizes[$sizeId])) {
        //             continue;
        //         }
        //         $size = $clothsizes[$sizeId];
        //         $sizeName = trim($size->name); 
        //         $range = $this->sizeToMonths($sizeName);
        //         if (!$range) {
        //             continue;
        //         }
        //         // Check if size fits into any age section
        //         foreach ($enquiryPopupAgeSections as $sectionKey => $section) {
        //             // If any overlap between size range and section range
        //             if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
        //                 if(strtolower($sectionKey) == 'baby'){
        //                     $data['baby'] += 1;
        //                 }elseif(strtolower($sectionKey) == 'toddler'){
        //                     $data['toddler'] += 1;
        //                 }elseif(strtolower($sectionKey) == 'kids'){
        //                     $data['kids'] += 1;
        //                 }
        //                 // Assign product to this age section if not already assigned
        //                     $filterProducts['products'][][$sizeName] = $pv;
        //                 // Optional: break if you want product only in one section
        //                 break;
        //             }
        //         }
        //     }
        // }
        
        // //Sorted by age range
        // if (!empty($filterProducts['products'])) {
        //     usort($filterProducts['products'], function ($itemA, $itemB) {
        //         $sizeA = array_key_first($itemA);
        //         $sizeB = array_key_first($itemB);
        //         $rangeA = $this->sizeToMonths($sizeA);
        //         $rangeB = $this->sizeToMonths($sizeB);

        //         return ($rangeA['min'] ?? 0) <=> ($rangeB['min'] ?? 0);
        //     });
        // }

        // $productData = [
        //     'boy' => [
        //         'baby' => [],
        //         'toddlers' => [],
        //         'kids' => []
        //     ],
        //     'girl' => [
        //         'baby' => [],
        //         'toddlers' => [],
        //         'kids' => []
        //     ]
        // ];
        // foreach ($filterProducts['products'] as $productGroup) {
        //     foreach ($productGroup as $size => $v) {
        //         $type = strtolower($v->type);
        //         $name = $v->name;
        //         $range = $this->sizeToMonths($size);
        //         if (!$range) {
        //             continue;
        //         }
        //         $maxMonths = $range['max'];
        //         foreach ($enquiryPopupAgeSections as $sectionKey => $section) {
        //             if ($maxMonths >= $section['min'] && $maxMonths <= $section['max']) {
        //                 // $productData[$type][$sectionKey][] = $name. ' ('.$size.')';
        //                 $productData[$type][$sectionKey][] = $name;
        //                 break;
        //             }
        //         }
        //     }
        // }
        // foreach ($productData as $type => $groups) {
        //     foreach ($groups as $ageGroup => $products) {
        //         $productData[$type][$ageGroup] = array_values(array_unique($products));
        //     }
        // }

        // LANGUAGE TRANSLATION ARRAY
        // $productNames = [];
        // // Loop through boys and girls and all age groups
        // foreach ($productData as $gender => $groups) {
        //     foreach ($groups as $ageGroup => $names) {
        //         foreach ($names as $fullName) {
        //             // Remove size info if stored like "Romper (0m-9m)"
        //             $name = preg_replace('/\s*\(.*?\)$/', '', $fullName);
        //             $productNames[] = $name;
        //         }
        //     }
        // }
        // Remove duplicates
        // $productNames = array_unique($productNames);
        // $productNamesData = Product::select('id', 'type', 'category_id','name','translations', 'product_brand_size')->whereIn('name', $productNames)->get();
        // $languages = config('global_values.languages');
        // $productTranslations = [];
        // // English initialization
        // $productTranslations['en'] = [];
        // foreach ($productNames as $name) {
        //     $productTranslations['en'][$name] = $name;
        // }
        // // Initialize other languages
        // foreach ($languages as $lang) {
        //     $productTranslations[$lang] = [];
        // }
        
        // // Fill translations
        // foreach ($productNamesData as $v) {
        //     $translations = json_decode($v->translations, true); // decode DB JSON

        //     foreach ($languages as $lang) {
        //         if (isset($translations[$lang][$v->name])) {
        //             // assign the actual translated string, not array
        //             $productTranslations[$lang][$v->name] = $translations[$lang][$v->name];
        //         } else {
        //             // fallback to English
        //             $productTranslations[$lang][$v->name] = $v->name;
        //         }
        //     }
        // }

        return view('front.product', compact(
            'product', 'similarProducts', 'sizeList', 'sizeGroups', 'smallest', 'largest', /*'productData', 'productTranslations',*/ 'listSizeId'
        ));
    }

    protected function sizeToMonths($size)
    {
        $size = trim($size);

        // Match patterns like 2-5Y, 6-12Y, 0m-9m, 3m-12m, 1-10Y
        if (!preg_match('/^(\d+)(m|Y)?\s*-\s*(\d+)(m|Y)?$/i', $size, $matches)) {
            return null;
        }

        // Extract numbers and units
        $min = (int)$matches[1];
        $minUnit = isset($matches[2]) && $matches[2] ? strtoupper($matches[2]) : 'Y';
        $max = (int)$matches[3];
        $maxUnit = isset($matches[4]) && $matches[4] ? strtoupper($matches[4]) : 'Y';

        // Convert to months
        $minMonths = $minUnit === 'Y' ? $min * 12 : $min;
        $maxMonths = $maxUnit === 'Y' ? $max * 12 : $max;

        return [
            'min' => $minMonths,
            'max' => $maxMonths
        ];
    }
    
    public function checkEmailUnique(Request $request){
        $email = $request->email;
        $exists = DB::table('contact')->where('email', $email)->exists();
        
        return response()->json([
            'unique' => !$exists
        ]);
    }
    
    public function postContact(Request $request){
        $validator = Validator::make($request->all(), [
            'full_name'      => 'required|string|min:2|max:100',
            'email'         => 'required|email|unique:contact,email',
            'contact_no'         => 'required|min:7|max:15',
            'company_name'  => 'required|string',
            'message_note'       => 'required|string|min:5|max:255',

        ], [
            'full_name.required'       => 'Please enter your Full name.',
            'full_name.string'         => 'Full Name must contain only letters.',
            'full_name.max'            => 'Full Name may not be greater than 100 characters.',
            'email.required'      => 'Please enter your email address.',
            'email.email'         => 'Please enter a valid email address.',
            'email.unique'        => 'This email has already been used for an inquiry.',
            'contact_no.max'      => 'Contact number may not exceed 15 digits.',
            'company_name.required' => 'Please enter COmpany Name',
            'message_note.string'      => 'Message must be valid text.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Save inquiry
        Contact::create([
            'fullname'        => $request->full_name ?? null,
            'company_name'       => $request->company_name ?? null,
            'mobile'  => $request->contact_no ?? null,
            'email' => $request->email ?? null,
            'message'     => $request->message_note ?? NULL,
            'is_distributor' => $request->distributor ? 1 : 0,
        ]);

        // SEND MAIL TO ADMIN
        $adminEmail = 'info@marhabafashion.com';
        $data = [
            'name'        => $request->full_name ?? null,
            'email'       => $request->email ?? null,
            'contact_no'  => $request->message_note ?? null,
            'company' => $request->company_name ?? null,
            'message_data'     => $request->message_note ?? NULL,
        ];

        try {
            Mail::send('mail.contact_inquiry', $data, function ($message) use ($adminEmail) {
                $message->to($adminEmail)->subject('New Contact Inquiry Received');
            });
        } catch (Exception $e) {
            Log::error('Inquiry Mail sending failed: '.$e->getMessage());
        }
        
        return back()->with('success', 'Your inquiry has been submitted successfully!');
    }

    public function whatsappInquiry(Request $request){
        WhatsappInquiry::create([
            'number'  => $request->number,
            'message'  => $request->message,
        ]);
    
        $timestamp = Carbon::now()->format('Y-m-d H:i:s');
        $sheetsData = [
            'form_type' => 'whatsapp inquiry',
            'contact'   => $request->number,
            'message'  => $request->message,
            'date'      => $timestamp,
        ];
    
        // Send to Google Sheets
        try {
            Http::withHeaders(['Content-Type' => 'application/json'])
                ->post('https://script.google.com/macros/s/AKfycbyiWRofXVf9V0lj8xKffnzl3ygyRIzPh_EJ2FvgPmClfgJWU0xHe0hE63BaLDCSVjfE/exec', 
                    $sheetsData
                );
        } catch (\Exception $e) {
            \Log::error('Google Sheets Exception (WhatsApp Inquiry):', [
                'message'   => $e->getMessage(),
                'trace'     => $e->getTraceAsString(),
                'data_sent' => $sheetsData
            ]);
        }
    
        // Redirect to WhatsApp
        $number = '916358820089'; // Change if needed
        $message = 'Inquiry from the website.';
        $whatsappUrl = "https://api.whatsapp.com/send/?phone={$number}&text=" . urlencode($message);
    
        return redirect()->away($whatsappUrl);
    }

    public function storeProductInquiry(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'businessName' => 'required',
            'businessType' => 'nullable',
            'countryCode' => 'required',
            'whatsapp' => 'required',
            'gender' => 'nullable',
            'age' => 'nullable',
            'productTypes' => 'nullable',
            'message' => 'nullable'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $inquiry = ProductInquiry::create([
            'name' => $request->name?? null,
            'business_name' => $request->businessName ?? null,
            'business_type' => $request->businessType ?? null,
            'country_code' => $request->countryCode ?? null,
            'whatsapp' => $request->whatsapp ?? null,
            'gender' => $request->selected_gender ?? null,
            'age' => $request->selected_age ?? null,
            'product_types' => $request->selected_product ?? null,
            'message_note' => $request->message ?? null
        ]);
        
        // STORE IN GOOGLE SHEET
        $timestamp = Carbon::now()->format('Y-m-d H:i:s');
        $passedData = [
            'name' => $request->name?? null,
            'business_name' => $request->businessName ?? null,
            'business_type' => $request->businessType ?? null,
            'country_code' => $request->countryCode ?? null,
            'whatsapp' => $request->whatsapp ?? null,
            'gender' => $request->selected_gender ?? null,
            'age' => $request->selected_age ?? null,
            'product_types' => $request->selected_product ?? null,
            'message_note' => $request->message ?? null,
            'date'      => $timestamp,
        ];
       
        // Send to Google Sheets
       try {
            Http::withBody(json_encode($passedData), 'application/json')
                    ->post('https://script.google.com/macros/s/AKfycbw3mLCXGC6TUiHBCNHchZ9S6JZerm0YitYVJYZrowlckrqYdBDh5CeVVowTYaeVjGtE/exec');
           
        } catch (\Exception $e) {
            \Log::error('Google Sheets Exception (WhatsApp Inquiry):', [
                'message'   => $e->getMessage(),
                'trace'     => $e->getTraceAsString(),
                'data_sent' => $passedData
            ]);
        }
    
        // BUILD WHATSAPP MESSAGE
        // Build gender text
        $selectedGenders = is_array($request->selected_gender)
            ? $request->selected_gender
            : array_filter(explode(',', $request->selected_gender ?? ''));
        $selectedGenders = array_map('trim', $selectedGenders);

        if (count($selectedGenders) >= 2) {
            $genderText = 'Boys, Girls';
        } elseif (in_array('boy', $selectedGenders)) {
            $genderText = 'Boys';
        } elseif (in_array('girl', $selectedGenders)) {
            $genderText = 'Girls';
        } else {
            $genderText = implode(', ', $selectedGenders);
        }

        // Build age text
        $ageLabels = ['baby' => '0-3Y', 'toddlers' => '2-6Y', 'kids' => '6-14Y'];
        $selectedAges = is_array($request->selected_age)
            ? $request->selected_age
            : array_filter(explode(',', $request->selected_age ?? ''));
        $agesText = implode(', ', array_map(
            fn($a) => $ageLabels[strtolower(trim($a))] ?? trim($a),
            $selectedAges
        ));

        // Build business type section (optional)
        $businessTypeSection = !empty($request->businessType)
            ? "\nBusiness Type: {$request->businessType}"
            : '';

        // Build product types section (optional)
        $selectedProducts = is_array($request->selected_product)
            ? $request->selected_product
            : array_filter(explode(',', $request->selected_product ?? ''));
        $selectedProducts = array_map('trim', array_filter($selectedProducts));
        $productTypeSection = '';
        if (!empty($selectedProducts)) {
            $productsList = implode("\n", array_map(fn($p) => "* {$p}", $selectedProducts));
            $productTypeSection = "\n\nProduct Type:\n{$productsList}";
        }

        // Build notes section (optional)
        $notesSection = !empty($request->message)
            ? "\n\nNotes:\n{$request->message}"
            : '';

        // Build language name
        $languageNames = [
            'en' => 'English', 'ar' => 'Arabic', 'fa' => 'Farsi', 'fr' => 'French',
            'ru' => 'Russian', 'es' => 'Spanish', 'sw' => 'Swahili', 'af' => 'Afrikaans',
            'sq' => 'Albanian', 'am' => 'Amharic', 'hy' => 'Armenian', 'az' => 'Azerbaijani',
            'gu' => 'Gujarati', 'ha' => 'Hausa', 'hi' => 'Hindi', 'kk' => 'Kazakh',
            'ku' => 'Kurdish', 'mn' => 'Mongolian', 'ps' => 'Pashto', 'pt' => 'Portuguese',
            'so' => 'Somali', 'tr' => 'Turkish', 'ur' => 'Urdu', 'uz' => 'Uzbek',
            'yo' => 'Yoruba', 'zu' => 'Zulu',
        ];
        $langName = $languageNames[$request->selected_lang ?? 'en'] ?? 'English';

        $message = "Name: {$request->name}\n" .
            "Business: {$request->businessName}{$businessTypeSection}\n" .
            "\nInterested in wholesale\nclothing for:\n" .
            "\nGender: {$genderText}\n" .
            "Age: {$agesText}" .
            $productTypeSection .
            $notesSection .
            "\nLanguage: {$langName}";

        // Redirect to WhatsApp
        $number = config('global_values.admin_whatsapp_number');
        $whatsappUrl = "https://api.whatsapp.com/send/?phone={$number}&text=" . urlencode($message);
    
        return redirect()->away($whatsappUrl);
        
    }

    public function whatsaapInquiry(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'number' => 'required',
        //     'message' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        WhatsappInquiry::create([
            'number'  => $request->number,
            'message'  => $request->message,
        ]);
    
        $timestamp = Carbon::now()->format('Y-m-d H:i:s');
        // Google Sheet expects:
        $sheetsData = [
            'form_type' => 'whatsapp inquiry',
            'contact'   => $request->number,
            'message'  => $request->message,
            'date'      => $timestamp,
        ];
        // Send to Google Sheets
        try { 
            $response =  Http::withBody(json_encode($sheetsData), 'application/json')
                    ->post('https://script.google.com/macros/s/AKfycbyTWZnYVejCiY9xiZRPEe_zNS-OA8okFRuYDLMwl2aJ_b-LKwZ5jGI9Qsx4Ot6vE2kF/exec');
            if ($response->failed()) {
                \Log::error('Google Sheet request failed: '.$response->body());
            }
        } catch (\Exception $e) {
            \Log::error('Google Sheets Exception (WhatsApp Inquiry):', [
                'message'   => $e->getMessage(),
                'trace'     => $e->getTraceAsString(),
                'data_sent' => $sheetsData
            ]);
        }

        // Redirect to WhatsApp
        $number = config('global_values.admin_whatsapp_number');
        $message = 'Inquiry from the website with Phone No. - '. $number.' and Message - '. $request->message;
        $whatsappUrl = "https://api.whatsapp.com/send/?phone={$number}&text=" . urlencode($message);
   
        return redirect()->away($whatsappUrl);
    }
    
}
    