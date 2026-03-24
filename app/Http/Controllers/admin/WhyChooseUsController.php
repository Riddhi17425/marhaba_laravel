<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use Illuminate\Support\Facades\Validator;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $whyChooseData = WhyChooseUs::paginate(15);
        return view('admin.whychooseus.index', compact('whyChooseData'));
    }

    public function create()
    {
        return view('admin.whychooseus.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'   => 'required|array',          // ensure it's an array
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // each file
        ], [
            'title.required'       => 'The title is required.',
            'title.string'         => 'The title must be a valid text.',
            'title.max'            => 'The title may not be greater than 255 characters.',
            'description.required' => 'The description is required.',
            'description.string'   => 'The description must be valid text.',
            'image.required'       => 'Please upload at least one image.',
            'image.array'          => 'Invalid image input.',
            'image.*.image'        => 'Each file must be an image.',
            'image.*.mimes'        => 'Each image must be jpeg, png, jpg, gif, or svg.',
            'image.*.max'          => 'Each image may not be greater than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $whyChooseUs = new WhyChooseUs();
        $whyChooseUs->title = $request->title ?? null;
        $whyChooseUs->desc = $request->description ?? null;
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('why_chooseus'), $imageName);
                $whyChooseUs->image = $imageName;
            }
        }
        $whyChooseUs->save();

        return redirect()->route('whychoose-us.index')->with('success', 'Trusted By added successfully!');
    }

    public function edit(string $id)
    {
        $whyChooseData = WhyChooseUs::find($id);
        return view('admin.whychooseus.edit', compact('whyChooseData'));
    }

    public function update(Request $request, string $id)
    { 
        $WhyChooseUs = WhyChooseUs::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required'       => 'The title is required.',
            'title.string'         => 'The title must be a valid text.',
            'title.max'            => 'The title may not be greater than 255 characters.',

            'description.required' => 'The description is required.',
            'description.string'   => 'The description must be valid text.',
            'image.image'          => 'The uploaded file must be an image.',
            'image.mimes'          => 'The image must be jpeg, png, jpg, or gif.',
            'image.max'            => 'The image size may not be greater than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $WhyChooseUs->title = $request->title;
        $WhyChooseUs->desc = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('why_chooseus'), $imageName);
            $WhyChooseUs->image = $imageName;
        }
        $WhyChooseUs->save();

        return redirect()->route('whychoose-us.index')->with('success', 'Data updated successfully!');

    }

    public function destroy($id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        $whyChooseUs->delete();

        return redirect()->back()->with('success', 'Data Deleted');
    }
}
