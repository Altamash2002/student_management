<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Admin Dashboard</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            {{-- Stats Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Total Hotels --}}
                <a href="{{ route('admin.hotels.index') }}" class="block bg-white hover:shadow-xl transition shadow-lg rounded-lg p-6 border-l-4 border-indigo-600 hover:bg-indigo-50">
                    <div class="text-sm text-gray-600">Total Hotels</div>
                    <div class="text-3xl font-bold text-indigo-700 mt-2">{{ $totalHotels }}</div>
                </a>

                {{-- Total Rooms --}}
                <a href="{{ route('admin.rooms.index') }}" class="block bg-white hover:shadow-xl transition shadow-lg rounded-lg p-6 border-l-4 border-green-600 hover:bg-green-50">
                    <div class="text-sm text-gray-600">Total Rooms</div>
                    <div class="text-3xl font-bold text-green-700 mt-2">{{ $totalRooms }}</div>
                </a>

                {{-- Total Bookings --}}
                <a href="{{ route('admin.bookings.index') }}" class="block bg-white hover:shadow-xl transition shadow-lg rounded-lg p-6 border-l-4 border-blue-600 hover:bg-blue-50">
                    <div class="text-sm text-gray-600">Total Bookings</div>
                    <div class="text-3xl font-bold text-blue-700 mt-2">{{ $totalBookings }}</div>
                </a>

                {{-- Pending Bookings --}}
                <a href="{{ route('admin.bookings.index') }}" class="block bg-white hover:shadow-xl transition shadow-lg rounded-lg p-6 border-l-4 border-yellow-500 hover:bg-yellow-50">
                    <div class="text-sm text-gray-600">Pending Bookings</div>
                    <div class="text-3xl font-bold text-yellow-600 mt-2">{{ $pendingBookings }}</div>
                </a>

                {{-- Confirmed Bookings --}}
                <a href="{{ route('admin.bookings.index') }}" class="block bg-white hover:shadow-xl transition shadow-lg rounded-lg p-6 border-l-4 border-purple-600 hover:bg-purple-50">
                    <div class="text-sm text-gray-600">Confirmed Bookings</div>
                    <div class="text-3xl font-bold text-purple-700 mt-2">{{ $confirmedBookings }}</div>
                </a>
            </div>

            {{-- Quick Actions --}}
            <div>
                <h3 class="text-xl font-semibold mb-4 text-gray-700">Quick Actions</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('admin.hotels.create') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded shadow text-sm font-medium">
                        ➕ Add Hotel
                    </a>
                    <a href="{{ route('admin.rooms.create') }}"
                       class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded shadow text-sm font-medium">
                        🛏️ Add Room
                    </a>
                    <a href="{{ route('admin.bookings.index') }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded shadow text-sm font-medium">
                        ⏳ View Bookings
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
