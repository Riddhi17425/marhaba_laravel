<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrustedBy;
use Illuminate\Support\Facades\Validator;

class TrustedByController extends Controller
{
    public function index()
    {
        $trustedByData = TrustedBy::paginate(15);
        return view('admin.trusted_by.index', compact('trustedByData'));
    }

    public function create()
    {
        return view('admin.trusted_by.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required'       => 'The title is required.',
            'title.string'         => 'The title must be a valid text.',
            'title.max'            => 'The title may not be greater than 255 characters.',
            'description.required' => 'The description is required.',
            'description.string'   => 'The description must be valid text.',
            'image.required'       => 'An image is required.',
            'image.image'          => 'The uploaded file must be an image.',
            'image.mimes'          => 'The image must be jpeg, png, jpg, or gif.',
            'image.max'            => 'The image size may not be greater than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $trustedBy = new TrustedBy();
        $trustedBy->title = $request->title ?? null;
        $trustedBy->desc = $request->description ?? null;
        $trustedBy->save();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('trusted_by_images/'), $imageName);
            $trustedBy->image = $imageName;
        }
        $trustedBy->save();

        return redirect()->route('trusted-by.index')->with('success', 'Trusted By added successfully!');
    }

    public function edit(string $id)
    {
        $trustedBy = TrustedBy::find($id);
        return view('admin.trusted_by.edit', compact('trustedBy'));
    }

    public function update(Request $request, string $id)
    { 
        $trustedBy = TrustedBy::findOrFail($id);
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

        $trustedBy->title = $request->title;
        $trustedBy->desc = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('trusted_by_images/'), $imageName);
            $trustedBy->image = $imageName;
        }

        $trustedBy->save();

        return redirect()->route('trusted-by.index')->with('success', 'Data updated successfully!');

    }

    public function destroy(TrustedBy $trustedBy)
    {
        $trustedBy->delete();

        return redirect()->back()->with('success', 'Data Deleted');
    }
}
