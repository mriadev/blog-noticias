<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Genre;
use App\Models\Post;
use App\Models\Like;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Perfiles
        $profile = Profile::create([
            'name' => 'periodista'
        ]);

        $profile = Profile::create([
            'name' => 'lector'
        ]);

        // Usuarios administradores

        
        $user = User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@admin.es',
            'password' => bcrypt('admin'),
            'profile_id' => 1
        ]);
        $user = User::create([
            'name' => 'admin2',
            'surname' => 'admin2',
            'email' => 'admin2@admin.es',
            'password' => bcrypt('admin'),
            'profile_id' => 1
        ]);
        $user = User::create([
            'name' => 'admin3',
            'surname' => 'admin3',
            'email' => 'admin3@admin.es',
            'password' => bcrypt('admin'),
            'profile_id' => 1
        ]);
        $user = User::create([
            'name' => 'admin4',
            'surname' => 'admin4',
            'email' => 'admin4@admin.es',
            'password' => bcrypt('admin'),
            'profile_id' => 1
        ]);


        // Usuarios lectores

        $user = User::create([
            'name' => 'lector',
            'surname' => 'lector',
            'email' => 'lector@lector.es',
            'password' => bcrypt('lector'),
            'profile_id' => 2
        ]);


        //Crear usuarios
        User::factory(30)->create();


        //Géneros de posts

        $genres = ['Política', 'Economía', 'Deportes', 'Cultura', 'Tecnología', 'Ciencia', 'Salud', 'Educación', 'Medio Ambiente', 'Sociedad'];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre
            ]);
        }

        // Posts
        Post::factory(100)->create();

        //Likes
        $users = User::where('profile_id', 2)->get();
        $posts = Post::all();
        // Asignar "me gusta" aleatoriamente
        foreach ($users as $user) {
            // Cada usuario puede dar "me gusta" a entre 1 y 5 posts
            $likedPosts = $posts->random(rand(1, 10));

            // Crear los "likes"
            foreach ($likedPosts as $post) {
                Like::create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}
