<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::with('empleado')->get();
        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        return view('equipos.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:50',
            'marca' => 'nullable|string|max:50',
            'modelo' => 'nullable|string|max:50',
            'numero_serie' => 'nullable|string|max:100',
            'direccion_ip' => 'nullable|string|max:15',
            'estado' => 'nullable|string|max:50',
            'piso' => 'nullable|string|max:100',
            'departamento' => 'nullable|string|max:100',
            'id_empleado' => 'nullable|integer|exists:empleados,id_empleado',
            'procesador' => 'nullable|string|max:100',
            'tecnologia_disco' => 'nullable|string|max:100',
            'tecnologia_memoria' => 'nullable|string|max:100',
            'tipo_conexion' => 'nullable|string|max:60',
            'nodo' => 'nullable|string|max:60',
            'mac' => 'nullable|string|max:60',
            'sisipo' => 'nullable|string|max:60',
        ]);
        
        Equipo::create($validated);
        
        return redirect()->route('equipos.index')->with('success', 'Equipo creado exitosamente');
    }

    public function show($id) // CAMBIADO
    {
        $equipo = Equipo::with('empleado')->findOrFail($id);
        return view('equipos.show', compact('equipo'));
    }

    public function edit($id) // CAMBIADO
    {
        $equipo = Equipo::findOrFail($id);
        $empleados = Empleado::all();
        return view('equipos.edit', compact('equipo', 'empleados'));
    }

    public function update(Request $request, $id) // CAMBIADO
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:50',
            'marca' => 'nullable|string|max:50',
            'modelo' => 'nullable|string|max:50',
            'numero_serie' => 'nullable|string|max:100',
            'direccion_ip' => 'nullable|string|max:15',
            'estado' => 'nullable|string|max:50',
            'piso' => 'nullable|string|max:100',
            'departamento' => 'nullable|string|max:100',
            'id_empleado' => 'nullable|integer|exists:empleados,id_empleado',
            'procesador' => 'nullable|string|max:100',
            'tecnologia_disco' => 'nullable|string|max:100',
            'tecnologia_memoria' => 'nullable|string|max:100',
            'tipo_conexion' => 'nullable|string|max:60',
            'nodo' => 'nullable|string|max:60',
            'mac' => 'nullable|string|max:60',
            'sisipo' => 'nullable|string|max:60',
        ]);
        
        $equipo = Equipo::findOrFail($id);
        $equipo->update($validated);
        
        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado exitosamente');
    }

    public function destroy($id) // CAMBIADO
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();
        
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado exitosamente');
    }
}