<nav class="navbar bg-white shadow-sm">
    <a class="navbar-brand" href="{{ route('home')}}">
        {{config('app.name')}}
    </a>
        <ul>
            <li class="{{ setActive('home')}}"><a href="/">Home</a></li>
            <li class="{{ setActive('about')}}"><a href="/quienes-somos">Acerca de</a></li>
            <li class="{{ setActive('portfolio')}}"><a href="/portafolio">Portafolio</a></li>
            <li class="{{ setActive('contact')}}"><a href="/contacto">Contacto</a></li>
                @guest
                    <li><a href="{{route('login')}}">Iniciar sesión</a></li>
                @else
                    <li>
                        <a href="#"onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Cerrar sesión
                        </a>
                    </li>
                @endguest
        </ul>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
