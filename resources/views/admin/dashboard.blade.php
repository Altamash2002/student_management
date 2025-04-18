<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800">🛠️ Admin Dashboard</h2>
        <p class="text-sm text-gray-500">Monitor bookings, manage hotels, and take quick actions.</p>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            {{-- Stats Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Total Hotels --}}
                <a href="{{ route('admin.hotels.index') }}" class="group bg-gradient-to-br from-indigo-500 to-indigo-600 text-white p-6 rounded-xl shadow hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <div class="text-sm uppercase tracking-wide">Total Hotels</div>
                    <div class="text-4xl font-extrabold mt-2">{{ $totalHotels }}</div>
                    <div class="mt-2 group-hover:opacity-100 opacity-60 transition">🏨 Manage Hotels</div>
                </a>

                {{-- Total Rooms --}}
                <a href="{{ route('admin.rooms.index') }}" class="group bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-xl shadow hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <div class="text-sm uppercase tracking-wide">Total Rooms</div>
                    <div class="text-4xl font-extrabold mt-2">{{ $totalRooms }}</div>
                    <div class="mt-2 group-hover:opacity-100 opacity-60 transition">🛏️ View Rooms</div>
                </a>

                {{-- Total Bookings --}}
                <a href="{{ route('admin.bookings.index') }}" class="group bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-xl shadow hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <div class="text-sm uppercase tracking-wide">Total Bookings</div>
                    <div class="text-4xl font-extrabold mt-2">{{ $totalBookings }}</div>
                    <div class="mt-2 group-hover:opacity-100 opacity-60 transition">📆 View All</div>
                </a>

                {{-- Pending Bookings --}}
                <a href="{{ route('admin.bookings.index') }}" class="group bg-gradient-to-br from-yellow-400 to-yellow-500 text-white p-6 rounded-xl shadow hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <div class="text-sm uppercase tracking-wide">Pending Bookings</div>
                    <div class="text-4xl font-extrabold mt-2">{{ $pendingBookings }}</div>
                    <div class="mt-2 group-hover:opacity-100 opacity-60 transition">⏳ Needs Action</div>
                </a>

                {{-- Confirmed Bookings --}}
                <a href="{{ route('admin.bookings.index') }}" class="group bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-xl shadow hover:shadow-2xl transform hover:scale-105 transition duration-300">
                    <div class="text-sm uppercase tracking-wide">Confirmed Bookings</div>
                    <div class="text-4xl font-extrabold mt-2">{{ $confirmedBookings }}</div>
                    <div class="mt-2 group-hover:opacity-100 opacity-60 transition">✅ All Set</div>
                </a>
            </div>

            {{-- Quick Actions --}}
            <div>
                <h3 class="text-2xl font-bold mb-6 text-gray-800">🚀 Quick Actions</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('admin.hotels.create') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-full shadow-md text-sm font-medium transition transform hover:scale-105">
                        ➕ Add Hotel
                    </a>
                    <a href="{{ route('admin.rooms.create') }}"
                       class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-full shadow-md text-sm font-medium transition transform hover:scale-105">
                        🛏️ Add Room
                    </a>
                    <a href="{{ route('admin.bookings.index') }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2.5 rounded-full shadow-md text-sm font-medium transition transform hover:scale-105">
                        📋 View Bookings
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
