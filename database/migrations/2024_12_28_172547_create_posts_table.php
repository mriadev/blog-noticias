<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Las noticias tienen los siguientes atributos:
     *- **Título**
     *- **Fecha de publicación**
     *- **Descripción**
     *- **Imagen**
     *- **Género** (relacionado con los géneros definidos)
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->foreignId('genre_id')->constrained('genres');
            $table->foreignId('user_id')->constrained('users');

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
