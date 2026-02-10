<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->paginate(15); 
        return view('admin.brand.brandlisting', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.addbrand'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;

        // Image upload
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path('brand_images'), $filename);
            $brand->image = $filename;
        }

        $brand->save();
        return redirect()->route('brand.index')->with('success','brand added successfully.');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.editbrand', compact('brand'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path('brand_images'), $filename);
            $brand->image = $filename;
        }

        $brand->save();
        return redirect()->route('brand.index')->with('success','brand updated successfully.');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete(); 
        return redirect()->back()->with('success','brand deleted successfully.');
    }
}
