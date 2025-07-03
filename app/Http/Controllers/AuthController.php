<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:admin,member'
    ]);

    User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => $validatedData['role'],
    ]);

    return redirect('/registration-success')->with('success', 'Registrasi berhasil, silakan login.');
}
    
    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect('/dashboard');
        } elseif ($user->role === 'member') {
            return redirect('/dashboard-member');
        } else {
            return redirect('/dashboard');
        }
    }

        return back()->with('loginError', 'Login Gagal, Periksa kembali Akun Anda!');
    }
        public function showRegistrationForm()
    {
        return view('auth.register');
    }

public function showRegistrationSuccess()
{
    return view('auth.registration-success');
}

public function index()
{
    return view('auth.login');
}

public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'Berhasil logout');
    }
}