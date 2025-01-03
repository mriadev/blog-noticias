<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('id', 'desc')
            ->withCount('likes')
            ->with(['likes' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->take(3)
            ->get();

        $posts->map(function ($post) {
            // Comprobar si el usuario actual ha dado like a este post
            $post->liked = $post->likes->where('user_id', Auth::id())->isNotEmpty(); // Si hay likes para el usuario actual, será true
            return $post;
        });


        return view('home', compact('posts'));
    }


    public function profile()
    {
        return view('profile');
    }
}
