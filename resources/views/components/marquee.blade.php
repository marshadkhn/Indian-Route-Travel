@props([
    'direction' => 'up',
    'height' => '28rem',
    'type' => 'image', // 'image' or 'review'
    'images' => [],
    'reviews' => [],
    'gap' => '6'
])

<div class="relative h-[{{ $height }}] overflow-hidden">
    <div class="marquee-container-{{ $direction }} h-full">
        <!-- Original set of items -->
        <div class="marquee-content flex flex-col gap-{{ $gap }}">
            @if($type === 'image')
                @foreach($images as $image)
                    <div class="w-full bg-cover bg-center rounded-lg shadow-md h-56" style="background-image: url('{{ $image }}');"></div>
                @endforeach
            @else
                @foreach($reviews as $review)
                    <div class="bg-white shadow-md rounded-lg p-6 w-full">
                        <p class="text-lg font-semibold text-gray-800 mb-2">{{ $review['text'] }}</p>
                        <p class="text-sm text-gray-600">{{ $review['name'] }}</p>
                        <p class="text-sm text-gray-500">{{ $review['location'] }}</p>
                    </div>
                @endforeach
            @endif
        </div>
        
        <!-- Duplicate set for seamless scrolling -->
        <div class="marquee-content flex flex-col gap-{{ $gap }}">
            @if($type === 'image')
                @foreach($images as $image)
                    <div class="w-full bg-cover bg-center rounded-lg shadow-md h-56" style="background-image: url('{{ $image }}');"></div>
                @endforeach
            @else
                @foreach($reviews as $review)
                    <div class="bg-white shadow-md rounded-lg p-6 w-full">
                        <p class="text-lg font-semibold text-gray-800 mb-2">{{ $review['text'] }}</p>
                        <p class="text-sm text-gray-600">{{ $review['name'] }}</p>
                        <p class="text-sm text-gray-500">{{ $review['location'] }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<style>
    .marquee-container-up {
        animation: scroll-up-marquee 20s linear infinite;
    }
    
    .marquee-container-down {
        animation: scroll-down-marquee 20s linear infinite;
    }
    
    @keyframes scroll-up-marquee {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-50%);
        }
    }
    
    @keyframes scroll-down-marquee {
        0% {
            transform: translateY(-50%);
        }
        100% {
            transform: translateY(0);
        }
    }
</style>
