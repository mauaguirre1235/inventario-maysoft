<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario; 

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventarios = Inventario::all();
        return view('Inventarios.index', compact('inventarios'));  
    }

    /**
     * Show the form for creating a new resource.
     */
   
        public function create()
        {
            return view('Inventarios.create');
        }

    /**
     * Store a newly created resource in storage.
     */
  
        public function store(Request $request)
        {
            $data = $request->validate([
                'no_resguardo' => 'required|unique:inventarios,no_resguardo',
                'id_equipo' => 'required|unique:inventarios,id_equipo',
                'tipo_equipo' => 'required',
                'modelo_cpu' => 'nullable',
                'no_serie_cpu' => 'nullable',
                'modelo_monitor' => 'nullable',
                'no_serie_monitor' => 'nullable',
                'modelo_teclado' => 'nullable',
                'no_serie_cargador' => 'nullable',
                'no_serie_teclado' => 'nullable',
                'modelo_mause' => 'nullable',
                'no_serie_mause' => 'nullable',
                'modelo_nobreak' => 'nullable',
                'no_serie_nobreak' => 'nullable',
                'usuario' => 'nullable',
                'no_empleado' => 'nullable',
                'puesto' => 'nullable',
                'area_asignada' => 'nullable',
                'unidad_administrativa' => 'nullable',
                'no_contacto' => 'nullable',
                'correo_electronico' => 'nullable|email',
            ], [
                'no_resguardo.unique' => 'El número de resguardo ya existe.',
                'id_equipo.unique' => 'El ID del equipo ya existe.'
            ]);
            Inventario::create($data);
            return redirect()->route('inventarios.index')->with('success', 'Inventario creado correctamente.');
        }

    /**
     * Display the specified resource.
     */
   
        public function show($id)
        {
            $inventario = Inventario::findOrFail($id);
            return view('Inventarios.show', compact('inventario'));
        }

    /**
     * Show the form for editing the specified resource.
     */
   
        public function edit($id)
        {
            $inventario = Inventario::findOrFail($id);
            return view('Inventarios.edit', compact('inventario'));
        }

    /**
     * Update the specified resource in storage.
     */
  
        public function update(Request $request, $id)
        {
            $data = $request->validate([
                'no_resguardo' => 'required|unique:inventarios,no_resguardo',
                'id_equipo' => 'required|unique:inventarios,id_equipo',
                'tipo_equipo' => 'required',
                'modelo_cpu' => 'nullable',
                'no_serie_cpu' => 'nullable',
                'modelo_monitor' => 'nullable',
                'no_serie_monitor' => 'nullable',
                'modelo_teclado' => 'nullable',
                'no_serie_cargador' => 'nullable',
                'no_serie_teclado' => 'nullable',
                'modelo_mause' => 'nullable',
                'no_serie_mause' => 'nullable',
                'modelo_nobreak' => 'nullable',
                'no_serie_nobreak' => 'nullable',
                'usuario' => 'nullable',
                'no_empleado' => 'nullable',
                'puesto' => 'nullable',
                'area_asignada' => 'nullable',
                'unidad_administrativa' => 'nullable',
                'no_contacto' => 'nullable',
                'correo_electronico' => 'nullable|email',
            ], [
                'no_resguardo.unique' => 'El número de resguardo ya existe.',
                'id_equipo.unique' => 'El ID del equipo ya existe.'
            ]);
            $inventario = Inventario::findOrFail($id);
            $inventario->update($data);
            return redirect()->route('inventarios.index')->with('success', 'Inventario actualizado correctamente.');
        }

    /**
     * Remove the specified resource from storage.
     */
        
        public function destroy($id)
        {
            $inventario = Inventario::findOrFail($id);
            $inventario->delete();
            return redirect()->route('inventarios.index')->with('success', 'Inventario eliminado correctamente.');
        }
}
