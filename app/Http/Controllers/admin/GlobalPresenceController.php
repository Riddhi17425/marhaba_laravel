<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalPresence;
use Illuminate\Http\Request;

class GlobalPresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = GlobalPresence::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.globalpresence.globalpresencelisting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.globalpresence.addglobalpresence');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255'
        ]);

        $globalPresence = new GlobalPresence();
        $globalPresence->name = $request->name;
        $globalPresence->cat_title = $request->cat_title;
        $globalPresence->description = $request->description;
        $globalPresence->logo_name = $request->logo_name;

        if ($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('GlobalPresence_Logo_Image'), $filename);
            $globalPresence->logo_image = $filename;
        }

        $globalPresence->save();

        return redirect()->route('globalpresence.index')->with('success', 'Global Presence Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = GlobalPresence::find($id);
        return view('admin.globalpresence.editglobalpresence', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255'
        ]);

        $globalPresence = GlobalPresence::find($id);
        $globalPresence->name = $request->name;
        $globalPresence->cat_title = $request->cat_title;
        $globalPresence->description = $request->description;
        $globalPresence->logo_name = $request->logo_name;

        if ($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('GlobalPresence_Logo_Image'), $filename);
            $globalPresence->logo_image = $filename;
        }

        $globalPresence->save();

        return redirect()->route('globalpresence.index')->with('success', 'Global Presence Updated Successfully');
    }

    /**
     * Soft Delete the specified resource.
     */
    public function destroy($id)
    {
        $globalPresence = GlobalPresence::find($id);

        if ($globalPresence) {
            $globalPresence->delete();
            return redirect()->back()->with('success', 'Global Presence Has Been Deleted Successfully');
        }

        return redirect()->back()->with('error', 'Global Presence Not Found');
    }
}
