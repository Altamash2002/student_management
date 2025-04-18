<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">All Hotels</h2>
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
                            <th class="px-4 py-2">Hotel Name</th>
                            <th class="px-4 py-2">Location</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hotels as $hotel)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">
                                    @if ($hotel->image)
                                        <img src="{{ asset('storage/' . $hotel->image) }}" alt="Hotel" class="w-16 h-12 object-cover rounded">
                                    @else
                                        <span class="text-gray-400 text-sm">No Image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $hotel->name }}</td>
                                <td class="px-4 py-2">{{ $hotel->location }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $hotel->description }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center px-4 py-4 text-gray-500">No hotels available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
