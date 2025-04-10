<section class="bg-white py-10 mt-20" style="font-family: 'Montserrat', sans-serif;">
    <div class="container mx-auto flex justify-center">
        <div class="w-full max-w-4xl">
            <!-- Top Section -->
            <div class="flex flex-row items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Tour starting at just ₹5999</h2>
            </div>

            <!-- Grid Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @php
                $quickAccessCards = json_decode(file_get_contents(resource_path('js/data/quickAccess.json')), true);
                @endphp

                @foreach ($quickAccessCards as $card)
                <div class="relative rounded-lg shadow-md hover:shadow-lg transition-shadow overflow-hidden" style="height: 300px;">
                    <!-- Background Image -->
                    <img src="{{ asset($card['image']) }}" alt="{{ $card['title'] }}" class="absolute inset-0 w-full h-full object-cover">

                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                    <!-- Content Container (aligned to bottom) -->
                    <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col">
                        <!-- Text Content -->
                        <h3 class="text-xl font-bold text-white mb-1">{{ $card['title'] }}</h3>
                        <p class="text-sm text-gray-200 mb-4">{{ $card['description'] }}</p>

                        <!-- Book Now Button with Message Icon -->
                        <a href="{{ $card['buttonLink'] }}" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            Book Now
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>