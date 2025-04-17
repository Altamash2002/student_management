<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        return view('user.bookings.index', compact('bookings'));
    }

    public function create(Room $room)
    {
        return view('user.bookings.create', compact('room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $room = Room::findOrFail($request->room_id);

        $days = now()->parse($request->check_in)->diffInDays($request->check_out);
        $total = $room->price * $days;

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $total,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Room booked!');
    }

    public function destroy(Booking $booking)
    {
        // Optional: Ensure only the owner can cancel
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        if ($booking->status === 'pending') {
            $booking->update(['status' => 'cancelled']);
            $booking->room->update(['status' => 'available']); // ✅ make room available again
            return redirect()->route('bookings.index')->with('success', 'Booking cancelled.');
        }

        return redirect()->route('bookings.index')->with('error', 'Only pending bookings can be cancelled.');
    }
}

