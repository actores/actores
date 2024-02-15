<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposUsuario = TipoUsuario::all();
        return view('tipoUsuarios.index', ['tiposUsuario' => $tiposUsuario]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipoUsuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipousuario_nombre' => 'required|string|max:255'
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('tipousuarios.index')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $tipoUsuario = new TipoUsuario();
            $tipoUsuario->nombre = $request->tipousuario_nombre;
            $tipoUsuario->save();
    
            // Guardar mensaje en la sesión
            session()->flash('success', 'Los datos se han guardado correctamente');
    
            return redirect()->route('tipousuarios.index');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(TipoUsuario $tipoUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoUsuario $tipoUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoUsuario $tipoUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoUsuario $tipoUsuario)
    {
        //
    }
}
