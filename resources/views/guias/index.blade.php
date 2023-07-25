@extends('layouts.app')

@section('title')

@section('content')

    @can('admin')
    <dir>
      <button><a href="{{ route('users.index')}}">Usuarios</a></button>
      <button><a href="{{ route('permisos')}}">Perfiles de usuario</a></button>
    </dir>
    @endcan

    <h1 class="text-center py-3">Indice de videos</h1>
    
    
        <div class="container bg-white shadow rounded py-3 px-3 mb-4">
            <h1>Notificaciones de pago</h1>
            <table class="table ">                  
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
                    <td>{{$guias->nombre}}</td>
                    <td>{{$guias->descripcion}}</td>
                    <td><a href="">link del video</a></td>
                    <td><a href="">link del PDF</a></td>
                  </tr>
                </tbody>
                @endforeach
              </table>        
        </div>

        
    <div class="container bg-white shadow rounded py-3 px-3 mb-4">
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

        <div class="container bg-white shadow rounded py-3 px-3 mb-4">
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
      </div>
@endsection