@extends('templates.master')

@section('title', 'Ingresar arriendo')


@section('contenido-principal')

<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="container-fluid bg-white rounded">

        <div class="text-center">
            <h1>Arrendar: {{$vehiculo->marca}}, {{$vehiculo->patente}} ({{$vehiculo->tipo->nom_tipo}}) </h1>
        </div>

        <form method="POST" action="{{route('arriendos.store')}}">
            @csrf

            <div class="row">

                <div class="col-12 my-2">
                    <label for="rut_cliente">Cliente: </label>
                    <select name="rut_cliente" id="rut_cliente" class="form-select" aria-label="Seleccione un cliente:">
                        @foreach($clientes as $index => $cliente)
                        <option value="{{$cliente->rut}}">{{$cliente->rut}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" id="patente_vehiculo" name="patente_vehiculo" value="{{$vehiculo->patente}}" class="form-control">

                <div class="col-12 my-2">
                    <label for="fecha_ini" class="form-label">Fecha de inicio: </label>
                    <input type="date" class="form-control" id="fecha_ini" name="fecha_ini">
                </div>

                <div class="col-12 my-2">
                    <label for="fecha_ter" class="form-label">Fecha de termino: </label>
                    <input type="date" class="form-control" id="fecha_ter" name="fecha_ter">
                </div>

                <div class="col-12 my-2">
                    <label for="img_ent" class="form-label">Imagen de entrega:</label>
                    <input type="file" class="form-control-file" id="img_ent" name="img_ent">
                </div>

            </div>
            
            <div class="my-3 me-2 d-flex justify-content-end">
                <button type="button" id="btnLimpiar" class="btn btn-warning me-2">Restablecer Campos</button>
                <button class="btn btn-success" type="submit">Registrar Arriendo</button>
            </div>

        </form>

    </div>
</div>



@endsection
