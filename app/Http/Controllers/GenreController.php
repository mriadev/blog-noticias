<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;


class GenreController extends Controller
{
    public function genres()
    {
        $genres = Genre::orderBy('name')->paginate(5);
        return view('admin.genres.index', compact('genres'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);
        Genre::create(request()->all());
        return redirect()->route('admin.genres.index')->with('success', 'Género creado correctamente');
    }

    public function edit(Genre $genre)
    {

        return view('admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $genre->update($request->all());

        return redirect()->route('admin.genres.index')->with('success', 'Género actualizado correctamente');
    }

    public function destroy(Genre $genre)
    {
        // si hay posts con este género, no se puede borrar
        if ($genre->posts->isNotEmpty()) {
            return back()->with('error', 'No se puede borrar este género porque tiene posts asociados');
        } else {

            $genre->delete();
            return redirect()->route('admin.genres.index')->with('success', 'Género borrado correctamente');
        }
    }
}
