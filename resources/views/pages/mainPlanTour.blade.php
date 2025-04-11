@extends('layouts.app')

@section('title', 'Plan Tour - Indian Travel Routes')

@section('content')

    <x-hero
        subheading="Plan your"
        heading="Dream Tour"
        description="with ease."
        type="searchForm"
        formRoute="findStays.search"
    />
@include('partials.planTour.categories')
@include('partials.planTour.packages')
<!-- FAQ Section -->
@include('partials.home.faq')
@endsection