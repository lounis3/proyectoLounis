<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listar Clientes</title>
</head>
<body>
<h1>Página Listar Clientes</h1>
<div align="center">
    <div>
        <div>
            <a href="{{ url('form/' )}}">Agregar cliente</a>
            <h2 align="center">Clientes Admin</h2>
            <table>
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>País</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->dni}}</td>
                        <td>{{$user->nombre}}</td>
                        <td>{{$user->apellidos}}</td>
                        <td>{{$user->direccion}}</td>
                        <td>{{$user->telefono}}</td>
                        <td>{{$user->pais}}</td>
                        <td>
                            <form action="{{route('delete', $user->dni)}}" method="post">
                                @csrf @method('DELETE')

                                <button type="submit" onclick="return confirm('¿Borrar?');"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
</body>
</html>
