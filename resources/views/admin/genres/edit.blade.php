<x-app-layout>
    <main class="d-flex bg-gray-100">
        <x-aside-dashboard></x-aside-dashboard>
        <div class="container my-5">
            <h1 class="text-center text-primary mb-4">Editar Género</h1>
            <div class="row">
                <!-- Formulario de edición -->
                <div class="col-md-6">
                    <form action="{{ route('admin.genres.update', $genre) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" value="{{ $genre->name }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón de actualización -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Actualizar Género</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</x-app-layout>
