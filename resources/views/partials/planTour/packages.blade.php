@php
$packagesJson = file_get_contents(resource_path('js/data/packages.json'));
$packagesData = json_decode($packagesJson, true);
@endphp

<section class="py-10 bg-white">
    <div class="container mx-auto px-4">
        <!-- Compact Heading -->
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">{{ $packagesData['title'] }}</h2>
            <p class="mt-2 text-gray-500 text-sm">{{ $packagesData['description'] }}</p>
        </div>

        <!-- Ultra-Compact 3x3 Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($packagesData['packages'] as $package)
            <div class="bg-white rounded-lg border border-gray-100 shadow-xs hover:shadow-sm transition-all duration-200 overflow-hidden w-full max-w-xs mx-auto">
                <!-- Compact Image -->
                <div class="relative h-36 overflow-hidden">
                    <img src="{{ asset($package['image']) }}"
                        alt="{{ $package['location'] }}"
                        class="w-full h-full object-cover hover:scale-101 transition-transform duration-200">
                    <span class="absolute top-2 right-2 bg-white/90 text-gray-800 text-xs font-medium px-2 py-0.5 rounded-full shadow-xs">
                        {{ $package['duration'] }}
                    </span>
                </div>

                <!-- Tight Content Area -->
                <div class="p-3">
                    <div class="flex justify-between items-center mb-1">
                        <h3 class="font-medium text-gray-800 text-base truncate">{{ $package['location'] }}</h3>
                        <span class="text-gray-900 font-medium text-sm">{{ $package['price'] }}</span>
                    </div>

                    <!-- Micro Book Button -->
                    <a href="/package/{{ $package['slug'] }}"
                        class="block w-full py-1.5 px-2 text-xs font-medium text-center text-white bg-blue-600 hover:bg-blue-700 rounded transition-colors">
                        Book
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Minimal View All -->
        <div class="text-center mt-8">
            <a href="{{ $packagesData['cta']['url'] }}"
                class="inline-block px-4 py-1.5 text-xs font-medium text-blue-600 hover:text-blue-800 transition-colors">
                {{ $packagesData['cta']['text'] }} &rarr;
            </a>
        </div>
    </div>
</section>