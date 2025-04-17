<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">All Rooms</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-white shadow-md rounded p-4">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Room Number</th>
                            <th class="px-4 py-2">Hotel</th>
                            <th class="px-4 py-2">Type</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rooms as $room)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">
                                    @if ($room->image)
                                        <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" class="w-24 h-16 object-cover rounded">
                                    @else
                                        <span class="text-gray-500">No image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $room->room_number }}</td>
                                <td class="px-4 py-2">{{ $room->hotel->name }}</td>
                                <td class="px-4 py-2">{{ $room->type }}</td>
                                <td class="px-4 py-2">₹{{ $room->price }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 rounded {{ $room->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ ucfirst($room->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.rooms.edit', $room->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center px-4 py-4 text-gray-500">No rooms available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
