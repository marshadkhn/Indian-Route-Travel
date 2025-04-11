@props([
    // Hero content
    'subheading' => 'One Stop Solution',
    'heading' => 'For Travellers',
    'description' => 'From Indian Travel Routes',
    
    // Hero type and content
    'type' => 'buttons', // 'buttons' or 'searchForm'
    
    // Button properties
    'buttons' => [
        ['icon' => 'bi-house-fill', 'text' => 'Find Stays', 'route' => 'findStays'],
        ['icon' => 'bi-geo-alt-fill', 'text' => 'Plan Tour', 'route' => 'planTour'],
        ['icon' => 'bi-car-front-fill', 'text' => 'Car Rent', 'route' => 'carRent'],
        ['icon' => 'bi-person-fill', 'text' => 'Get a Guide', 'route' => 'getGuide']
    ],
    'buttonColumns' => 'grid-cols-2 lg:grid-cols-4',
    
    // Marquee Images
    'leftMarqueeImages' => [
        '/images/marquee-one.png',
        '/images/marquee-two.png',
        '/images/marquee-three.png',
        '/images/marquee-four.png'
    ],
    'rightMarqueeImages' => [
        '/images/marquee-five.png',
        '/images/marquee-six.png',
        '/images/marquee-seven.png',
        '/images/marquee-eight.png'
    ],

    // Styling
    'background' => 'bg-gray-100',
    'textAlignment' => 'text-center md:text-left',
    'padding' => 'p-20',
    'marqueeGap' => '6',
    'buildingsVector' => '/images/buildings-vector.png',
    
    // Form route (for search type)
    'formRoute' => 'findStays.search'
])

<section class="relative {{ $background }} h-screen overflow-hidden {{ $padding }}">
    <div class="container mx-auto flex flex-col md:flex-row   relative">
        <!-- Left: Text and Content (Buttons or Search Form) -->
        <div class="relative  w-full h-auto md:w-1/2 {{ $textAlignment }} ml-2 relative  h-screen" style="font-family: 'Montserrat', sans-serif;">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-700">{{ $subheading }}</h2>
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mt-2">{{ $heading }}</h1>
            <p class="text-xl md:text-xl text-gray-600 mt-2">{{ $description }}</p>

            <!-- Content based on type (buttons or search form) -->
            @if($type === 'buttons')
                <!-- Buttons with Icons -->
                <div class="mt-12 grid {{ $buttonColumns }} gap-6 ">
                    @foreach($buttons as $button)
                    <a href="{{ isset($button['route']) ? route($button['route'], [], false) : '#' }}" class="flex flex-col items-center md:items-start justify-center hover:opacity-80 transition-opacity">
                        <div class="h-16 w-16 bg-white text-black rounded-full flex items-center justify-center shadow-md hover:bg-black hover:text-white transition-colors duration-300">
                            <i class="bi {{ $button['icon'] }} text-2xl"></i>
                        </div>
                        <p class="mt-2 text-sm text-gray-800">{{ $button['text'] }}</p>
                    </a>
                    @endforeach
                </div>
            @elseif($type === 'searchForm')
                <!-- Search Bar - Made Smaller -->
                <div class="mt-8 bg-white rounded-lg shadow-lg p-4 max-w-lg">
                    <form action="{{ route($formRoute) }}" method="GET" class="space-y-4">
                        <!-- Location -->
                        <div class="flex items-center border-b border-gray-200 pb-3">
                            <div class="text-gray-500 mr-3">
                                <i class="bi bi-geo-alt-fill text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <label for="location" class="block text-sm text-gray-500 mb-1">Location</label>
                                <input type="text" id="location" name="location" placeholder="Where are you going?" 
                                    class="w-full border-none focus:ring-0 p-0 text-base text-gray-800 placeholder-gray-400">
                            </div>
                        </div>
                        
                        <!-- Date Range -->
                        <div class="flex items-center border-b border-gray-200 pb-3">
                            <div class="text-gray-500 mr-3">
                                <i class="bi bi-calendar3 text-xl"></i>
                            </div>
                            <div class="grid grid-cols-2 gap-3 flex-1">
                                <div>
                                    <label for="check_in" class="block text-sm text-gray-500 mb-1">Check in</label>
                                    <input type="date" id="check_in" name="check_in" 
                                        class="w-full border-none focus:ring-0 p-0 text-base text-gray-800">
                                </div>
                                <div>
                                    <label for="check_out" class="block text-sm text-gray-500 mb-1">Check out</label>
                                    <input type="date" id="check_out" name="check_out" 
                                        class="w-full border-none focus:ring-0 p-0 text-base text-gray-800">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Number of People -->
                        <div class="flex items-center pb-2">
                            <div class="text-gray-500 mr-3">
                                <i class="bi bi-people-fill text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <label for="guests" class="block text-sm text-gray-500 mb-1">Guests</label>
                                <select id="guests" name="guests" 
                                    class="w-full border-none focus:ring-0 p-0 text-base text-gray-800 bg-transparent">
                                    <option value="1">1 Guest</option>
                                    <option value="2">2 Guests</option>
                                    <option value="3">3 Guests</option>
                                    <option value="4">4 Guests</option>
                                    <option value="4">5 Guests</option>
                                    <option value="4">6 Guests</option>
                                    <option value="5+">7+ Guests</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Search Button -->
                        <button type="submit" class="w-full bg-black hover:bg-gray-800 text-white py-2 rounded-md text-base font-medium transition-colors duration-300">
                            Search Stays
                        </button>
                    </form>
                </div>
            @endif

            <!-- Buildings Vector positioned at the bottom of content section -->
            @if($buildingsVector)
            <div class=" absolute w-full bottom-20 left-0 right-0 flex justify-center items-center">
                <img src="{{ asset($buildingsVector) }}" alt="Buildings Vector" class="">
            </div>
            @endif
        </div>

        <!-- Right: Two Marquees Side by Side -->
        <div class="w-full md:w-1/2 grid grid-cols-2 gap-6">
            <!-- Left Marquee (Top to Bottom) -->
            <x-marquee
                type="image"
                direction="down"
                :images="$leftMarqueeImages"
                :gap="$marqueeGap"
            />

            <!-- Right Marquee (Bottom to Top) -->
            <x-marquee
                type="image"
                direction="up"
                :images="$rightMarqueeImages"
                :gap="$marqueeGap"
            />
        </div>
    </div>
</section>
