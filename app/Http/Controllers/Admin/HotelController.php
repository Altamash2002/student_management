<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::latest()->get();
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('admin.hotels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('name', 'location', 'description');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hotels', 'public');
            $data['image'] = $imagePath;
        }

        Hotel::create($data);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel added successfully!');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only('name', 'location', 'description');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hotels', 'public');
            $data['image'] = $imagePath;
        }

        $hotel->update($data);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated!');
    }
    
    public function destroy(Hotel $hotel)
    {
        if ($hotel->image) {
            Storage::disk('public')->delete($hotel->image);
        }
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted!');
    }
}
