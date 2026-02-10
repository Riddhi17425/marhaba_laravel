<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutImage;

class AboutImageController extends Controller
{
    public function index()
    {
        $aboutImages = AboutImage::orderBy('id','desc')->paginate(15); 
        return view('admin.aboutimage.aboutimagelisting', compact('aboutImages'));
    }

    public function create()
    {
        return view('admin.aboutimage.addaboutimage'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $aboutImage = new AboutImage();
        $aboutImage->name = $request->name;

        // Image upload
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path('about_images'), $filename);
            $aboutImage->image = $filename;
        }

        $aboutImage->save();
        return redirect()->route('aboutimage.index')->with('success','About Image added successfully.');
    }

    public function edit($id)
    {
        $aboutImage = AboutImage::findOrFail($id);
        return view('admin.aboutimage.editaboutimage', compact('aboutImage'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $aboutImage = AboutImage::findOrFail($id);
        $aboutImage->name = $request->name;

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path('about_images'), $filename);
            $aboutImage->image = $filename;
        }

        $aboutImage->save();
        return redirect()->route('aboutimage.index')->with('success','About Image updated successfully.');
    }

    public function destroy($id)
    {
        $aboutImage = AboutImage::findOrFail($id);
        $aboutImage->delete(); 
        return redirect()->back()->with('success','About Image deleted successfully.');
    }
}
