<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validation
        $request->validate([
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'anio' => 'required|integer|min:1900|max:' . date('Y'),
            'placa' => 'required|string|max:10|unique:vehiculos,placa',
            'color' => 'required|string|max:30',
            'propietario' => 'required|string|max:100',
        ]);

        // Crear vehículo
        Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    //
    public function show(Vehiculo $vehiculo)
    {
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    //funcion para editar
    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        // Validación
        $request->validate([
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'anio' => 'required|integer|min:1900|max:' . date('Y'),
            'placa' => 'required|string|max:10|unique:vehiculos,placa,' . $vehiculo->id,
            'color' => 'required|string|max:30',
            'propietario' => 'required|string|max:100',
        ]);

        // Actualizar vehículo
        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo actualizado exitosamente');
    }

    // ELIMINAR VEHÍCULO (Destroy)
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
         $vehiculo->delete();

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo eliminado exitosamente');
    }
}
