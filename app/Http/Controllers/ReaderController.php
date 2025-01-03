<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class ReaderController extends Controller
{

    public function users()
    {
        // users con perfil de reader
        $users = User::where('profile_id', 2)->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function profile()
    {
        return view('admin.users.show');
    }

    public function create()
    {
        $profiles = Profile::all();
        return view('admin.users.create', compact('profiles'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'telephone' => 'nullable|numeric|digits:9',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'profile_id' => 'required',
        ]);

        //si hay teléfono, que sea de 9 dígitos
        if (request('telephone')) {
            request()->validate([
                'telephone' => 'numeric|digits:9',
            ]);
        }


        User::create(request()->all());
        return redirect()->route('admin.users.index')->with('success', 'El usuario ha sido creado correctamente.');
    }



    public function edit(User $user)
    {
        $profiles = Profile::all();
        return view('admin.users.edit', compact('user' , 'profiles'));
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'nullable|numeric|digits:9',
            'profile_id' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'El usuario ha sido actualizado correctamente.');
}

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'El usuario ha sido eliminado correctamente.');
    }
}
