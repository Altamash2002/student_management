<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Room;

class UserController extends Controller
{
    public function dashboard()
    {
        return redirect()->route('user.hotels');
    }

    public function hotels(Request $request)
    {
        $locations = Hotel::select('location')->distinct()->pluck('location');

        $query = Hotel::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $hotels = $query->latest()->get();

        return view('user.hotels.index', compact('hotels', 'locations'));
    }

    public function showHotel(Request $request, Hotel $hotel)
    {
        $rooms = $hotel->rooms();

        if ($request->filled('status')) {
            $rooms->where('status', $request->status);
        }

        if ($request->filled('min_price')) {
            $rooms->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $rooms->where('price', '<=', $request->max_price);
        }

        $rooms = $rooms->get();

        return view('user.hotels.show', compact('hotel', 'rooms'));
}
}
