@auth
<nav class="navbar bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand " href="{{ route('index')}}">
            {{config('app.name')}}
        </a>
        <ul class="nav nav-pills">
            @can('admin')
                <li class="nav-item">
                    <a class="nav-link {{ setActive('users.index')}}" href="{{ route('users.index')}}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('permisos')}}" href="{{ route('permisos')}}">Perfiles de usuario</a>
                </li>
            @endcan
                <li class="nav-item">
                    <a class="nav-link  {{ setActive('users.configurarusuario')}}" href="{{ route('users.configurarusuario', Auth::user()->id)}}">
                        <i class="bi bi-person-fill-gear">  {{Auth::user()->name}}</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn cerrarsesion " href="#"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left"></i>
                </a> 
            </li>
        </ul>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@endauth