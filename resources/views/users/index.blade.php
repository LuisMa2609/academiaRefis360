@extends('layouts.app')

@section('title')

@section('content')
<div class="container ">
    <h1>Usuarios</h1>
        <div class="d-grid gap-2 d-md-flex justify-content py-3">
            <a href="{{ route('users.register')}}" class="btn btn-primary">Registrar nuevo usuario</a>
        </div>
            <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">
                <div class="table-responsive">
                    <table id="usertable" class="table table-striped">                  
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Nombre</th>
                            <th scope="col" class="text-center">Apellido</th>
                            <th scope="col" class="text-center">Puesto</th>
                            <th scope="col" class="text-center">Perfiles</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center"></th>
                            <th scope="col" class="">Status</th>
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
                                    <td class="text-center">{{$user->email}}</td>

                                    <td class="text-center">
                                        <a href="{{route('users.detallesdeusuario', $user) }}"><i class="bi bi-info-circle-fill"></i>
                                            <p>Configurar perfiles</p>
                                        </a>
                                    </td>
                                    <td class="">
                                        <user-status-updater
                                            :user-id="{{ $user->id }}"
                                            :status="{{ $user->status }}"
                                            :csrf-token="'{{ csrf_token() }}'"
                                            :update-url="{{ json_encode(route('users.updatestatus')) }}"
                                        ></user-status-updater>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</div>
@endsection

