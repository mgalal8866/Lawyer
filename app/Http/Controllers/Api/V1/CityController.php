<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResources;
use App\Http\Resources\CityResources;
use App\Models\Area;
use App\Models\City;
use App\Repositoryinterface\UsersRepositoryinterface;

class CityController extends Controller
{

    public function city(Request $request)
    {
        $data = CityResources::collection(City::get());

        return   Resp(  $data,'success');
    }

    public function area(Request $request)
    {
        $data =  AreaResources::collection( Area::whereCityId($request->city_id)->get());
        return   Resp(  $data,'success');
    }


}
