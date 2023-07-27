@auth
    
<nav class="navbar bg-light shadow-sm ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index')}}">
            {{config('app.name')}}
        </a>
        <ul class="nav">
        @can('admin')
        <li class="nav-item">
            <a class="btn btn-outline-primary" href="{{ route('users.index')}}">Usuarios</a>
            <a class="btn btn-outline-primary" href="{{ route('permisos')}}">Perfiles de usuario</a>
        </li>
        @endcan
            <li class="nav-item">
                <a class="nav-link disabled">
                    <p>{{Auth::user()->name}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="btn cerrarsesion btn-outline-danger"  
                href="#"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
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