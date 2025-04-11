@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Bookings Management</h1>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-900">
                    <i class="bi bi-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>
        
        <!-- Filters -->
        <div class="mb-6 bg-gray-50 p-4 rounded-md">
            <h2 class="text-lg font-medium mb-4">Filter Bookings</h2>
            <form action="{{ route('admin.bookings.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="">All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div>
                    <label for="booking_type" class="block text-sm font-medium text-gray-700 mb-1">Booking Type</label>
                    <select id="booking_type" name="booking_type" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="">All Types</option>
                        <option value="stay" {{ request('booking_type') == 'stay' ? 'selected' : '' }}>Stay</option>
                        <option value="tour" {{ request('booking_type') == 'tour' ? 'selected' : '' }}>Tour</option>
                        <option value="car" {{ request('booking_type') == 'car' ? 'selected' : '' }}>Car Rental</option>
                        <option value="guide" {{ request('booking_type') == 'guide' ? 'selected' : '' }}>Guide Service</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Apply Filters
                    </button>
                    <a href="{{ route('admin.bookings.index') }}" class="ml-2 text-gray-600 border border-gray-300 py-2 px-4 rounded-md hover:bg-gray-100">
                        Reset
                    </a>
                </div>
            </form>
        </div>
        
        <!-- Bookings Table -->
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($bookings as $booking)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $booking->user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $booking->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    @if($booking->booking_type == 'stay') badge-stay-bg badge-stay-text
                                    @elseif($booking->booking_type == 'tour') badge-tour-bg badge-tour-text
                                    @elseif($booking->booking_type == 'car') badge-car-bg badge-car-text
                                    @else badge-guide-bg badge-guide-text @endif">
                                    {{ ucfirst($booking->booking_type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->destination }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ date('M d, Y', strtotime($booking->check_in)) }} - {{ date('M d, Y', strtotime($booking->check_out)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($booking->status == 'pending') badge-pending-bg badge-pending-text
                                    @elseif($booking->status == 'confirmed') badge-confirmed-bg badge-confirmed-text
                                    @elseif($booking->status == 'cancelled') badge-cancelled-bg badge-cancelled-text
                                    @else badge-completed-bg badge-completed-text @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $booking->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.bookings.show', $booking) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                
                                <div class="relative inline-block text-left dropdown-container" x-data="{ open: false }">
                                    <button type="button" @click="open = !open" class="text-gray-600 hover:text-gray-900 flex items-center">
                                        Status <i class="bi bi-chevron-down ml-1"></i>
                                    </button>
                                    <div x-show="open" 
                                         @click.away="open = false" 
                                         class="dropdown-menu absolute right-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50"
                                         style="transform: translateY(-90%); top: 0;">
                                        <div class="py-1">
                                            <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                                                @csrf
                                                <button type="submit" name="status" value="pending" class="block w-full text-left px-4 py-2 text-sm text-yellow-700 hover:bg-yellow-100">
                                                    Mark Pending
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                                                @csrf
                                                <button type="submit" name="status" value="confirmed" class="block w-full text-left px-4 py-2 text-sm text-green-700 hover:bg-green-100">
                                                    Confirm
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                                                @csrf
                                                <button type="submit" name="status" value="cancelled" class="block w-full text-left px-4 py-2 text-sm text-red-700 hover:bg-red-100">
                                                    Cancel
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                                                @csrf
                                                <button type="submit" name="status" value="completed" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    Mark Completed
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">No bookings found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mt-4">
            {{ $bookings->appends(request()->except('page'))->links() }}
        </div>
    </div>
</div>

<!-- Add custom styles to ensure dropdowns are visible -->
<style>
    .dropdown-container {
        position: relative;
    }
    
    .dropdown-menu {
        position: absolute;
        min-width: 10rem;
        overflow: visible; 
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    /* Make table container have proper position context */
    .overflow-x-auto {
        position: relative;
        overflow: visible !important;
    }
    
    /* Ensure table doesn't cut off dropdowns */
    table {
        overflow: visible !important;
    }
    
    /* Ensure dropdown containers aren't constrained */
    td {
        position: relative;
        overflow: visible !important;
    }
</style>

<script>
    // Fix for dropdown menus being cut off in tables
    document.addEventListener('DOMContentLoaded', function() {
        // Make sure Alpine.js initializes correctly
        if (typeof Alpine !== 'undefined') {
            // Add event listener to position dropdowns above if they would be cut off
            document.querySelectorAll('.dropdown-container').forEach(container => {
                container.addEventListener('click', function(e) {
                    const dropdown = this.querySelector('.dropdown-menu');
                    if (!dropdown) return;
                    
                    // Check if dropdown would be cut off at bottom
                    const rect = dropdown.getBoundingClientRect();
                    const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
                    
                    if (rect.bottom > viewportHeight) {
                        // Position above the button instead
                        dropdown.style.transform = 'translateY(-100%)';
                        dropdown.style.top = '0';
                    } else {
                        // Position below the button (default)
                        dropdown.style.transform = 'translateY(0)';
                        dropdown.style.top = '100%';
                    }
                    
                    // Ensure dropdown is above other elements
                    dropdown.style.zIndex = '50';
                });
            });
        }
    });
</script>
@endsection
