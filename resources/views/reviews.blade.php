<x-app-layout>
    <div class="max-w-6xl mx-auto p-6 space-y-10">
        <h2 class="text-4xl font-bold text-indigo-600 text-center">What Our Users Say</h2>

        <!-- Review Form -->
        @auth
        <form action="{{ route('reviews') }}" method="POST" class="bg-white p-6 rounded-2xl shadow-lg space-y-5">
            @csrf

            <div>
                <label class="block text-lg font-semibold text-gray-700 mb-2">Your Rating:</label>
                <div class="star-rating">
                    @for ($i = 5; $i >= 1; $i--)
                        <input type="radio" name="stars" id="star{{ $i }}" value="{{ $i }}">
                        <label for="star{{ $i }}">★</label>
                    @endfor
                </div>
            </div>

            <div>
                <label class="block text-lg font-semibold text-gray-700 mb-2">Your Comment (Optional):</label>
                <textarea name="comment" rows="4" class="block w-full border border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div class="text-right">
                <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-md">Submit Review</button>
            </div>
        </form>

        <!-- Star Rating CSS -->
        <style>
            .star-rating {
                direction: rtl;
                display: inline-flex;
                font-size: 2rem;
                gap: 0.3rem;
                justify-content: center;
            }

            .star-rating input[type="radio"] {
                display: none;
            }

            .star-rating label {
                color: #e5e7eb;
                cursor: pointer;
                transition: color 0.2s ease-in-out;
            }

            .star-rating input[type="radio"]:checked ~ label,
            .star-rating label:hover,
            .star-rating label:hover ~ label {
                color: #facc15;
            }
        </style>
        @else
            <div class="text-center text-gray-600">
                <p>Please <a href="/login" class="text-indigo-600 font-medium underline hover:text-indigo-800">login</a> to submit a review.</p>
            </div>
        @endauth

        <!-- All Reviews -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($reviews as $review)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-5 flex flex-col justify-between">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-indigo-100 rounded-full w-10 h-10 flex items-center justify-center text-indigo-600 font-bold">
                            {{ strtoupper(substr($review->name, 0, 1)) }}
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg text-gray-800">{{ $review->name }}</h3>
                            <p class="text-sm text-gray-400">{{ $review->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= $review->stars ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.958a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.37 2.448a1 1 0 00-.364 1.118l1.286 3.957c.3.922-.755 1.688-1.54 1.118l-3.37-2.448a1 1 0 00-1.176 0l-3.37 2.448c-.784.57-1.838-.196-1.54-1.118l1.286-3.957a1 1 0 00-.364-1.118L2.075 9.385c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.286-3.958z"/>
                            </svg>
                        @endfor
                    </div>

                    <p class="text-gray-700 text-sm mt-2">
                        {{ $review->comment ?: 'No comment provided.' }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
