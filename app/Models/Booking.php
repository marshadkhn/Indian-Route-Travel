<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'booking_type',
        'name',
        'email',
        'phone',
        'city',
        'destination',
        'guests',
        'check_in',
        'check_out',
        'item_name',
        'item_location',
        'item_price',
        'tour_duration',
        'car_type',
        'guide_type',
        'room_type',
        'rooms',
        'driver_option',
        'preferred_language',
        'special_requests',
        'status',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
