@extends('layouts.app')

@section('title')

@section('content')
  <div class="container">
      <h1 class="text-center py-3">GUÍAS</h1>
      @can('admin')
      <div class="d-grid gap-2 d-md-flex justify-content py-3">
          <a href="{{ route('guias.crud')}}" class="btn btn-primary">Gestionar guías</a>
        </div>
        @endcan

        @can('lectura')
            <p>Tienes los permisos de lectura</p>
        @endcan

        @can('escritura')
            <p>Tienes permisos para editar</p>
        @endcan

        @can('borrado')
            <p>Tienes los permisos para desactivar</p>
        @endcan

        @foreach ($perfiles as $perfil)
            <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
                <h2>{{ $perfil->nombreperfil }}</h2>
                <div class="table-responsive">
                    <table class="table tabla-guias table-striped hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Sección</th>  
                                <th scope="col">Video</th>
                                <th scope="col">PDF</th>
                                @can('escritura')
                                <th></th>
                                @endcan
                                @can('borrado')
                                <th>Borrado</th>
                                @endcan

                            </tr>
                        </thead>
                        
                        <tfoot>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col"></th>
                                <th scope="col"></th>  
                                <th scope="col"></th>
                                <th scope="col"></th>
                                @can('escritura')
                                <th></th>
                                @endcan
                                @can('borrado')
                                <th></th>
                                @endcan

                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($perfil->secciones as $seccion)
                                 @foreach ($seccion->guias as $guia)
                                     @if ($guia->perfiles->contains($perfil) && $guia->secciones->contains($seccion) && !in_array($guia->id, $guiasIds[$perfil->id] ?? []))
                                     {{-- @can('lectura') --}}
                                         
                                         <tr>
                                             <td class="">{{ $guia->id}}</td>
                                             <td class="">{{ $guia->nombre }}</td>
                                             <td class="text-justify">{{ $guia->descripcion }}</td>
                                             
                                             @foreach ($guia->secciones as $guiaseccion)
                                             <td>{{$guiaseccion->nombreseccion}}</td>
                                                 
                                             @endforeach

                                             <!-- Videos -->
                                             <td>
                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#urlvideo{{$guia->id}}" data-guia-id="{{$guia->id}}" data-urlvideo="{{$guia->urlvideo}}">
                                                     <i class="bi bi-play-btn-fill"></i>
                                                 </button>
                                             </td>
                                             <!-- Modal video -->
                                             <video-modal
                                                 :guia="{{$guia}}"
                                             ></video-modal>
                                             <!-- PDFs -->
                                             <td>
                                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#urlpdf{{$guia->id}}"><i class="bi bi-file-earmark-fill"></i></button>
                                             </td>
                                              <!-- Modal PDF -->
                                                 <div class="modal fade" id="urlpdf{{$guia->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" :idguia="{{$guia->id}}">
                                                                <div class="modal-dialog modal-fullscreen">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{$guia->nombre}}</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                                                                <iframe id="" width="100%" height="100%" src="{{$guia->urlpdf}}" title="" frameborder="0" ></iframe>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                 </div>
                                                 @can('escritura')
                                                 <td>
                                                    <a class="btn btn-primary" href="{{route('guias.edit', $guia)}}"><i class="bi bi-gear-fill"></i></a>

                                                 </td>
                                                 @endcan
                                                @can('borrado')
                                                <td>Permiso de borrado activo</td>
                                                @endcan
                                         </tr>
                                     {{-- @x    endcan --}}
                                         <?php $guiasIds[$perfil->id][] = $guia->id; ?>
                                     @endif
                                 @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
  </div>
@endsection