<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatalogueImage;
use Illuminate\Support\Facades\Validator;

class CatalogueImageController extends Controller
{
    public function index()
    {
        $catImgs = CatalogueImage::paginate(15);
        return view('admin.catalogue_image.index', compact('catImgs'));
    }

    public function create()
    {
        return view('admin.catalogue_image.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'   => 'required|array',          // ensure it's an array
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // each file
        ], [
            'image.required'       => 'Please upload at least one image.',
            'image.array'          => 'Invalid image input.',
            'image.*.image'        => 'Each file must be an image.',
            'image.*.mimes'        => 'Each image must be jpeg, png, jpg, gif, or svg.',
            'image.*.max'          => 'Each image may not be greater than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('catalogue_images'), $imageName);
                CatalogueImage::create([
                    'image'     => $imageName,
                ]);
            }
        }

        return redirect()->route('catalogue-image.index')->with('success', 'Catalogue Image added successfully!');
    }


    public function edit(string $id)
    {
        $catImg = CatalogueImage::find($id);
        return view('admin.catalogue_image.edit', compact('catImg'));
    }

    public function update(Request $request, string $id)
    { 
        $validator = Validator::make($request->all(), [
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.image'          => 'The uploaded file must be an image.',
            'image.mimes'          => 'The image must be jpeg, png, jpg, or gif.',
            'image.max'            => 'The image size may not be greater than 2MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $catImg = CatalogueImage::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('catalogue_images'), $imageName);
            $catImg->image = $imageName;
            $catImg->save();
        }

        return redirect()->route('catalogue-image.index')->with('success', 'Catalogue Image updated successfully!');
    }

    public function destroy($id)
    {
        try {
            $catalogueImg = CatalogueImage::findOrFail($id);
            $catalogueImg->delete();
            return redirect()->back()->with('success', 'Catalogue image deleted successfully');
        } catch (\Exception $e) {
            Log::error('Catalogue image delete failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete catalogue image: ' . $e->getMessage());
        }
    }
}
