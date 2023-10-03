@extends('layouts.app')

@section('title')

@section('content')
  <div class="container">
      <h1 class="text-center py-3">Indice de videos</h1>

      @can('admin')
      <div class="d-grid gap-2 d-md-flex justify-content py-3">
        <a href="{{ route('guias.crud')}}" class="btn btn-primary">Gestionar guías</a>
      </div>
      @endcan
      
        @foreach ($perfiles as $perfil)
            <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
                <h2>Perfil: {{ $perfil->nombreperfil }}</h2>
                <div class="table-responsive">
                    <table id="{{$perfil->id}}" class="table tabla-guias table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th>Perfil</th>
                                <th>Seccion</th>
                                <th>permiso</th>
                                <th scope="col">Video</th>
                                <th scope="col">PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perfil->secciones as $seccion)
                                @foreach ($seccion->permisos as $permiso)
                                    @foreach ($permiso->guias as $guia)
                                        @if ($guia->perfiles->contains($perfil) && $guia->secciones->contains($seccion) && $guia->permisos->contains($permiso))
                                        <tr>
                                            <td class="">{{ $guia->id}}</td>
                                            <td class="text-break">{{ $guia->nombre }}</td>
                                            <td class="text-break">{{ $guia->descripcion }}</td>
                                            <td class="text-break">{{$guia->perfiles}}</td>
                                            <td class="text-break">{{$guia->secciones}}</td>
                                            <td class="text-break">{{$guia->permisos}}</td>
                                            <td><a href="{{ $guia->urlvideo }}">link del video</a></td>
                                            <td><a href="{{ $guia->urlpdf }}">link del PDF</a></td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
        
    {{-- <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3"> 
              <h1>Notificaciones de pago</h1>
              <table id="guias" class="table ">                  
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Descripcion</th>
                      <th scope="col">Video</th>
                      <th scope="col">PDF</th>
                    </tr>
                  </thead>
                  @foreach ($guias as $guias)
                    <tbody>
                      <tr>
                        <td class="text-break">{{$guias->nombre}}</td>
                        <td class="text-break">{{$guias->descripcion}}</td>
                        <td><a href="{{$guias->urlvideo}}">link del video</a></td>
                        <td><a href="{{$guias->urlpdf}}">link del PDF</a></td>
                      </tr>
                    </tbody>
                  @endforeach
              </table>    
            </div> --}}
            
      {{-- <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
        <h1>Transacciones</h1>
        <table class="table ">                  
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td><a href="">Link</a></td>
              </tr>
            </tbody>
          </table>        
    </div>
          <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
            <h1>Estado de cuenta</h1>
            <table class="table ">                  
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td><a href="">Link</a></td>
                  </tr>
                </tbody>
              </table>        
        </div> --}}

  </div>
@endsection