@extends('layouts.app')

@section('title')

@section('content')
    <div class="container">
        <h1>Usuarios</h1>

        <a href="{{ route('users.register')}}">Registrar nuevo usuario</a>

        <div class="container bg-white shadow rounded py-3 px-3 mb-4 text-center">
            <table class="table table-striped">                  
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Permisos</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody class="table-group-divider">
                    @foreach ($users as $user)
                        <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>
                            @foreach ($user->perfiles as $perfil)
                            {{$perfil->nombreperfil}} <br>
                            @endforeach
                          </td>
                          <td><a href="{{route('users.detallesdeusuario', $user) }}">Editar</a></td>
                          <td><a href="">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>        
        </div>
    </div>
    
@endsection