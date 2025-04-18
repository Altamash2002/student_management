<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">{{ $hotel->name }}</h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">


        <div class="flex justify-end mb-2">
            <a href="{{ route('bookings.index') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm font-medium shadow">
                📆 My Bookings
            </a>
        </div>

        {{-- Hotel Info --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">📍 Location</h3>
            <p class="text-gray-600 mb-4">{{ $hotel->location }}</p>

            <h3 class="text-lg font-semibold text-gray-700 mb-2">📝 Description</h3>
            <p class="text-gray-700 leading-relaxed">{{ $hotel->description ?? 'No description provided.' }}</p>
        </div>

        {{-- Rooms Listing --}}
        <div>
            <h3 class="text-xl font-semibold text-gray-800 mb-4">🏨 Available Rooms</h3>

            {{-- Filter Form --}}
            <div class="mb-6 bg-white shadow rounded-lg p-4">
                <form method="GET" action="{{ route('user.hotels.show', $hotel->id) }}" class="flex flex-wrap gap-4 items-end">
                    {{-- Status --}}
                    <div>
                        <label for="status" class="block text-sm text-gray-600 mb-1">Availability</label>
                        <select name="status" id="status" class="border rounded px-3 py-2 w-full">
                            <option value="">All</option>
                            <option value="available" {{ request('status') === 'available' ? 'selected' : '' }}>Available</option>
                            <option value="booked" {{ request('status') === 'booked' ? 'selected' : '' }}>Booked</option>
                        </select>
                    </div>

                    {{-- Min Price --}}
                    <div>
                        <label for="min_price" class="block text-sm text-gray-600 mb-1">Min Price (₹)</label>
                        <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}"
                            class="border rounded px-3 py-2 w-28">
                    </div>

                    {{-- Max Price --}}
                    <div>
                        <label for="max_price" class="block text-sm text-gray-600 mb-1">Max Price (₹)</label>
                        <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}"
                            class="border rounded px-3 py-2 w-28">
                    </div>

                    {{-- Submit Button --}}
                    <div>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow text-sm font-medium">
                            🔍 Filter
                        </button>
                    </div>

                    @if(request()->filled(['status', 'min_price', 'max_price']))
                        <div>
                            <a href="{{ route('user.hotels.show', $hotel->id) }}" class="text-sm text-gray-500 hover:underline">Clear</a>
                        </div>
                    @endif
                </form>
            </div>    
                

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($rooms as $room)
                    <div class="bg-white shadow-md hover:shadow-xl transition rounded-lg overflow-hidden">
                        @if($room->image)
                            <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
                        @endif

                        <div class="p-4 space-y-1">
                            <p class="text-gray-700 font-medium">Room #: {{ $room->room_number }}</p>
                            <p class="text-sm text-gray-600">Type: {{ $room->type }}</p>
                            <p class="text-sm text-gray-600">Price: <span class="font-semibold text-green-700">₹{{ $room->price }}</span> / night</p>
                            <p class="text-sm">Status:
                                <span class="inline-block px-2 py-1 rounded text-white text-xs {{ $room->status == 'available' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ ucfirst($room->status) }}
                                </span>
                            </p>

                            @if($room->status === 'available')
                                <a href="{{ route('bookings.create', $room->id) }}"
                                   class="inline-block mt-3 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm font-semibold">
                                    Book Now
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">No rooms available in this hotel.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
