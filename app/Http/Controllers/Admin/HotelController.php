<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

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
            'name' => 'required',
            'location' => 'required',
            'description' => 'nullable'
        ]);

        Hotel::create($request->only('name', 'location', 'description'));

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel added!');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'description' => 'nullable'
        ]);

        $hotel->update($request->only('name', 'location', 'description'));

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated!');
    }
    
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted!');
    }
}
