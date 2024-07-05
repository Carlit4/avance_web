@extends('templates.master')



@section('scripts')

$(document).ready(function() {
    $('#btnLimpiar').click(function() {
        $('form')[0].reset(); // Esto vacía todos los campos del primer formulario encontrado en la página
    });
});

@endsection


@section('contenido-principal')
<div class="row my-2 mx-1">
    <h2 class="m-1"><em>Clientes Registrados</em></h2>
</div>

<div class="row">
    {{-- FORM --}}
    <div class=" col-12 col-lg-4 mt-2 mt-lg-0">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Agregar nuevo cliente:</h5>
            </div>
            <div class="card-body">
                <form action="{{route('clientes.store')}}" method="POST">
                    @csrf
                    <div>
                        <label for="rut" class="form-label">Rut: </label>
                        <input type="text" class="form-control" id="rut" name="rut">
                    </div>
                    <div>
                        <label for="nombre" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div>
                        <label for="fecha_nac" class="form-label">Fecha de nacimiento: </label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
                    </div>
                    <div class="mt-3 me-2 d-flex justify-content-end">
                        <button class="btn btn-sm btn-warning me-2" type="button" id="btnLimpiar">Restablecer</button>

                        <button class="btn btn-sm btn-success" type="submit">Registrar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- FORM --}}

    {{-- TABLA --}}
    <div class="col-12 col-lg-8 order-lg-first mt-3 mt-lg-0">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-info">
                <tr>
                    <th class="text-center">N°</th>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Fecha nacimiento</th>
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $num=>$cliente)
                <tr>
                    <td class="text-center">{{$num+1}}</td>
                    <td>{{$cliente->rut}}</td>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->fecha_nac}}</td>

                    {{-- EDITAR --}}
                    <td class="text-center">
                        <a href="{{route('clientes.edit', $cliente->rut)}}" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>

                    <td class="text-center">
                        <a href="{{route('clientes.show', $cliente->rut)}}" class="btn btn-sm btn-success">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </a>
                    </td>

                    {{-- BORRAR --}}
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#borrarModal{{$cliente->rut}}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
                {{-- CONFIRMACION BORRADO --}}
                <div class="modal fade" id="borrarModal{{$cliente->rut}}" tabindex="-1" aria-labelledby="borrarModal{{$cliente->rut}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="borrarModal{{$cliente->rut}}Label">Confrimacion de borrado</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Desea borrar al cliente: <strong>{{$cliente->rut}}</strong>?
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="{{route('clientes.destroy', $cliente->rut)}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-info">Borrar</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- TABLA --}}
</div>
@endsection