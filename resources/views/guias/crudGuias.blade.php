@extends('layouts.app')

@section('tittle')
    
@section('content')
<div class="container">
    <h1 class="text-center">GUIAS</h1>


    <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
        <div class="table-responsive">
            <table id="guias" class="table">                  
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guias as $guia)
                        <tr>
                            <td class="">{{$guia->id}}</td>
                            <td class="text-break">{{$guia->nombre}}</td>
                            <td class="text-break">{{$guia->descripcion}}</td>
                            <td class="">{{$guia->urlvideo}}</td>
                            <td class="">{{$guia->urlpdf}}</td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </div>
    </div>
</div>
@endsection