<?php

namespace App\Http\Controllers;
use App\Models\Room;

class UserController extends Controller
{
    public function dashboard()
    {
        $rooms = Room::with('hotel')
            ->where('status', 'available')
            ->get();
    
        return view('user.dashboard', compact('rooms'));
    }
}
