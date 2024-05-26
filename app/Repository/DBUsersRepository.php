<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\LoginUserResource;
use App\Repositoryinterface\UsersRepositoryinterface;
use App\Traits\ImageProcessing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DBUsersRepository implements UsersRepositoryinterface
{
    use ImageProcessing;
    protected Model $model;
    protected $request;

    public function __construct(User $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
    public function credentials($data)
    {
        $credentials = [
            'phone' => $data['phone'],
            'password' =>  $data['password'],
        ];
        if ($token = Auth::guard('api')->attempt($credentials)) {
            $user = auth('api')->user();
        } else {
            return Resp('', 'Invalid Credentials', 404, false);
        }

        if ($token == null) {
            return Resp('', 'User Not found', 404, false);
        }
        $user->token = $token;
        $data =  new LoginUserResource($user);
        return Resp($data, 'Success', 200, true);
    }
    public function login($request)
    {
        $data = ['phone' => $request->phone, 'password' => $request->password];
        return  $this->credentials($data);
    }
    public function check_point()
    {
        $point =  Auth::guard('api')->user()->point;
        if ($point  > 5) {
            return true;
        } else {
            return false;
        }
    }
    public function lawyer_by_id($id)
    {
        $data = User::find($id);
        return   $data;
    }
    public function booking_lawyer()
    {
        $data = [];
        if ($this->request->city_id != null) {
            $data['city_id'] = $this->request->city_id;
        }
        if ($this->request->area_id != null) {
            $data['area_id'] = $this->request->area_id;
        }
        // dd($data);
        $data = User::whereType(1)->where($data)->get();
        return   $data;
    }
    public function get_teamwork()
    {
        $data = User::whereTeamwork('1')->get();
        return   $data;
    }
    public function sendotp()
    {
        $code = rand(123456, 999999);
        return Resp($code, 'Success', 200, true);
    }

    public function signup($request)
    {
        $check =    User::where('phone', $request->phone)->first();
        if ($check != null) {
            return Resp('', 'الهاتف مسجل سابقا', 402, false);
        }
        $user =  User::create([
            'name'       => $request->name,
            'phone'      => $request->phone,
            'password'   => $request->password,
            'type'       => $request->type,
            'gender'     => $request->gender,
            'specialist_id' => $request->specialist_id,
            'city_id'    => $request->city_id,
            'area_id'    => $request->area_id,
            'description'    => $request->description ?? null,
            // 'image'    => $request->image,
        ]);
        if ($request->image) {
            $dataX = $this->saveImageAndThumbnail($request->image, false, 'user');
            $user->image =  $dataX['image'];
            $user->save();
        }
        if ($user != null) {

            return $this->login($request);
        }
        return Resp('', 'error', 402, true);
    }
    public function profile_update()
    {

        $id = Auth::guard('api')->user()->id;
        $user =  User::find($id);

        if ($this->request->has('name')) {
            $user->name =  $this->request->name;
        }
        if ($this->request->has('type')) {
            $user->type =  $this->request->type;
        }
        if ($this->request->has('city_id')) {
            $user->city_id = $this->request->city_id;
        }

        if ($this->request->has('area_id')) {
            $user->area_id = $this->request->area_id;
        }
        if ($this->request->has('gender')) {
            $user->gender = $this->request->gender;
        }
        if ($this->request->has('description')) {
            $user->description = $this->request->description;
        }
        if ($this->request->has('specialist_id')) {
            $user->specialist_id = $this->request->specialist_id;
        }
        if ($this->request->has('password')) {
            if ($this->request->password != '') {
                $user->password = $this->request->password;
            }
        }
        if ($this->request->has('image')) {
            $dataX = $this->saveImageAndThumbnail($this->request->image, false, 'user');
            $user->image =  $dataX['image'];
        }
        $user->save();
        if ($user != null) {
            $data =  new LoginUserResource($user);
            return Resp($data, 'Success', 200, true);
        }
        return Resp('', 'error', 402, true);
    }
    public function profile_details()
    {

        $id = Auth::guard('api')->user()->id;
        $user =  User::find($id);
        if ($user != null) {
            $data =  new LoginUserResource($user);
            return Resp($data, 'Success', 200, true);
        }
        return Resp('', 'error', 400, true);
    }
    public function  forgotpassword($request)
    {
        $user =  $this->model->where('phone', $request->phone)->first();
        return Resp('', 'Send Code Success', 200, true);
    }
    public function  verificationcode($request)
    {
        if ($request->code == '11111') {
            return Resp('', 'Success', 200, true);
        } else {
            return Resp('', 'invalid Code', 400, false);
        }
    }

    public function  resend_code($request)
    {
        return Resp('', 'Send Code Success', 200, true);
    }
    public function  change_password()
    {
        $user =  $this->model->find(Auth::guard('api')->user()->id);
        $user->password = $this->request->password;
        $user->save();
        if ($user != null) {
            return  true;
        } else {
            return false;
        }
    }
}
