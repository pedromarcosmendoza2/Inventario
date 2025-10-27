<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:60',
            'apellido_paterno' => 'nullable|string|max:60',
            'apellido_materno' => 'nullable|string|max:60',
            'cargo' => 'nullable|string|max:100',
            'piso' => 'nullable|string|max:100',
            'departamento' => 'nullable|string|max:100',
            'seccion' => 'nullable|string|max:100',
            'extension' => 'nullable|string|max:20',
            'tipo_conexion' => 'nullable|string|max:60',
            'nodo' => 'nullable|string|max:60',
            'mac' => 'nullable|string|max:60',
            'sisipo' => 'nullable|string|max:60',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    public function show($id_empleado)
    {
        $empleado = Empleado::findOrFail($id_empleado);
        return view('empleados.show', compact('empleado'));
    }

    public function edit($id_empleado)
    {
        $empleado = Empleado::findOrFail($id_empleado);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id_empleado)
    {
        $request->validate([
            'nombre' => 'required|string|max:60',
            'apellido_paterno' => 'nullable|string|max:60',
            'apellido_materno' => 'nullable|string|max:60',
            'cargo' => 'nullable|string|max:100',
            'piso' => 'nullable|string|max:100',
            'departamento' => 'nullable|string|max:100',
            'seccion' => 'nullable|string|max:100',
            'extension' => 'nullable|string|max:20',
            'tipo_conexion' => 'nullable|string|max:60',
            'nodo' => 'nullable|string|max:60',
            'mac' => 'nullable|string|max:60',
            'sisipo' => 'nullable|string|max:60',
        ]);

        $empleado = Empleado::findOrFail($id_empleado);
        $empleado->update($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy($id_empleado)
    {
        $empleado = Empleado::findOrFail($id_empleado);
        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
