<x-app-layout>
    <main class="d-flex bg-light">
        <x-aside-dashboard></x-aside-dashboard>
        <div class="container my-5">
            <h1 class="text-center text-primary mb-4">Crear Noticia</h1>
            <div class="row justify-content-center">
                <!-- Formulario de creación -->
                <div class="col-lg-8 col-md-10">
                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Título -->
                        <div class="mb-4">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Imagen -->
                        <div class="mb-4">
                            <label for="image" class="form-label">Imagen</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Categoría -->
                        <div class="mb-4">
                            <label for="genre_id" class="form-label">Categoría</label>
                            <select name="genre_id" id="genre_id"
                                class="form-select @error('genre_id') is-invalid @enderror">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}"
                                        {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                                        {{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('genre_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón de creación -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100">Crear Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
