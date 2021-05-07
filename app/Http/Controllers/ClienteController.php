<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ClienteController extends Controller
{

    //Listado de clientes

    public function list() {
        $data['users'] = Cliente::paginate(3);

        return view('clientes.list', $data);
    }
    // Formulario cliente
    public function clienteform() {
        return view('clientes.clienteform');
    }

    // Guardar Cliente

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function save(Request $request): RedirectResponse
    {
        $validator = $this->validate($request, [
           'dni'=> 'required|string|unique:empresa',
           'nombre'=> 'required|string|max:200',
           'apellidos'=> 'required|string|max:200',
           'direccion'=> 'required|string|max:200',
           'pais'=> 'required|string|max:200',
           'telefono'=> 'required|string|max:9'
        ]);
        $clientData = $request->except('_token');
        Cliente::created($clientData);

        return back()->with('clienteGuardado', 'Cliente Guardado');
    }

    public function delete($dni) {
        Cliente::destroy($dni);

        return back()->with('clienteEliminado', 'Cliente Eliminado');
    }


}
