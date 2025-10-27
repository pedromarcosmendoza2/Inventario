<?php

namespace App\Http\Controllers;

use App\Models\Impresora;
use Illuminate\Http\Request;

class ImpresoraController extends Controller
{
    public function index()
    {
        $impresoras = Impresora::all();
        return view('impresoras.index', compact('impresoras'));
    }

    public function create()
    {
        return view('impresoras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
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
        
        Impresora::create($validated);
        
        return redirect()->route('impresoras.index')->with('success', 'Impresora creada exitosamente');
    }

    public function show($id)
    {
        $impresora = Impresora::findOrFail($id);
        return view('impresoras.show', compact('impresora'));
    }

    public function edit($id)
    {
        $impresora = Impresora::findOrFail($id);
        return view('impresoras.edit', compact('impresora'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
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
        
        $impresora = Impresora::findOrFail($id);
        $impresora->update($validated);
        
        return redirect()->route('impresoras.index')->with('success', 'Impresora actualizada exitosamente');
    }

    public function destroy($id)
    {
        $impresora = Impresora::findOrFail($id);
        $impresora->delete();
        
        return redirect()->route('impresoras.index')->with('success', 'Impresora eliminada exitosamente');
    }
}