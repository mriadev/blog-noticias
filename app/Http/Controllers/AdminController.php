<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Genre;
use App\Models\User;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }

    public function posts()
    {
        $posts = Post::paginate(5);
        // añadir el género a cada post
        $posts->transform(function ($post) {
            $post->genre = Genre::find($post->genre_id)->name;
            return $post;
        });

        return view('admin.posts.index', compact('posts'));
    }

    public function store()
    {
        $genres = Genre::all();
        return view('admin.posts.create', compact('genres'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }


}
