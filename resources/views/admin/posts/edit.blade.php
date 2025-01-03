<x-app-layout>
    <main class="d-flex bg-gray-100">
        <x-aside-dashboard></x-aside-dashboard>
        <div class="container my-5">
            <h1 class="text-center text-primary mb-4">Editar Noticia</h1>
            <div class="row">
                <!-- Formulario de edición -->
                <div class="col-md-6">
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Título -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" name="title" id="title" value="{{ $post->title }}"
                                class="form-control">
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ $post->description }}</textarea>
                        </div>

                        <!-- Imagen -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <!-- Categoría -->
                        <div class="mb-3">
                            <label for="genre_id" class="form-label">Categoría</label>
                            <select name="genre_id" id="genre_id" class="form-select">
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}"
                                        {{ $post->genre_id == $genre->id ? 'selected' : '' }}>
                                        {{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Botón de actualización -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Actualizar Post</button>
                        </div>
                    </form>
                </div>

                <!-- Vista previa de la imagen -->
                <div class="col-md-6">
                    <img src="/images/{{ $post->image }}" class="img-fluid rounded" alt="{{ $post->title }}">
                </div>
            </div>
        </div>
    </main>

</x-app-layout>
