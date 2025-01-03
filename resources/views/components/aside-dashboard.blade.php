 {{-- Contenedor principal con el menú lateral --}}
    <!-- Menú lateral -->
    <aside class="flex-grow-0 w-64 bg-gradient-to-b from-blue-600 to-blue-800 text-white shadow-lg vh-100">
            <h2 class="text-2xl font-bold mb-6 p-2 text-center text-black">Administración</h2>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('admin.posts.index') }}" 
                           class="block p-2 rounded hover:bg-blue-700 text-lg transition-colors duration-200">
                           Gestionar Noticias
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('admin.genres.index') }}" 
                           class="block p-2 rounded hover:bg-blue-700 text-lg transition-colors duration-200">
                           Gestionar Géneros
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('admin.users.index') }}" 
                           class="block p-2 rounded hover:bg-blue-700 text-lg transition-colors duration-200">
                           Gestionar Lectores
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
