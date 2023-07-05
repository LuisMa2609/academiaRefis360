@extends('layouts.app')

@section('title')

@section('content')

    @can('admin')
    <dir>
      <button><a href="{{ route('users.index')}}">Usuarios</a></button>
      <button><a href="{{ route('permisos')}}">Perfil de usuario</a></button>
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
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Guia 1</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, dolore laborum expedita laudantium temporibus, atque, earum repellendus quibusdam libero dignissimos iusto! Nemo nisi soluta architecto deleniti. Id dignissimos odit sunt.</td>
                    <td><a href="">Link</a></td>
                  </tr>
                  <tr>
                    <td>Guia 2</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, delectus? Consequatur dicta eos voluptatibus nemo, ipsum, eum consequuntur rerum pariatur fugiat nihil voluptatum soluta, adipisci dignissimos consectetur debitis! Sint, eos.</td>
                    <td><a href="">Link</a></td>
                  </tr>
                  <tr>
                    <td >Guia 3</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim dolorum iure delectus obcaecati ea animi, cum quaerat sequi itaque provident consequuntur. Accusantium earum, aliquam voluptatum minima repellat ab minus odio?</td>
                    <td><a href="">Link</a></td>
                  </tr>
                </tbody>
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
                    <td>Guia 1</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, dolore laborum expedita laudantium temporibus, atque, earum repellendus quibusdam libero dignissimos iusto! Nemo nisi soluta architecto deleniti. Id dignissimos odit sunt.</td>
                    <td><a href="">Link</a></td>
                  </tr>
                  <tr>
                    <td>Guia 2</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, delectus? Consequatur dicta eos voluptatibus nemo, ipsum, eum consequuntur rerum pariatur fugiat nihil voluptatum soluta, adipisci dignissimos consectetur debitis! Sint, eos.</td>
                    <td><a href="">Link</a></td>
                  </tr>
                  <tr>
                    <td >Guia 3</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim dolorum iure delectus obcaecati ea animi, cum quaerat sequi itaque provident consequuntur. Accusantium earum, aliquam voluptatum minima repellat ab minus odio?</td>
                    <td><a href="">Link</a></td>
                  </tr>
                </tbody>
              </table>        
        </div>


        

@endsection