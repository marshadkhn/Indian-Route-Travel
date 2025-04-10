<section class="bg-white py-10 mt-20">
    <div class="container mx-auto flex justify-center" style="font-family: 'Montserrat', sans-serif;">
        <div class="w-full max-w-4xl">
            <!-- Top Section -->
            <div class="flex flex-row items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Tour starting at just ₹5999</h2>
                <!-- <a href="#" class="px-4 py-2 bg-white hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-md">
                    See all plans
                </a> -->
            </div>

            <!-- Grid Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @php
                $quickAccessCards = json_decode(file_get_contents(resource_path('js/data/quickAccess.json')), true);
                @endphp

                @foreach ($quickAccessCards as $card)
                <div
                    class="relative flex flex-col items-center justify-center bg-cover bg-center rounded-lg shadow-md hover:shadow-lg transition-shadow p-6 text-white"
                    style="background-image: url('{{ asset($card['image']) }}'); height: 400px;">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/70 rounded-lg z-0"></div>

                    <!-- Text Section -->
                    <h3 class="relative text-lg font-bold mb-2 z-10">{{ $card['title'] }}</h3>
                    <p class="relative text-sm text-center mb-4 z-10">{{ $card['description'] }}</p>

                    <!-- Button Section -->
                    <a href="{{ $card['buttonLink'] }}" class="relative px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded-lg z-10">
                        {{ $card['buttonText'] }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>