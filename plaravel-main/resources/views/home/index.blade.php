@extends('templates.master')

@section('title', 'Home')

@section('contenido-principal')



<div class="container">


    @if(Gate::allows('usuarios-gestion'))
    <div class="card mb-3">
        <div class="card-header">
            <h2 class="card-title">Acceder al menú principal de usuarios</h2>
        </div>
        <div class="card-body">

            <p class="card-text">Desde este menú podras acceder a las distintas funcionalidades relacionadas a la
                gestion de
                los usuarios del sistema.</p>
            <a href=" {{route('usuarios.index')}} " class="btn btn-success">Ingresar al menú de usuarios</a>
        </div>
    </div>
    @endif

    <div class="row">


        <div class="col-3">
            <div class="card mb-3 h-100 w-100">
                <div class="card-body">
                    <h3 class="card-title">Vehiculos</h3>
                    <p class="card-text">Menú dedicado a la gestion de los Vehiculos almacenados en el sistema.</p>
                </div>
                <div class="card-footer" style="border-top: none">
                    <a href="{{route('vehiculos.index')}}" class="btn btn-success">Ingresar al menú de Vehiculos</a>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card mb-3 h-100 w-100">
                <div class="card-body">
                    <h3 class="card-title">Tipos de Vehiculos</h3>
                    <p class="card-text">Menú dedicado a la gestion de los Tipos de Vehiculos existentes en el sistema.
                    </p>
                </div>
                <div class="card-footer" style="border-top: none">
                    <a href="{{route('tipos.index')}}" class="btn btn-success">Ingresar al menú de tipos</a>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card mb-3 h-100 w-100">
                <div class="card-body">
                    <h3 class="card-title">Clientes</h3>
                    <p class="card-text">Menú dedicado a la gestion de los clientes en el sistema.</p>
                </div>
                <div class="card-footer" style="border-top: none">
                    <a href="{{route('clientes.index')}}" class="btn btn-success">Ingresar al menú de clientes</a>
                </div>

            </div>
        </div>

        <div class="col-3">
            <div class="card mb-3 h-100 w-100">
                <div class="card-body">
                    <h3 class="card-title">Arriendos</h3>
                    <p class="card-text">Menú dedicado a la gestion de los clientes en el sistema.</p>
                </div>
                <div class="card-footer" style="border-top: none">
                    <a href="#" class="btn btn-success">Ingresar al menú de arriendos</a>
                </div>

            </div>
        </div>



    </div>

</div>






@endsection