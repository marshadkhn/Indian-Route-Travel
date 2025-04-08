<section class="bg-white py-10">
    <div class="container mx-auto max-w-6xl">
        <!-- Review Section Heading -->
        <h2 class="text-sm font-bold text-gray-500 text-center mb-2 uppercase">Reviews</h2>
        <h3 class="text-2xl font-semibold text-gray-800 text-center mb-1">What Our Customers Say</h3>
        <h1 class="text-4xl font-bold text-gray-900 text-center mb-8">Customer Reviews</h1>

        <!-- Two Vertical Marquees -->
        <div class="grid grid-cols-2 gap-6">
            <!-- Left Marquee (Top to Bottom) -->
            <div class="relative h-[28rem] overflow-hidden">
                <div class="marquee-vertical-down flex flex-col gap-6">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="bg-white shadow-md rounded-lg p-6 w-full">
                        <p class="text-lg font-semibold text-gray-800 mb-2">"Amazing experience! Highly recommend."</p>
                        <p class="text-sm text-gray-600">- John Doe</p>
                        <p class="text-sm text-gray-500">New York, USA</p>
                </div>
                @endfor
            </div>
        </div>

        <!-- Right Marquee (Bottom to Top) -->
        <div class="relative h-[28rem] overflow-hidden">
            <div class="marquee-vertical-up flex flex-col gap-6">
                @for ($i = 0; $i < 5; $i++)
                    <div class="bg-white shadow-md rounded-lg p-6 w-full">
                    <p class="text-lg font-semibold text-gray-800 mb-2">"The best travel service I’ve ever used!"</p>
                    <p class="text-sm text-gray-600">- Jane Smith</p>
                    <p class="text-sm text-gray-500">London, UK</p>
            </div>
            @endfor
        </div>
    </div>
    </div>
    </div>
</section>

