<?php

namespace App\Livewire\Booking;

use App\Models\Booking;
use Livewire\Component;

class ViewBooking extends Component
{
    public function render()
    {
        $booking = Booking::with(['user','lawyer'])->get();
        return view('booking.view-booking',compact('booking'));
    }
}
