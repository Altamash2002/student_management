<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Available Rooms</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($rooms as $room)
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        @if($room->image)
                            <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" class="w-full h-40 object-cover">
                        @else
                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">
                                No Image
                            </div>
                        @endif

                        <div class="p-4">
                            <h3 class="text-lg font-bold">{{ $room->hotel->name }}</h3>
                            <p class="text-sm text-gray-600">Room #: {{ $room->room_number }}</p>
                            <p class="text-sm">Type: {{ $room->type }}</p>
                            <p class="text-sm">Price: ₹{{ $room->price }} / night</p>
                            <p class="text-sm">Status: 
                                <span class="inline-block px-2 py-1 rounded text-white {{ $room->status == 'available' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ ucfirst($room->status) }}
                                </span>
                            </p>

                            @if($room->status === 'available')
                                <a href="{{ route('bookings.create', $room->id) }}"
                                   class="mt-4 inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">
                                    Book Now
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">No rooms available at the moment.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
