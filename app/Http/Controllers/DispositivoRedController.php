<?php

namespace App\Http\Controllers;

use App\Models\DispositivoRed;
use Illuminate\Http\Request;

class DispositivoRedController extends Controller
{
    public function index()
    {
        $dispositivos = DispositivoRed::all();
        return view('dispositivos_red.index', compact('dispositivos'));
    }

    public function create()
    {
        return view('dispositivos_red.create');
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
            'seccion' => 'nullable|string|max:100',
            'nodo' => 'nullable|string|max:60',
            'mac' => 'nullable|string|max:60',
            'sisipo' => 'nullable|string|max:60',
        ]);

        DispositivoRed::create($validated);

        return redirect()->route('dispositivos_red.index')->with('success', 'Dispositivo creado correctamente.');
    }

    public function show(DispositivoRed $dispositivos_red)
    {
        return view('dispositivos_red.show', compact('dispositivos_red'));
    }

    public function edit(DispositivoRed $dispositivos_red)
    {
        return view('dispositivos_red.edit', compact('dispositivos_red'));
    }

    public function update(Request $request, DispositivoRed $dispositivos_red)
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
            'seccion' => 'nullable|string|max:100',
            'nodo' => 'nullable|string|max:60',
            'mac' => 'nullable|string|max:60',
            'sisipo' => 'nullable|string|max:60',
        ]);

        $dispositivos_red->update($validated);

        return redirect()->route('dispositivos_red.index')->with('success', 'Dispositivo actualizado correctamente.');
    }

    public function destroy(DispositivoRed $dispositivos_red)
    {
        $dispositivos_red->delete();

        return redirect()->route('dispositivos_red.index')->with('success', 'Dispositivo eliminado correctamente.');
    }
}
