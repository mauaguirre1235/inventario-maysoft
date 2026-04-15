@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Inventario de equipos</h1>
            <div class="text-gray-500 text-sm">{{ $inventarios->count() }} equipos registrados · Actualizado hoy</div>
        </div>
        <a href="{{ route('inventarios.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Nuevo equipo</a>
    </div>
    <!-- Dashboard o Resumen -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded shadow p-4 flex flex-col items-center">
            <span class="text-lg font-bold">{{ $inventarios->count() }}</span>
            <span class="text-blue-600 text-xs font-semibold">Registrados</span>
        </div>
      
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200 text-xs font-mono whitespace-nowrap">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-2 py-1">No. Resguardo</th>
                    <th class="px-2 py-1">Id Equipo</th>
                    <th class="px-2 py-1">Tipo Equipo</th>
                    <th class="px-2 py-1">Modelo CPU</th>
                    <th class="px-2 py-1">No. Serie CPU</th>
                    <th class="px-2 py-1">Modelo Monitor</th>
                    <th class="px-2 py-1">No. Serie Monitor</th>
                    <th class="px-2 py-1">No. Serie Cargador</th>
                    <th class="px-2 py-1">Modelo Teclado</th>
                    <th class="px-2 py-1">No. Serie Teclado</th>
                    <th class="px-2 py-1">Modelo Mause</th>
                    <th class="px-2 py-1">No. Serie Mause</th>
                    <th class="px-2 py-1">Modelo NoBreak</th>
                    <th class="px-2 py-1">No. de serie NoBreak</th>
                    <th class="px-2 py-1">Usuario</th>
                    <th class="px-2 py-1">No. de empleado</th>
                    <th class="px-2 py-1">Puesto</th>
                    <th class="px-2 py-1">Área Asignada</th>
                    <th class="px-2 py-1">Unidad Administrativa</th>
                    <th class="px-2 py-1">No. Contacto</th>
                    <th class="px-2 py-1">Correo Electrónico</th>
                    <th class="px-2 py-1 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($inventarios as $inventario)
                    <tr>
                        <td class="px-2 py-1">{{ $inventario->no_resguardo }}</td>
                        <td class="px-2 py-1">{{ $inventario->id_equipo }}</td>
                        <td class="px-2 py-1">{{ $inventario->tipo_equipo }}</td>
                        <td class="px-2 py-1">{{ $inventario->modelo_cpu }}</td>
                        <td class="px-2 py-1">{{ $inventario->no_serie_cpu }}</td>
                        <td class="px-2 py-1">{{ $inventario->modelo_monitor }}</td>
                        <td class="px-2 py-1">{{ $inventario->no_serie_monitor }}</td>
                        <td class="px-2 py-1">{{ $inventario->no_serie_cargador }}</td>
                        <td class="px-2 py-1">{{ $inventario->modelo_teclado }}</td>
                        <td class="px-2 py-1">{{ $inventario->no_serie_teclado }}</td>
                        <td class="px-2 py-1">{{ $inventario->modelo_mause }}</td>
                        <td class="px-2 py-1">{{ $inventario->no_serie_mause }}</td>
                        <td class="px-2 py-1">{{ $inventario->modelo_nobreak }}</td>
                        <td class="px-2 py-1">{{ $inventario->no_serie_nobreak }}</td>
                        <td class="px-2 py-1">{{ $inventario->usuario }}</td>
                        <td class="px-2 py-1">{{ $inventario->no_empleado }}</td>
                        <td class="px-2 py-1">{{ $inventario->puesto }}</td>
                        <td class="px-2 py-1">{{ $inventario->area_asignada }}</td>
                        <td class="px-2 py-1">{{ $inventario->unidad_administrativa }}</td>
                        <td class="px-2 py-1">{{ $inventario->no_contacto }}</td>
                        <td class="px-2 py-1">{{ $inventario->correo_electronico }}</td>
                        <td class="px-2 py-1 text-center">
                            <div class="flex flex-col gap-1 items-center justify-center min-w-[90px]">
                                <a href="{{ route('inventarios.show', $inventario) }}" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 transition w-full text-center">Ver</a>
                                <a href="{{ route('inventarios.edit', $inventario) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition w-full text-center">Editar</a>
                                <form action="{{ route('inventarios.destroy', $inventario) }}" method="POST" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition w-full text-center" onclick="return confirm('¿Seguro que deseas eliminar este inventario?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection