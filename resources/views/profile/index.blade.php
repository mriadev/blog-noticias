<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Perfil de usuario</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <!-- Nombre -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Nombre</h5>
                        <p class="card-text">{{ auth()->user()->name }}</p>
                    </div>
                </div>
            </div>

            <!-- Apellido -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Apellido</h5>
                        <p class="card-text">{{ auth()->user()->surname }}</p>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Email</h5>
                        <p class="card-text">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Teléfono -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Teléfono</h5>
                        <p class="card-text">{{ auth()->user()->telephone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('profile.edit', ['user' => auth()->user()->id]) }}" class="btn btn-info me-2">Editar perfil</a>
                <a href="{{ route('profile.password', ['user' => auth()->user()->id]) }}" class="btn btn-warning">Cambiar contraseña</a>
            </div>
        </div>
    </div>

    {{-- Noticias a las que le ha dado like --}}
    <div class="container mt-5">
        <h1 class="text-center mb-4">Mis noticias favoritas</h1>

        <ul class="list-group">
            @forelse (auth()->user()->likes as $like)
                <li class="list-group-item d-flex justify-content-between align-items-center shadow-sm">
                    <div class="d-flex flex-column">
                        <h5>{{ $like->title }}</h5>
                        <p>{{ $like->description }}</p>
                    </div>
                    <a href="{{ route('posts.show', ['post' => $like->id]) }}" class="btn btn-primary ms-2">Ver noticia</a>
                </li>
            @empty
                <li class="list-group-item text-center">No tienes noticias que te gusten</li>
            @endforelse
        </ul>
    </div>

</x-app-layout>
