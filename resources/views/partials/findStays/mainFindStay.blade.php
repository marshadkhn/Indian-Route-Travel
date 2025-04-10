@extends('layouts.app')

@section('title', 'Find Stays - Indian Travel Routes')

@section('content')
<x-service-hero
    subheading="FInd the"
    heading="Perfect Stay"
    :buttons="[
        ['icon' => 'bi-star-fill', 'text' => 'VIP Stays'],
        ['icon' => 'bi-airplane', 'text' => 'Flights']
    ]"
    background="bg-blue-50"
    marqueeGap="8"
    buildingsVector="/images/custom-vector.png" />
@endsection