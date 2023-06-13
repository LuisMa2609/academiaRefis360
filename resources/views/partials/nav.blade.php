<nav class="navbar bg-white shadow-sm ">
        <a class="navbar-brand" href="{{ route('index')}}">
            {{config('app.name')}}
        </a>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link disabled">
                <p>{{Auth::user()->name}}</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link "  
                href="#"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Cerrar sesión
            </a> 
        </li>
    </ul>
</nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
