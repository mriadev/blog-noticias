<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar perfil</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <form action="{{ route('profile.update', ['user' => auth()->user()->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ auth()->user()->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="surname" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="surname" name="surname"
                                    value="{{ auth()->user()->surname }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ auth()->user()->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="telephone" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telephone" name="telephone"
                                    value="{{ auth()->user()->telephone }}">
                            </div>

                        
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Por favor corrige los siguientes errores:</strong>
                                    <ul class="mt-2 mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary w-100 py-2">Actualizar</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('profile', ['user' => auth()->user()->id]) }}"
                                class="btn btn-secondary w-100 py-2">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
