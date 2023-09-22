@extends('layouts.app')

@section('tittle')
    
@section('content')
<div class="container">
    <h1 class="text-center">GUIÁS</h1>

    <div class="d-grid gap-2 d-md-flex justify-content py-3">
        <a href="{{ route('guias.create')}}" class="btn btn-primary">Crear nueva guía</a>
    </div>

    <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
        <div class="table-responsive">
            <table class="table tabla-guias table-striped">                  
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Video</th>
                        <th scope="col">PDF</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Seccion</th>
                        <th scope="col">Permiso</th>
                        <th>status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($guias as $guia)
                        <tr>
                            <td class="">{{$guia->id}}</td>
                            <td class="">{{$guia->nombre}}</td>
                            <td class="">{{$guia->descripcion}}</td>
                            <td class="text-break">{{$guia->urlvideo}}</td>
                            <td class="text-break">{{$guia->urlpdf}}</td>
                            <td class="">
                                @foreach ($guia->perfiles as $perfil)
                                    {{$perfil->nombreperfil}}
                                @endforeach
                            </td>
                            <td class="">
                                @foreach ($guia->secciones as $seccion)
                                    {{$seccion->nombreseccion}}
                                @endforeach
                            </td>
                            <td class="">
                                @foreach ($guia->permisos as $permiso)
                                    {{$permiso->permiso}}
                                @endforeach
                            </td>
                            <td>
                                <guia-status-updater
                                    :guia-id="{{$guia->id}}"
                                    :status="{{ $guia->status }}"
                                    :csrf-token="'{{ csrf_token() }}'"
                                    :update-url="{{ json_encode(route('guias.updatestatus')) }}"
                                ></guia-status-updater>
                            </td>
                            <td class="">
                                <a href="{{route('guias.edit', $guia)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </div>
    </div>
</div>
@endsection