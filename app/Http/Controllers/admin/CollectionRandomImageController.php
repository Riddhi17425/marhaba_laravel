<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollectionRandomImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CollectionRandomImageController extends Controller
{
    public function index()
    {
        $collectionRandomImg = CollectionRandomImage::paginate(15);
        return view('admin.collection_random_image.index', compact('collectionRandomImg'));
    }

    public function create()
    {
        return view('admin.collection_random_image.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'girl_collection_image'   => 'required|array',          // ensure it's an array
            'girl_collection_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // each file

            'boy_collection_image'   => 'required|array',          // ensure it's an array
            'boy_collection_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // each file
        ], [
            'girl_collection_image.required'       => 'Please upload at least one image.',
            'girl_collection_image.array'          => 'Invalid image input.',
            'girl_collection_image.*.image'        => 'Each file must be an image.',
            'girl_collection_image.*.mimes'        => 'Each image must be jpeg, png, jpg, gif, or svg.',
            'girl_collection_image.*.max'          => 'Each image may not be greater than 2MB.',

            'boy_collection_image.required'       => 'Please upload at least one image.',
            'boy_collection_image.array'          => 'Invalid image input.',
            'boy_collection_image.*.image'        => 'Each file must be an image.',
            'boy_collection_image.*.mimes'        => 'Each image must be jpeg, png, jpg, gif, or svg.',
            'boy_collection_image.*.max'          => 'Each image may not be greater than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        if ($request->hasFile('boy_collection_image')) {
            foreach ($request->file('boy_collection_image') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('collection_random_image'), $imageName);
                CollectionRandomImage::create([
                    'image'     => $imageName,
                    'section'    => 1
                ]);
            }
        }
        if ($request->hasFile('girl_collection_image')) {
            foreach ($request->file('girl_collection_image') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('collection_random_image'), $imageName);
                CollectionRandomImage::create([
                    'image'     => $imageName,
                    'section'    => 2
                ]);
            }
        }

        return redirect()->route('collection-random-image.index')->with('success', 'Collection Random Image added successfully!');
    }


    public function edit(string $id)
    {
        $collectionSlider = CollectionRandomImage::where('section', $id)->get();
        return view('admin.collection_random_image.edit', compact('collectionSlider', 'id'));
    }

    public function updateBySlider(Request $request, $section)
    {
        // Only validate if there are new images being added
        $rules = [
            'new_image' => 'nullable|array',
            'new_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'new_name' => 'nullable|array',
            'new_name.*' => 'nullable|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'new_image.array' => 'Images must be in array format.',
            'new_image.*.image' => 'Each file must be a valid image.',
            'new_image.*.mimes' => 'Each image must be jpeg, png, jpg, gif, svg, or webp format.',
            'new_image.*.max' => 'Each image size must not exceed 2MB.',
            'new_name.array' => 'Names must be in array format.',
            'new_name.*.string' => 'Each name must be text.',
            'new_name.*.max' => 'Each name may not exceed 255 characters.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $savedCount = 0;

        // Process new images
        if ($request->hasFile('new_image')) {
            $images = $request->file('new_image');
            $names = $request->input('new_name', []);

            foreach ($images as $key => $file) {
                // Skip if file is null or empty
                if ($file && $file->isValid()) {
                    try {
                        // Generate unique filename to avoid overwrites
                        $timestamp = time();
                        $imageName = $timestamp . '_' . $file->getClientOriginalName();
                        
                        // Ensure directory exists
                        if (!is_dir(public_path('collection_random_image'))) {
                            mkdir(public_path('collection_random_image'), 0755, true);
                        }
                        
                        // Move file
                        $file->move(public_path('collection_random_image'), $imageName);
                        
                        // Get name or use filename
                        $name = isset($names[$key]) && !empty($names[$key]) ? trim($names[$key]) : '';
                        
                        // Create database record
                        CollectionRandomImage::create([
                            'section' => $section,
                            'image' => $imageName,
                            'name' => $name,
                            'is_active' => 1
                        ]);
                        
                        $savedCount++;
                    } catch (\Exception $e) {
                        \Log::error('Error saving collection image: ' . $e->getMessage());
                        return redirect()->back()
                            ->withErrors(['error' => 'Error saving image: ' . $e->getMessage()])
                            ->withInput();
                    }
                }
            }
        }

        $message = $savedCount > 0 
            ? "$savedCount new image(s) added successfully!" 
            : 'No new images were added.';

        return redirect()->route('collection-random-image.index')
            ->with('success', 'Collection images updated successfully!');
    }

    public function deleteRandomImage($id)
    {
        $image = CollectionRandomImage::findOrFail($id);
        // if (file_exists(public_path('homeslider_images/' . $image->image))) {
        //     unlink(public_path('homeslider_images/' . $image->image));
        // }
        $image->delete();

        return response()->json(['success' => true]);
    }
}
