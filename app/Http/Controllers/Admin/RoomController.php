<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('hotel')->latest()->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        return view('admin.rooms.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_number' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:available,booked',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        
        $roomData = $request->only('hotel_id', 'room_number', 'type', 'price', 'status');
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
            echo $imagePath;
            $roomData['image'] = $imagePath;
        }
        
        Room::create($roomData);
        
        return redirect()->route('admin.rooms.index')->with('success', 'Room added!');
    }

    public function edit(Room $room)
    {
        $hotels = Hotel::all();
        return view('admin.rooms.edit', compact('room', 'hotels'));
    }
    
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_number' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:available,booked',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('hotel_id', 'room_number', 'type', 'price', 'status');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
            $data['image'] = $imagePath;
        }

        $room->update($data);

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully!');
    }

    public function destroy(Room $room)
    {
        
        if ($room->image) {
            Storage::disk('public')->delete($room->image);
        }
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully!');
    }


}

