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
              <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
            </div>
          </nav>
          
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-datos" role="tabpanel" aria-labelledby="nav-datos-tab" tabindex="0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ID: {{$user->id}}</li>
                    <li class="list-group-item">Correo: {{$user->email}}</li>
                  </ul>
            </div>

            <div class="tab-pane fade" id="nav-perfiles" role="tabpanel" aria-labelledby="nav-perfiles-tab" tabindex="0">
                <ul class="list-group list-group-flush">
                  @foreach ($user->perfiles as $perfil)
                  <li class="list-group-item">{{$perfil->nombreperfil}}</li>
                  @endforeach
                </ul>


                @foreach ($perfiles as $prfil)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      {{$prfil->nombreperfil}}
                    </label>
                </div>
                @endforeach

            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
          </div>
    </div>
</div>
    
@endsection