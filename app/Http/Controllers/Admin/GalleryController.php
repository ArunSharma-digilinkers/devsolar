<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'image' => $imagePath, // store full path
        ]);

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery image added successfully');
    }

    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            // delete old image
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            // upload new image
            $imagePath = $request->file('image')->store('gallery', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->save();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery updated successfully');
    }

    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        // delete image
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery deleted successfully');
    }
}