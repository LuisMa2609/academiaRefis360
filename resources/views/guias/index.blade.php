@extends('layouts.app')

@section('title')

@section('content')
  <div class="container">
      <h1 class="text-center py-3">GUÍAS</h1>
      @can('admin', \App\Models\User::class)
      <div class="d-grid gap-2 d-md-flex justify-content py-3">
          <a    href="{{ route('guias.crud')}}" class="btn btn-primary">Gestionar guías</a>
        </div>
        @endcan
        
        @foreach ($GuiasArray as $perfil)
            <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
                <h2>{{ $perfil['PERFIL']}}</h2>
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
                                <th>Sección</th>  
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($perfil['SECCIONES'] as $seccion)
                                @foreach ($seccion['Guias'] as $guia)
                                        <tr>
                                            <td class="">{{$guia['id']}}</td>
                                            <td class="text-break text-wrap">{{$guia['Guía']}}</td>
                                            <td class="text-break">{{$guia['descripcion']}}</td>
                                                @foreach ($guia['seccionGuia'] as $guiaseccion)
                                                <td>{{$guiaseccion['guiaseccion']}}</td>
                                                @endforeach

                                            <!-- Videos -->
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#urlvideo{{$guia['id']}}" data-guia-id="{{$guia['id']}}" data-urlvideo="{{$guia['video']}}">
                                                    <i class="bi bi-play-btn-fill"></i>
                                                </button>
                                            </td>

                                                <!-- Modal video -->
                                                <video-modal
                                                :guia="{{ json_encode($guia) }}"
                                                ></video-modal>

                                            <!-- PDFs -->
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#urlpdf{{$guia['id']}}"><i class="bi bi-file-earmark-fill"></i></button>
                                            </td>
                                            
                                                <!-- Modal PDF -->
                                                <div class="modal fade" id="urlpdf{{$guia['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" :idguia="{{$guia['id']}}">
                                                    <div class="modal-dialog modal-fullscreen">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{$guia['Guía']}}</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                                                    <iframe id="" width="100%" height="100%" src="{{$guia['pdf']}}" title="" frameborder="0" ></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <td>
                                                @foreach ($seccion['PERMISOS'] as $permiso)
                                                        @if ($perfil['id'] == $permiso['perfil_id'] && $user->secciones->contains('id', $seccion['id']) && $permiso['id'] == 2  && $permiso['seccion_id'] == $seccion['id'])
                                                                <a class="btn btn-primary " href="{{route('guias.edit', $guia['id'])}}"><i class="bi bi-gear-fill"></i></a>
                                                                @break
                                                        @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($seccion['PERMISOS'] as $permiso)
                                                    @if ($permiso['id'] == 3 && $perfil['id'] == $permiso['perfil_id'])
                                                        @if ($user->perfiles->contains('id', $perfil['id']) && $user->secciones->contains('id', $seccion['id']) )
                                                            <guia-status-updater
                                                            :guia-id="{{$guia['id']}}"
                                                            :status="{{ $guia['status'] }}"
                                                            :csrf-token="'{{ csrf_token() }}'"
                                                            :update-url="{{ json_encode(route('guias.updatestatus')) }}"
                                                            ></guia-status-updater>
                                                            @break

                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
  </div>
@endsection