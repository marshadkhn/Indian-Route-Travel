@php
$packagesJson = file_get_contents(resource_path('js/data/packages.json'));
$packagesData = json_decode($packagesJson, true);
// Only show first 3 packages on main page
$displayedPackages = isset($showAll) && $showAll ? $packagesData['packages'] : array_slice($packagesData['packages'], 0, 3);
@endphp

<section class="py-10 bg-white">
    <div class="container mx-auto px-4">
        <!-- Compact Heading -->
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">{{ $packagesData['title'] }}</h2>
            <p class="mt-2 text-gray-500 text-sm">{{ $packagesData['description'] }}</p>
        </div>

        <!-- Redesigned Grid to Match Stays Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2  lg:grid-cols-3 gap-6">
            @foreach ($displayedPackages as $package)
            <div class="relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow h-80">
                <!-- Full card background image -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="{{ asset($package['image']) }}" 
                         alt="{{ $package['location'] }}" 
                         class="w-full h-full object-cover">
                    <!-- Gradient overlay for better text visibility -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                </div>
                
                <!-- Content positioned over the image -->
                <div class="relative h-full flex flex-col justify-between p-4">
                    <!-- Top section with duration -->
                    <div class="bg-white bg-opacity-80 self-start rounded-md px-2 py-1">
                        <span class="text-sm text-gray-700">{{ $package['duration'] }}</span>
                    </div>
                    
                    <!-- Bottom section with details -->
                    <div class="text-white">
                        <!-- Location -->
                        <h3 class="font-bold text-xl">{{ $package['location'] }}</h3>
                        
                        <div class="flex justify-between items-center mt-3">
                            <!-- Price -->
                            <div>
                                <span class="font-semibold text-lg">{{ $package['price'] }}</span>
                                <span class="text-gray-200 text-sm">/person</span>
                            </div>
                            
                            <!-- Book Package Button -->
                            <a href="/package/{{ $package['slug'] }}" 
                               class="bg-[#8DD3BB] hover:bg-[#7bc0a9] text-gray-800 px-3 py-1.5 rounded text-sm font-medium transition-colors">
                                Book Package
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Minimal View All - Only show when not viewing all packages -->
        @if(!isset($showAll) || !$showAll)
        <div class="text-center mt-8">
            <a href="{{ $packagesData['cta']['url'] }}"
               class="inline-block px-5 py-2 text-sm font-medium text-gray-800 bg-[#8DD3BB] hover:bg-[#7bc0a9] rounded transition-colors">
                {{ $packagesData['cta']['text'] }}
            </a>
        </div>
        @endif
    </div>
</section>