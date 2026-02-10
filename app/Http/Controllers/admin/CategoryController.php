<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','desc')->paginate(15); 
        return view('admin.category.categorylisting', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.addcategory'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'url'=>'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->url = $request->url;
        $category->description = $request->description;

        // Image upload
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path('category_images'), $filename);
            $category->image = $filename;
        }
        if($request->hasFile('menu_image')){
            $filename = $request->menu_image->getClientOriginalName();
            $request->menu_image->move(public_path('menu_category_images'), $filename);
            $category->menu_image = $filename;
        }

        $category->save();
        return redirect()->route('category.index')->with('success','Category added successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.editcategory', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'url'=>'required'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->url = $request->url;
        $category->description = $request->description;

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path('category_images'), $filename);
            $category->image = $filename;
        }
        if($request->hasFile('menu_image')){
            $filename = $request->menu_image->getClientOriginalName();
            $request->menu_image->move(public_path('menu_category_images'), $filename);
            $category->menu_image = $filename;
        }


        $category->save();
        return redirect()->route('category.index')->with('success','Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete(); // soft delete
        return redirect()->back()->with('success','Category deleted successfully.');
    }
}
