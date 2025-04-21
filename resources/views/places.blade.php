<x-app-layout>
    <div class="container mx-auto px-4 py-10 space-y-10">
        <h1 class="text-4xl font-bold text-center text-indigo-700 mb-8">Famous Tourist Places in India</h1>

        @php
            $places = [
                [
                    'title' => 'Taj Mahal, Agra',
                    'img' => 'https://res.cloudinary.com/dhzlspfvd/image/upload/v1745177853/Taj_Mahal_yb34v6.jpg',
                    'desc' => 'The Taj Mahal, located in Agra, India, is one of the most famous monuments in the world...',
                ],
                [
                    'title' => 'Jaipur, Rajasthan',
                    'img' => 'https://res.cloudinary.com/dhzlspfvd/image/upload/v1745177831/jaipur_ulnmgp.jpg',
                    'desc' => 'Jaipur, the capital of Rajasthan, is known as the Pink City due to its stunning pink-colored buildings...',
                ],
                [
                    'title' => 'Gateway of India, Mumbai',
                    'img' => 'https://res.cloudinary.com/dhzlspfvd/image/upload/v1745178122/gate-way-of-india-2429648_1280_usycwb.jpg',
                    'desc' => 'The Gateway of India, located in Mumbai, is a historic arch monument and one of the city\'s most famous landmarks...',
                ],
                [
                    'title' => 'Varanasi, Uttar Pradesh',
                    'img' => 'https://res.cloudinary.com/dhzlspfvd/image/upload/v1745177853/vanarsi_lrleuy.jpg',
                    'desc' => 'Varanasi, one of the oldest living cities in the world, is a sacred destination for Hindus, Buddhists, and Jains...',
                ],
                [
                    'title' => 'Mysore, Karnataka',
                    'img' => 'https://res.cloudinary.com/dhzlspfvd/image/upload/v1745177843/mysore_jncxhf.jpg',
                    'desc' => 'Mysore, known as the Cultural Capital of Karnataka, is a city famous for its royal heritage...',
                ],
                [
                    'title' => 'Rishikesh, Uttarakhand',
                    'img' => 'https://res.cloudinary.com/dhzlspfvd/image/upload/v1745177844/Rishikesh_esnjce.jpg',
                    'desc' => 'Rishikesh, known as the Yoga Capital of the World, is a spiritual and adventure hub...',
                ],
            ];
        @endphp

        @foreach($places as $place)
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col md:flex-row">
                <img src="{{ $place['img'] }}" alt="{{ $place['title'] }}" class="w-full md:w-1/3 h-60 object-cover">
                <div class="p-6 flex flex-col justify-between w-full">
                    <div>
                        <h2 class="text-2xl font-semibold text-indigo-600">{{ $place['title'] }}</h2>
                        <p class="text-gray-700 mt-2">{{ $place['desc'] }}</p>
                    </div>
                    <div class="mt-4">
                        <a href="/hotels" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Visit Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
