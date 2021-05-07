<?php
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Clientes</title>
</head>
<body>
<!-- Mensaje flash -->
@if( session('clienteGuardado') )
    {{ session('clienteGuardado') }}
@endif

<!-- Validación -->
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li> {{$error}}</li>
        @endforeach
    </ul>

@endif
<class>
    <form action="{{ route('save') }}" method="post">
        @csrf
        <header>AGREGAR CLIENTE</header>
        <label>DNI: <input type="text" name="dni" placeholder="Introduzca su DNI"
                           pattern="[0-9]{8}[A-Za-z]{1}"></label><br />
        <label>Nombre: <input type="text" name="nombre"></label><br />
        <label>Apellidos: <input type="text" name="apellidos"></label><br />
        <label>Dirección: <input type="text" name="direccion"></label><br />
        <label>País: <input type="text" name="pais"></label><br />
        <label>Teléfono: <input type="tel" name="telefono"></label><br />
        <input type="submit" name="submit" value="Enviar">
    </form>
</class>

</body>
</html>
