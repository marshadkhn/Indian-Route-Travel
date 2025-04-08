<section class="relative bg-gray-100 h-auto py-20">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-12 relative"> 
        <!-- Left: Text and Buttons -->
        <div class="w-full md:w-1/2 text-center md:text-left ml-2 fon" style="font-family: 'Montserrat', sans-serif;">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-700">One Stop Solution</h2>
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mt-2">For Travellers</h1> 
            <p class="text-xl md:text-xl text-gray-600 mt-2">From Indian Travel Routes</p> 

            <!-- Buttons with Icons -->
            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6"> <!-- Reduced gap -->
                <!-- Button 1 -->
                <div class="flex flex-col items-center">
                    <div class="h-16 w-16 bg-white text-black rounded-full flex items-center justify-center shadow-md"> <!-- Smaller size -->
                        <i class="bi bi-house-fill text-2xl"></i> <!-- Smaller icon -->
                    </div>
                    <p class="mt-2 text-sm text-gray-800">Find Stays</p> <!-- Smaller text -->
                </div>

                <!-- Button 2 -->
                <div class="flex flex-col items-center">
                    <div class="h-16 w-16 bg-white text-black rounded-full flex items-center justify-center shadow-md"> <!-- Smaller size -->
                        <i class="bi bi-geo-alt-fill text-2xl"></i> <!-- Smaller icon -->
                    </div>
                    <p class="mt-2 text-sm text-gray-800">Plan Tour</p> <!-- Smaller text -->
                </div>

                <!-- Button 3 -->
                <div class="flex flex-col items-center">
                    <div class="h-16 w-16 bg-white text-black rounded-full flex items-center justify-center shadow-md"> <!-- Smaller size -->
                        <i class="bi bi-car-front-fill text-2xl"></i> <!-- Smaller icon -->
                    </div>
                    <p class="mt-2 text-sm text-gray-800">Car Rent</p> <!-- Smaller text -->
                </div>

                <!-- Button 4 -->
                <div class="flex flex-col items-center">
                    <div class="h-16 w-16 bg-white text-black rounded-full flex items-center justify-center shadow-md"> <!-- Smaller size -->
                        <i class="bi bi-person-fill text-2xl"></i> <!-- Smaller icon -->
                    </div>
                    <p class="mt-2 text-sm text-gray-800">Get a Guide</p> <!-- Smaller text -->
                </div>
            </div>
        </div>

        <!-- Right: Two Marquees -->
        <div class="w-full md:w-1/2 grid grid-cols-2 gap-6"> <!-- Increased gap -->
            <!-- Left Marquee (Top to Bottom) -->
            <div class="relative h-[28rem] overflow-hidden"> <!-- Increased height -->
                <div class="marquee-vertical-down flex flex-col gap-6"> <!-- Increased gap -->
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-one.png');"></div> <!-- Increased height -->
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-two.png');"></div>
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-three.png');"></div>
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-four.png');"></div>
                </div>
            </div>

            <!-- Right Marquee (Bottom to Top) -->
            <div class="relative h-[28rem] overflow-hidden"> <!-- Increased height -->
                <div class="marquee-vertical-up flex flex-col gap-6"> <!-- Increased gap -->
                    <div class="h-56 w-full bg-cover bg-center rounded-lg shadow-md" style="background-image: url('/images/marquee-five.png');"></div> <!-- Increased height -->
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