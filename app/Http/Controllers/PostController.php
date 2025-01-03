<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Genre;
use App\Models\Like;



class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('likes')
            ->withCount('likes')
            ->when(request('genre') && request('genre') !== '', function ($query) {
                $query->where('genre_id', request('genre'));
            })
            ->orderBy('id', 'desc') // Ordenar por fecha por id, de más reciente a más antiguo
            ->paginate(6);

        $posts->map(function ($post) {
            // Comprobar si el usuario actual ha dado like a este post
            $post->liked = $post->likes->where('user_id', Auth::id())->isNotEmpty();

            return $post;
        });

        $genres = Genre::all();

        return view('posts.index', compact('posts', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.posts.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre_id' => 'required',
        ]);

        // Subir la imagen y obtener el nombre del archivo
        $imageName = $this->uploadImage($request);

        $post = new Post([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'genre_id' => $request->genre_id,
            'user_id' => Auth::id(),
        ]);

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post creado correctamente');
    }

    public function show(Post $post)
    {
        $user = User::find($post->user_id);
        $genre = Genre::find($post->genre_id);
        $likes = Like::where('post_id', $post->id)->count();

        $post->liked = $post->likes->where('user_id', Auth::id())->isNotEmpty();

        return view('posts.show', compact('post', 'user', 'genre', 'likes'));
    }

    public function edit(Post $post)
    {
        $genres = Genre::all();
        return view('admin.posts.edit', compact('post', 'genres'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre_id' => 'required',
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->genre_id = $request->genre_id;

        // Subir la imagen y obtener el nombre del archivo
        if ($request->hasFile('image')) {
            $imageName = $this->uploadImage($request);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('posts.show', $post)->with('success', 'Post actualizado correctamente');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.show')->with('success', 'Post eliminado correctamente');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = Post::where('title', 'like', '%' . $search . '%')->paginate(6);
        return view('posts.index', compact('posts'));
    }

    public function filter(Request $request)
    {
        $genre_id = $request->get('genre_id');
        $posts = Post::where('genre_id', $genre_id)->paginate(6);
        return view('posts.index', compact('posts'));
    }


    public function like(Post $post)
    {
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->post_id = $post->id;
        $like->save();

        return redirect()->route('posts.index');
    }

    public function dislike(Post $post)
    {
        // Buscar el like del usuario actual en el post actual
        $like = Like::where('user_id', Auth::user()->id)->where('post_id', $post->id)->first();
        $like->delete();

        return redirect()->route('posts.index');
    }

    private function uploadImage(Request $request)
    {
        // Verificar si se ha subido una imagen
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            return $imageName;
        }

        return "default.jpg";
    }
}
