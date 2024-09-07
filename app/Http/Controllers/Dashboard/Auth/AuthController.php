<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function index()
    {
        return view('dashboard.signin');
    }

    public function loginASview()
    {
        return view('dashboard.signin');
    }






    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required','email',Rule::exists('users','email')],
            'password' => ['required', 'min:6' ,'max:100']
        ],[
            'email.required' => __('email is required'),
            'email.email' => __('email must be a valid email'),
            'email.exists' => __('email is not exists'),
            'password.required' => __('password is required'),

        ]);
        //  dd($request->all());
        if (auth('web')->attempt($request->only('email', 'password'), $request->filled('remember_me'))) {
            session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->with(['error' => __('dashboard.email or password or both are wrong')]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }



    public function markered(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
        return redirect()->route('admin.home');
    }


    public function edit()
    {
        return view('dashboard.profile.edit');
    }


}
