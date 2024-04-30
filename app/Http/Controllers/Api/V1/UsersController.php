<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\SpecialistsResource;
use App\Models\specialist;
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

    public function check_point(Request $request)
    {
        if ($this->users->check_point()) {
           return Resp('', 'success');
        } else {
            return Resp('', 'عدد نقاطك اقل من المطلوب يرجى اعاده شحن النقاط',400,false);
        }
    }

    public function specialist()
    {
        $data = specialist::get();
        return   Resp(SpecialistsResource::collection($data), 'success');
    }
}
