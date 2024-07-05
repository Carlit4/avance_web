@extends('templates.master')

@section('contenido-principal')

<div class="my-2 mx-1">
    <h2 class="m-1"><em>Vehiculos</em></h2>
</div>

<!-- tabla  -->
<div class="row p-1">
    <div class="col">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-info">
                <tr>
                    <th class="text-center">N°</th>
                    <th>Patente</th>
                    <th>Marca</th>
                    <th>Año</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehiculos as $num=>$vehiculo)
                <tr>
                    <td class="text-center">{{$num+1}}</td>
                    <td>{{$vehiculo->patente}}</td>
                    <td>{{$vehiculo->marca}}</td>
                    <td>{{$vehiculo->anio}}</td>
                    <td>{{$vehiculo->tipo->nom_tipo}}</td>
                    <td>{{$vehiculo->estado}}</td>
                    {{-- EDIT --}}
                    <td class="text-center">
                        <a href="{{route('vehiculos.edit', $vehiculo->patente)}}" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>

                    {{-- BORRAR --}}
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#borrarModal{{$vehiculo->patente}}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
                {{-- CONFIRMACION BORRADO --}}
                <div class="modal fade" id="borrarModal{{$vehiculo->patente}}" tabindex="-1"
                    aria-labelledby="borrarModal{{$vehiculo->patente}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="borrarModal{{$vehiculo->patente}}Label">Confrimacion de
                                    borrado</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Desea borrar el vehiculo: <strong>{{$vehiculo->marca}}
                                    ({{$vehiculo->patente}})</strong>?
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('vehiculos.destroy', $vehiculo->patente)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Cancelar</button>
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
</div>
<!-- fin tabla -->
<div class="row m-2">
    <div class="d-grid gap-2 d-lg-flex justify-content-md-end">
        <a class="btn btn-primary" href="{{route('vehiculos.create')}}">
            <i class="fa-solid fa-car"></i>
            Agregar Vehiculo
        </a>
    </div>
</div>
@endsection