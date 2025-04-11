<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('booking_type');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->string('destination');
            $table->string('guests');
            $table->date('check_in');
            $table->date('check_out');
            
            // Item details
            $table->string('item_name')->nullable();
            $table->string('item_location')->nullable();
            $table->string('item_price')->nullable();
            $table->string('tour_duration')->nullable();
            
            // Type-specific fields
            $table->string('car_type')->nullable();
            $table->string('guide_type')->nullable();
            $table->string('room_type')->nullable();
            $table->string('rooms')->nullable();
            $table->string('driver_option')->nullable();
            $table->string('preferred_language')->nullable();
            
            $table->text('special_requests')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
