<section class="bg-white py-10">
    <div class="container mx-auto flex justify-center" style="font-family: 'Montserrat', sans-serif;">
        <div class="w-full max-w-4xl">
            <!-- Top Section -->
            <div class="flex flex-row items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Tour starting at just ₹5999</h2>
                <a href="#" class="px-4 py-2 bg-white hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-md">
                    See all plans
                </a>
            </div>

            <!-- Grid Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @php
                $quickAccessCards = json_decode(file_get_contents(resource_path('js/data/quickAccess.json')), true);
                @endphp

                @foreach ($quickAccessCards as $card)
                <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <!-- Image Section -->
                    <div class="w-24 h-24 mb-4">
                        <img src="{{ asset($card['image']) }}" alt="{{ $card['title'] }}" class="w-full h-full object-cover rounded-full border-4 border-gray-300">
                    </div>
                    <!-- Text Section -->
                    <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $card['title'] }}</h3>
                    <p class="text-sm text-gray-600 text-center mb-4">{{ $card['description'] }}</p>
                    <!-- Button Section -->
                    <a href="{{ $card['buttonLink'] }}" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded-lg">
                        {{ $card['buttonText'] }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>