@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Booking #{{ $booking->id }}</h1>
                <p class="text-gray-500">Created on {{ $booking->created_at->format('F j, Y, g:i a') }}</p>
            </div>
            <div class="flex space-x-4">
                <a href="{{ route('admin.bookings.index') }}" class="text-blue-600 hover:text-blue-900">
                    <i class="bi bi-arrow-left"></i> Back to All Bookings
                </a>
                <button id="toggleEditBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    <i class="bi bi-pencil mr-1"></i> Edit Booking
                </button>
            </div>
        </div>
        
        <!-- Status Badge -->
        <div class="mb-6">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                @if($booking->status == 'pending') badge-pending-bg badge-pending-text
                @elseif($booking->status == 'confirmed') badge-confirmed-bg badge-confirmed-text
                @elseif($booking->status == 'cancelled') badge-cancelled-bg badge-cancelled-text
                @else badge-completed-bg badge-completed-text @endif">
                <svg class="-ml-1 mr-1.5 h-2 w-2
                    @if($booking->status == 'pending') badge-pending-dot
                    @elseif($booking->status == 'confirmed') badge-confirmed-dot
                    @elseif($booking->status == 'cancelled') badge-cancelled-dot
                    @else badge-completed-dot @endif" 
                    fill="currentColor" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                </svg>
                {{ ucfirst($booking->status) }}
            </span>
        </div>
        
        <!-- Edit Form -->
        <form id="editBookingForm" action="{{ route('admin.bookings.update', $booking) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')
            
            <!-- Booking Actions -->
            <div class="mb-6 flex space-x-4">
                <button type="button" name="status" value="confirmed" class="status-btn inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Confirm Booking
                </button>
                
                <button type="button" name="status" value="cancelled" class="status-btn inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Cancel Booking
                </button>
                
                <button type="button" name="status" value="completed" class="status-btn inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Mark Completed
                </button>
            </div>
            
            <input type="hidden" id="statusInput" name="status" value="{{ $booking->status }}">
            
            <!-- Booking Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Customer Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h2 class="text-lg font-medium mb-4 text-gray-900">Customer Information</h2>
                    <div class="space-y-3">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-500">Name</label>
                            <input type="text" id="name" name="name" value="{{ $booking->name }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-500">Email</label>
                            <input type="email" id="email" name="email" value="{{ $booking->email }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-500">Phone</label>
                            <input type="tel" id="phone" name="phone" value="{{ $booking->phone }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-500">City</label>
                            <input type="text" id="city" name="city" value="{{ $booking->city }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                    </div>
                </div>
                
                <!-- Booking Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h2 class="text-lg font-medium mb-4 text-gray-900">Booking Information</h2>
                    <div class="space-y-3">
                        <div>
                            <label for="booking_type" class="block text-sm font-medium text-gray-500">Booking Type</label>
                            <select id="booking_type" name="booking_type" class="mt-1 form-field disabled:bg-transparent disabled:appearance-none disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                                <option value="stay" {{ $booking->booking_type == 'stay' ? 'selected' : '' }}>Stay</option>
                                <option value="tour" {{ $booking->booking_type == 'tour' ? 'selected' : '' }}>Tour</option>
                                <option value="car" {{ $booking->booking_type == 'car' ? 'selected' : '' }}>Car Rental</option>
                                <option value="guide" {{ $booking->booking_type == 'guide' ? 'selected' : '' }}>Guide</option>
                            </select>
                        </div>
                        <div>
                            <label for="destination" class="block text-sm font-medium text-gray-500">Destination</label>
                            <input type="text" id="destination" name="destination" value="{{ $booking->destination }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        <div>
                            <label for="guests" class="block text-sm font-medium text-gray-500">Guests</label>
                            <input type="text" id="guests" name="guests" value="{{ $booking->guests }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        <div>
                            <label for="check_in" class="block text-sm font-medium text-gray-500">Check-in / Start Date</label>
                            <input type="date" id="check_in" name="check_in" value="{{ date('Y-m-d', strtotime($booking->check_in)) }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        <div>
                            <label for="check_out" class="block text-sm font-medium text-gray-500">Check-out / End Date</label>
                            <input type="date" id="check_out" name="check_out" value="{{ date('Y-m-d', strtotime($booking->check_out)) }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                    </div>
                </div>
                
                <!-- Booking Details -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h2 class="text-lg font-medium mb-4 text-gray-900">Booking Details</h2>
                    <div class="space-y-3">
                        @if($booking->item_name)
                        <div>
                            <label for="item_name" class="block text-sm font-medium text-gray-500">Item Name</label>
                            <input type="text" id="item_name" name="item_name" value="{{ $booking->item_name }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        @endif
                        
                        @if($booking->item_price)
                        <div>
                            <label for="item_price" class="block text-sm font-medium text-gray-500">Price</label>
                            <input type="text" id="item_price" name="item_price" value="{{ $booking->item_price }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        @endif
                        
                        @if($booking->tour_duration)
                        <div>
                            <label for="tour_duration" class="block text-sm font-medium text-gray-500">Tour Duration</label>
                            <input type="text" id="tour_duration" name="tour_duration" value="{{ $booking->tour_duration }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        @endif
                        
                        @if($booking->car_type)
                        <div>
                            <label for="car_type" class="block text-sm font-medium text-gray-500">Car Type</label>
                            <input type="text" id="car_type" name="car_type" value="{{ $booking->car_type }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        @endif
                        
                        @if($booking->driver_option)
                        <div>
                            <label for="driver_option" class="block text-sm font-medium text-gray-500">Driver Option</label>
                            <select id="driver_option" name="driver_option" class="mt-1 form-field disabled:bg-transparent disabled:appearance-none disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                                <option value="with_driver" {{ $booking->driver_option == 'with_driver' ? 'selected' : '' }}>With Driver</option>
                                <option value="self_drive" {{ $booking->driver_option == 'self_drive' ? 'selected' : '' }}>Self Drive</option>
                            </select>
                        </div>
                        @endif
                        
                        @if($booking->guide_type)
                        <div>
                            <label for="guide_type" class="block text-sm font-medium text-gray-500">Guide Type</label>
                            <select id="guide_type" name="guide_type" class="mt-1 form-field disabled:bg-transparent disabled:appearance-none disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                                <option value="city" {{ $booking->guide_type == 'city' ? 'selected' : '' }}>City Guide</option>
                                <option value="adventure" {{ $booking->guide_type == 'adventure' ? 'selected' : '' }}>Adventure Guide</option>
                                <option value="cultural" {{ $booking->guide_type == 'cultural' ? 'selected' : '' }}>Cultural Guide</option>
                            </select>
                        </div>
                        @endif
                        
                        @if($booking->preferred_language)
                        <div>
                            <label for="preferred_language" class="block text-sm font-medium text-gray-500">Preferred Language</label>
                            <input type="text" id="preferred_language" name="preferred_language" value="{{ $booking->preferred_language }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        @endif
                        
                        @if($booking->room_type)
                        <div>
                            <label for="room_type" class="block text-sm font-medium text-gray-500">Room Type</label>
                            <select id="room_type" name="room_type" class="mt-1 form-field disabled:bg-transparent disabled:appearance-none disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                                <option value="standard" {{ $booking->room_type == 'standard' ? 'selected' : '' }}>Standard Room</option>
                                <option value="deluxe" {{ $booking->room_type == 'deluxe' ? 'selected' : '' }}>Deluxe Room</option>
                                <option value="suite" {{ $booking->room_type == 'suite' ? 'selected' : '' }}>Suite</option>
                                <option value="villa" {{ $booking->room_type == 'villa' ? 'selected' : '' }}>Villa/Cottage</option>
                            </select>
                        </div>
                        @endif
                        
                        @if($booking->rooms)
                        <div>
                            <label for="rooms" class="block text-sm font-medium text-gray-500">Number of Rooms</label>
                            <input type="text" id="rooms" name="rooms" value="{{ $booking->rooms }}" 
                                   class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            @if($booking->special_requests)
            <div class="bg-gray-50 p-6 rounded-lg">
                <h2 class="text-lg font-medium mb-2 text-gray-900">Special Requests</h2>
                <textarea id="special_requests" name="special_requests" rows="4" 
                          class="mt-1 form-field disabled:bg-transparent disabled:border-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" disabled>{{ $booking->special_requests }}</textarea>
            </div>
            @endif
            
            <!-- Submit Button - Hidden by default, shown when editing -->
            <div id="submitBtnContainer" class="pt-6 text-right hidden">
                <button type="button" id="cancelBtn" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md mr-2">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleEditBtn = document.getElementById('toggleEditBtn');
        const formFields = document.querySelectorAll('.form-field');
        const submitBtnContainer = document.getElementById('submitBtnContainer');
        const cancelBtn = document.getElementById('cancelBtn');
        const editBookingForm = document.getElementById('editBookingForm');
        const statusBtns = document.querySelectorAll('.status-btn');
        const statusInput = document.getElementById('statusInput');
        
        // Store original values for cancel functionality
        let originalValues = {};
        formFields.forEach(field => {
            originalValues[field.id] = field.value;
        });
        
        // Toggle edit mode
        toggleEditBtn.addEventListener('click', function() {
            const isEditMode = toggleEditBtn.classList.contains('bg-red-500');
            
            if (isEditMode) {
                // Switch to view mode
                toggleEditBtn.classList.remove('bg-red-500', 'hover:bg-red-600');
                toggleEditBtn.classList.add('bg-blue-500', 'hover:bg-blue-600');
                toggleEditBtn.innerHTML = '<i class="bi bi-pencil mr-1"></i> Edit Booking';
                submitBtnContainer.classList.add('hidden');
                
                // Disable all fields
                formFields.forEach(field => {
                    field.disabled = true;
                });
            } else {
                // Switch to edit mode
                toggleEditBtn.classList.remove('bg-blue-500', 'hover:bg-blue-600');
                toggleEditBtn.classList.add('bg-red-500', 'hover:bg-red-600');
                toggleEditBtn.innerHTML = '<i class="bi bi-x-lg mr-1"></i> Cancel Editing';
                submitBtnContainer.classList.remove('hidden');
                
                // Enable all fields
                formFields.forEach(field => {
                    field.disabled = false;
                });
            }
        });
        
        // Handle cancel button
        cancelBtn.addEventListener('click', function() {
            // Reset all fields to original values
            formFields.forEach(field => {
                field.value = originalValues[field.id];
            });
            
            // Switch back to view mode
            toggleEditBtn.click();
        });
        
        // Handle status change buttons
        statusBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const status = this.getAttribute('value');
                statusInput.value = status;
                
                // Submit form for status change
                editBookingForm.action = "{{ route('admin.bookings.status', $booking) }}";
                editBookingForm.submit();
            });
        });
    });
</script>
@endsection
