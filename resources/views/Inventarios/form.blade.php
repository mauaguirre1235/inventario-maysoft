
{{-- Solo campos del formulario, sin form, sin endsection --}}

<!-- Identificacion -->
<h3 class="font-semibold text-gray-700 mb-2 mt-4 border-b pb-1">Identificacion</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium">No. de resguardo *</label>
        <input type="text" name="no_resguardo" class="w-full border rounded px-3 py-2" required value="{{ old('no_resguardo', $inventario->no_resguardo ?? '')}}">
        @error('no_resguardo')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">ID del equipo *</label>
        <input type="text" name="id_equipo" class="w-full border rounded px-3 py-2" required value="{{ old('id_equipo', $inventario->id_equipo ?? '') }}">
        @error('id_equipo')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">Tipo de equipo *</label>
        <select name="tipo_equipo" id="tipo_equipo" class="w-full border rounded px-3 py-2" required {{ isset($inventario) ? 'disabled' : '' }}>
            <option value="">Selecciona...</option>
            <option value="Desktop" {{ old('tipo_equipo', $inventario->tipo_equipo ?? '') == 'Desktop' ? 'selected' : '' }}>Escritorio</option>
            <option value="Laptop" {{ old('tipo_equipo', $inventario->tipo_equipo ?? '') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
        </select>
        @if(isset($inventario))
            <input type="hidden" name="tipo_equipo" value="{{ $inventario->tipo_equipo }}">
        @endif
    </div>
</div>
<div id="cargador_field" style="display:none;" class="mb-4">
    <label class="block text-sm font-medium">N° serie cargador</label>
    <input type="text" name="no_serie_cargador" id="input_no_serie_cargador" class="w-full border rounded px-3 py-2" value="{{ old('no_serie_cargador', $inventario->no_serie_cargador ?? '') }}">
</div>

<!-- CPU -->
<h3 class="font-semibold text-gray-700 mb-2 mt-4 border-b pb-1">CPU / Laptop</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label id="label_modelo_cpu" class="block text-sm font-medium">Modelo CPU</label>
        <input type="text" name="modelo_cpu" id="input_modelo_cpu" class="w-full border rounded px-3 py-2" value="{{ old('modelo_cpu', $inventario->modelo_cpu ?? '') }}">
    </div>
    <div>
        <label id="label_no_serie_cpu" class="block text-sm font-medium">No° de Serie CPU</label>
        <input type="text" name="no_serie_cpu" id="input_no_serie_cpu" class="w-full border rounded px-3 py-2" value="{{ old('no_serie_cpu', $inventario->no_serie_cpu ?? '') }}">
    </div>
</div>

<!-- Periféricos -->
<h3 class="font-semibold text-gray-700 mb-2 mt-4 border-b pb-1">Periféricos</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium">Modelo Monitor</label>
        <input type="text" name="modelo_monitor" id="input_modelo_monitor" class="w-full border rounded px-3 py-2" value="{{ old('modelo_monitor', $inventario->modelo_monitor ?? '') }}">
    </div>
    <div>
        <label class="block text-sm font-medium">N° serie monitor</label>
        <input type="text" name="no_serie_monitor" id="input_no_serie_monitor" class="w-full border rounded px-3 py-2" value="{{ old('no_serie_monitor', $inventario->no_serie_monitor ?? '') }}">
    </div>
    <div id="teclado_fields">
        <label class="block text-sm font-medium">Modelo teclado</label>
        <input type="text" name="modelo_teclado" id="input_modelo_teclado" class="w-full border rounded px-3 py-2" value="{{ old('modelo_teclado', $inventario->modelo_teclado ?? '') }}">
    </div>
    <div id="teclado_serie_fields">
        <label class="block text-sm font-medium">N° serie teclado</label>
        <input type="text" name="no_serie_teclado" id="input_no_serie_teclado" class="w-full border rounded px-3 py-2" value="{{ old('no_serie_teclado', $inventario->no_serie_teclado ?? '') }}">
    </div>
    <div id="mause_fields">
        <label class="block text-sm font-medium">Modelo mouse</label>
        <input type="text" name="modelo_mause" id="input_modelo_mause" class="w-full border rounded px-3 py-2" value="{{ old('modelo_mause', $inventario->modelo_mause ?? '') }}">
    </div>
    <div id="mause_serie_fields">
        <label class="block text-sm font-medium">N° serie mouse</label>
        <input type="text" name="no_serie_mause" id="input_no_serie_mause" class="w-full border rounded px-3 py-2" value="{{ old('no_serie_mause', $inventario->no_serie_mause ?? '') }}">
    </div>
    <div id="nobreak_fields">
        <label class="block text-sm font-medium">Modelo no-break</label>
        <input type="text" name="modelo_nobreak" id="input_modelo_nobreak" class="w-full border rounded px-3 py-2" value="{{ old('modelo_nobreak', $inventario->modelo_nobreak ?? '') }}">
    </div>
    <div id="nobreak_serie_fields">
        <label class="block text-sm font-medium">N° serie no-break</label>
        <input type="text" name="no_serie_nobreak" id="input_no_serie_nobreak" class="w-full border rounded px-3 py-2" value="{{ old('no_serie_nobreak', $inventario->no_serie_nobreak ?? '') }}">
    </div>
</div>

<!-- Usuario y área -->
<h3 class="font-semibold text-gray-700 mb-2 mt-4 border-b pb-1">Usuario y área</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium">Usuario</label>
        <input type="text" name="usuario" class="w-full border rounded px-3 py-2" value="{{ old('usuario', $inventario->usuario ?? '') }}">
    </div>
    <div>
        <label class="block text-sm font-medium">N° de empleado</label>
        <input type="text" name="no_empleado" class="w-full border rounded px-3 py-2" value="{{ old('no_empleado', $inventario->no_empleado ?? '') }}">
    </div>
    <div>
        <label class="block text-sm font-medium">Puesto</label>
        <input type="text" name="puesto" class="w-full border rounded px-3 py-2" value="{{ old('puesto', $inventario->puesto ?? '') }}">
    </div>
    <div>
        <label class="block text-sm font-medium">Área asignada</label>
        <input type="text" name="area_asignada" class="w-full border rounded px-3 py-2" value="{{ old('area_asignada', $inventario->area_asignada ?? '') }}">
    </div>
    <div>
        <label class="block text-sm font-medium">Unidad administrativa</label>
        <input type="text" name="unidad_administrativa" class="w-full border rounded px-3 py-2" value="{{ old('unidad_administrativa', $inventario->unidad_administrativa ?? '') }}">
    </div>
    <div>
        <label class="block text-sm font-medium">No. contacto</label>
        <input type="text" name="no_contacto" class="w-full border rounded px-3 py-2" value="{{ old('no_contacto', $inventario->no_contacto ?? '') }}">
    </div>
    <div>
        <label class="block text-sm font-medium">Correo electrónico</label>
        <input type="email" name="correo_electronico" class="w-full border rounded px-3 py-2" value="{{ old('correo_electronico', $inventario->correo_electronico ?? '') }}">
    </div>
</div>

{{-- La lógica de toggleFieldsEquipo se maneja desde index.blade.php --}}