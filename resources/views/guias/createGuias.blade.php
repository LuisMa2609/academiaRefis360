@extends('layouts.app')

@section('tittle')

@section('content')
    
<div class="container">
    @include('partials.session-status')

    <h1 class="text-center">{{ isset($guia->id) ? 'Editando: ' . $guia->nombre : 'Crear nueva guía' }}</h1>
    <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
        <form method="POST" action="{{isset($guia->id) ? route('guias.update', ['guia' => $guia]) : route('guias.store')}}">
            @csrf
                @if(isset($guia->id))
                    @method('PATCH')

                    <div class="row mb-3">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end">ID:</label>
                        <div class="col-md-6">
                            <label class="form-control">{{$guia->id}}</label>
                        </div>
                    </div>

                @endif
            <div class="row mb-3">
                <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre</label>
                <div class="col-md-6">
                    <input id="nombre" type="text" class=" form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ isset($guia->id) ? $guia->nombre : old('nombre') }}" required autocomplete="nombre" autofocus>
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="descripcion" class="col-md-4 col-form-label text-md-end">Descripcion</label>
                <div class="col-md-6">
                    <textarea id="descripcion" type="text" class=" form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ isset($guia->id) ? $guia->descripcion : old('descripcion') }}" required autocomplete="descripcion" autofocus>
                    </textarea>
                        @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="urlvideo" class="col-md-4 col-form-label text-md-end">URL del video</label>
                <div class="col-md-6">
                    <input id="urlvideo" type="text" class=" form-control @error('urlvideo') is-invalid @enderror" name="urlvideo" value="{{ isset($guia->id) ? $guia->urlvideo : old('urlvideo') }}" required autocomplete="urlvideo" autofocus>
                        @error('urlvideo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="urlpdf" class="col-md-4 col-form-label text-md-end">URL del pdf</label>
                <div class="col-md-6">
                    <input id="urlpdf" type="text" class=" form-control @error('urlpdf') is-invalid @enderror" name="urlpdf" value="{{ isset($guia->id) ? $guia->urlpdf : old('urlpdf') }}" required autocomplete="urlpdf" autofocus>
                        @error('urlpdf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="Perfil" class="col-md-4 col-form-label text-md-end">Perfil</label>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <select class="form-select @error('perfil_id') is-invalid @enderror" id="inputGroupSelect01" name="perfil_id">
                            <option value="" {{ isset($guia->id) ? 'selected' : '' }}>Selecciona alguno</option>
                            @foreach ($perfiles as $perfil)
                                <option value="{{$perfil->id}}" {{ (isset($guia->id) && in_array($perfil->id, $guiasperfil->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{$perfil->nombreperfil}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('perfil_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="seccion" class="col-md-4 col-form-label text-md-end">Seccion</label>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <select class="form-select @error('seccion_id') is-invalid @enderror" id="inputGroupSelect01" name="seccion_id">
                          <option selected{{ isset($guia->id) ? 'selected' : '' }}>Selecciona alguno</option>
                            @foreach ($secciones as $seccion)
                                <option value="{{$seccion->id}}" {{ (isset($guia->id) && in_array($seccion->id, $guiasseccion->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{$seccion->nombreseccion}}
                                </option>
                            @endforeach                          
                        </select>
                      </div>
                    @error('seccion_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="Permiso" class="col-md-4 col-form-label text-md-end">Permiso</label>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <select class="form-select @error('permiso_id') is-invalid @enderror" id="inputGroupSelect01" name="permiso_id">
                          <option selected{{ isset($guia->id) ? 'selected' : '' }}>Selecciona alguno</option>
                            @foreach ($permisos as $permiso)
                                <option value="{{$permiso->id}}" {{ (isset($guia->id) && in_array($permiso->id, $guiaspermiso->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{$permiso->permiso}}
                                </option>
                            @endforeach                          
                        </select>
                      </div>
                    @error('permiso_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <a href="{{ route('guias.crud') }}" class="btn btn-danger btnregistrocancel">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($guia->id) ? 'Actualizar ': 'Crear' }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection