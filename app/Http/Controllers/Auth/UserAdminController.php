<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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
        if (Auth::guard('web')->user()) {
            if (Auth::guard('web')->user()->is_admin == 0) {
                Auth::guard('web')->logout();

                $request->session()->invalidate();
                return back()->withInput($request->only('phone', 'remember'))->withErrors(['error' => 'لاتملك الصلاحية للوصول للوحة التحكم']);;
            }
        }
        if (Auth::guard('web')->attempt(['phone' => $request->phone, 'password' => $request->password], $request->get('remember'))) {


            return redirect()->intended('/');
        }
        return back()->withInput($request->only('phone', 'remember'))->withErrors(['error' => 'يرجى التحقق من الايميل او الهاتف']);
    }
    public function adminlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
