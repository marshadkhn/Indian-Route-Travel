@extends('layouts.app')

@section('title', 'All Tour Packages - Indian Travel Routes')

@section('content')
    <x-hero
        subheading="Explore All"
        heading="Tour Packages"
        description="Find your perfect vacation package."
        type="bookingButton"
        bookingButtonText="Book a Tour Package"
        bookingButtonType="primary"
        bookingButtonSize="lg"
    />

    @include('partials.planTour.packages', ['showAll' => true])
@endsection
