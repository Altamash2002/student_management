<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalHotels = Hotel::count();
        $totalRooms = Room::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();

        return view('admin.dashboard', compact(
            'totalHotels', 'totalRooms', 'totalBookings', 'pendingBookings', 'confirmedBookings'
        ));
    }
}
