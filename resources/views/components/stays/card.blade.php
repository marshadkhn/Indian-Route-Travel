@props([
    'image' => '',
    'name' => 'Property Name',
    'rating' => 4.5,
    'location' => 'Location, India',
    'price' => '₹4,999',
    'detailsUrl' => '#'
])

<div class="relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow h-96">
    <!-- Full card background image -->
    <div class="absolute inset-0 w-full h-full">
        <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-full object-cover">
        <!-- Gradient overlay for better text visibility -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
    </div>
    
    <!-- Content positioned over the image -->
    <div class="relative h-full flex flex-col justify-between p-4">
        <!-- Top section with rating -->
        <div class="bg-white bg-opacity-80 self-start rounded-md px-2 py-1 flex items-center">
            <div class="flex text-yellow-400">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= floor($rating))
                        <i class="bi bi-star-fill mr-1"></i>
                    @elseif ($i - 0.5 <= $rating)
                        <i class="bi bi-star-half mr-1"></i>
                    @else
                        <i class="bi bi-star mr-1"></i>
                    @endif
                @endfor
            </div>
            <span class="text-sm text-gray-700 ml-1">{{ $rating }}</span>
        </div>
        
        <!-- Bottom section with details -->
        <div class="text-white">
            <!-- Property Name -->
            <h3 class="font-bold text-xl">{{ $name }}</h3>
            
            <!-- Location -->
            <p class="text-gray-100 text-sm flex items-center mt-1">
                <i class="bi bi-geo-alt mr-1"></i> {{ $location }}
            </p>
            
            <div class="flex justify-between items-center mt-3">
                <!-- Price -->
                <div>
                    <span class="font-semibold text-lg">{{ $price }}</span>
                    <span class="text-gray-200 text-sm">/night</span>
                </div>
                
                <!-- View Details Button -->
                <a href="{{ $detailsUrl }}" class="bg-[#8DD3BB] hover:bg-[#7bc0a9] text-gray-800 px-3 py-1.5 rounded text-sm font-medium transition-colors">
                    View Details
                </a>
            </div>
        </div>
    </div>
</div>
