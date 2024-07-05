@extends('templates.master')

@section('contenido-principal')
<h4>Arriendos del cliente <strong>{{$cliente->rut}}</strong></h4>
<div class="row">
    @if (count($cliente->arriendo)==0)
    <div class="col">
        <div class="alert alert-info">
            Este equipo no tiene jugadores registrados
        </div>
    </div>
    @endif
</div>
<div class="row mt-3">
    <div class="col mt-3 me-2 d-flex justify-content-end">
        <a href="{{route('clientes.index')}}" class="btn btn-info text-white">Volver a Clientes</a>
    </div>
</div>
@endsection

@foreach ($equipo->jugadores as $jugador)
<div class="d-flex justify-content-center col-12 col-md-4 col-lg-2">
    <div class="card">
        <img src="{{Storage::url($jugador->imagen)}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$jugador->nombre}} {{$jugador->apellido}}</h5>
          <ul class="list-group list-group-flash">
            <li class="list-group-item">
                <strong>Poscion : </strong> {{$jugador->posicion}}
            </li>
            <li class="list-group-item">
                <strong>Numero : </strong> {{$jugador->numero_camiseta}}
            </li>
          </ul>
        </div>
      </div>
</div>
@endforeach
