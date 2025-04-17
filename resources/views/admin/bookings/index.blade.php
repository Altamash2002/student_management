<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">All Bookings</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto bg-white shadow-md rounded p-4">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2">User</th>
                            <th class="px-4 py-2">Hotel</th>
                            <th class="px-4 py-2">Room</th>
                            <th class="px-4 py-2">Check-In</th>
                            <th class="px-4 py-2">Check-Out</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $booking->user->name }}</td>
                                <td class="px-4 py-2">{{ $booking->room->hotel->name }}</td>
                                <td class="px-4 py-2">{{ $booking->room->room_number }}</td>
                                <td class="px-4 py-2">{{ $booking->check_in }}</td>
                                <td class="px-4 py-2">{{ $booking->check_out }}</td>
                                <td class="px-4 py-2">₹{{ $booking->total_price }}</td>
                                <td class="px-4 py-2">{{ ucfirst($booking->status) }}</td>
                                <td class="px-4 py-2">
                                    {{ ucfirst($booking->status) }}

                                    @if($booking->status === 'pending')
                                        <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-green-600 hover:underline text-sm">Confirm</button>
                                        </form>

                                        <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Cancel this booking?')">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-red-600 hover:underline text-sm">Cancel</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-gray-500 py-4">No bookings found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
