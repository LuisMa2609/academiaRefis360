@extends('layouts.app')

@section('title')

@section('content')
<div class="container">
    <h1>Gestión de perfiles</h1>
    
    @include('partials.session-status')


</div>

<div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="Permisos-tab" data-bs-toggle="tab" data-bs-target="#Permisos-tab-pane" type="button" role="tab" aria-controls="Permisos-tab-pane" aria-selected="true">Permisos</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
        </li>
      </ul>


      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Permisos-tab-pane" role="tabpanel" aria-labelledby="Permisos-tab" tabindex="0">
            
            <form action="{{ route('asignarSeccion') }}" method="POST">
                @csrf @method('PATCH')
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
                    <button type="submit" class="btn btn-primary fs-6">Guardar</button>

                </ul>
        </form>
    

        </div>





        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
      </div>














</div>


@endsection