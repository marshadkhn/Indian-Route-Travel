<!-- filepath: d:\DIO\indian-travel-routes\resources\views\partials\home\suggestions.blade.php -->
<section class="bg-white py-10">
    <div class="mx-auto px-4 bg-white" style="font-family: 'Montserrat', sans-serif;"> <!-- Adjusted padding -->
        <!-- Top Section -->
        <div class="flex flex-row items-center justify-between mb-8 bg-white">
            <!-- Text Section (90%) -->
            <div class="w-9/12 bg-white">
                <h2 class="text-2xl font-bold text-gray-800">Plan Your Perfect Trip with Exciting Offers</h2>
                <p class="text-gray-600 mt-2 text-sm">Search Hotels & Places Hire to our most popular destinations</p>
            </div>
            <!-- Button Section (10%) -->
            <div class="w-3/12 text-right bg-white">
                <a href="#" class="px-9 py-4 bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold rounded-xl shadow-md">
                    See all plans
                </a>
            </div>
        </div>

        <!-- Grid Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 bg-white">
            @php
            $suggestions = json_decode(file_get_contents(resource_path('js/data/suggestions.json')), true);
            @endphp

            @foreach ($suggestions as $suggestion)
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex items-center p-4 transition-transform transform hover:scale-105 hover:shadow-lg">
                <!-- Image Section -->
                <div class="w-1/3 bg-white">
                    <img src="{{ asset($suggestion['image']) }}" alt="{{ $suggestion['title'] }}" class="w-full h-20 object-cover rounded-lg">
                </div>
                <!-- Text Section -->
                <div class="w-2/3 pl-4 bg-white">
                    <h3 class="text-base font-semibold text-gray-800 mb-1">{{ $suggestion['title'] }} - from ₹{{ $suggestion['price'] }}</h3>
                    <p class="text-xs text-gray-600 mb-1">{{ $suggestion['details'] }}</p>
                    <a href="{{ $suggestion['link'] }}" class="text-blue-500 hover:underline text-xs font-medium">Explore</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>