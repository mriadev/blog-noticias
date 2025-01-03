<div class="col-12 col-md-6 col-lg-4 mb-3">
    <div class="card shadow-sm h-100">
        <img src="/images/{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}"
            style="object-fit: cover; height: 200px;">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <h5 class="card-title text-primary">{{ $post->title }}</h5>
                <p class="card-text text-muted">{{ \Str::limit($post->description, 100) }}</p>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="btn-group">
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-secondary">Ver más</a>
                </div>
                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="btn-group">
                    {{-- si el usuario le ha dado a like que salga el botón de dislike --}}
                    @php

                    @endphp
                    {{-- Mostrar solo para perfil lector --}}
                    @if (auth()->user()->profile->name == 'lector')

                        @if ($post->liked)
                            <form action="{{ route('posts.dislike', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Dislike</button>
                            </form>
                        @else
                            <form action="{{ route('posts.like', $post) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary">Like</button>
                            </form>
                        @endif

                    @endif

                </div>
                {{-- contar los likes del post --}}
                <small class="text-muted">{{ $post->likes_count }} ⭐</small>
            </div>
        </div>
    </div>
</div>
