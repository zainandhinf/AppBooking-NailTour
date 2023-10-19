<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // return request()->all();
        // return view('admin.main');
        $login = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // if (Auth::guard('admin')->attempt([$login])) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('/admin');
        // }
        // return back()->with('logerror', 'login failed!');

        if (Auth::attempt($login)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin'); // Pengguna admin diarahkan ke halaman admin
            } else {
                return redirect('/'); // Pengguna dengan peran user diarahkan ke halaman user
            }
        } else {
            // return back()->withErrors(['email' => 'Email atau kata sandi salah']);
            return back()->with('logerror', 'Login Failed!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/loginAdmin');
    }
}