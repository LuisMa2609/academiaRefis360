@auth
<nav class="navbar bg-light shadow-sm navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand " href="{{ route('index')}}">
            {{config('app.name')}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav nav-pills mb-2 mb-lg-0">
                @can('admin')
                    <li class="nav-item">
                        <a class="nav-link px-2 {{ setActive('users.index')}}" href="{{ route('users.index')}}">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 {{ setActive('permisos')}}" href="{{ route('permisos')}}">Perfiles de usuario</a>
                    </li>
                @endcan
                    <li class="nav-item">
                        <a class="nav-link px-2  {{ setActive('users.configurarusuario')}}" href="{{ route('users.configurarusuario', Auth::user()->id)}}">
                            <i class="bi bi-person-fill-gear">  {{Auth::user()->name}}</i>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="btn cerrarsesion " href="#"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left"></i>
                        </a> 
                    </li>
            </ul>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@endauth