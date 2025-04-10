@props([
// Headings
'subheading' => 'One Stop Solution',
'heading' => 'For Travellers',
'description' => 'From Indian Travel Routes',

// Buttons
'buttons' => [
['icon' => 'bi-house-fill', 'text' => 'Find Stays'],
['icon' => 'bi-geo-alt-fill', 'text' => 'Plan Tour'],
['icon' => 'bi-car-front-fill', 'text' => 'Car Rent'],
['icon' => 'bi-person-fill', 'text' => 'Get a Guide']
],

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
'buttonColumns' => 'grid-cols-2 md:grid-cols-4',
'height' => 'py-20',
'marqueeGap' => '6',
'buildingsVector' => '/images/buildings-vector.png'
])

<section class="relative {{ $background }} h-auto {{ $height }}">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-12 relative">
        <!-- Left: Text and Buttons -->
        <div class="w-full md:w-1/2 text-center md:text-left ml-2" style="font-family: 'Montserrat', sans-serif;">
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-700">{{ $subheading }}</h2>
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mt-2">{{ $heading }}</h1>
            <p class="text-xl md:text-xl text-gray-600 mt-2">{{ $description }}</p>

            <!-- Buttons with Icons -->
            <div class="mt-12 grid {{ $buttonColumns }} gap-6">
                @foreach($buttons as $button)
                <div class="flex flex-col items-center">
                    <div class="h-16 w-16 bg-white text-black rounded-full flex items-center justify-center shadow-md">
                        <i class="bi {{ $button['icon'] }} text-2xl"></i>
                    </div>
                    <p class="mt-2 text-sm text-gray-800">{{ $button['text'] }}</p>
                </div>
                @endforeach
            </div>
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

        <!-- Buildings Vector -->
        @if($buildingsVector)
        <img src="{{ asset($buildingsVector) }}" alt="Buildings Vector" class="absolute -bottom-20 left-0 w-auto h-auto">
        @endif
    </div>
</section>