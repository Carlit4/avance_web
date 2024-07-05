@extends('templates.master')



@section('scripts')

$(document).ready(function() {
    $('#btnLimpiar').click(function() {
        $('form')[0].reset();
    });
});

@endsection

@section('contenido-principal')
    <div class="row">
        <div class="card mt-2 ">
            <div class="card-header pt-3">
                <h5 class="card-title">Crear un nuevo usuario: </h5>
            </div >
            <div class="card-body ">
              <form method="POST" action="{{route('usuarios.store')}}" >
                @csrf
                <div>
                    <label class="form-label" for="nombre">Nombre Completo : </label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                    {{-- @error('nombre') is-invalid @enderror" value="{{old('nombre')}} --}}
                    {{-- @error('nombre')
                        <div id="nombreFeeback" class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror --}}
                </div>

                <div class="mt-2">
                    <label class="form-label" for="email">Correo electronico: </label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>  

                <div class="mt-2">
                    <label class="form-label" for="password">Contraseña: </label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>  

                <div class="mt-3">
                    <label class="form-label" for="perfil">Seleccione tipo de usuario: </label>
                    <select name="perfil" id="perfil" class="form-control">
                        {{-- <option value="">Seleccione</option> --}}
                        @foreach ($perfiles as $perfil)
                            <option value="{{$perfil->id}}">{{$perfil->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mt-3 me-2 d-flex justify-content-end">
                    <button type="button" id="btnLimpiar" class="btn btn-warning me-2">Restablecer Campos</button>
                    <button class="btn btn-success" type="submit">Registrar Usuario</button>
                </div>

              </form>
            </div>
          </div>
    </div>
@endsection