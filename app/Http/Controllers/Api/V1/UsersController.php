<?php

namespace App\Http\Controllers\Api\V1;


use App\Models\specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\LawyerResource;
use App\Http\Resources\SpecialistsResource;
use App\Http\Resources\BookingdataLawyerResource;
use App\Repositoryinterface\UsersRepositoryinterface;

class UsersController extends Controller
{
    private $users;
    public function __construct(UsersRepositoryinterface $Users)
    {
        $this->users = $Users;
    }

    public function login(Request $request)
    {
        return  $this->users->login($request);
    }

    public function signup(Request $request)
    {
        return  $this->users->signup($request);
    }
    public function profile_update()
    {
        return  $this->users->profile_update();
    }
    public function profile_details()
    {
        return  $this->users->profile_details();
    }

    public function change_password(Request $request)
    {
        if ($this->users->change_password()) {
           return Resp('', 'success');
        } else {
            return Resp('', 'error',400,false);
        }
    }
    public function check_point(Request $request)
    {
        if ($this->users->check_point()) {
           return Resp('', 'success');
        } else {
            return Resp('', 'success',400,false);
        }
    }
    public function booking_lawyer()
    {
        $data =$this->users->booking_lawyer();
        if ( $data) {
           return Resp(BookingdataLawyerResource::collection($data), 'success');
        } else {
            return Resp('', 'success',400,false);
        }
    }
    public function lawyer_by_id($id)
    {
        $data =$this->users->lawyer_by_id($id);
        if ($data) {
           return Resp(new BookingdataLawyerResource($data), 'success');
        } else {
            return Resp('', 'error',400,false);
        }
    }

    public function specialist()
    {
        $data = specialist::get();
        return   Resp(SpecialistsResource::collection($data), 'success');
    }
}
