@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif

        <p class="text-gray-600">{{ __('You are logged in!') }}</p>
        
        <div class="mt-6">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">My Profile</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Update your personal information and password.
                        </p>
                        <div class="mt-3">
                            <a href="{{ route('profile') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                View profile <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
