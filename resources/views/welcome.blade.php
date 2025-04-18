<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking | Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white">

    <!-- Hero Section with Slider -->
    <div class="relative h-screen">
        <div class="absolute inset-0">
            <img src="https://wallpaperaccess.com/full/2690978.jpg" alt="Hotel Room" class="w-full h-full object-cover opacity-80">
        </div>
        <div class="relative z-10 flex flex-col justify-center items-center h-full text-center px-4 bg-black/60">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Welcome to LuxStay</h1>
            <p class="text-lg md:text-xl max-w-2xl mb-6">Experience luxury and comfort in our premium hotel rooms. Book your perfect stay now!</p>
            <a href="/login-signup" class="bg-indigo-600 hover:bg-indigo-700 px-6 py-3 text-white font-semibold text-lg rounded shadow-md transition duration-300 hover:scale-105">
                Start Booking
            </a>
        </div>
    </div>

    <!-- Perks Section -->
    <section class="py-6 bg-gray-950">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Why Choose Us?</h2>
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <img src="https://img.icons8.com/ios-filled/50/ffffff/bed.png" class="mx-auto mb-4" />
                    <h3 class="text-xl font-semibold mb-2">Luxury Rooms</h3>
                    <p>Enjoy elegant and spacious rooms with modern amenities designed for comfort.</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <img src="https://img.icons8.com/ios-filled/50/ffffff/restaurant.png" class="mx-auto mb-4" />
                    <h3 class="text-xl font-semibold mb-2">Delicious Cuisine</h3>
                    <p>Our in-house restaurant offers a wide variety of dishes from around the world.</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
                    <img src="https://img.icons8.com/ios-filled/50/ffffff/wifi.png" class="mx-auto mb-4" />
                    <h3 class="text-xl font-semibold mb-2">Free Wi-Fi</h3>
                    <p>Stay connected with complimentary high-speed internet throughout your stay.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 bg-gray-950">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Gallery</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <img src="https://media.architecturaldigest.com/photos/57e42deafe422b3e29b7e790/master/pass/JW_LosCabos_2015_MainExterior.jpg" class="rounded-lg shadow-lg hover:scale-105 transition duration-300" alt="Hotel Lobby">
                <img src="http://3d-rendering-walkthrough-dubai.weebly.com/uploads/2/5/8/6/25863872/3767608_orig.jpg" class="rounded-lg shadow-lg hover:scale-105 transition duration-300" alt="Hotel Room">
                <img src="https://png.pngtree.com/thumb_back/fh260/background/20220312/pngtree-hotel-building-under-blue-sky-and-white-clouds-image_995203.jpg" class="rounded-lg shadow-lg hover:scale-105 transition duration-300" alt="Hotel Room">

            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12">What Our Guests Say</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-800 p-6 rounded-xl shadow-md">
                    <p class="mb-4">"Absolutely loved my stay! The staff was friendly, and the room was spotless and luxurious."</p>
                    <h4 class="font-semibold">- Ayesha K.</h4>
                </div>
                <div class="bg-gray-800 p-6 rounded-xl shadow-md">
                    <p class="mb-4">"The food was amazing, and the location is perfect for tourists. Highly recommend!"</p>
                    <h4 class="font-semibold">- Rohan M.</h4>
                </div>
                <div class="bg-gray-800 p-6 rounded-xl shadow-md">
                    <p class="mb-4">"One of the best hotels I've stayed at. Great value for money and excellent service."</p>
                    <h4 class="font-semibold">- Priya S.</h4>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-8 text-center">
        <p>&copy; 2025 LuxStay Hotel. All rights reserved.</p>
    </footer>

</body>

</html>