@extends('layouts.app')

@section('title')

@section('content')
    
<div class="container">
    <h1>Permisos de perfiles</h1>
    <ul class="list-group">
        <li class="list-group-item">
            <form action="{{ route('asignarSeccion') }}" method="POST">
                @csrf @method('PATCH')
                <table class="table align-middle">
                    @foreach ($perfilesArray as $perfil)
                        <thead>
                            <tr>
                                <th>
                                    <input type="hidden" name="perfil_id[]" value="{{ $perfil['id'] }}">
                                    <h4>{{ $perfil['nombreperfil'] }}</h4>
                                </th>
                                <th>L</th>
                                <th>E</th>
                                <th>B</th>
                            </tr>
                        </thead>
                        @foreach ($perfil['secciones'] as $seccion)
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="secciones[{{ $loop->parent->index }}][]" value="{{ $seccion['id'] }}" {{ $seccion['checked'] ? 'checked' : '' }}> 
                                        {{ $seccion['nombreseccion'] }}
                                    </td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    @endforeach
                </table>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </li>
    </ul>
</div>


@endsection