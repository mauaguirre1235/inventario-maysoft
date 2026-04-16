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
           
        </div>
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <!-- Script para filtrar la tabla en tiempo real usando AJAX -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputBusqueda = document.getElementById('busquedaInventario');
            const filtroTipo = document.getElementById('filtroTipo');
            const tablaBody = document.querySelector('table tbody');
            let timeout = null;

            function cargarTabla() {
                const busqueda = inputBusqueda.value;
                const tipo = filtroTipo.value;
                const params = new URLSearchParams({
                    busqueda: busqueda,
                    tipo: tipo
                });
                fetch(`{{ route('inventarios.index') }}?${params.toString()}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    tablaBody.innerHTML = html;
                });
            }

            inputBusqueda.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(cargarTabla, 300);
            });
            filtroTipo.addEventListener('change', cargarTabla);
        });
        </script>
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
            @include('Inventarios.partials.tabla')
        </table>
    </div>
</div>
@endsection