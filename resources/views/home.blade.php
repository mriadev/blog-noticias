<x-app-layout>
    <h1 class="text-center">Ultimas publicaciones</h1>

    <div class="container mt-5">
        <div class="row">
            @foreach ($posts as $post)
            <x-post-layout :post="$post" />
            @endforeach
        </div>
    </div>

    {{-- Redireccionar a todos los posts --}}
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <a href="{{ route('posts.index') }}" class="btn btn-dark btn-lg">Ver todos los posts</a>
            </div>
        </div>
    </div>

</x-app-layout>
