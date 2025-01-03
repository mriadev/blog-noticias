@php 
// dd(session('success'));
@endphp

<x-app-layout>
    <main class="d-flex">
        <x-aside-dashboard />
        <div class="container my-5">
            <h1 class="text-center text-primary mb-4">Editar Usuario</h1>
            <div class="row">
                <div class="col-12 col
                -md-6 mx-auto">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Apellido -->
                        <div class="mb-3">
                            <label for="surname" class="form-label">Apellido</label>
                            <input type="text" class="form-control @error('surname') is-invalid @enderror"
                                id="surname" name="surname" value="{{ old('surname', $user->surname) }}">
                            @error('surname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Teléfono</label>
                            <input type="text" class="form-control @error('telephone') is-invalid @enderror"
                                id="telephone" name="telephone" value="{{ old('telephone', $user->telephone) }}">
                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Perfil -->
                        <div class="mb-3">
                            <label for="profile_id" class="form-label">Perfil</label>
                            <select name="profile_id" id="profile_id"
                                class="form-control @error('profile_id') is-invalid @enderror">
                                @foreach ($profiles as $profile)
                                    <option value="{{ $profile->id }}"
                                        {{ old('profile_id', $user->profile_id) == $profile->id ? 'selected' : '' }}>
                                        {{ $profile->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('profile_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </main>
</x-app-layout>
