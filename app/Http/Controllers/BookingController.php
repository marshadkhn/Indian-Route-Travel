<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display the booking form.
     */
    public function showForm(Request $request)
    {
        return view('pages.contactBooking');
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'booking_type' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'guests' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'special_requests' => 'nullable|string',
            // Add other fields based on booking type
        ]);
        
        // Create booking with all form data
        $booking = new Booking($request->all());
        $booking->user_id = auth()->id();
        $booking->save();
        
        // Return with success message
        return redirect()->route('home')->with('toast', [
            'type' => 'success',
            'message' => 'Your booking request has been submitted successfully. We will contact you shortly.'
        ]);
    }

    /**
     * Display all bookings (admin).
     */
    public function index()
    {
        $bookings = Booking::with('user')->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Display a specific booking.
     */
    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Update the status of a booking.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,confirmed,cancelled,completed',
        ]);

        $booking->update(['status' => $validated['status']]);
        
        return back()->with('toast', [
            'type' => 'success',
            'message' => 'Booking status updated successfully.'
        ]);
    }

    /**
     * Update the specified booking.
     */
    public function update(Request $request, Booking $booking)
    {
        // Validate form data
        $validated = $request->validate([
            'booking_type' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'guests' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            // Optional fields
            'item_name' => 'nullable|string|max:255',
            'item_price' => 'nullable|string|max:255',
            'tour_duration' => 'nullable|string|max:255',
            'car_type' => 'nullable|string|max:255',
            'driver_option' => 'nullable|string|max:255',
            'guide_type' => 'nullable|string|max:255',
            'preferred_language' => 'nullable|string|max:255',
            'room_type' => 'nullable|string|max:255',
            'rooms' => 'nullable|string|max:255',
            'special_requests' => 'nullable|string',
        ]);
        
        // Update booking
        $booking->update($validated);
        
        // Return with success message
        return redirect()->route('admin.bookings.show', $booking)->with('toast', [
            'type' => 'success',
            'message' => 'Booking details updated successfully.'
        ]);
    }
}
