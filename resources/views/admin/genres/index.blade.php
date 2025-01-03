<x-app-layout>
    <main class="d-flex bg-gray-100">
        <x-aside-dashboard></x-aside-dashboard>
        <div class="container my-5">
            <h1 class="text-center text-primary mb-4">Gestionar Géneros</h1>
            <div>
                <!-- Formulario de creación -->
                <div class="">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.genres.store') }}" method="POST">
                        @csrf
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Botón de creación -->
                        <div class="">
                            <button type="submit" class="btn btn-success">Crear Género</button>
                        </div>
                    </form>
                </div>
                

                <!-- Listado de géneros -->
                <div class="mt-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genres as $genre)
                                <tr>
                                    <td>{{ $genre->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.genres.edit', $genre) }}"
                                            class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('admin.genres.destroy', $genre) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="d-flex justify-content-center">
                        {{ $genres->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
 
       
 </x-app-layout>