<x-app-layout>
    {{-- Cambiar contraseña --}}
    <div class="container py-8">
        <div class="row justify-content-center">
            <div class="col-12 col
            -md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Cambiar contraseña</h1>
                        <form action="{{ route('profile.password.update', ['user' => auth()->user()->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="current_password" class="form-label">Contraseña actual</label>
                                <input type="password" class="form-control" id="current_password" name="current_password"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Nueva contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Repite la nueva contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required>
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
