<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended(route('home')); 
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect(route('login'));
    }

    public function recoverPassword(Request $request)
    {
        
        return view('auth.recover-password', compact('request'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        // comprobar si el email existe en la base de datos
        // si existe, cambiar la contraseña

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'El email no existe en la base de datos.',
            ]);
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);
        

        return redirect(route('login'))->with('success', 'Se ha reestablecido la contraseña.');
    }
}


