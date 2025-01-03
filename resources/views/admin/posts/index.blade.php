<x-app-layout>
    <main class="d-flex bg-light min-vh-100">
        <!-- Menú lateral -->
        <x-aside-dashboard></x-aside-dashboard>

        <!-- Área de contenido -->
        <section class="flex-grow-1 p-8 bg-light">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-dark">Gestionar Noticias</h1>
                <div class="mt-4">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-4">Crear Noticia</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <!-- Tabla de Noticias -->
                <table class="table table-striped mt-8">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Categoría</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->genre }}</td>
                                <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <x-pagination-layout :posts="$posts" />
            </div>
        </section>
    </main>
    
</x-app-layout>
