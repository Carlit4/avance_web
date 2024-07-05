@extends('templates.master')

@section('title', 'Arriendos')


@section('contenido-principal')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="container-fluid bg-white rounded">

        <div class="text-center">
            <h1>Devolucion: {{$vehiculo->marca}}, {{$vehiculo->patente}} ({{$vehiculo->tipo->nom_tipo}} ) </h1>
        </div>

        <form method="POST" action="{{route('arriendos.devolustore')}}">
            @csrf

            <div class="row">

                <input type="hidden" id="patente_vehiculo" name="patente_vehiculo" value="{{$vehiculo->patente}}" class="form-control">
                <input type="hidden" id="rut_cliente" name="rut_cliente" value="{{$vehiculo->rut_cliente}}" class="form-control">


                <div class="col-12 my-2">
                    <label for="img_rec" class="form-label">Imagen de Recepcion:</label>
                    <input type="file" class="form-control-file" id="img_rec" name="img_rec">
                </div>

            </div>
            
            <div class="my-3 me-2 d-flex justify-content-end">
                <button type="button" id="btnLimpiar" class="btn btn-warning me-2">Restablecer Campos</button>
                <button class="btn btn-success" type="submit">Registrar Recepcion</button>
            </div>

        </form>

    </div>
</div>
@endsection