<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate(
            [
                'username'  => 'required|in:admin',
                'password'  => 'required|in:123'
            ],
            [
                'username.required' => 'Vui lòng nhập tên người dùng.',
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'username.in'       => 'Tài khoản không hợp lệ.',
                'password.in'       => 'Mật khẩu không hợp lệ.'
            ]
            );
        $request->session()->put('isLogin', true);
        return redirect()->route('index');
    }
    
}
