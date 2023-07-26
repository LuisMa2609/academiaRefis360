@extends('layouts.app')

@section('title')

@section('content')

<div class="container py-2">
    <button><a href="{{ route('index')}}">regresar</a></button>
</div>

<div class="container bg-white shadow rounded py-3 px-3 mb-4">
    <h1>Permisos de perfiles</h1>
    <ul class="list-group">
        <li class="list-group-item">
            <form action="{{ route('asignarSeccion') }}" method="POST">
                @csrf @method('PATCH')
                <table class="table align-middle table-borderless">
                    <thead>
                    <th></th>
                    <th>L</th>
                    <th>E</th>
                    <th>B</th>
                    @foreach ($perfilesArray as $perfil)
                            <tr>
                                <th>
                                    <input type="hidden" name="perfil_id[]" value="{{ $perfil['id'] }}">
                                    <h4>{{ $perfil['nombreperfil'] }} {{ $perfil['id'] }}</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                                @foreach ($perfil['secciones'] as $seccion)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="secciones[{{ $loop->parent->index }}][]" value="{{ $seccion['id'] }}" {{ $seccion['checked'] ? 'checked' : '' }}> 
                                        {{ $seccion['nombreseccion']}}
                                        {{ $seccion['id']}}
                                    </td>
                                        @foreach ($seccion['permisos'] as $permiso)
                                            
                                            <td>
                                               <input type="checkbox" name="seccion_{{ $seccion['id'] }}_permiso_{{ $permiso['id'] }}" value="{{ $permiso['id'] }}" {{ $permiso['checked'] ? 'checked' : '' }}>
                                            </td>
                                            
                                        @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                    @endforeach
                </table>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </li>
    </ul>
</div>


@endsection