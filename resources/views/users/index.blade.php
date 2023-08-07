<!--
  todo
  cambiar el button type="submit" por funcion ajax 
-->

@extends('layouts.app')

@section('title')

@section('content')
<div class="container ">
    <h1>Usuarios</h1>
      <div class="d-grid gap-2 d-md-flex justify-content py-3">
        <a href="{{ route('users.register')}}" class="btn btn-primary">Registrar nuevo usuario</a>
      </div>
            <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">  
               
                

                            <table class="table">                  
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Apellido</th>
                                        <th class="text-center">Puesto</th>
                                        <th class="text-center">Perfiles</th>
                                        <th class="text-center"></th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>    
                                    <tbody class="table-group-divider">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-center">{{$user->id}}</td>
                                                <td class="text-center">{{$user->name}}</td>
                                                <td class="text-center">{{$user->surname}}</td>
                                                <td class="text-center">{{$user->puesto}}</td>
                                                <td class="text-center">
                                                    @foreach ($user->perfiles as $perfil)
                                                    {{$perfil->nombreperfil}} <br>
                                                    @endforeach
                                                </td>
                                                <td  class="text-center">
                                                    <a href="{{route('users.detallesdeusuario', $user) }}"><i class="bi bi-info-circle-fill"></i>
                                                    <p>Configurar perfiles</p></a>
                                                </td>
                                                <td  class="text-center">
                                                    <form action="{{ route('users.deshabilitarusuario', ['user' => $user->id]) }}" method="POST">
                                                        @csrf @method('PATCH')
                                                        <button type="submit">Cambiar status</button>
                                                        <p>{{$user->status}}</p>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            {{$users->links()}}

                        
            </div>
</div>
    
@endsection