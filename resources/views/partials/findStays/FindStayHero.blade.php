<section class="relative bg-gray-100 h-auto py-20">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-12 relative">
        <!-- Left: Text and Search Bar -->
        <div class="w-full md:w-1/2 text-center md:text-left ml-2" style="font-family: 'Montserrat', sans-serif;">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-700">Find the</h2>
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mt-2">Perfect Stay</h1>
            <p class="text-xl md:text-xl text-gray-600 mt-2">for Your Trip</p>

            <!-- Search Bar -->
            <div class="mt-8">
                <form action="#" method="GET" class="bg-white shadow-md rounded-lg p-4 grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Location -->
                    <div class="col-span-1 md:col-span-2">
                        <label for="location" class="block text-gray-700 font-medium mb-2">Location</label>
                        <input type="text" id="location" name="location" placeholder="Enter city or destination" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300" required>
                    </div>

                    <!-- Date From -->
                    <div>
                        <label for="date_from" class="block text-gray-700 font-medium mb-2">Date From</label>
                        <input type="date" id="date_from" name="date_from" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300" required>
                    </div>

                    <!-- Date To -->
                    <div>
                        <label for="date_to" class="block text-gray-700 font-medium mb-2">Date To</label>
                        <input type="date" id="date_to" name="date_to" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-span-1 md:col-span-4 flex justify-center">
                        <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800">
                            <i class="bi bi-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right: Two Marquees -->
        <div class="w-full md:w-1/2 grid grid-cols-2 gap-6">
            <!-- Left Marquee (Top to Bottom) -->
            <div class="relative h-[28rem] overflow-hidden">
                <div class="marquee-vertical-down flex flex-col gap-6">
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-one.png');"></div>
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-two.png');"></div>
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-three.png');"></div>
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-four.png');"></div>
                </div>
            </div>

            <!-- Right Marquee (Bottom to Top) -->
            <div class="relative h-[28rem] overflow-hidden">
                <div class="marquee-vertical-up flex flex-col gap-6">
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-five.png');"></div>
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-six.png');"></div>
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-seven.png');"></div>
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-eight.png');"></div>
                </div>
            </div>
        </div>

        <!-- Buildings Vector -->
        <img src="{{ asset('images/buildings-vector.png') }}" alt="Buildings Vector" class="absolute -bottom-20 left-0 w-auto h-auto">
    </div>
</section>