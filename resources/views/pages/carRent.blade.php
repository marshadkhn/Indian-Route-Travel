@extends('layouts.app')

@section('title', 'Rent a Car - Indian Travel Routes')

@section('content')

    <x-hero
        subheading="Rent a Car for a "
        heading="Hassle-Free "
        description="Journey."
        type="searchForm"
        formRoute="carRent.search"
    />

    <!-- Car Categories Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Pick by Category</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Choose from our wide range of vehicles to suit your needs and budget</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- SUV Category -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-105">
                    <img src="{{ asset('images/cars/suv.jpg') }}" alt="SUV" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">SUVs</h3>
                        <p class="text-gray-600 mb-4">Perfect for family trips and rough terrain</p>
                        <a href="#" class="text-primary font-semibold hover:underline">View SUVs →</a>
                    </div>
                </div>
                
                <!-- Sedan Category -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-105">
                    <img src="{{ asset('images/cars/sedan.jpg') }}" alt="Sedan" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Sedans</h3>
                        <p class="text-gray-600 mb-4">Comfortable and fuel-efficient for city drives</p>
                        <a href="#" class="text-primary font-semibold hover:underline">View Sedans →</a>
                    </div>
                </div>
                
                <!-- Luxury Category -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-105">
                    <img src="{{ asset('images/cars/luxury.jpg') }}" alt="Luxury" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Luxury Cars</h3>
                        <p class="text-gray-600 mb-4">Premium vehicles for special occasions</p>
                        <a href="#" class="text-primary font-semibold hover:underline">View Luxury Cars →</a>
                    </div>
                </div>
                
                <!-- Budget Category -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-105">
                    <img src="{{ asset('images/cars/budget.jpg') }}" alt="Budget" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Budget Cars</h3>
                        <p class="text-gray-600 mb-4">Affordable options for economical travel</p>
                        <a href="#" class="text-primary font-semibold hover:underline">View Budget Cars →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- FAQ Section -->
    @include('partials.home.faq')
@endsection
