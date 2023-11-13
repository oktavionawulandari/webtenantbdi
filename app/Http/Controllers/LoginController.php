<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function halamanlogin()
    {
        return view('landing-page.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::guard('user')->attempt($request->only('username', 'password'))) {
            return redirect('/dashboard/admin');
        } else if (Auth::guard('tenant')->attempt($request->only('username', 'password'))) {
            return redirect('/home/tenant');
        }
        return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Password atau Username Anda salah, silahkan coba kembali',
            ]);
    }

    public function logout()
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } else if (Auth::guard('tenant')->check()) {
            Auth::guard('tenant')->logout();
        }
        return redirect('/');
    }
}
