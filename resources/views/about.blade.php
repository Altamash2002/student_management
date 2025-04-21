<x-app-layout>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-[400px] flex items-center justify-center text-center" style="background-image: url('https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?auto=format&fit=crop&w=1470&q=80');">
        <div class="bg-black/60 w-full h-full absolute inset-0"></div>
        <div class="relative z-10 text-white">
            <h1 class="text-5xl font-bold">About Us</h1>
            <p class="text-xl mt-4">Discover India with Confidence and Comfort</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-6xl mx-auto px-6 space-y-16">
            <!-- Welcome Section -->
            <div class="bg-white/70 backdrop-blur-md p-10 rounded-xl shadow-xl">
                <h2 class="text-3xl font-bold text-indigo-700 mb-4">Welcome to India Tour Management</h2>
                <p class="text-gray-700 leading-relaxed text-lg">
                    We are your ultimate travel companion for exploring the beauty of India. Our mission is to provide the best travel experiences, ensuring comfort, affordability, and memorable journeys for all our customers.
                </p>
            </div>

            <!-- Why Choose Us -->
            <div class="bg-white/70 backdrop-blur-md p-10 rounded-xl shadow-xl">
                <h2 class="text-3xl font-bold text-indigo-700 mb-6">Why Choose Us?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-lg">
                    <div class="flex items-start gap-3">
                        <span class="text-2xl text-indigo-600">🌍</span>
                        <p>Wide range of tour packages covering top destinations in India.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-2xl text-green-600">🚆</span>
                        <p>Seamless online booking with multiple travel modes (Train, Bus, Flight, Car).</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-2xl text-yellow-600">🔐</span>
                        <p>Secure and hassle-free payment options.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-2xl text-pink-600">📞</span>
                        <p>24/7 customer support for all your travel queries.</p>
                    </div>
                </div>
            </div>

            <!-- Our Services -->
            <div class="bg-white/70 backdrop-blur-md p-10 rounded-xl shadow-xl">
                <h2 class="text-3xl font-bold text-indigo-700 mb-4">Our Services</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    We offer customized travel packages, experienced tour guides, and an easy-to-use booking system to make your travel smooth and enjoyable. Whether you're planning a solo trip, a family vacation, or a business tour, we have the perfect solution for you.
                </p>
            </div>

            <!-- Contact Section -->
            <div class="bg-indigo-600 text-white p-10 rounded-xl shadow-lg">
                <h2 class="text-3xl font-bold mb-4">Contact Us</h2>
                <p class="text-lg">We're here to help. Reach out to us anytime!</p>
                <div class="mt-4 space-y-2 text-lg">
                    <p><strong>Email:</strong> <a href="mailto:support@indiatours.com" class="underline">support@indiatours.com</a></p>
                    <p><strong>Phone:</strong> <a href="tel:+919876543210" class="underline">+91 9876543210</a></p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
