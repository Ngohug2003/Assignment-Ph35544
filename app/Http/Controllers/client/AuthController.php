<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showregisterForm()
    {
        return view('pages.client.register');
    }
    public function showLoginForm()
    {
        return view('pages.client.login');
    }
    public function register(AuthRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'type' => $request->type ?? 'user',
        ]);

        Auth::login($user);

        request()->session()->regenerate();

        if ($user->type == 'admin') {
            return redirect('/admin');
        }
        return redirect('/');
    }




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->type == 'admin') {
                return redirect('/admin');
            }
            return redirect()->intended('/');
        }


        return redirect('/dang-nhap')->withErrors('sai tài khoản hoặc mặt khẩu');
    }


    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
