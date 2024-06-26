<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Resources\BookingUserResource;
use App\Http\Resources\BookingLawyerResource;
use App\Repositoryinterface\BookingRepositoryinterface;

class BookingController extends Controller
{
    private $booking;
    public function __construct(BookingRepositoryinterface $booking)
    {
        $this->booking = $booking;
    }

    public function new_booking()
    {
        $data = $this->booking->new_booking();
        if ($data) {
            return Resp('', 'تم الحجز بنجاح');
        } else {
            return Resp('', 'error', 400, false);
        }
    }

    public function get_booking()
    {
        $data = $this->booking->get_booking();
        if ($data) {
            return Resp(BookingLawyerResource::collection($data), 'success');
        } else {
            return Resp('', 'error', 400, false);
        }
    }

    public function my_booking()
    {
        $data = $this->booking->my_booking();
        if ($data) {
            return Resp(BookingUserResource::collection($data), 'success');
        } else {
            return Resp('', 'error', 400, false);
        }
    }

    public function change_status()
    {
        $data = $this->booking->change_status();
        if ($data) {
            return Resp(new BookingLawyerResource($data), 'تم تغير الحالة بنجاح');
        } else {
            return Resp('', 'error', 400, false);
        }
    }
}
