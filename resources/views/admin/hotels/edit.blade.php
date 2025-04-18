<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Hotel</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.hotels.update', $hotel->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Hotel Name</label>
                    <input type="text" name="name" id="name" value="{{ $hotel->name }}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                    <input type="text" name="location" id="location" value="{{ $hotel->location }}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2">{{ $hotel->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="image">Replace Image (optional)</label>
                    <input type="file" name="image" id="image" class="w-full border rounded px-3 py-2">
                    @if ($hotel->image)
                        <img src="{{ asset('storage/' . $hotel->image) }}" class="mt-2 w-32 h-24 object-cover rounded" alt="Current Image">
                    @endif
                </div>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    Update Hotel
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
