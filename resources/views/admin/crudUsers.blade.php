@extends('app')

@section('title', 'Portfolio')

@section('content')
    <h1>Lista de usuarios</h1>

    @include('partials.session-status')
    
        <br>
    @auth
    <a href="{{ route('projects.create')}}">Crear nuevo usuario</a>
    @endauth
    
    <ul>
        @forelse($projects as $project)
                <li> 
                    <a href="{{ route('projects.show', $project) }}" > {{ $project->title }} </a> 
                    <p>{{$project->shortDesc}}</p>
                </li>
        @empty
            <li>No hay proyectos para mostrar</li>
        @endforelse
        {{ $projects->links() }}
    </ul>
@endsection