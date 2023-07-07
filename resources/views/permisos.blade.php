@extends('layouts.app')

@section('title')

@section('content')
    
<div class="container">
    <h1>Perfiles</h1>
    <div class="container shadow rounded py-3 px-3 mb-4 ">
        <ul class="list-group ">
                @foreach ($perfiles as $profile)
                <form method="POST" action="{{route('asignarSeccion', ['perfiles' => $perfiles->id])}}">
                    @csrf @method('PATCH')
                    <li>
                        <h4>{{$profile->nombreperfil}}</h4>
                    </li>
                    @foreach ($secciones as $seccion)
                        <li>
                            <input type="checkbox" name="secciones[]" value="{{ $seccion->id }}" {{ $profile->secciones->contains($seccion) ? 'checked' : '' }}>
                            <label>{{ $seccion->nombreseccion }}</label>
                        </li>
                    @endforeach
                @endforeach
                <button type="submit">Asignar secciones</button>

            </form>
        </ul>
    </div>
</div>

@endsection