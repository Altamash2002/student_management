<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 space-y-10">
        <h2 class="text-3xl font-bold text-indigo-700">User Reviews</h2>

        <!-- Review Form -->
        @auth
        <form action="{{ route('reviews') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
            @csrf

            <label class="block">
                <span class="text-gray-700 font-medium">Your Rating:</span>
                <div class="star-rating mt-2">
                    @for ($i = 5; $i >= 1; $i--)
                        <input type="radio" name="stars" id="star{{ $i }}" value="{{ $i }}">
                        <label for="star{{ $i }}">★</label>
                    @endfor
                </div>
            </label>

            <label class="block">
                <span class="text-gray-700 font-medium">Your Comment (Optional):</span>
                <textarea name="comment" rows="4" class="mt-1 block w-full border border-gray-300 rounded p-2"></textarea>
            </label>

            <button class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Submit Review</button>
        </form>

        <!-- Star Rating CSS -->
        <style>
            .star-rating {
                direction: rtl;
                display: inline-flex;
                font-size: 2rem;
                gap: 0.25rem;
            }

            .star-rating input[type="radio"] {
                display: none;
            }

            .star-rating label {
                color: #ccc;
                cursor: pointer;
                transition: color 0.2s;
            }

            .star-rating input[type="radio"]:checked ~ label {
                color: #f5b301;
            }

            .star-rating label:hover,
            .star-rating label:hover ~ label {
                color: #f5b301;
            }
        </style>
        @else
            <p>Please <a href="/login" class="text-indigo-600 underline">login</a> to submit a review.</p>
        @endauth

        <!-- All Reviews -->
        <div class="space-y-6">
            @foreach($reviews as $review)
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex justify-between items-center">
                        <strong class="text-lg">{{ $review->name }}</strong>
                        <span class="text-yellow-500 text-sm">{{ str_repeat('⭐', $review->stars) }}</span>
                    </div>
                    <p class="text-gray-700 mt-2">{{ $review->comment }}</p>
                    <p class="text-xs text-gray-400 mt-1">Reviewed on {{ $review->created_at->format('d M Y') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
