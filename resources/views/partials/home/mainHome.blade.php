@extends('layouts.app')

@section('title', 'Home - Indian Travel Routes')

@section('content')
<!-- Hero Section -->
@include('partials.home.hero')

<!-- Suggestions Section -->
@include('partials.home.suggestions')

<!-- Quick Access Section -->
@include('partials.home.quickAccess')

<!-- FAQ Section -->
@include('partials.home.faq')

<!-- Reviews Section -->
@include('partials.home.review')

@endsection