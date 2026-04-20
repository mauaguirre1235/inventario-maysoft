
{{-- Solo campos del formulario, sin form, sin endsection --}}

<!-- Identificacion -->
<h3 class="font-semibold text-gray-700 mb-2 mt-4 border-b pb-1">Identificacion</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium">No. de resguardo *</label>
        <input type="text" name="no_resguardo" class="w-full border rounded px-3 py-2" required value="{{ old('no_resguardo') }}">
        @error('no_resguardo')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">ID del equipo *</label>
        <input type="text" name="id_equipo" class="w-full border rounded px-3 py-2" required value="{{ old('id_equipo') }}">
        @error('id_equipo')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium">Tipo de equipo *</label>
        <select name="tipo_equipo" id="tipo_equipo" class="w-full border rounded px-3 py-2" required>
            <option value="">Selecciona...</option>
            <option value="Desktop" {{ old('tipo_equipo') == 'Desktop' ? 'selected' : '' }}>Escritorio</option>
            <option value="Laptop" {{ old('tipo_equipo') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
        </select>
    </div>
</div>
<div id="cargador_field" style="display:none;" class="mb-4">
    <label class="block text-sm font-medium">N° serie cargador</label>
    <input type="text" name="no_serie_cargador" class="w-full border rounded px-3 py-2">
</div>

<!-- CPU -->
<h3 class="font-semibold text-gray-700 mb-2 mt-4 border-b pb-1">CPU / Laptop</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label id="label_modelo_cpu" class="block text-sm font-medium">Modelo CPU</label>
        <input type="text" name="modelo_cpu" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label id="label_no_serie_cpu" class="block text-sm font-medium">No° de Serie CPU</label>
        <input type="text" name="no_serie_cpu" class="w-full border rounded px-3 py-2">
    </div>
</div>

<!-- Periféricos -->
<h3 class="font-semibold text-gray-700 mb-2 mt-4 border-b pb-1">Periféricos</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium">Modelo Monitor</label>
        <input type="text" name="modelo_monitor" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium">N° serie monitor</label>
        <input type="text" name="no_serie_monitor" class="w-full border rounded px-3 py-2">
    </div>
    <div id="teclado_fields">
        <label class="block text-sm font-medium">Modelo teclado</label>
        <input type="text" name="modelo_teclado" class="w-full border rounded px-3 py-2">
    </div>
    <div id="teclado_serie_fields">
        <label class="block text-sm font-medium">N° serie teclado</label>
        <input type="text" name="no_serie_teclado" class="w-full border rounded px-3 py-2">
    </div>
    <div id="mause_fields">
        <label class="block text-sm font-medium">Modelo mouse</label>
        <input type="text" name="modelo_mause" class="w-full border rounded px-3 py-2">
    </div>
    <div id="mause_serie_fields">
        <label class="block text-sm font-medium">N° serie mouse</label>
        <input type="text" name="no_serie_mause" class="w-full border rounded px-3 py-2">
    </div>
    <div id="nobreak_fields">
        <label class="block text-sm font-medium">Modelo no-break</label>
        <input type="text" name="modelo_nobreak" class="w-full border rounded px-3 py-2">
    </div>
    <div id="nobreak_serie_fields">
        <label class="block text-sm font-medium">N° serie no-break</label>
        <input type="text" name="no_serie_nobreak" class="w-full border rounded px-3 py-2">
    </div>
</div>

<!-- Usuario y área -->
<h3 class="font-semibold text-gray-700 mb-2 mt-4 border-b pb-1">Usuario y área</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium">Usuario</label>
        <input type="text" name="usuario" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium">N° de empleado</label>
        <input type="text" name="no_empleado" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium">Puesto</label>
        <input type="text" name="puesto" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium">Área asignada</label>
        <input type="text" name="area_asignada" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium">Unidad administrativa</label>
        <input type="text" name="unidad_administrativa" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium">No. contacto</label>
        <input type="text" name="no_contacto" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm font-medium">Correo electrónico</label>
        <input type="email" name="correo_electronico" class="w-full border rounded px-3 py-2">
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tipoEquipo = document.getElementById('tipo_equipo');
    const cargadorField = document.getElementById('cargador_field');
    const tecladoFields = document.getElementById('teclado_fields');
    const tecladoSerieFields = document.getElementById('teclado_serie_fields');
    const mauseFields = document.getElementById('mause_fields');
    const mauseSerieFields = document.getElementById('mause_serie_fields');
    const nobreakFields = document.getElementById('nobreak_fields');
    const nobreakSerieFields = document.getElementById('nobreak_serie_fields');
    const labelModeloCpu = document.getElementById('label_modelo_cpu');
    const labelNoSerieCpu = document.getElementById('label_no_serie_cpu');
    function setDisabled(selector, disabled) {
        const input = selector.querySelector('input');
        if (input) input.disabled = disabled;
    }
    function toggleFields() {
        if (tipoEquipo.value === 'Laptop') {
            cargadorField.style.display = '';
            tecladoFields.style.display = 'none';
            tecladoSerieFields.style.display = 'none';
            mauseFields.style.display = 'none';
            mauseSerieFields.style.display = 'none';
            nobreakFields.style.display = 'none';
            nobreakSerieFields.style.display = 'none';
            setDisabled(tecladoFields, true);
            setDisabled(tecladoSerieFields, true);
            setDisabled(mauseFields, true);
            setDisabled(mauseSerieFields, true);
            setDisabled(nobreakFields, true);
            setDisabled(nobreakSerieFields, true);
            labelModeloCpu.textContent = 'Modelo de laptop';
            labelNoSerieCpu.textContent = 'No. serie de laptop';
        } else {
            cargadorField.style.display = 'none';
            tecladoFields.style.display = '';
            tecladoSerieFields.style.display = '';
            mauseFields.style.display = '';
            mauseSerieFields.style.display = '';
            nobreakFields.style.display = '';
            nobreakSerieFields.style.display = '';
            setDisabled(tecladoFields, false);
            setDisabled(tecladoSerieFields, false);
            setDisabled(mauseFields, false);
            setDisabled(mauseSerieFields, false);
            setDisabled(nobreakFields, false);
            setDisabled(nobreakSerieFields, false);
            labelModeloCpu.textContent = 'Modelo CPU';
            labelNoSerieCpu.textContent = 'No° de Serie CPU';
        }
    }
    tipoEquipo.addEventListener('change', toggleFields);
    toggleFields();
});
</script>