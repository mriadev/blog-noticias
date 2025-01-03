<x-app-layout>
   
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('login') }}" method="POST" class="container mt-5" style="max-width: 400px;">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    
    <div class="text-center mt-3">
        <a href="{{ route('register') }}" class="btn btn-link">Registrarse</a>
        <a href="{{ route('password.recover') }}" class="btn btn-link">Olvidé mi contraseña</a>
    </div>
   
    
</x-app-layout>
