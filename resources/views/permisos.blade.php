@extends('layouts.app')

@section('title')

@section('content')
    
<div class="container">
    <h1>Perfil - Seccion</h1>
    <ul class="list-group">
        <form action="{{ route('asignarSeccion') }}" method="POST">
            @csrf @method('PATCH')

            @foreach ($perfiles as $perfil)
            <li class="list-group-item">
                <input type="hidden" name="perfil_id" value="{{ $perfil->id }}">    
                <h4>{{ $perfil->nombreperfil}} {{$perfil->id}}</h4>
                    <ul class="list-group">
                        @foreach ($secciones as $seccion)
                            <li class="list-group-item">
                                <input type="checkbox" name="secciones[]" value="{{ $seccion->id }}" {{ in_array($seccion->id, $perfil->secciones->pluck('id')->toArray()) ? 'checked' : '' }}> 
                                {{$seccion->nombreseccion}}
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </ul>
</div>


@endsection