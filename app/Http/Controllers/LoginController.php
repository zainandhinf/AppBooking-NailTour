<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function login()
    {
        return view('admin.page.login');
    }

    public function signup()
    {
        return view('admin.page.signup');
    }

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
            } else if ($user->role === 'officer') {
                return redirect('/officer'); // Pengguna officer diarahkan ke halaman officer
            } else {
                return redirect('/home'); // Pengguna dengan peran user diarahkan ke halaman user
            }
        } else {
            // return back()->withErrors(['email' => 'Email atau kata sandi salah']);
            return back()->with('logerror', 'Login Failed!');
        }
    }

    public function createaccount(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'username' => 'required|max:255|unique:users',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required'
        // ]);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $validatedData['no_phone'] = null;
        $validatedData['photo_profile'] = "photoprofile/user.png";

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role'] = "user";
        User::create($validatedData);

        $request->session()->flash('success', 'Registration successful');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}