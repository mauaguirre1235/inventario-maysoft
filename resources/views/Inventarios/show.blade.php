

<div class="p-2 md:p-6">
    <h2 class="text-xl font-bold mb-4">Detalle de Inventario</h2>
    <div class="font-semibold text-gray-500 uppercase text-xs mb-2">Equipo</div>
    <hr class="mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
        <div>
            <label class="block text-gray-500 text-xs mb-1">Tipo</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->tipo_equipo}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">ID Equipo</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->id_equipo}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">
                @if($inventario->tipo_equipo === 'Laptop')
                    Modelo de laptop
                @else
                    Modelo CPU
                @endif
            </label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->modelo_cpu}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">
                @if($inventario->tipo_equipo === 'Laptop')
                    Número de serie de laptop
                @else
                    N° Serie CPU
                @endif
            </label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->no_serie_cpu}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">Modelo Monitor</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->modelo_monitor}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">N° Serie Monitor</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->no_serie_monitor}}" disabled>
        </div>
        @if($inventario->tipo_equipo === 'Laptop')
        <div>
            <label class="block text-gray-500 text-xs mb-1">N° Serie Cargador</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->no_serie_cargador}}" disabled>
        </div>
        @endif
        @if($inventario->tipo_equipo === 'Desktop')
        <div>
            <label class="block text-gray-500 text-xs mb-1">Teclado</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->modelo_teclado}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">N° Serie Teclado</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->no_serie_teclado}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">Modelo Mouse</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->modelo_mause}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">N° Serie Mouse</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->no_serie_mause}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">Modelo No-break</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->modelo_nobreak}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">N° Serie No-break</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->no_serie_nobreak}}" disabled>
        </div>
        @endif
    </div>
    </div>
    <div class="font-semibold text-gray-500 uppercase text-xs mt-6 mb-2">Usuario asignado</div>
    <hr class="mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
        <div>
            <label class="block text-gray-500 text-xs mb-1">Usuario</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->usuario}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">No. Empleado</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->no_empleado}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">Puesto</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->puesto}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">Área Asignada</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->area_asignada}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">Unidad Administrativa</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->unidad_administrativa}}" disabled>
        </div>
        <div>
            <label class="block text-gray-500 text-xs mb-1">No. Contacto</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->no_contacto}}" disabled>
        </div>
        <div class="md:col-span-2">
            <label class="block text-gray-500 text-xs mb-1">Correo electrónico</label>
            <input type="text" class="w-full bg-gray-100 border border-gray-200 rounded-lg px-3 py-2 font-mono" value="{{$inventario->correo_electronico}}" disabled>
        </div>
    </div>
</div>
