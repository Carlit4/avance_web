@extends('templates.master')

@section('scripts')

$(document).ready(function() {
    $('#btnLimpiar').click(function() {
        // Vaciar los campos del formulario
        $('form')[0].reset(); // Esto vacía todos los campos del primer formulario encontrado en la página
    });
});

@endsection


@section('contenido-principal')
<div class="row">
    <div class="card mt-2 ">
        <div class="card-header pt-3">
            <h5 class="card-title">Editar al usuario: <strong>{{$usuario->nombre}}</strong></h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('usuarios.update', $usuario->email)}}" >
            @csrf
            @method('put')
            <div>
                <label class="form-label" for="nombre">Nombre Completo : </label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$usuario->nombre}}">
            </div>

            <div class="mt-2">
                <label class="form-label" for="email">Correo electronico: </label>
                <input type="email" name="email" id="email" class="form-control" value="{{$usuario->email}}">
            </div>  

            <div class="mt-3">
                <label class="form-label" for="perfil">Seleccione tipo de usuario: </label>
                <select name="perfil" id="perfil" class="form-control">
                    {{-- <option value="">Seleccione</option> --}}
                    @foreach ($perfiles as $perfil)
                        <option value="{{$perfil->id}}" @if($usuario->perfil_id == $perfil->id) selected="selected" @endif>{{$perfil->nombre}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="m-3 d-flex justify-content-end">

                <button type="button" id="btnLimpiar" class="btn btn-warning me-1">Restablecer Campos</button>

                <button type="submit" class="btn btn-success ms-2">Aplicar Cambios</button>
            </div>

          </form>
        </div>
      </div>
</div>
@endsection