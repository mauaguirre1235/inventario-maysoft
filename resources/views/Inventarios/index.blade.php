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
    <!-- Barra de búsqueda y filtros -->
    <div class="bg-white rounded-t px-4 pt-4 pb-2 border border-b-0 flex flex-col md:flex-row md:items-center md:justify-between mb-0">
        <div class="w-full md:w-1/2 flex items-center mb-2 md:mb-0">
            <input type="text" id="busquedaInventario" name="busqueda" placeholder="Buscar por usuario, serie, modelo, área..." class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <div class="flex gap-2 w-full md:w-auto">
            <select class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" name="tipo" id="filtroTipo">
                <option value="">Todos los tipos</option>
                <option value="Desktop">Desktop</option>
                <option value="Laptop">Laptop</option>
                <!-- Agrega más tipos si es necesario -->
            </select>
            <select class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" name="estado" id="filtroEstado">
                <option value="">Todos los estados</option>
                <option value="Activo">Activo</option>
                <option value="En reparación">En reparación</option>
                <option value="Dado de baja">Dado de baja</option>
                <!-- Agrega más estados si es necesario -->
            </select>
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
                                <button type="button" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 transition w-full text-center ver-equipo-btn" data-id="{{ $inventario->id }}">Ver</button>
                                <a href="{{ route('inventarios.edit', $inventario) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition w-full text-center">Editar</a>
                                <form action="{{ route('inventarios.destroy', $inventario) }}" method="POST" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition w-full text-center" onclick="return confirm('¿Seguro que deseas eliminar este inventario?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    <!-- Modal para mostrar detalles del equipo -->
                    <div id="modalEquipo" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
                        <div class="bg-white rounded-lg shadow-lg max-w-3xl w-full max-h-[90vh] flex flex-col relative">
                            <button id="cerrarModalEquipo" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-2xl font-bold">&times;</button>
                            <div id="contenidoEquipo" class="overflow-y-auto p-8 flex-1">
                                <!-- Aquí se cargan los datos por AJAX -->
                                <div class="text-center text-gray-400">Cargando...</div>
                            </div>
                            <div class="p-4 border-t flex justify-end bg-white sticky bottom-0">
                                <button id="cerrarModalEquipoBtn" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Cerrar</button>
                            </div>
                        </div>
                    </div>

                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Abrir modal y cargar datos por AJAX
                        document.querySelectorAll('.ver-equipo-btn').forEach(function(btn) {
                            btn.addEventListener('click', function() {
                                const id = this.getAttribute('data-id');
                                const modal = document.getElementById('modalEquipo');
                                const contenido = document.getElementById('contenidoEquipo');
                                modal.classList.remove('hidden');
                                contenido.innerHTML = '<div class="text-center text-gray-400">Cargando...</div>';
                                fetch(`/inventarios/${id}`)
                                    .then(res => res.ok ? res.text() : Promise.reject('Error al cargar'))
                                    .then(html => {
                                        contenido.innerHTML = html;
                                    })
                                    .catch(() => {
                                        contenido.innerHTML = '<div class="text-center text-red-500">Error al cargar los datos.</div>';
                                    });
                            });
                        });
                        // Cerrar modal (ícono)
                        document.getElementById('cerrarModalEquipo').addEventListener('click', function() {
                            document.getElementById('modalEquipo').classList.add('hidden');
                        });
                        // Cerrar modal (botón)
                        document.getElementById('cerrarModalEquipoBtn').addEventListener('click', function() {
                            document.getElementById('modalEquipo').classList.add('hidden');
                        });
                        // Cerrar modal al hacer click fuera del contenido
                        document.getElementById('modalEquipo').addEventListener('click', function(e) {
                            if (e.target === this) this.classList.add('hidden');
                        });
                    });
                    </script>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection