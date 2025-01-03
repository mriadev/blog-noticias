<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'telephone' => 'nullable|9|numeric',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'profile_id' => 'required'
        ]);

        // comprobar si el email existe en la base de datos
        if (User::where('email', $request->email)->exists()) {
            return back()->withErrors([
                'email' => 'El email ya está en uso.',
            ]);
        }
                
        $user = User::create($request->only('name', 'surname', 'email', 'telephone', 'password', 'profile_id'));
        // Auth::login($user); 

        return redirect(route('login'))->with('success', 'Usuario registrado correctamente.');
    }

    
}
