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
                <h2>Perfil: {{ $perfil->nombreperfil }} = {{$perfil->id}}</h2>
                <div class="table-responsive">
                    <table id="{{$perfil->id}}" class="table tabla-guias table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                {{-- <th>Perfil</th> --}}
                                <th>Seccion</th>
                                <th>permiso</th>
                                <th scope="col">Video</th>
                                <th scope="col">PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perfil->secciones as $seccion)
                                @foreach ($seccion->permisos as $permiso)
                                    @foreach ($permiso->perfiles as $permisoperfil)
                                        @if ($permisoperfil->id === $perfil->id)
                                            @foreach ($permiso->guias as $guia)
                                                @if ($guia->perfiles->contains($perfil) && $guia->secciones->contains($seccion) && $guia->permisos->contains($permiso) && !in_array($guia->id, $guiasIds) )
                                                <tr>
                                                    <td class="">{{ $guia->id}}</td>
                                                    <td class="text-break">{{ $guia->nombre }}</td>
                                                    <td class="text-break">{{ $guia->descripcion }}</td>
                                                    {{-- <td class="">{{$guia->perfiles}}</td> --}}
                                                    <td class="">{{$guia->secciones}}</td>
                                                    <td class="">{{$guia->permisos}}</td>
                                                    <td><a href="{{ $guia->urlvideo }}">link del video</a></td>
                                                    <td><a href="{{ $guia->urlpdf }}">link del PDF</a></td>
                                                </tr>
                                                <?php $guiasIds[] = $guia->id; ?>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach


        {{-- @foreach ($guias as $guias)
          <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
            <h2>Perfil: {{ $guias['perfil']->nombreperfil }}</h2>
            <div class="table-responsive">
              <table id="{{$guias['perfil']->id}}" class="table tabla-guias table-striped">
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
                    @foreach ($guias['guia'] as $guia)
                                <tr>
                                    <td class="">{{ $guia['guia']->id}}</td>
                                    <td class="text-break">{{ $guia['guia']->nombre }}</td>
                                    <td class="text-break">{{ $guia['guia']->descripcion }}</td>
                                    <td class="text-break">{{ $guia['perfil']->perfiles}}</td>
                                    <td class="text-break">{{ $guia['seccion']->secciones}}</td>
                                    <td class="text-break">{{ $guia['permiso']->permisos}}</td>
                                    <td><a href="{{ $guia->urlvideo }}">link del video</a></td>
                                    <td><a href="{{ $guia->urlpdf }}">link del PDF</a></td>
                                </tr>
                    @endforeach
                </tbody>
            </table>

            </div>
          </div>
        @endforeach --}}

  </div>
@endsection