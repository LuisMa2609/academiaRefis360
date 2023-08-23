@extends('layouts.app')

@section('title')

@section('content')
<div class="container">
    <h1>Permisos de perfiles</h1>

</div>

<div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
    <form action="{{ route('asignarSeccion') }}" method="POST">
        @csrf @method('PATCH')
    <button type="submit" class="btn btn-primary fs-6">Guardar</button>
    <ul class="list-group py-3">
        <li class="list-group-item">
                <table class="table align-middle table-borderless">
                    <thead>
                    <th class="fs-5"></th>
                    <th class="fs-5">L</th>
                    <th class="fs-5">E</th>
                    <th class="fs-5">B</th>
                    @foreach ($perfilesArray as $perfil)
                            <tr>
                                <th>
                                    <input type="hidden" name="perfil_id[]" value="{{ $perfil['id'] }}">
                                    <h2>{{ $perfil['nombreperfil'] }} {{ $perfil['id'] }}</h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="fs-5">
                                {{-- @foreach ($perfil['secciones'] as $seccion)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="secciones[{{ $loop->parent->index }}][]" value="{{ $seccion['id'] }}" @if ($seccion['status'] == 1) checked @endif> 
                                            {{ $seccion['nombreseccion']}}
                                            {{ $seccion['id']}}
                                        </td>
                                            @foreach ($seccion['permisos'] as $permiso)
                                                
                                                <td>
                                                   <input type="checkbox" name="perfil_seccion_permiso_status [{{ $perfil['id'] }}] [{{ $seccion['id'] }}] [{{ $permiso['id'] }}]"  value="0" @if ($permiso['statuspermiso'] == 1) checked @endif>
                                                   {{ $permiso['permiso'] }}
                                                </td>
                                                
                                            @endforeach
                                    </tr>
                                @endforeach --}}
                                

                            @foreach ($perfil['secciones'] as $seccion)
                                <tr>
                                    <td>
                                        <input type="hidden" name="perfil_seccion[{{ $perfil['id'] }}][{{ $seccion['id'] }}]" value="0">
                                        <input type="checkbox" name="perfil_seccion[{{ $perfil['id'] }}][{{ $seccion['id'] }}]" value="1" @if ($seccion['checked']) checked @endif>
                                        {{ $seccion['nombreseccion']}}
                                        {{ $seccion['id']}}
                                    </td>
                                    @foreach ($seccion['permisos'] as $permiso)
                                        <td>
                                            <input type="hidden" name="perfil_seccion_permiso_status[{{ $perfil['id'] }}][{{ $seccion['id'] }}][{{ $permiso['id'] }}]" value="0">
                                            <input type="checkbox" name="perfil_seccion_permiso_status[{{ $perfil['id'] }}][{{ $seccion['id'] }}][{{ $permiso['id'] }}]" value="0" @if ($permiso['statuspermiso'] == 1 && $seccion['checked']) checked @endif>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach

                            
                            </tbody>
                    @endforeach
                </table>
            </li>
        </ul>
    </form>
</div>


@endsection