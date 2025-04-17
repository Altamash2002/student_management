<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Room</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="hotel_id" class="block text-sm font-medium text-gray-700">Hotel</label>
                    <select name="hotel_id" id="hotel_id" class="w-full border rounded px-3 py-2">
                        @foreach ($hotels as $hotel)
                            <option value="{{ $hotel->id }}" {{ $hotel->id == $room->hotel_id ? 'selected' : '' }}>
                                {{ $hotel->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="room_number">Room Number</label>
                    <input type="text" name="room_number" id="room_number" class="w-full border rounded px-3 py-2" value="{{ $room->room_number }}">
                </div>

                <div class="mb-4">
                    <label for="type">Room Type</label>
                    <input type="text" name="type" id="type" class="w-full border rounded px-3 py-2" value="{{ $room->type }}">
                </div>

                <div class="mb-4">
                    <label for="price">Price</label>
                    <input type="number" name="price" step="0.01" id="price" class="w-full border rounded px-3 py-2" value="{{ $room->price }}">
                </div>

                <div class="mb-4">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="w-full border rounded px-3 py-2">
                        <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Booked</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="image">Replace Image (optional)</label>
                    <input type="file" name="image" id="image" class="w-full border rounded px-3 py-2">
                    @if ($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" class="mt-2 w-32 h-24 object-cover rounded" alt="Current Image">
                    @endif
                </div>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                    Update Room
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
