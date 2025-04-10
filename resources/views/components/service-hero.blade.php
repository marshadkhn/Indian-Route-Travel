@props([
// Headings
'subheading' => 'One Stop Solution',
'heading' => 'For Travellers',
'description' => '',

// Search Bar
'searchPlaceholders' => ['Destination', 'Check-in', 'Check-out'],
'searchButtonText' => '',



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
'height' => 'py-20',
'marqueeGap' => '6',
'maxWidth' => 'container'
])

<section class="relative {{ $background }} h-auto {{ $height }}">
    <div class="{{ $maxWidth }} mx-auto flex flex-col md:flex-row items-center justify-between gap-12 relative px-4 sm:px-6">
        <!-- Left: Text and Search Section -->
        <div class="w-full md:w-1/2 {{ $textAlignment }}" style="font-family: 'Montserrat', sans-serif;">
            @if($subheading)
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-700">{{ $subheading }}</h2>
            @endif

            @if($heading)
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mt-2 leading-tight">{{ $heading }}</h1>
            @endif

            @if($description)
            <p class="text-lg md:text-xl text-gray-600 mt-4 max-w-lg {{ $textAlignment === 'text-center md:text-left' ? 'md:mx-auto md:text-left' : '' }}">
                {{ $description }}
            </p>
            @endif

            <!-- Search Form -->
            <div class="mt-8 bg-white rounded-lg shadow-lg p-1">
                <form class="flex flex-col sm:flex-row gap-1">
                    @foreach($searchPlaceholders as $placeholder)
                    <input
                        type="{{ in_array(strtolower($placeholder), ['check-in', 'check-out', 'date']) ? 'date' : 'text' }}"
                        placeholder="{{ $placeholder }}"
                        class="flex-1 px-4 py-3 rounded-md border-0 focus:ring-2 focus:ring-blue-500">
                    @endforeach
                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-3 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                        <i class="bi bi-search"></i> <!-- Bootstrap search icon -->
                        {{ $searchButtonText }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Right: Empty Column (Ready for your content) -->
        <div class="w-full md:w-1/2 grid grid-cols-2 gap-6">
            <!-- Left Marquee (Top to Bottom) -->
            <x-marquee
                type="image"
                direction="down"
                :images="$leftMarqueeImages"
                :gap="$marqueeGap" />

            <!-- Right Marquee (Bottom to Top) -->
            <x-marquee
                type="image"
                direction="up"
                :images="$rightMarqueeImages"
                :gap="$marqueeGap" />
        </div>
    </div>
</section>