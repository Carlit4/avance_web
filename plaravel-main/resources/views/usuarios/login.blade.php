<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>


    {{-- Link a bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Link a google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        body {
            background-image: linear-gradient(#98FFE0, #003817);
            min-height: 100vh;
            padding-top: 58px;
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body>

    {{-- container invisible --}}
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">

        {{-- container visible --}}
        <div class="container rounded bg-light p-3">

            <div class="row">

                <div class="col-12 text-center">
                    <h2>Inicia Sesion</h2>
                </div>

                {{-- Autenticacion --}}
                <form method="POST" action="{{ route('usuarios.autenticar') }}">
                    @csrf

                    {{-- usuario --}}
                    <div class="col-12 mb-3">
                        <label for="user">Ingrese su usuario:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.cl">
                    </div>

                    {{-- contrasenna --}}
                    <div class="col-12 mb-3">
                        <label for="pass">Ingrese su contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="########">
                    </div>

                    <div class="col-12 mb-3">
                        <a href="#">Recuperar mi contraseña</a>
                    </div>

                    {{-- Boton inicio de sesion --}}
                    <div class="col-6 mb-2">
                        <button type="submit" class="btn btn-outline-success">Iniciar Sesion</button>
                    </div>
                </form>
                {{-- Fin de Autenticacion --}}

                @if($errors->any())
                <div class="alert alert-warning py-1">
                    {{ $errors->all()[0] }}
                </div>
                @endif

            </div>
        </div>

    </div>

</body>

</html>