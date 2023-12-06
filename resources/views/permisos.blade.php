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
                                                    <input  class="large-checkbox disable" type="hidden" name="perfil_seccion[{{ $perfil['id'] }}][{{ $seccion['id'] }}]" value="1" @if ($seccion['checked']) checked @endif disabled>
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
                <div class="tab-pane fade " id="nav-Perfiles" role="tabpanel" aria-labelledby="nav-Perfiles-tab" tabindex="0">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#createModal">
                        Crear perfil
                    </button>
                    
                    <!-- Modal create-->
                    <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo perfil</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            
                                <form method="POST" action="{{route ('perfiles.storeperfil')}}">
                                    @csrf @method('GET')
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Perfil:</label>
                                      <input type="text" class="form-control" id="nombreperfil" name="nombreperfil" aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Crear</button>
                                </form>

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>

                    <table id="perfiles-table" class="table hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Perfil</th>
                                <th scope="col" class=""></th>
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
                                @foreach ($perfilesAll as $perfilAll)
                                    <tr>
                                        <td class="text-center">{{$perfilAll->id}}</td>
                                        <td class="text-center">{{$perfilAll->nombreperfil}}</td>
                                        <td class="text-center">
                                            <perfil-status-updater class="m-3"
                                                :perfil-id="{{ $perfilAll->id }}"
                                                :status="{{ $perfilAll->status }}"
                                                :csrf-token="'{{ csrf_token() }}'"
                                                :update-url="{{ json_encode(route('perfiles.updatestatus')) }}"
                                            ></perfil-status-updater>

                                            
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$perfilAll->id}}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>

                                            <!-- Modal update-->
                                            <div class="modal fade" id="editModal{{$perfilAll->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Editando:</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                            <div class="modal-body">

                                                                <form method="POST" action="{{route('perfiles.updateperfil', ['perfil' => $perfil['id'] ]) }}">
                                                                    @csrf @method('PATCH')
                                                                    <div class="mb-3">
                                                                        <label for="nombreperfil" class="form-label">Perfil:</label>
                                                                        <input type="text" class="form-control" id="nombreperfil" name="nombreperfil" aria-describedby="editPerfil" value="{{ $perfilAll->nombreperfil }}">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                                </form>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                    </table>


            </div>
        </div>
    </div>
</div>
@endsection