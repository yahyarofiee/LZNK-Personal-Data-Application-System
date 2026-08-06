<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DPOAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SHOW LOGIN
    |--------------------------------------------------------------------------
    */
    public function showLogin()
    {
        return view('dpo.login');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            // check role
            if (auth()->user()->role != 'dpo') {
                Auth::logout();
                return back()->with('error', 'Bukan akaun DPO');
            }

            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW REGISTER
    |--------------------------------------------------------------------------
    */
    public function showRegister()
    {
        return view('dpo.register');
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'ic' => 'required|string|max:20',
            'password' => 'required|confirmed|min:6',
        ]);
        
        User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'ic' => $request->ic,
            'password' => Hash::make($request->password),
            'role' => 'dpo',
        ]);

        return redirect()->route('dpo.login')->with('success', 'Akaun DPO berjaya didaftarkan');
    }
}