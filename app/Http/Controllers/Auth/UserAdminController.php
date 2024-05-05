<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UserAdminController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        $this->validate($request, [
            'phone'   => 'required|digits:11|min:11|numeric',
            'password' => 'required'
        ]);

        Auth::guard('web')->attempt(['phone' => $request->phone, 'password' => $request->password], $request->get('remember'));
        if (Auth::guard('web')->attempt(['phone' => $request->phone, 'password' => $request->password], $request->get('remember'))) {
            // dd('');
            return redirect()->intended('/');
        }
        return back()->withInput($request->only('phone', 'remember'));
    }
    public function adminlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
