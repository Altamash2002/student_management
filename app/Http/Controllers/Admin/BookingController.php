<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user', 'room.hotel')->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function confirm(Booking $booking)
    {
        if ($booking->status === 'pending') {
            $booking->update(['status' => 'confirmed']);
            $booking->room->update(['status' => 'booked']);

            return redirect()->back()->with('success', 'Booking confirmed.');
        }

        return redirect()->back()->with('error', 'Only pending bookings can be confirmed.');
    }

    public function cancel(Booking $booking)
    {
        if ($booking->status === 'pending') {
            $booking->update(['status' => 'cancelled']);
            // No need to update room here — it's still available
            return redirect()->back()->with('success', 'Booking cancelled.');
        }

        return redirect()->back()->with('error', 'Only pending bookings can be cancelled.');
    }

}