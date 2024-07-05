@extends('templates.master')

@section('contenido-principal')
    <div class="my-2 mx-1">
        <h2 class="m-1"><em>Usuarios</em></h2>
    </div>
    <!-- tabla  -->
    <div class="row p-1">
        <div class="col">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-info">
                    <tr>
                        <th class="text-center">N°</th>
                        <th>Correo</th>
                        <th class="d-none d-lg-block">Nombre</th>
                        <th>Tipo</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $num=>$usuario)
                    <tr>
                        <td class="text-center">{{$num+1}}</td>
                        <td>{{$usuario->email}}
                            <div class="d-lg-none">
                                <small>{{$usuario->nombre}}</small>
                            </div>
                        </td>
                        <td class="d-none d-lg-block">{{$usuario->nombre}}</td>
                        <td>{{$usuario->perfil->nombre ?? 'N/A' }}</td>

                        {{-- EDIT --}}
                        <td class="text-center" >
                            <a href="{{route('usuarios.edit', $usuario->email)}}" class="btn btn-sm btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>

                        {{-- BORRAR --}}
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-danger @if($usuario->perfil_id == 1 and $usuario->email == Auth::user()->email) disabled @endif"  data-bs-toggle="modal"
                                data-bs-target="#borrarModal{{$usuario->email}}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    {{-- CONFIRMACION BORRADO --}}
                    <div class="modal fade" id="borrarModal{{$usuario->email}}" tabindex="-1"
                        aria-labelledby="borrarModal{{$usuario->email}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="borrarModal{{$usuario->email}}Label">Confrimacion
                                        de borrado</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Desea borrar al usuario: <strong>{{$usuario->nombre}}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{route('usuarios.destroy', $usuario->email)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-success"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Borrar</button>
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
            <a class="btn btn-primary" href="{{route('usuarios.create')}}">
                <i class="fa-solid fa-user-plus"></i>
                Crear Usuario
            </a>
        </div>
    </div>
    @endsection()