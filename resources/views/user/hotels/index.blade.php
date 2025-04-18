<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Browse Hotels</h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-end mb-2">
            <a href="{{ route('bookings.index') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm font-medium shadow">
                📆 My Bookings
            </a>
        </div>

        <div class="mb-6">
            <form method="GET" action="{{ route('user.hotels') }}" class="flex flex-wrap gap-3 items-end">

                {{-- Search --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Hotel Name</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by name"
                        class="w-full sm:w-64 border rounded px-4 py-2 shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none">
                </div>

                {{-- Location Dropdown --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Location</label>
                    <select name="location" class="w-full sm:w-48 border rounded px-4 py-2 shadow-sm">
                        <option value="">All Locations</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location }}" {{ request('location') === $location ? 'selected' : '' }}>
                                {{ $location }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-2 mt-6">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow text-sm font-medium">
                        🔍 Search
                    </button>

                    @if(request('search') || request('location'))
                        <a href="{{ route('user.hotels') }}" class="text-sm text-gray-500 hover:underline px-3 py-2">Clear</a>
                    @endif
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($hotels as $hotel)
                <a href="{{ route('user.hotels.show', $hotel->id) }}"
                   class="bg-white shadow-md hover:shadow-xl transition rounded-lg overflow-hidden group">
                    @if($hotel->image)
                        <img src="{{ asset('storage/' . $hotel->image) }}"
                             class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300 ease-in-out">
                    @else
                        <div class="w-full h-52 bg-gray-200 flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif

                    <div class="p-4 space-y-1">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition">{{ $hotel->name }}</h3>
                        <p class="text-sm text-gray-600"><i class="fas fa-map-marker-alt mr-1"></i>{{ $hotel->location }}</p>
                        <p class="text-sm text-gray-500 mt-2">{{ Str::limit($hotel->description, 70) }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center text-gray-500">No hotels found.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
