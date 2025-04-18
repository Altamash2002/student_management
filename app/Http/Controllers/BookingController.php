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

        $checkIn = $request->check_in;
        $checkOut = $request->check_out;

        // ❗ Check for existing confirmed bookings that overlap
        $overlap = Booking::where('room_id', $room->id)
            ->where('status', 'confirmed') // Only confirmed bookings block others
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
            })
            ->exists();

        if ($overlap) {
            return back()->with('error', 'This room is already booked for the selected dates.');
        }

        // ✅ No overlap → proceed with booking
        $days = now()->parse($checkIn)->diffInDays($checkOut);
        $total = $room->price * $days;

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'total_price' => $total,
            'status' => 'confirmed',
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

