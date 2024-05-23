<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginAct(Request $request)
    {
        $request->validate([
            'username' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request['username'])->first();

        if ($user) {
            if (Hash::check($request['password'], $user['password'])) {
                $request->session()->put('user', $user);
                return redirect()->route('home');
            } else {
                return back()->with('error', 'Mot de passe incorrect !');
            }
        } else {
            return back()->with('error', 'Utilisateur non reconnu !');
        }
    }

    public function logout()
    {
        Session()->forget('user');
        return redirect()->route('login');
    }
}
