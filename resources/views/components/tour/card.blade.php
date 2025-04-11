@props([
    'image' => '',
    'title' => 'Tour Package Name',
    'duration' => '5 Days / 4 Nights',
    'location' => 'Location, India',
    'price' => '₹15,999',
    'rating' => 4.7,
    'facilities' => ['Hotels', 'Transfers', 'Sightseeing', 'Meals'],
    'detailsUrl' => '#',
    'showBookingButton' => true
])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
    <!-- Tour Image -->
    <div class="relative h-48">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover">
        <!-- Price badge -->
        <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md">
            <span class="font-semibold text-gray-800">{{ $price }}</span>
            <span class="text-xs text-gray-500">/person</span>
        </div>
        <!-- Duration badge -->
        <div class="absolute bottom-4 left-4 bg-black bg-opacity-70 px-3 py-1 rounded-full">
            <span class="text-white text-sm">{{ $duration }}</span>
        </div>
    </div>
    
    <!-- Tour Content -->
    <div class="p-4">
        <div class="flex items-center mb-2">
            <div class="flex text-yellow-400 mr-2">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= floor($rating))
                        <i class="bi bi-star-fill text-xs"></i>
                    @elseif ($i - 0.5 <= $rating)
                        <i class="bi bi-star-half text-xs"></i>
                    @else
                        <i class="bi bi-star text-xs"></i>
                    @endif
                @endfor
            </div>
            <span class="text-xs text-gray-600">{{ $rating }} ({{ rand(10, 120) }} reviews)</span>
        </div>
        
        <h3 class="font-bold text-lg mb-1">{{ $title }}</h3>
        
        <p class="text-gray-600 text-sm flex items-center mb-3">
            <i class="bi bi-geo-alt mr-1"></i> {{ $location }}
        </p>
        
        <!-- Facilities -->
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach ($facilities as $facility)
                <span class="bg-gray-100 px-2 py-1 rounded-md text-xs text-gray-700">{{ $facility }}</span>
            @endforeach
        </div>
        
        <!-- Action Buttons -->
        <div class="flex justify-between items-center mt-4">
            <a href="{{ $detailsUrl }}" class="text-sm text-gray-600 hover:text-gray-800 hover:underline">View Details</a>
            
            @if($showBookingButton)
                <x-booking-button 
                    text="Book Package" 
                    type="primary" 
                    size="sm" 
                    icon="bi-geo-alt-fill"
                    :params="[
                        'type' => 'tour', 
                        'name' => $title, 
                        'location' => $location,
                        'price' => $price,
                        'duration' => $duration
                    ]" 
                />
            @endif
        </div>
    </div>
</div>
