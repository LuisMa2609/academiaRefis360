@extends('layouts.app')

@section('title')

@section('content')
    
<div class="container">
    <h1>Perfiles</h1>
    <div class="container bg-white shadow rounded py-3 px-3 mb-4 ">
        <ul class="list-group list-group-flush">
            @foreach ($perfiles as $perfil)
            <li class="list-group-item">{{$perfil->nombreperfil}}</li>
            @endforeach
            <li class="list-group-item"></li>
          </ul>
    </div>
</div>

@endsection