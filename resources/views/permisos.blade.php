@extends('layouts.app')

@section('title')

@section('content')
    <div class="container">
        <h1>Gestión de perfiles</h1>
        
        @include('partials.session-status')

    <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
        <div class="container px-2">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-Permisos-tab" data-bs-toggle="tab" data-bs-target="#nav-Permisos" type="button" role="tab" aria-controls="nav-Permisos" aria-selected="true">Permisos</button>
                <button class="nav-link" id="nav-Perfiles-tab" data-bs-toggle="tab" data-bs-target="#nav-Perfiles" type="button" role="tab" aria-controls="nav-Perfiles" aria-selected="false">Perfiles</button>
                </div>
            </nav>
            
            <div class="tab-content" id="nav-tabContent">
                {{-- Tab permisos --}}
                <div class="tab-pane fade show active list-group" id="nav-Permisos" role="tabpanel" aria-labelledby="nav-Permisos-tab" tabindex="0">
                    <form action="{{ route('asignarSeccion') }}" method="POST">
                        @csrf @method('PATCH')
                        <li class="list-group-item">
                            <table class="table align-middle table-borderless ">
                                <thead>
                                    <th class="fs-5"></th>
                                    <th class="fs-5">L</th>
                                    <th class="fs-5">E</th>
                                    <th class="fs-5">B</th>
                                    
                                    @foreach ($perfilesArray as $perfil)
                                        <tr>
                                            <th>
                                                <input type="hidden" name="perfil_id[]" value="{{ $perfil['id'] }}">
                                                <h2>{{ $perfil['nombreperfil'] }} </h2>
                                            </th>
                                        </tr>
                                </thead>
                                    <tbody class="fs-5">
                                        @foreach ($perfil['secciones'] as $seccion)
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="perfil_seccion[{{ $perfil['id'] }}][{{ $seccion['id'] }}]" value="0">
                                                    <input  class="large-checkbox disable" type="checkbox" name="perfil_seccion[{{ $perfil['id'] }}][{{ $seccion['id'] }}]" value="1" @if ($seccion['checked']) checked @endif disabled>
                                                    {{ $seccion['nombreseccion']}}
                                                </td>
                                                @foreach ($seccion['permisos'] as $permiso)
                                                    <td>
                                                        <input type="hidden" name="perfil_seccion_permiso_status[{{ $perfil['id'] }}][{{ $seccion['id'] }}][{{ $permiso['id'] }}]" value="0">
                                                        <input class="large-checkbox" type="checkbox" name="perfil_seccion_permiso_status[{{ $perfil['id'] }}][{{ $seccion['id'] }}][{{ $permiso['id'] }}]" value="1" @if ($permiso['statuspermiso'][$loop->parent->index] == 1 && $seccion['checked']) checked @endif>
                                                        {{-- <p>{{$seccion['nombreseccion']}} | {{$permiso['permiso']}} {{$permiso['statuspermiso']}}</p> --}}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endforeach
                            </table>
                        </li>
                        <button type="submit" class="btn btn-primary fs-6 mt-3">Guardar</button>
                    </form>
                </div>

                {{-- Tab perfiles --}}
                <div class="tab-pane fade" id="nav-Perfiles" role="tabpanel" aria-labelledby="nav-Perfiles-tab" tabindex="0">
                    {{-- <button typepe="submit" class="btn btn-primary fs-6 mt-3">Guardar</button> --}}

                    <table id="perfiles-table" class="table  hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Perfil</th>
                                <th scope="col" class="">Status</th>
                            </tr>
                        </thead>
                        
                        <tfoot>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Perfil</th>
                                <th scope="col" class=""></th>
                            </tr>
                        </tfoot>

                            <tbody>
                                @foreach ($perfiles as $perfil)
                                    <tr>
                                        <td class="text-center">{{$perfil->id}}</td>
                                        <td class="text-center">{{$perfil->nombreperfil}}</td>
                                        <td>
                                            <perfil-status-updater
                                                :perfil-id="{{ $perfil->id }}"
                                                :status="{{ $perfil->status }}"
                                                :csrf-token="'{{ csrf_token() }}'"
                                                :update-url="{{ json_encode(route('perfiles.updatestatus')) }}"
                                            ></perfil-status-updater>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection