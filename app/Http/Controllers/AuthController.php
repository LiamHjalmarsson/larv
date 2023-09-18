<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view("auth.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        $credentials = $request->only("username", 'password');
        $remember = $request->filled('remember');

        if (auth()->attempt($credentials, $remember)) {
            return redirect()->intended('/')->with("success", "Successfully logged in");
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function destroy(string $id)
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect("/")->with("success", "User logged out");
    }
}
