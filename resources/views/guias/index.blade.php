@extends('layouts.app')

@section('title')

@section('content')
  <div class="container">
      <h1 class="text-center py-3">GUÍAS</h1>
      @can('admin')
      <div class="d-grid gap-2 d-md-flex justify-content py-3">
          <a    href="{{ route('guias.crud')}}" class="btn btn-primary">Gestionar guías</a>
        </div>
        @endcan

        @foreach ($perfiles as $indexperfil => $perfil)
            <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
                <h2>{{ $perfil->nombreperfil }}</h2>
                <div class="table-responsive">
                    <table class="table tabla-guias table-striped hover ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Sección</th>  
                                <th scope="col">Video</th>
                                <th scope="col">PDF</th>
                                <th scope="col"></th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th></th>
                                <th>Seccion</th>  
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($perfil->secciones as $indexseccion => $seccion)
                                 @foreach ($seccion->guias as $guiaU)
                                    @if ($guiaU->perfiles->contains($perfil) && $guiaU->secciones->contains($seccion) && !in_array($guiaU->id, $guiasIds[$perfil->id] ?? []))
                                            <tr>
                                                <td class="">{{ $guiaU->id}}</td>
                                                <td class="text-break text-wrap">{{ $guiaU->nombre }}</td>
                                                <td class="text-break">{{ $guiaU->descripcion }}</td>
                                                @foreach ($guiaU->secciones as $guiaUseccion)
                                                    <td>{{$guiaUseccion->nombreseccion}} </td>
                                                @endforeach
                                                <!-- Videos -->
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#urlvideo{{$guiaU->id}}" data-guia-id="{{$guiaU->id}}" data-urlvideo="{{$guiaU->urlvideo}}">
                                                        <i class="bi bi-play-btn-fill"></i>
                                                    </button>
                                                </td>

                                                    <!-- Modal video -->
                                                    <video-modal
                                                        :guia="{{$guiaU}}"
                                                    ></video-modal>

                                                <!-- PDFs -->
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#urlpdf{{$guiaU->id}}"><i class="bi bi-file-earmark-fill"></i></button>
                                                </td>
                                                
                                                    <!-- Modal PDF -->
                                                    <div class="modal fade" id="urlpdf{{$guiaU->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" :idguia="{{$guiaU->id}}">
                                                        <div class="modal-dialog modal-fullscreen">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$guiaU->nombre}}</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                                                        <iframe id="" width="100%" height="100%" src="{{$guiaU->urlpdf}}" title="" frameborder="0" ></iframe>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <td>
                                                @foreach ($seccion->permisosasignados as $indexpermiso => $permiso)
                                                    @if ($user->perfiles->contains('id', $perfil->id) && $user->secciones->contains('id', $seccion->id))
                                                        @if ($permiso->id == 2 && $permiso->pivot->perfil_id == $perfil->id)
                                                            <a class="btn btn-primary " href="{{route('guias.edit', $guiaU)}}"><i class="bi bi-gear-fill"></i></a>
                                                            {{-- {{$permiso}} <br> --}}
                                                            {{-- {{$indexpermiso}} <br>w --}}
                                                        @endif
                                                            
                                                
                                                    @endif

                                                @endforeach
                                                </td>

                                                <td>
                                                    @if ($permiso->id == 3 && $permiso->pivot->perfil_id == $perfil->id)
                                                   
                                                    <guia-status-updater
                                                    :guia-id="{{$guiaU->id}}"
                                                    :status="{{ $guiaU->status }}"
                                                    :csrf-token="'{{ csrf_token() }}'"
                                                    :update-url="{{ json_encode(route('guias.updatestatus')) }}"
                                                    ></guia-status-updater>
                                                    @endif

                                                </td>

                                            </tr>
                                            <?php $guiasIds[$perfil->id][] = $guiaU->id; ?>
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