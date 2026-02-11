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
use App\Models\{ClothSize, CatalogueImage, TrustedBy, WhyChooseUs, Contact};

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
        $catImgs = CatalogueImage::select('id', 'image')->get();
        $trustedBy = TrustedBy::select('id', 'image', 'title', 'desc')->latest()->take(5)->get();
        $whyChooseUs = WhyChooseUs::select('id', 'title', 'desc')->get();
        $brand = Brand::select('id', 'name', 'image')->where('deleted_at', null)->limit(3)->get();
         $collection = Product::select('id', 'type', 'category_id','name','url','image','product_brand_size')->whereNull('deleted_at')->where('show_homepage', 1)->latest()->take(6);
        $boysCollection = (clone $collection)->where('type', 'boy')->get();
        $girlsCollection = (clone $collection)->where('type', 'girl')->get();
        $globalpresence = GlobalPresence::select('id', 'logo_name', 'logo_image')->where('deleted_at', null)->get();
        $ageSections = config('global_values.age_section');
        
        $products = Product::select('id', 'type', 'category_id','name','url','image','product_brand_size')->orderBy('created_at', 'desc')->whereNull('deleted_at')->get();
        
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
            $productsByAge[$group] = $query->distinct()->get();
        }

        return view('front.home', compact('brand', 'boysCollection', 'girlsCollection', 'globalpresence', 'ageSections', 'groupedSizes', 'productsByAge', 'catImgs', 'trustedBy', 'whyChooseUs'));
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
            foreach ($ageSections as $key => $section) {
                if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
                    $result[$key][] = $size;
                    break; 
                    
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
        $products = $products->whereNull('deleted_at')->get();
       
        $categories = Category::select('id', 'name', 'url')->whereNull('deleted_at')->get();
        if(isset($categories) && is_countable($categories) && count($categories)){
            foreach($categories as $key => $val){
                $val->total_category_product = $this->getTotalProductByCategory($val->id, $type);
            }
        }
        $clothsizes = Clothsize::all()->keyBy('id');
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
                foreach ($ageSections as $sectionKey => $section) {
                    // If any overlap between size range and section range
                    if ($range['min'] >= $section['min'] && $range['max'] <= $section['max']) {
                        if(strtolower($sectionKey) == 'baby'){
                            $data['baby'] += 1;
                        }elseif(strtolower($sectionKey) == 'kids'){
                            $data['kids'] += 1;
                        }elseif(strtolower($sectionKey) == 'junior'){
                            $data['junior'] += 1;
                        }
                        // Assign product to this age section if not already assigned
                        //if (!in_array($product, $groupedProducts[$sectionKey]['products'], true)) {
                            $totalProducts += 1; 
                            $groupedProducts[$sectionKey]['products'][][$sizeName] = $product;
                            $filterProducts['products'][][$sizeName] = $product;
                        //}
                        // Optional: break if you want product only in one section
                        break;
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
                return ($rangeA['min'] ?? 0) <=> ($rangeB['min'] ?? 0);
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

                    return ($rangeA['min'] ?? 0) <=> ($rangeB['min'] ?? 0);
                });
            }

            return response()->json([
                'filterProducts' => $filterProducts,
                'totalProducts' => $totalProducts,
                'html' => view('front.product_list_ajax', compact('filterProducts'))->render()
            ]);
            //return view('front.product_list_ajax', compact('filterProducts', 'totalProducts'));
        }
        
        return view('front.product_list', compact('groupedProducts', 'totalProducts', 'type', 'data', 'brands', 'categories', 'ageSection'));
    }

    protected function getTotalProductByBrand($brandId, $type)
    {
        $products = Product::where(['brand_id' => $brandId,'type' => $type])->whereNull('deleted_at')->get(['product_brand_size']);
        $clothsizes = Clothsize::all()->keyBy('id');
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
                'type' => $type
            ])
            ->whereNull('deleted_at')
            ->get(['product_brand_size']);

        $clothsizes = Clothsize::all()->keyBy('id');
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

                foreach ($ageSections as $section) {

                    if ($range['min'] >= $section['min'] &&
                        $range['max'] <= $section['max']) {

                        $total++; // count per matching size
                        break;
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
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
    