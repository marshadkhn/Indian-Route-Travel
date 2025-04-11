@php
    $showAll = $showAll ?? false;
    $packages = [
        [
            'title' => 'Golden Triangle Tour',
            'duration' => '6 Days / 5 Nights',
            'location' => 'Delhi - Agra - Jaipur',
            'image' => '/images/golden-triangle.jpg',
            'price' => '₹25,999',
            'rating' => 4.8,
            'facilities' => ['Hotels', 'Transfers', 'Sightseeing', 'Meals']
        ],
        [
            'title' => 'Kerala Backwaters Escape',
            'duration' => '5 Days / 4 Nights',
            'location' => 'Kochi - Alleppey - Kumarakom',
            'image' => '/images/kerala.jpg',
            'price' => '₹22,999',
            'rating' => 4.9,
            'facilities' => ['Hotels', 'Houseboat', 'Transfers', 'Some Meals']
        ],
        [
            'title' => 'Himalayan Adventure',
            'duration' => '7 Days / 6 Nights',
            'location' => 'Manali - Shimla - Dharamshala',
            'image' => '/images/himalayas.jpg',
            'price' => '₹18,999',
            'rating' => 4.7,
            'facilities' => ['Hotels', 'Transfers', 'Adventure Activities']
        ],
        [
            'title' => 'Rajasthan Heritage Tour',
            'duration' => '8 Days / 7 Nights',
            'location' => 'Jaipur - Udaipur - Jodhpur - Jaisalmer',
            'image' => '/images/rajasthan.jpg',
            'price' => '₹32,999',
            'rating' => 4.9,
            'facilities' => ['Heritage Hotels', 'Transfers', 'Sightseeing', 'Cultural Shows']
        ],
        [
            'title' => 'Goa Beach Vacation',
            'duration' => '4 Days / 3 Nights',
            'location' => 'North & South Goa',
            'image' => '/images/goa.jpg',
            'price' => '₹15,999',
            'rating' => 4.6,
            'facilities' => ['Resort', 'Transfers', 'Water Sports', 'Beach Access']
        ],
        [
            'title' => 'Northeast Explorer',
            'duration' => '9 Days / 8 Nights',
            'location' => 'Gangtok - Darjeeling - Shillong',
            'image' => '/images/northeast.jpg',
            'price' => '₹28,999',
            'rating' => 4.8,
            'facilities' => ['Hotels', 'Transfers', 'Sightseeing', 'Permits']
        ]
    ];
    
    $displayPackages = $showAll ? $packages : array_slice($packages, 0, 3);
@endphp

<section class="py-12 {{ $showAll ? 'bg-white' : 'bg-gray-50' }}">
    <div class="container mx-auto px-4">
        @if(!isset($sectionHeading) || $sectionHeading !== false)
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">{{ $showAll ? 'All Tour Packages' : 'Popular Tour Packages' }}</h2>
                @if(!$showAll)
                    <a href="{{ route('all.packages') }}" class="text-primary hover:underline">View All Packages →</a>
                @endif
            </div>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($displayPackages as $package)
                <x-tour.card 
                    image="{{ isset($package['image']) ? asset($package['image']) : asset('images/tour-placeholder.jpg') }}"
                    title="{{ $package['title'] }}"
                    duration="{{ $package['duration'] }}"
                    location="{{ $package['location'] }}"
                    price="{{ $package['price'] }}"
                    :rating="$package['rating']"
                    :facilities="$package['facilities']"
                    detailsUrl="#"
                    :showBookingButton="true"
                />
            @endforeach
        </div>
        
        @if($showAll)
            <div class="mt-12 text-center">
                <x-booking-button 
                    text="Book a Custom Tour" 
                    type="secondary" 
                    size="lg" 
                    icon="bi-map" 
                    customClass="shadow-md mx-auto"
                    :params="['type' => 'tour', 'custom' => 'true']"
                />
            </div>
        @endif
    </div>
</section>