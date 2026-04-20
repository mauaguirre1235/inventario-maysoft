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
                   <button type="button" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition w-full text-center editar-equipo-btn" data-id="{{ $inventario->id }}">Editar</button>
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
@if(method_exists($inventarios, 'links'))
    <tr>
        <td colspan="22">
            <div class="mt-2">{!! $inventarios->links() !!}</div>
        </td>
    </tr>
@endif
