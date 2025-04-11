@extends('layouts.app')

@section('title', 'Booking Form - Indian Travel Routes')

@section('content')
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Complete Your Booking</h1>
                    <p class="text-gray-600 mt-2">Fill out the form below and we'll contact you shortly</p>
                </div>
                
                <!-- Item Details Section - Shows details of the selected item -->
                @php
                    $bookingType = request('type', 'stay');
                    $itemName = request('name', '');
                    $itemLocation = request('location', '');
                    $itemPrice = request('price', '');
                    $tourDuration = request('duration', '');
                    $carType = request('car_type', '');
                    $guideType = request('guide_type', '');
                @endphp
                
                @if($itemName || $carType || $guideType)
                <div class="mb-8 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">
                        @if($bookingType == 'stay')
                            Stay Details
                        @elseif($bookingType == 'tour')
                            Tour Package Details
                        @elseif($bookingType == 'car')
                            Car Rental Details
                        @elseif($bookingType == 'guide')
                            Guide Service Details
                        @endif
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @if($itemName)
                            <div>
                                <span class="text-sm text-gray-500">Name:</span>
                                <p class="font-medium">{{ $itemName }}</p>
                            </div>
                        @endif
                        
                        @if($itemLocation)
                            <div>
                                <span class="text-sm text-gray-500">Location:</span>
                                <p class="font-medium">{{ $itemLocation }}</p>
                            </div>
                        @endif
                        
                        @if($itemPrice)
                            <div>
                                <span class="text-sm text-gray-500">Price:</span>
                                <p class="font-medium">{{ $itemPrice }}</p>
                            </div>
                        @endif
                        
                        @if($tourDuration)
                            <div>
                                <span class="text-sm text-gray-500">Duration:</span>
                                <p class="font-medium">{{ $tourDuration }}</p>
                            </div>
                        @endif
                        
                        @if($carType)
                            <div>
                                <span class="text-sm text-gray-500">Car Type:</span>
                                <p class="font-medium">{{ $carType }}</p>
                            </div>
                        @endif
                        
                        @if($guideType)
                            <div>
                                <span class="text-sm text-gray-500">Guide Type:</span>
                                <p class="font-medium">
                                    @if($guideType == 'city')
                                        City Guide
                                    @elseif($guideType == 'adventure')
                                        Adventure Guide
                                    @elseif($guideType == 'cultural')
                                        Cultural Guide
                                    @else
                                        {{ $guideType }}
                                    @endif
                                </p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Hidden fields to pass these values in the form -->
                    <input type="hidden" name="item_name" value="{{ $itemName }}">
                    <input type="hidden" name="item_location" value="{{ $itemLocation }}">
                    <input type="hidden" name="item_price" value="{{ $itemPrice }}">
                    <input type="hidden" name="tour_duration" value="{{ $tourDuration }}">
                    <input type="hidden" name="car_type" value="{{ $carType }}">
                    <input type="hidden" name="guide_type" value="{{ $guideType }}">
                </div>
                @endif
                
                <form action="{{ route('contact.booking.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Booking Type Selection -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                        <div class="bg-gray-50 p-4 rounded-lg border-2 border-transparent hover:border-[#8DD3BB] cursor-pointer transition-all text-center type-selector" data-type="stay">
                            <i class="bi bi-house-fill text-3xl text-[#8DD3BB]"></i>
                            <p class="mt-2 font-medium">Hotel/Stay</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border-2 border-transparent hover:border-[#8DD3BB] cursor-pointer transition-all text-center type-selector" data-type="tour">
                            <i class="bi bi-geo-alt-fill text-3xl text-[#8DD3BB]"></i>
                            <p class="mt-2 font-medium">Tour Package</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border-2 border-transparent hover:border-[#8DD3BB] cursor-pointer transition-all text-center type-selector" data-type="car">
                            <i class="bi bi-car-front-fill text-3xl text-[#8DD3BB]"></i>
                            <p class="mt-2 font-medium">Car Rental</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border-2 border-transparent hover:border-[#8DD3BB] cursor-pointer transition-all text-center type-selector" data-type="guide">
                            <i class="bi bi-person-fill text-3xl text-[#8DD3BB]"></i>
                            <p class="mt-2 font-medium">Guide Service</p>
                        </div>
                        <input type="hidden" name="booking_type" id="booking_type" value="{{ $bookingType }}">
                    </div>
                    
                    <!-- Personal Information - Pre-filled with user data -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                            <input type="text" id="name" name="name" required 
                                value="{{ auth()->user()->name ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                            <input type="email" id="email" name="email" required 
                                value="{{ auth()->user()->email ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required 
                                value="{{ auth()->user()->profile->phone ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                            <input type="text" id="city" name="city" required 
                                value="{{ auth()->user()->profile->city ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                        </div>
                    </div>
                    
                    <!-- Trip Details -->
                    <div class="space-y-6">
                        <h3 class="text-xl font-medium text-gray-800">Trip Details</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Destination/Location *</label>
                                <input type="text" id="destination" name="destination" value="{{ $itemLocation ?: request('location', '') }}" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                            </div>
                            <div>
                                <label for="guests" class="block text-sm font-medium text-gray-700 mb-1">Number of Guests *</label>
                                <select id="guests" name="guests" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                                    <option value="1" {{ request('guests') == '1' ? 'selected' : '' }}>1 Guest</option>
                                    <option value="2" {{ request('guests') == '2' ? 'selected' : '' }}>2 Guests</option>
                                    <option value="3" {{ request('guests') == '3' ? 'selected' : '' }}>3 Guests</option>
                                    <option value="4" {{ request('guests') == '4' ? 'selected' : '' }}>4 Guests</option>
                                    <option value="5" {{ request('guests') == '5' ? 'selected' : '' }}>5 Guests</option>
                                    <option value="6" {{ request('guests') == '6' ? 'selected' : '' }}>6 Guests</option>
                                    <option value="7+" {{ request('guests') == '7+' ? 'selected' : '' }}>More than 7 Guests</option>
                                </select>
                            </div>
                            <div>
                                <label for="check_in" class="block text-sm font-medium text-gray-700 mb-1">Check-in / Start Date *</label>
                                <input type="date" id="check_in" name="check_in" value="{{ request('check_in', '') }}" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                            </div>
                            <div>
                                <label for="check_out" class="block text-sm font-medium text-gray-700 mb-1">Check-out / End Date *</label>
                                <input type="date" id="check_out" name="check_out" value="{{ request('check_out', '') }}" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                            </div>
                        </div>
                        
                        <!-- Conditional fields based on booking type -->
                        <div id="stayFields" class="booking-type-fields" style="display: {{ $bookingType === 'stay' ? 'block' : 'none' }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="room_type" class="block text-sm font-medium text-gray-700 mb-1">Room Type</label>
                                    <select id="room_type" name="room_type" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                                        <option value="">Select Room Type</option>
                                        <option value="standard">Standard Room</option>
                                        <option value="deluxe">Deluxe Room</option>
                                        <option value="suite">Suite</option>
                                        <option value="villa">Villa/Cottage</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="rooms" class="block text-sm font-medium text-gray-700 mb-1">Number of Rooms</label>
                                    <select id="rooms" name="rooms" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                                        <option value="1">1 Room</option>
                                        <option value="2">2 Rooms</option>
                                        <option value="3">3 Rooms</option>
                                        <option value="4+">4+ Rooms</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div id="tourFields" class="booking-type-fields" style="display: {{ $bookingType === 'tour' ? 'block' : 'none' }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="tour_package" class="block text-sm font-medium text-gray-700 mb-1">Tour Package</label>
                                    <input type="text" id="tour_package" name="tour_package" 
                                        value="{{ $itemName }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                                </div>
                                <div>
                                    <label for="preferred_activities" class="block text-sm font-medium text-gray-700 mb-1">Preferred Activities</label>
                                    <select id="preferred_activities" name="preferred_activities[]" multiple 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                                        <option value="sightseeing">Sightseeing</option>
                                        <option value="adventure">Adventure Activities</option>
                                        <option value="cultural">Cultural Experiences</option>
                                        <option value="shopping">Shopping</option>
                                        <option value="food">Food Tours</option>
                                    </select>
                                    <p class="text-xs text-gray-500 mt-1">Hold Ctrl/Cmd to select multiple</p>
                                </div>
                            </div>
                        </div>
                        
                        <div id="carFields" class="booking-type-fields" style="display: {{ $bookingType === 'car' ? 'block' : 'none' }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="car_type_select" class="block text-sm font-medium text-gray-700 mb-1">Car Type</label>
                                    <select id="car_type_select" name="car_type_select" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                                        <option value="">Select Car Type</option>
                                        <option value="SUV" {{ $carType == 'SUV' ? 'selected' : '' }}>SUV</option>
                                        <option value="Sedan" {{ $carType == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                                        <option value="Luxury" {{ $carType == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                                        <option value="Budget" {{ $carType == 'Budget' ? 'selected' : '' }}>Budget</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="driver" class="block text-sm font-medium text-gray-700 mb-1">Driver Option</label>
                                    <select id="driver" name="driver" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                                        <option value="with_driver">With Driver</option>
                                        <option value="self_drive">Self Drive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div id="guideFields" class="booking-type-fields" style="display: {{ $bookingType === 'guide' ? 'block' : 'none' }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="guide_type_select" class="block text-sm font-medium text-gray-700 mb-1">Guide Type</label>
                                    <select id="guide_type_select" name="guide_type_select" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                                        <option value="">Select Guide Type</option>
                                        <option value="city" {{ $guideType == 'city' ? 'selected' : '' }}>City Guide</option>
                                        <option value="adventure" {{ $guideType == 'adventure' ? 'selected' : '' }}>Adventure Guide</option>
                                        <option value="cultural" {{ $guideType == 'cultural' ? 'selected' : '' }}>Cultural Guide</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="language" class="block text-sm font-medium text-gray-700 mb-1">Preferred Language</label>
                                    <select id="language" name="language" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]">
                                        <option value="english">English</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="french">French</option>
                                        <option value="spanish">Spanish</option>
                                        <option value="german">German</option>
                                        <option value="japanese">Japanese</option>
                                        <option value="chinese">Chinese</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label for="special_requests" class="block text-sm font-medium text-gray-700 mb-1">Special Requests/Notes</label>
                            <textarea id="special_requests" name="special_requests" rows="4" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-[#8DD3BB] focus:border-[#8DD3BB]"
                                placeholder="Tell us about any special requirements or questions you have..."></textarea>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-[#8DD3BB] hover:bg-[#7bc0a9] text-gray-800 font-medium py-3 rounded-lg transition-colors">
                            Submit Booking Request
                        </button>
                        <p class="text-center text-sm text-gray-500 mt-4">
                            Our team will contact you within 24 hours to confirm your booking
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- JavaScript for form type selection and retrieving stored form data -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelectors = document.querySelectorAll('.type-selector');
            const bookingTypeInput = document.getElementById('booking_type');
            const typeFields = document.querySelectorAll('.booking-type-fields');
            
            // Function to show/hide fields based on booking type
            function toggleTypeFields(type) {
                // Hide all type-specific fields first
                typeFields.forEach(field => {
                    field.style.display = 'none';
                });
                
                // Show the fields for the selected type
                const selectedFields = document.getElementById(type + 'Fields');
                if (selectedFields) {
                    selectedFields.style.display = 'block';
                }
            }
            
            // Get the booking type from URL parameters or default to 'stay'
            const urlParams = new URLSearchParams(window.location.search);
            const bookingTypeFromUrl = urlParams.get('type') || 'stay';
            
            typeSelectors.forEach(selector => {
                selector.addEventListener('click', function() {
                    // Remove active class from all selectors
                    typeSelectors.forEach(el => {
                        el.classList.remove('border-[#8DD3BB]', 'bg-[#8DD3BB]/10');
                    });
                    
                    // Add active class to clicked selector
                    this.classList.add('border-[#8DD3BB]', 'bg-[#8DD3BB]/10');
                    
                    // Update hidden input value and toggle fields
                    const type = this.dataset.type;
                    bookingTypeInput.value = type;
                    toggleTypeFields(type);
                });
                
                // If this is the booking type from the URL, select it
                if (selector.dataset.type === bookingTypeFromUrl) {
                    selector.click();
                }
            });
            
            // If no booking type was found in the selectors, set default selection
            if (!document.querySelector('.type-selector.border-\\[\\#8DD3BB\\]')) {
                document.querySelector('[data-type="stay"]').click();
            }
            
            // Initial toggle for fields
            toggleTypeFields(bookingTypeFromUrl);
            
            // Retrieve any form data stored in session storage (from search form)
            try {
                const storedFormData = sessionStorage.getItem('booking_form_data');
                if (storedFormData) {
                    const formData = JSON.parse(storedFormData);
                    
                    // Fill form fields if they're empty and we have stored data
                    if (formData.location && !document.getElementById('destination').value) {
                        document.getElementById('destination').value = formData.location;
                    }
                    
                    if (formData.check_in && !document.getElementById('check_in').value) {
                        document.getElementById('check_in').value = formData.check_in;
                    }
                    
                    if (formData.check_out && !document.getElementById('check_out').value) {
                        document.getElementById('check_out').value = formData.check_out;
                    }
                    
                    if (formData.guests && document.getElementById('guests')) {
                        const guestsSelect = document.getElementById('guests');
                        const options = Array.from(guestsSelect.options);
                        const optionToSelect = options.find(item => item.value === formData.guests);
                        if (optionToSelect) {
                            optionToSelect.selected = true;
                        }
                    }
                    
                    // Clear the stored data after using it
                    sessionStorage.removeItem('booking_form_data');
                }
            } catch (error) {
                console.error('Error retrieving stored form data:', error);
            }
        });
    </script>
@endsection
