@extends('layouts.app')

@section('title', 'Plan Tour - Indian Travel Routes')

@section('content')
    <x-hero
        subheading="Plan your"
        heading="Dream Tour"
        description="with ease."
        type="searchForm"
    />
    
    <!-- Tour categories section -->
    @include('partials.planTour.categories')
    
    <!-- Add booking buttons to the tour packages section header -->
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Featured Tour Packages</h2>
                <x-booking-button 
                    text="Book a Tour" 
                    type="primary" 
                    size="md"
                    icon="bi-geo-alt-fill"
                    :params="['type' => 'tour']"
                />
            </div>
            <!-- Rest of the packages section -->
            @include('partials.planTour.packages')
        </div>
    </section>
    
    <!-- FAQ Section -->
    @include('partials.home.faq')
@endsection