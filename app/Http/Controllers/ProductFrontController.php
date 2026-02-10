<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ClothSize;
use App\Models\ClothColor;

class ProductFrontController extends Controller
{
    public function index($url)
    {
        $category = Category::where('url', $url)->firstOrFail();
    
        $brands = Brand::whereNull('deleted_at')->get();
        $clothSizes = ClothSize::whereNull('deleted_at')->get();
        $clothColors = ClothColor::whereNull('deleted_at')->get();
    
        //$products = Product::where('category_id', $category->id)
        $products = Product::where('type', $url)
            ->whereNull('deleted_at')
            ->get()
            ->flatMap(function ($p) {
                $pbsArray = json_decode($p->product_brand_size, true) ?? [];
    
                $groupedBySize = [];
                foreach ($pbsArray as $pbs) {
                    $sizeId = $pbs['size_id'] ?? 0;
                    if (!isset($groupedBySize[$sizeId])) {
                        $groupedBySize[$sizeId] = [
                            'size_id' => $sizeId,
                            'images' => [],
                            'brand_ids' => [],
                            'color_ids' => [],
                        ];
                    }
                    $groupedBySize[$sizeId]['images'][] = $pbs['product_image'] ?? null;
                    if (!empty($pbs['brand_id'])) $groupedBySize[$sizeId]['brand_ids'][] = $pbs['brand_id'];
                    if (!empty($pbs['color_id'])) $groupedBySize[$sizeId]['color_ids'][] = $pbs['color_id'];
                }
    
                return collect($groupedBySize)->map(function ($sizeGroup) use ($p, $pbsArray) {
                    // pick the second image if exists, otherwise first
                    $images = array_values(array_filter($sizeGroup['images']));
                    $mainImage = $images[1] ?? $images[0] ?? null;
    
                    return [
                        'id' => $p->id,
                        'name' => $p->name,
                        'url' => $p->url,
                        'category_id' => $p->category_id,
                        'created_at' => $p->created_at,
                        'size_id' => $sizeGroup['size_id'],
                        'images' => [$mainImage], // only main image for listing
                        'brand_ids' => array_unique($sizeGroup['brand_ids']),
                        'color_ids' => array_unique($sizeGroup['color_ids']),
                        // ADD THIS: Include the full product_brand_size array for filtering
                        'product_brand_size' => array_map(function($pbs) {
                            return [
                                'size_id' => $pbs['size_id'] ?? null,
                                'brand_id' => $pbs['brand_id'] ?? null,
                                'color_id' => $pbs['color_id'] ?? null,
                                'product_image' => $pbs['product_image'] ?? null,
                            ];
                        }, $pbsArray),
                    ];
                });
            });
    
        $productNames = $products->pluck('name')->unique();
    
        return view('front.productlist', compact(
            'category', 'products', 'brands', 'clothSizes', 'clothColors', 'productNames'
        ));
    }

    public function productdetails($url, $id = null) 
    {
        $product = Product::where('url', $url);
        if($id != null){
            $product = $product->where('id', $id);        
        }        
        $product = $product->firstOrFail();
    
        $productVariants = json_decode($product->product_brand_size, true);
    
        $sizeIds = array_unique(array_column($productVariants, 'size_id'));
        $brandIds = array_unique(array_column($productVariants, 'brand_id'));
    
        $sizeList = ClothSize::whereIn('id', $sizeIds)->get();
        $brandList = Brand::whereIn('id', $brandIds)->get();
    
        $similarProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->whereNull('deleted_at')
            ->get()
            ->map(function($p) {
                $pbsArray = json_decode($p->product_brand_size, true);
                return [
                    'id' => $p->id,
                    'name' => $p->name,
                    'url' => $p->url,
                    'image' => $pbsArray[1]['product_image'] ?? $pbsArray[0]['product_image'] ?? null, // second image if exists
                    'brand_id' => $pbsArray[1]['brand_id'] ?? $pbsArray[0]['brand_id'] ?? null,
                ];
            });
    
        $brandIdsForSimilar = $similarProducts->pluck('brand_id')->filter()->unique()->toArray();
        $brands = Brand::whereIn('id', $brandIdsForSimilar)->get()->keyBy('id');
    
        return view('front.productdetails', compact(
            'product', 'productVariants', 'sizeList', 'brandList', 'similarProducts', 'brands'
        ));
    }
}