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
                <ul class="nav nav-tabs " id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tablausers-tab" data-bs-toggle="tab" data-bs-target="#tablausers-tab-pane" type="button" role="tab" aria-controls="tablausers-tab-pane" aria-selected="true">Usuarios activos</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="usersoff-tab" data-bs-toggle="tab" data-bs-target="#usersoff-tab-pane" type="button" role="tab" aria-controls="usersoff-tab-pane" aria-selected="false">Usuarios desactivados</button>
                  </li>
                </ul>
                
                    <div class="tab-content " id="myTabContent">

                        <div class="tab-pane fade show active" id="tablausers-tab-pane" role="tabpanel" aria-labelledby="tablausers-tab" tabindex="0">
                            <table class="table">                  
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Perfiles</th>
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
                                                <td>
                                                    <a href="{{route('users.detallesdeusuario', $user) }}"><i class="bi bi-info-circle-fill"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('users.deshabilitarusuario', ['user' => $user->id]) }}" method="POST">
                                                        @csrf @method('PATCH')
                                                        <button type="submit">Deshabilitar usuario</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            {{$users->links()}}
                        </div>

                        <div class="tab-pane fade show active" id="usersoff-tab-pane" role="tabpanel" aria-labelledby="usersoff-tab" tabindex="0">
                            <table class="table">                  
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Perfiles</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($usersoff as $useroff)
                                            <tr>
                                                <td>{{$useroff->id}}</td>
                                                <td>{{$useroff->name}}</td>
                                                <td>
                                                    @foreach ($useroff->perfiles as $perfiloff)
                                                    {{$perfiloff->nombreperfil}} <br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <form action="{{ route('users.habilitarusuario', ['user' => $useroff->id]) }}" method="POST">
                                                        @csrf @method('PATCH')
                                                        <button type="submit">Habilitar usuario</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            {{$usersoff->links()}}        
                        </div>
            </div>
</div>
    
@endsection