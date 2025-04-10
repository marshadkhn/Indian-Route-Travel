@extends('layouts.app')

@section('title', 'Plan Tour - Indian Travel Routes')

@section('content')
<x-service-hero
    subheading="Plan your"
    heading="Dream Tour"
    :buttons="[
        ['icon' => 'bi-star-fill', 'text' => 'VIP Stays'],
        ['icon' => 'bi-airplane', 'text' => 'Flights']
    ]"
    :searchPlaceholders="['Where to?', 'From', 'To']"
    searchButtonText=""
    background="bg-blue-50"
    buildingsVector="/images/custom-vector.png" />

@include('partials.planTour.categories')
@include('partials.planTour.packages')

@endsection