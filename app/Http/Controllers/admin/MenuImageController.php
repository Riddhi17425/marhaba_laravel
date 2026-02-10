<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuImage;
use App\Models\Category;
use App\Models\Product;
use App\Models\ClothSize;

class MenuImageController extends Controller
{
    public function index()
    {
        $menuImages = MenuImage::withTrashed()->paginate(15);
        return view('admin.menuimage.menuimagelisting', compact('menuImages'));
    }

    // public function create()
    // {
    //     $categories = Category::whereNull('deleted_at')->get();
    //     $products = Product::whereNull('deleted_at')->get();
    //     $sizes = ClothSize::whereNull('deleted_at')->get();

    //     return view('admin.menuimage.menuimage', compact('categories','products','sizes'));
    // }
    public function create()
    {
        $categories = Category::whereNull('deleted_at')->select('id', 'name')->distinct()->get();
    
        $sizes = ClothSize::whereNull('deleted_at')
            ->select('id', 'name')
            ->get()
            ->unique('name')
            ->values();
    
        $products = Product::whereNull('deleted_at')
            ->select('id', 'product_detail_name as name')
            ->get()
            ->unique('name')
            ->values();
    
        return view('admin.menuimage.menuimage', compact('categories', 'sizes', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'reference_id' => 'required',
            'type' => 'required|in:category,product,size'
        ]);
        
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('menu_images'), $fileName);
        }
        
        MenuImage::create([
            'type' => $request->type,
            'reference_id' => $request->reference_id,
            'image' => $fileName
        ]);
        
        return redirect()->route('menuimage.index')->with('success', 'Menu image added successfully');
    }

    public function edit($id)
    {
        $menuImage = MenuImage::findOrFail($id);
        $categories = Category::whereNull('deleted_at')->get();
        // $products = Product::whereNull('deleted_at')->get();
        // $sizes = ClothSize::whereNull('deleted_at')->get();
        $sizes = ClothSize::whereNull('deleted_at')
            ->select('id', 'name')
            ->get()
            ->unique('name')
            ->values();
    
        $products = Product::whereNull('deleted_at')
            ->select('id', 'product_detail_name as name')
            ->get()
            ->unique('name')
            ->values();

        return view('admin.menuimage.editmenuimage', compact('menuImage','categories','products','sizes'));
    }

    public function update(Request $request, $id)
    {
        $menuImage = MenuImage::findOrFail($id);

        $request->validate([
            'image' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $fileName = $request->image->getClientOriginalName();
            $request->image->move(public_path('menu_images'), $fileName);
            $menuImage->image = $fileName;
        }

        $menuImage->type = $request->type;
        $menuImage->reference_id = $request->reference_id;
        $menuImage->save();

        return redirect()->route('menuimage.index')->with('success', 'Menu image updated successfully');
    }

    public function destroy($id)
    {
        $menuImage = MenuImage::findOrFail($id);
        $menuImage->delete();
        return redirect()->back()->with('success','Menu image deleted successfully');
    }
}
