<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        // Mostrar formulario de edición de perfil
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // Actualizar perfil
        return redirect()->route('profile.edit')->with('success', 'Perfil actualizado.');
    }

    public function destroy()
    {
        // Eliminar perfil o cuenta
        return redirect('/')->with('success', 'Perfil eliminado.');
    }
}
