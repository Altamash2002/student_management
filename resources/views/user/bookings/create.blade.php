<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Book Room</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                <h3 class="text-lg font-semibold mb-2">Room Details</h3>
                <p><strong>Hotel:</strong> {{ $room->hotel->name }}</p>
                <p><strong>Room Number:</strong> {{ $room->room_number }}</p>
                <p><strong>Type:</strong> {{ $room->type }}</p>
                <p><strong>Price:</strong> ₹{{ $room->price }} / night</p>

                <hr class="my-4">

                <form method="POST" action="{{ route('bookings.store') }}">
                    @csrf

                    <input type="hidden" name="room_id" value="{{ $room->id }}">

                    <div class="mb-4">
                        <label for="check_in" class="block text-sm font-medium text-gray-700">Check-in Date</label>
                        <input type="date" id="check_in" name="check_in" class="w-full border rounded px-3 py-2"
                               value="{{ old('check_in') }}" required>
                        @error('check_in')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="check_out" class="block text-sm font-medium text-gray-700">Check-out Date</label>
                        <input type="date" id="check_out" name="check_out" class="w-full border rounded px-3 py-2"
                               value="{{ old('check_out') }}" required>
                        @error('check_out')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                            Confirm Booking
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
