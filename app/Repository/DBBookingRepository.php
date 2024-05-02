<?php

namespace App\Repository;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Repositoryinterface\BookingRepositoryinterface;

class DBBookingRepository implements BookingRepositoryinterface
{
    use ImageProcessing;
    protected Model $model;
    protected $request;

    public function __construct(Booking $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }


    public function  new_booking()
    {
       $data= Booking::create([
        'user_id' => Auth::guard('api')->user()->id,
        'lawyer_id' =>  $this->request->lawyer_id,
        'answer' => $this->request->answer,
        'description' => $this->request->description,
        'status' => 0,

       ]);
       if($data){
           return $data;

       }else{

           return false;
       }
    }
    public function  get_booking()
    {
       $data= Booking::where('lawyer_id',Auth::guard('api')->user()->id)->get();
       if($data){
           return $data;

       }else{

           return false;
       }
    }
    public function  my_booking()
    {
        $data= Booking::where('user_id',Auth::guard('api')->user()->id)->get();
       if($data){
           return $data;

       }else{

           return false;
       }
    }
    public function  change_status()
    {
        $data= Booking::where('id',$this->request->booking_id)->first();
       if($data){
           $data->status =  $this->request->status;
           $data->save();
           return $data;

       }else{

           return false;
       }
    }

}
