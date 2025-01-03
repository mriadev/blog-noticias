<x-app-layout>

    <div class="container mt-5">

        <div class="row">
            <div class="col-12 col-md-8">
                <h1 class="text-primary">{{ $post->title }}</h1>
                <p class="text-muted">{{ $post->created_at->diffForHumans() }}</p>
                <img src="/images/{{ $post->image }}" class="img-fluid" alt="{{ $post->name }}">
                <p class="mt-4">{{ $post->description }}</p>
            </div>
            <div class="col-12 col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title
                        text-primary">Autor</h5>
                        <p class="card-text">{{ $user->name }}</p>
                        <h5 class="card-title
                        text-primary">Categoría</h5>
                        <p class="card-text">{{ $genre->name }}</p>
                        <h5 class="card-title
                        text-primary">Likes</h5>
                        <p class="card-text">{{ $likes }} ⭐</p>
                        {{-- si el usuario le ha dado a like que salga el botón de dislike --}}
                        @if (auth()->user()->profile->name == 'lector')
                            @if ($post->liked)
                                <form action="{{ route('posts.dislike', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Ya no me gusta</button>
                                </form>
                            @else
                                <form action="{{ route('posts.like', $post) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Me gusta</button>
                                </form>
                            @endif
                        @endif


                        @if (auth()->user()->profile->name == 'periodista')
                            {{-- si el post pertenece al usuario --}}
                            {{-- @if (auth()->user()->id == $post->user_id) --}}
                                {{-- si el usuario es administrador --}}
                                <div class="mt-3">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            {{-- @endif --}}
                            {{-- listar los usuarios que le han dado like --}}
                            <h5 class="card-title
                            text-primary mt-3">Usuarios que han dado
                                like</h5>
                            <ul class="list-group
                            list-group-flush">
                                @foreach ($post->likes as $like)
                                    <li class="list-group
                                    list-group-item">
                                        {{ $like->user->name }}</li>
                                @endforeach
                            </ul>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
