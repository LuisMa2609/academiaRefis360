@extends('layouts.app')

@section('content')
<div class="container" id="bodyRegister">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro</div>

                <div class="card-body border-top border-warning border-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class=" form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-end">Apellido</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Correo electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="d-flex align-items-center">
                                    <input type="button" value="Generar contraseña" class="btn btn-primary " onclick="generarpswd()">
                                    <input id="passwordauto" class="form-control-plaintext border-bottom flex-grow-1 m-3" name="passwordauto" readonly >
                                </div>
                            </div>
                        </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar contraseña</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                        <div class="row mb-3">
                            <label for="celular" class="col-md-4 col-form-label text-md-end">Celular</label>
                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>
                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="puesto" class="col-md-4 col-form-label text-md-end">Puesto</label>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    {!! Form::select('puesto', ['practicante' => 'Practicante', 'empleado' => 'Empleado', 'jefe de área' => 'Jefe de Área', 'supervisor' => 'Supervisor', 'gerente' => 'Gerente', 'director' => 'Director'], null, ['class' => 'form-select ', 'id' => 'floatingSelect', 'aria-label' => 'Floating label select example']) !!}
                                    <label for="floatingSelect">Especifique su puesto</label>
                                  </div>
                                @error('puesto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        @can('admin')                            
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">Perfil</label>
                                <div class="col-md-6">
                                        <ul class="list-group list-group-flush @error('perfiles') is-invalid @enderror fs-5">            
                                            @foreach ($perfiles as $perfil)
                                              <li class="list-group-item ">
                                                <input type="checkbox" name="perfiles[]" value="{{ $perfil->id }}">
                                                <label>{{ $perfil->nombreperfil }}</label>
                                              </li>
                                            @endforeach
                                        </ul>
                                        @error('perfiles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                        @endcan


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">

                                @can('admin')
                                <a href="{{ route('users.index') }}" class="btn btn-danger btnregistrocancel">Regresar</a>
                                @endcan
                                
                                @guest
                                    <a href="{{ route('login')}}" class="btn btn-danger btnregistrocancel">Cancelar</a>
                                @endguest

                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<div class="container">
    <!-- Resto del contenido-->

     <script>
        function generarpswd() {
    // Obtener el elemento input donde se mostrará la contraseña
    var input1 = document.getElementById("password"); 
    var input2 = document.getElementById("passwordauto");
    // Generar una cadena aleatoria de 8 caracteres usando Laravel
    var password = "{{ Str::random(12) }}";
    // Asignar la cadena al valor del input
    input1.value = password  ;
    input2.value = password  ;
  }
     </script>
</div>