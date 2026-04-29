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
        $query = Inventario::query();
        // Filtro de búsqueda general
        if (request('busqueda')) {
            $busqueda = request('busqueda');
            $query->where(function($q) use ($busqueda) {
                $q->where('no_resguardo', 'like', "%$busqueda%")
                  ->orWhere('id_equipo', 'like', "%$busqueda%")
                  ->orWhere('tipo_equipo', 'like', "%$busqueda%")
                  ->orWhere('modelo_cpu', 'like', "%$busqueda%")
                  ->orWhere('no_serie_cpu', 'like', "%$busqueda%")
                  ->orWhere('modelo_monitor', 'like', "%$busqueda%")
                  ->orWhere('no_serie_monitor', 'like', "%$busqueda%")
                  ->orWhere('usuario', 'like', "%$busqueda%")
                  ->orWhere('area_asignada', 'like', "%$busqueda%")
                  ->orWhere('unidad_administrativa', 'like', "%$busqueda%")
                  ->orWhere('correo_electronico', 'like', "%$busqueda%")
                  ;
            });
        }
        // Filtro por tipo
        if (request('tipo')) {
            $query->where('tipo_equipo', request('tipo'));
        }
        // Filtro por estado (si lo agregas en el futuro)
        // if (request('estado')) {
        //     $query->where('estado', request('estado'));
        // }
        $inventarios = $query->paginate(20);
        if (request()->ajax()) {
            return view('Inventarios.partials.tabla', compact('inventarios'))->render();
        }
        return view('Inventarios.index', compact('inventarios'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        if (request()->ajax()) {
            return view('Inventarios.partials.show', compact('inventario'))->render();
        }
        return view('Inventarios.show', compact('inventario'));
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
     * Show the form for editing the specified resource.
     */
   
        public function edit($id)
        {
            $inventario = Inventario::findOrFail($id);
            if (request()->ajax()) {
                return view('Inventarios.edit', compact('inventario'));
            }
            return view('Inventarios.edit', compact('inventario'));
        }

    /**
     * Update the specified resource in storage.
     */
  
        public function update(Request $request, $id)
        {
            $data = $request->validate([
                'no_resguardo' => 'required|unique:inventarios,no_resguardo,' . $id . ',id',
                'id_equipo' => 'required|unique:inventarios,id_equipo,' . $id . ',id',
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
