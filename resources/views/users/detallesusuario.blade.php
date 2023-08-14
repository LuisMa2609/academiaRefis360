@extends('layouts.app')

@section('tittle')

@section('content')

<div class="container">
    @include('partials.session-status')
  <h1>{{$user->name}}</h1>
  
  <div class="container bg-white shadow rounded py-3 px-3 mb-4 border-top border-warning border-3">  
    <div class="container px-2">
      <nav>
        <div class="nav nav-tabs " id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-datos-tab" data-bs-toggle="tab" data-bs-target="#nav-datos" type="button" role="tab" aria-controls="nav-datos" aria-selected="true">Datos generales</button>
          <button class="nav-link" id="nav-perfiles-tab" data-bs-toggle="tab" data-bs-target="#nav-perfiles" type="button" role="tab" aria-controls="nav-perfiles" aria-selected="false">Perfiles</button>
        </div>
      </nav>

      <h1>texto</h1>
      
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-datos" role="tabpanel" aria-labelledby="nav-datos-tab" tabindex="0">
          <ul class="list-group list-group-flush">
            <form action="{{ route('users.updateusuarios', ['user' => $user])}}" method="POST">
                @csrf @method('PATCH')
                <li class="list-group-item border-0">ID: {{$user->id}} </li>
                <li class="list-group-item border-0">Nombre/s: <input class="form-control border-2" type="text" id="name" name="name" value="{{($user->name)}}" required></li>
                <li class="list-group-item border-0">Apellido/s: <input class="form-control border-2" type="text" id="surname" name="surname" value="{{$user->surname}}" required></li>
                <li class="list-group-item border-0">Correo: <input class="form-control border-2" type="email" id="email" name="email" value="{{$user->email}}" required></li>
                <li class="list-group-item border-0">Numero de telefono: <input class="form-control border-2" type="text" id="cellphone" name="cellphone" value="{{$user->celular}}" required></li>
                <li class="list-group-item border-0">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4  "></label>
                        <div class="">
                            <div class="form-floating">
                                {!! Form::select('puesto', ['Practicante' => 'Practicante', 'Empleado' => 'Empleado', 'Jefe de Área' => 'Jefe de Área', 'Supervisor' => 'Supervisor', 'Gerente' => 'Gerente', 'Director' => 'Director'], $user->puesto, ['class' => 'form-select', 'id' => 'floatingSelect', 'aria-label' => 'Floating label select example']) !!}
                                <label for="floatingSelect">Puesto</label>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </li>

                <button type="submit" class="btn btn-primary mt-3">Actualizar usuario</button>
            </form>
          </ul>
        </div>
        <!--Datos generales-->
          <!--Perfiles-->
          <div class="tab-pane fade" id="nav-perfiles" role="tabpanel" aria-labelledby="nav-perfiles-tab" tabindex="0">
            <form method="POST" action="{{ route('users.asignarPerfiles', ['user' => $user])}}">
              	@csrf @method('PATCH')
            	<ul class="list-group list-group-flush fs-3">            
        			@foreach ($perfiles as $perfil)
        			  <li class="list-group-item ">
        			    <input type="checkbox" name="perfiles[]" value="{{ $perfil->id }}" {{ in_array($perfil->id, $perfiles_users) ? 'checked' : '' }}>
        			    <label>{{ $perfil->nombreperfil }}</label>
        			  </li>
        			@endforeach
            	</ul>
              @can('admin')
            	<button type="submit" class="btn btn-primary mt-3">Asignar/actualizar perfiles</button>
              @endcan
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
    
@endsection