<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <!-- Asegúrate de que el logo esté en la carpeta public/images -->
            <img src="https://cdn-icons-png.flaticon.com/512/49/49334.png" alt="Logo"
                style="width: 50px; margin-top: 5px;">
            Blog Noticias
        </a>
    </div>


    <div class="container">
        <ul class="navbar-nav ms-auto d-flex align-items-center"> <!-- Aquí se aplica d-flex y align-items-center -->
            @auth

                @if (auth()->user()->profile->name == 'periodista')
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                @endif

                @if (auth()->user()->profile->name == 'lector')
                    <li class="nav-item">
                        <a href="{{ route('profile', ['user' => auth()->user()->id]) }}"
                            class="nav-link">{{ auth()->user()->name }}</a>
                    </li>
                @endif

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link">Cerrar sesión</button>
                    </form>
                </li>
            @endauth
            @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Registrarse</a>
                </li>
            @endguest
        </ul>
    </div>

</nav>
