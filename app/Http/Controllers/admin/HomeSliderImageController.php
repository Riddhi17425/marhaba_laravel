<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSliderImage;
use Illuminate\Support\Facades\Validator;

class HomeSliderImageController extends Controller
{
    public function index()
    {
        $homeSliderImg = HomeSliderImage::paginate(15);
        return view('admin.homeslider_image.index', compact('homeSliderImg'));
    }

    public function create()
    {
        return view('admin.homeslider_image.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_slider_image'   => 'required|array',          // ensure it's an array
            'first_slider_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // each file

            'second_slider_image'   => 'required|array',          // ensure it's an array
            'second_slider_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // each file

            'third_slider_image'   => 'required|array',          // ensure it's an array
            'third_slider_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // each file
        ], [
            'first_slider_image.required'       => 'Please upload at least one image.',
            'first_slider_image.array'          => 'Invalid image input.',
            'first_slider_image.*.image'        => 'Each file must be an image.',
            'first_slider_image.*.mimes'        => 'Each image must be jpeg, png, jpg, gif, or svg.',
            'first_slider_image.*.max'          => 'Each image may not be greater than 2MB.',

            'second_slider_image.required'       => 'Please upload at least one image.',
            'second_slider_image.array'          => 'Invalid image input.',
            'second_slider_image.*.image'        => 'Each file must be an image.',
            'second_slider_image.*.mimes'        => 'Each image must be jpeg, png, jpg, gif, or svg.',
            'second_slider_image.*.max'          => 'Each image may not be greater than 2MB.',

            'third_slider_image.required'       => 'Please upload at least one image.',
            'third_slider_image.array'          => 'Invalid image input.',
            'third_slider_image.*.image'        => 'Each file must be an image.',
            'third_slider_image.*.mimes'        => 'Each image must be jpeg, png, jpg, gif, or svg.',
            'third_slider_image.*.max'          => 'Each image may not be greater than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        if ($request->hasFile('first_slider_image')) {
            foreach ($request->file('first_slider_image') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('homeslider_images'), $imageName);
                HomeSliderImage::create([
                    'image'     => $imageName,
                    'slider'    => 1
                ]);
            }
        }
        if ($request->hasFile('second_slider_image')) {
            foreach ($request->file('second_slider_image') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('homeslider_images'), $imageName);
                HomeSliderImage::create([
                    'image'     => $imageName,
                    'slider'    => 2
                ]);
            }
        }
        if ($request->hasFile('third_slider_image')) {
            foreach ($request->file('third_slider_image') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('homeslider_images'), $imageName);
                HomeSliderImage::create([
                    'image'     => $imageName,
                    'slider'    => 3
                ]);
            }
        }

        return redirect()->route('homeslider-image.index')->with('success', 'Home Slider Image added successfully!');
    }


    public function edit(string $id)
    {
        $homeSlider = HomeSliderImage::where('slider', $id)->get();
        return view('admin.homeslider_image.edit', compact('homeSlider', 'id'));
    }

    public function update(Request $request, string $id) // Un - Used
    { 
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|array',
             'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.array' => 'Images must be in array format.',
            'image.*.image' => 'Each file must be an image.',
            'image.*.mimes' => 'Each image must be jpeg, png, jpg, or gif format.',
            'image.*.max' => 'Each image size must not exceed 2MB.',
        ]);
        if ($validator->fails()) {
            echo "<pre>"; print_r($validators->error()); die;
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $image = $file->file('image');
                $imageName = $image->getClientOriginalName();
                $file->move(public_path('homeslider_images'), $imageName);
                HomeSliderImage::create([
                    'slider' => $id,
                    'image' => $filename
                ]);
            }
        }

        return redirect()->route('homeslider-image.index')->with('success', 'Home Slider Image updated successfully!');
    }

    public function updateBySlider(Request $request, $slider)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ], [
            'image.array' => 'Images must be in array format.',
            'image.*.image' => 'Each file must be an image.',
            'image.*.mimes' => 'Each image must be jpeg, png, jpg, or gif format.',
            'image.*.max' => 'Each image size must not exceed 4MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = $file->getClientOriginalName();
                $file->move(public_path('homeslider_images'), $imageName);
                HomeSliderImage::create([
                    'slider' => $slider,
                    'image' => $imageName
                ]);
            }
        }

        return redirect()->route('homeslider-image.index')
            ->with('success', 'Home Slider Image updated successfully!');
    }

    public function deleteImage($id)
    {
        $image = HomeSliderImage::findOrFail($id);
        // if (file_exists(public_path('homeslider_images/' . $image->image))) {
        //     unlink(public_path('homeslider_images/' . $image->image));
        // }
        $image->delete();

        return response()->json(['success' => true]);
    }
}
