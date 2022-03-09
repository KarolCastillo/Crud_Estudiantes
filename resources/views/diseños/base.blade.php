<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>karol090919052</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>

<!-- Image and text-->

<ul class="nav nav-tabs">

    <li class="nav-item">
        <a class="nav-link" href="{{url('/LISTADO')}}">LISTADO ESTUDIANTES</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/CREAR')}}">INGRESAR NUEVO ESTUDIANTE</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/LISTADO_GRADO')}}">LISTA GRADO</a>
    </li>

</ul>

<div class="container">
    @yield('content')
</div>

</body>
</html>
