<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{

    public function profile(User $user)
    {
        // si el usuario no es el mismo que el perfil que se quiere ver, redirigir a su propio perfil
        if (Auth::user()->id !== $user->id) {
            return redirect()->route('profile', Auth::user());
        }
        return view('profile.index');
    }

    public function edit(User $user)
    {
        if (Auth::user()->id !== $user->id) {
            return redirect()->route('profile', Auth::user());
        }
        return view('profile.edit');
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->id !== $user->id) {
            return redirect()->route('profile', Auth::user());
        }

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'telephone' => 'nullable|numeric|digits:9',
        ]);

        $user->update($request->all());

        return redirect()->route('profile', $user)->with('success', 'El perfil se ha actualizado correctamente');
    }

    public function editPassword(User $user)
    {
        if (Auth::user()->id !== $user->id) {
            return redirect()->route('profile', Auth::user());
        }
        return view('profile.password');
    }

    public function updatePassword(Request $request, User $user)
    {
        if (Auth::user()->id !== $user->id) {
            return redirect()->route('profile', Auth::user());
        }

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        // comprobar que la contraseña actual es correcta
        if (!Auth::attempt(['email' => $user->email, 'password' => $request->current_password])) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta']);
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('profile', $user)->with('success', 'La contraseña se ha actualizado correctamente');
    }
}
