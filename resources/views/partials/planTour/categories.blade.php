@php
// Load categories data from JSON file
$categoriesJson = file_get_contents(resource_path('js/data/categories.json'));
$categoriesData = json_decode($categoriesJson, true);
@endphp

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <!-- Heading -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $categoriesData['title'] }}</h2>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">{{ $categoriesData['description'] }}</p>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($categoriesData['categories'] as $category)
            <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="h-64 overflow-hidden">
                    <img
                        src="{{ asset($category['image']) }}"
                        alt="{{ $category['title'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                    <h3 class="text-xl font-bold mb-1">{{ $category['title'] }}</h3>
                    <p class="text-sm opacity-80 mb-4">{{ $category['count'] }}</p>
                    <!-- <img src="/public/images/adventure.jpg" alt="" srcset=""> -->
                    <a
                        href="/category/{{ $category['slug'] }}"
                        class="inline-block px-5 py-2 bg-white text-gray-800 rounded-full text-sm font-medium hover:bg-gray-100 transition-colors">
                        Explore
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a
                href="{{ $categoriesData['cta']['url'] }}"
                class="inline-block px-8 py-3 bg-blue-600 text-white rounded-full font-medium hover:bg-blue-700 transition-colors">
                {{ $categoriesData['cta']['text'] }}
            </a>
        </div>
    </div>
</section>