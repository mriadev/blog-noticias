<x-app-layout>
    <form action="{{ route('register') }}" method="POST" class="container mt-5" style="max-width: 400px;">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Apellidos</label>
            <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" required>
            @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Teléfono</label>
            <input type="text" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror">
            @error('telephone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
         {{-- perfil lector en invisible --}}
         <input type="hidden" name="profile_id" value="2">

        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
    </form>

   

    <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="btn btn-link">¿Ya tienes una cuenta? Inicia sesión</a>
    </div>
</x-app-layout>
