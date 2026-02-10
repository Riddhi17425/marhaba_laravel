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
        ], [
            'title.required'       => 'The title is required.',
            'title.string'         => 'The title must be a valid text.',
            'title.max'            => 'The title may not be greater than 255 characters.',
            'description.required' => 'The description is required.',
            'description.string'   => 'The description must be valid text.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $whyChooseUs = new WhyChooseUs();
        $whyChooseUs->title = $request->title ?? null;
        $whyChooseUs->desc = $request->description ?? null;
        $whyChooseUs->save();

        return redirect()->route('whychoose-us.index')->with('success', 'Trusted By added successfully!');
    }

    public function edit(string $id)
    {
        $trustedBy = WhyChooseUs::find($id);
        return view('admin.whychooseus.edit', compact('trustedBy'));
    }

    public function update(Request $request, string $id)
    { 
        $WhyChooseUs = WhyChooseUs::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ], [
            'title.required'       => 'The title is required.',
            'title.string'         => 'The title must be a valid text.',
            'title.max'            => 'The title may not be greater than 255 characters.',

            'description.required' => 'The description is required.',
            'description.string'   => 'The description must be valid text.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $WhyChooseUs->title = $request->title;
        $WhyChooseUs->desc = $request->description;
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
