<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">My Bookings</h2>
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
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Room No:</th>
                            <th class="px-4 py-2">Hotel</th>
                            <th class="px-4 py-2">Check-In</th>
                            <th class="px-4 py-2">Check-Out</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                @if($booking->room->image)
                                <img src="{{ asset('storage/' . $booking->room->image) }}" alt="Room Image"
                                    class="w-20 h-14 object-cover rounded shadow">
                                @else
                                <div class="w-20 h-14 bg-gray-200 flex items-center justify-center text-gray-500 text-xs rounded">
                                    No Image
                                </div>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $booking->room->room_number }}</td>
                            <td class="px-4 py-2">{{ $booking->room->hotel->name }}</td>
                            <td class="px-4 py-2">{{ $booking->check_in }}</td>
                            <td class="px-4 py-2">{{ $booking->check_out }}</td>
                            <td class="px-4 py-2">₹{{ $booking->total_price }}</td>
                            <td class="px-4 py-2">{{ ucfirst($booking->status) }}</td>
                            <td class="px-4 py-2">
                                @if($booking->status === 'pending' && \Carbon\Carbon::parse($booking->check_in)->isFuture())
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Cancel this booking?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm">Cancel</button>
                                </form>
                                @else
                                <span class="text-gray-500 text-sm">N/A</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-gray-500 py-4">No bookings yet</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-app-layout>