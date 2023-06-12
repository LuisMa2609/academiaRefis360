<nav class="navbar bg-white shadow-sm">
    <a class="navbar-brand" href="">
        {{config('app.name')}}
    </a>
        <ul>
            <li class=""><a href="/">Home</a></li>
            <li class=""><a href="/quienes-somos">Acerca de</a></li>
            <li class=""><a href="/portafolio">Portafolio</a></li>
            <li class=""><a href="/contacto">Contacto</a></li>
                @guest
                    <li><a href="">Iniciar sesión</a></li>
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

    <form id="logout-form" action="" method="POST" class="d-none">
        @csrf
    </form>
