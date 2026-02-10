<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClothColor;

class ClothColorController extends Controller
{
    public function index()
    {
        $clothcolors = ClothColor::orderBy('id','desc')->paginate(15); 
        return view('admin.clothcolor.clothcolorlisting', compact('clothcolors'));
    }

    public function create()
    {
        return view('admin.clothcolor.addclothcolor'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $clothcolor = new ClothColor();
        $clothcolor->name = $request->name;
        $clothcolor->color_code = $request->color_code;

        $clothcolor->save();
        return redirect()->route('clothcolor.index')->with('success','Cloth Color added successfully.');
    }

    public function edit($id)
    {
        $clothcolor = ClothColor::findOrFail($id);
        return view('admin.clothcolor.editclothcolor', compact('clothcolor'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $clothcolor = ClothColor::findOrFail($id);
        $clothcolor->name = $request->name;
        $clothcolor->color_code = $request->color_code;


        $clothcolor->save();
        return redirect()->route('clothcolor.index')->with('success','Cloth Color updated successfully.');
    }

    public function destroy($id)
    {
        $clothcolor = ClothColor::findOrFail($id);
        $clothcolor->delete(); 
        return redirect()->back()->with('success','Cloth Color deleted successfully.');
    }
}
