<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function loginPage()
    {
        if (session()->get('isLogged')) {
            if (session()->get('role') == 0) {
                return redirect()->route('admin.admin.dash');
            } else {
                return redirect()->route('user.home');
            }
        } else {
            return view('auth.login');
        }
    }
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            return redirect()->back()->with('error', "User tidak ditemukan");
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', "Password Salah");
        }

        $request->session()->regenerate();
        $request->session()->put('isLogged', true);
        $request->session()->put('userId', $user->id);
        $request->session()->put('role', $user->role);

        $route = 'admin.admin.dash';
        if ($user->role == 1) {
            $route = 'user.home';
        }

        return redirect()->route($route);
    }
    public function logout(Request $request)
    {
        session()->flush();
        return redirect()->route('auth.login');
    }
}
