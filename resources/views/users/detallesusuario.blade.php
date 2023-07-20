@extends('layouts.app')

@section('tittle')

@section('content')
<div class="container">
  <h1>{{$user->name}}</h1>
  <div class="container px-2">
    <nav>
      <div class="nav nav-tabs " id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-datos-tab" data-bs-toggle="tab" data-bs-target="#nav-datos" type="button" role="tab" aria-controls="nav-datos" aria-selected="true">Datos generales</button>
        <button class="nav-link" id="nav-perfiles-tab" data-bs-toggle="tab" data-bs-target="#nav-perfiles" type="button" role="tab" aria-controls="nav-perfiles" aria-selected="false">Perfiles</button>
      </div>
    </nav>
        
    
    <div class="tab-content" id="nav-tabContent">
      <!--Datos generales-->
      <div class="tab-pane fade show active" id="nav-datos" role="tabpanel" aria-labelledby="nav-datos-tab" tabindex="0">

        <ul class="list-group list-group-flush">
          <li class="list-group-item">ID: {{$user->id}}</li>
          <li class="list-group-item">Correo: {{$user->email}}</li>
        </ul>
      </div>
      <!--Datos generales-->
        <!--Perfiles-->
        <div class="tab-pane fade" id="nav-perfiles" role="tabpanel" aria-labelledby="nav-perfiles-tab" tabindex="0">
          
          <ul class="list-group list-group-flush">            
            <form method="POST" action="{{ route('users.asignarPerfiles', ['user' => $user])}}">
              @csrf @method('PATCH')
                @foreach ($perfiles as $perfil)
                  <li class="list-group-item">
                    <input type="checkbox" name="perfiles[]" value="{{ $perfil->id }}" {{ in_array($perfil->id, $perfiles_users) ? 'checked' : '' }}>
                    <label>{{ $perfil->nombreperfil }}</label><br>
                  </li>
                @endforeach
              <button type="submit" class="btn btn-primary">Asignar/actualizar perfiles</button>
            </form>
          </ul> 

        </div>
        <!--Perfiles-->
        
    </div>
  </div>
</div>
    
@endsection