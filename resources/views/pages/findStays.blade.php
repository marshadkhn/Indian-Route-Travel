@extends('layouts.app')

@section('title', 'Find Stays - Indian Travel Routes')

@section('content')
    <!-- Hero Section with Search Form using the reusable component -->
    <x-hero
        subheading="Find the"
        heading="Perfect Stay"
        description="for Your Trip."
        type="searchForm"
        formRoute="findStays.search"
    />

    <!-- Featured Stays Section with Reusable Cards -->
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Featured Stays</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Using reusable card components -->
                <x-stays.card 
                    image="{{ asset('images/marquee-seven.png') }}"
                    name="Luxury Villa Resort"
                    rating="4.8"
                    location="Goa, India"
                    price="₹8,999"
                    detailsUrl="#"
                />
                
                <x-stays.card 
                    image="{{ asset('images/marquee-two.png') }}"
                    name="Mountain View Cottage"
                    rating="4.6"
                    location="Shimla, India"
                    price="₹5,499"
                    detailsUrl="#"
                />
                
                <x-stays.card 
                    image="{{ asset('images/marquee-three.png') }}"
                    name="Heritage Haveli"
                    rating="4.9"
                    location="Jaipur, India"
                    price="₹7,299"
                    detailsUrl="#"
                />
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
@include('partials.home.review')


@endsection
