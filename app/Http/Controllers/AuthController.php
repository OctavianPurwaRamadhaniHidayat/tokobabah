<?php

namespace App\Http\Controllers;

use App\Models\Users as Authenticatable;
use Illuminate\Http\Request;
use App\Http\Requests;  
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        users::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect('/login_user')->with('success', 'Registration successful! Please login.');

    }

    public function login_user(Request $request)
    {
        // validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // proses login
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();//untuk ambiluser yang login

            session(['name' => $user->name]);//agar simpen username login untuk di navbar

            return redirect('/dashboard_user')->with('success','Welcome');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function login_admin(Request $request)
    {
        // validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // proses login admin
        if (Auth::guard('admins')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            

            $user = Auth::guard('admins')->user();//untuk ambiluser yang login
            session(['name' => $user->name]);//agar simpen username login untuk di navbar

            return redirect('/dashboard_admin')->with('success','Welcome');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login_user');
    }

}