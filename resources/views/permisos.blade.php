@extends('layouts.app')

@section('title')

@section('content')
    
<div class="container">
    <h1>Perfil - Seccion</h1>
    <ul class="list-group">
        <li class="list-group-item">
            <form action="{{ route('asignarSeccion') }}" method="POST">
                @csrf @method('PATCH')
                    @foreach ($perfilesArray as $perfil)
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="hidden" name="perfil_id[]" value="{{ $perfil['id'] }}">
                                        <h4>{{ $perfil['nombreperfil'] }}</h4>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
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
                        </table>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </li>
    </ul>

</div>


@endsection