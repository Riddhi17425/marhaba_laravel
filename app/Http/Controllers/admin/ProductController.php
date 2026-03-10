<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ClothSize;
use App\Models\ClothColor;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'DESC')->paginate(15);
        return view('admin.product.productlisting', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        $sizes = ClothSize::orderBy('name')->get();
        $colors = ClothColor::orderBy('name')->get();

        return view('admin.product.addproduct', compact('categories', 'brands', 'sizes', 'colors'));
    }

    public function store(Request $request)
    {
        //try {
            $validator = Validator::make($request->all(), [
                'product_type' => 'required|string|max:255',
                'category_id' => 'nullable|string|max:255',
                'brand_id' => 'nullable|string|max:255',
                'name' => 'required|string|max:255',
                'url' => 'required|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:1000',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Please fix the validation errors.');
            }

            $product = new Product();
            $product->type = $request->product_type;
            $product->name = $request->name;
            $product->url = $request->url;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->description = $request->description;
            $product->product_detail_name = $request->product_detail_name;
            $product->key_features = $request->key_features;
            $product->more_information = $request->more_information;
            $product->show_homepage = $request->has('show_homepage') ? 1 : 0;
            $product->meta_title = $request->meta_title ?? null;
            $product->meta_description = $request->meta_description ?? null;

            if ($request->hasFile('image')) {
                $filename = $request->image->getClientOriginalName();
                $request->image->move(public_path('product_images'), $filename);
                $product->image = $filename;
            }

            $sizeImageData = [];

            if ($request->has('size_id') && is_array($request->size_id)) {
                foreach ($request->size_id as $key => $sizeId) {
                    //$sizeId = $request->size_id[$key] ?? null;
                    //$colorId = $request->color_id[$key] ?? null;
                    $productImage = null;

                    if ($request->hasFile("product_image.$key")) {
                        $file = $request->file("product_image.$key");
                        $filename = $file->getClientOriginalName();
                        $file->move(public_path('product_images'), $filename);
                        $productImage = $filename;
                    }

                    $sizeImageData[] = [
                        'product_image' => $productImage,
                        //'brand_id' => $brandId,
                        'size_id' => $sizeId,
                        'is_human_image' => isset($request->is_human_image[$key]) ? 1 : 0,
                        //'color_id' => $colorId
                    ];
                }
            }

            $product->product_brand_size = json_encode($sizeImageData);
            $product->save();

            // PRODUCT NAME TRANSLATION START
            $productName = $product->name;
            // English is identity
            $translations['en'] = [$productName => $productName];
            // Translate into other languages
            foreach (config('global_values.languages') as $lang) {
                try {
                    $tr = new GoogleTranslate();
                    $tr->setTarget($lang);
                    $translations[$lang] = [$productName => $tr->translate($productName)
                    ];
                } catch (\Exception $e) {
                    // fallback to English
                    $translations[$lang] = [
                        $productName => $productName
                    ];
                }
            }
            $product->translations = $translations;
            $product->save();
            // PRODUCT NAME TRANSLATION END

            return redirect()->route('product.index')->with('success', 'Product added successfully.');
        // } catch (\Exception $e) {
        //     Log::error('Product store failed: ' . $e->getMessage(), [
        //         'request_data' => $request->all(),
        //         'files' => $request->file()
        //     ]);
        //     return redirect()->back()->withInput()->with('error', 'Failed to add product: ' . $e->getMessage());
        // }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        $sizes = ClothSize::orderBy('name')->get();
        $colors = ClothColor::orderBy('name')->get();
        $productBrandSize = $product->product_brand_size ? json_decode($product->product_brand_size, true) : [];

        return view('admin.product.editproduct', compact('product', 'categories', 'brands', 'sizes', 'colors', 'productBrandSize'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_type' => 'required|string|max:255',
                'category_id' => 'nullable|string|max:255',
                'brand_id' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'url' => 'required|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:1000',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Please fix the validation errors.');
            }

            $product = Product::findOrFail($id);
            $existingProductName = strtolower($product->name);

            $product->type = $request->product_type;
            $product->name = $request->name;
            $product->url = $request->url;
            if(isset($request->brand_id))
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->product_detail_name = $request->product_detail_name;
            $product->key_features = $request->key_features;
            $product->more_information = $request->more_information;
            $product->show_homepage = $request->has('show_homepage') ? 1 : 0;
            $product->meta_title = $request->meta_title ?? null;
            $product->meta_description = $request->meta_description ?? null;

            if ($request->hasFile('image')) {
                $filename = $request->image->getClientOriginalName();
                $request->image->move(public_path('product_images'), $filename);
                $product->image = $filename;
            }

            $sizeImageData = [];

            if ($request->has('size_id') && is_array($request->size_id)) {
                foreach ($request->size_id as $index => $sizeId) {
                    $productImage = $request->old_product_image[$index] ?? null;
                    if ($request->hasFile("product_image.$index")) {
                        $imgFile = $request->file("product_image.$index");
                        $imgName = $imgFile->getClientOriginalName();
                        $imgFile->move(public_path('product_images'), $imgName);
                        $productImage = $imgName;
                    }

                    $sizeImageData[] = [
                        'product_image' => $productImage,
                        //'brand_id' => $brandId,
                        //'size_id' => $request->size_id[$index],
                        'size_id' => $sizeId,
                        'is_human_image' => isset($request->is_human_image[$index]) ? 1 : 0,
                        //'color_id' => $request->color_id[$index]
                    ];
                }
            }

            $product->product_brand_size = json_encode($sizeImageData);
            $product->save();

            $newProductName = strtolower($product->name);
            // PRODUCT NAME TRANSLATION START
            if($existingProductName != $newProductName){
                $translations = [];
                $translations['en'] = [$newProductName => $newProductName];
                foreach (config('global_values.languages') as $lang) {
                    try {
                        $tr = new GoogleTranslate();
                        $tr->setTarget($lang);
                        $translations[$lang] = [$newProductName => $tr->translate($newProductName)
                        ];
                    } catch (\Exception $e) {
                        $translations[$lang] = [
                            $newProductName => $newProductName
                        ];
                    }
                }
                $product->update([
                    'translations' => $translations
                ]);
            }
            // PRODUCT NAME TRANSLATION END

            return redirect()->route('product.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            Log::error('Product update failed: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'files' => $request->file()
            ]);
            return redirect()->back()->withInput()->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            Log::error('Product delete failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete product: ' . $e->getMessage());
        }
    }
}