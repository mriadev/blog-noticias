<x-app-layout>
    <main class="d-flex">
        <x-aside-dashboard />
        <div class="container my-5">
            <h1 class="text-center text-primary mb-4">Gestionar Lectores</h1>
            <div class="row">
                <div class="col-12 col
                -md-6 mx-auto">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-4">Crear Usuario</a>
                </div>
            </div>
            <div class="">
                <!-- Listado de usuarios -->
                <div class="">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->profile_id == 1 ? 'Periodista' : 'Lector' }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
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
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="d-flex justify-content-center">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

</x-app-layout>
