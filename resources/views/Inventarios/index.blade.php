@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Inventario de equipos</h1>
            <div class="text-gray-500 text-sm">{{ $inventarios->count() }} equipos registrados · Actualizado hoy</div>
        </div>
        <button id="abrirModalNuevoEquipo" type="button" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Nuevo equipo</button>
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
            </select>
        </div>
    </div>
    <div class="overflow-x-auto bg-white rounded shadow mt-4">
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

    <!-- Modal para agregar nuevo equipo -->
    <div id="modalNuevoEquipo" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-3xl w-full max-h-[90vh] flex flex-col relative">
            <button id="cerrarModalNuevoEquipo" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-2xl font-bold">&times;</button>
            <div class="overflow-y-auto p-8 flex-1">
                <h2 class="text-xl font-bold mb-4">Registrar nuevo equipo</h2>
                <form id="formNuevoEquipo" method="POST" action="{{ route('inventarios.store') }}">
                    @csrf
                    @include('Inventarios.form')
                    <div class="flex justify-end mt-4 gap-2">
                        <button type="button" id="cerrarModalNuevoEquipoBtn" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Cancelar</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para mostrar detalles del equipo -->
    <div id="modalEquipo" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-3xl w-full max-h-[90vh] flex flex-col relative">
            <button id="cerrarModalEquipo" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-2xl font-bold">&times;</button>
            <div id="contenidoEquipo" class="overflow-y-auto p-8 flex-1">
                <div class="text-center text-gray-400">Cargando...</div>
            </div>
            <div class="p-4 border-t flex justify-end bg-white sticky bottom-0">
                <button id="cerrarModalEquipoBtn" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Cerrar</button>
            </div>
        </div>
    </div>

        <!-- Modal para editar un equipo -->
<div id="modalEditarEquipo" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-3xl w-full max-h-[90vh] flex flex-col relative">
        <button id="cerrarModalEditarEquipo" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-2xl font-bold">&times;</button>
        <div id="contenidoEditarEquipo" class="overflow-y-auto p-8 flex-1">
            <!-- Aquí se cargará el formulario de edición -->
        </div>
        <div class="p-4 border-t flex justify-end bg-white sticky bottom-0">
            <button id="cerrarModalEditarEquipoBtn" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Cerrar</button>
        </div>
    </div>
</div>

</div>
<script>
// Muestra/oculta campos según tipo de equipo, con soporte de contenedor para evitar conflictos de IDs
function toggleFieldsEquipo(tipo, container) {
    container = container || document;
    function q(id) { return container.querySelector('#' + id); }

    const cargadorField      = q('cargador_field');
    const inputCargador      = q('input_no_serie_cargador');
    const tecladoDiv         = q('teclado_fields');
    const tecladoSerieDiv    = q('teclado_serie_fields');
    const mauseDiv           = q('mause_fields');
    const mauseSerieDiv      = q('mause_serie_fields');
    const nobreakDiv         = q('nobreak_fields');
    const nobreakSerieDiv    = q('nobreak_serie_fields');
    const inputTeclado       = q('input_modelo_teclado');
    const inputTecladoSerie  = q('input_no_serie_teclado');
    const inputMause         = q('input_modelo_mause');
    const inputMauseSerie    = q('input_no_serie_mause');
    const inputNobreak       = q('input_modelo_nobreak');
    const inputNobreakSerie  = q('input_no_serie_nobreak');
    const labelCpu           = q('label_modelo_cpu');
    const labelSerieCpu      = q('label_no_serie_cpu');

    if (tipo === 'Laptop') {
        if (cargadorField)   cargadorField.style.display = '';
        if (inputCargador)   inputCargador.disabled = false;
        if (tecladoDiv)      { tecladoDiv.style.display = 'none';      }
        if (tecladoSerieDiv) { tecladoSerieDiv.style.display = 'none'; }
        if (mauseDiv)        { mauseDiv.style.display = 'none';        }
        if (mauseSerieDiv)   { mauseSerieDiv.style.display = 'none';   }
        if (nobreakDiv)      { nobreakDiv.style.display = 'none';      }
        if (nobreakSerieDiv) { nobreakSerieDiv.style.display = 'none'; }
        if (inputTeclado)    inputTeclado.disabled = true;
        if (inputTecladoSerie) inputTecladoSerie.disabled = true;
        if (inputMause)      inputMause.disabled = true;
        if (inputMauseSerie) inputMauseSerie.disabled = true;
        if (inputNobreak)    inputNobreak.disabled = true;
        if (inputNobreakSerie) inputNobreakSerie.disabled = true;
        if (labelCpu)        labelCpu.textContent = 'Modelo de laptop';
        if (labelSerieCpu)   labelSerieCpu.textContent = 'No. serie de laptop';
    } else {
        if (cargadorField)   cargadorField.style.display = 'none';
        if (inputCargador)   inputCargador.disabled = true;
        if (tecladoDiv)      { tecladoDiv.style.display = '';      }
        if (tecladoSerieDiv) { tecladoSerieDiv.style.display = ''; }
        if (mauseDiv)        { mauseDiv.style.display = '';        }
        if (mauseSerieDiv)   { mauseSerieDiv.style.display = '';   }
        if (nobreakDiv)      { nobreakDiv.style.display = '';      }
        if (nobreakSerieDiv) { nobreakSerieDiv.style.display = ''; }
        if (inputTeclado)    inputTeclado.disabled = false;
        if (inputTecladoSerie) inputTecladoSerie.disabled = false;
        if (inputMause)      inputMause.disabled = false;
        if (inputMauseSerie) inputMauseSerie.disabled = false;
        if (inputNobreak)    inputNobreak.disabled = false;
        if (inputNobreakSerie) inputNobreakSerie.disabled = false;
        if (labelCpu)        labelCpu.textContent = 'Modelo CPU';
        if (labelSerieCpu)   labelSerieCpu.textContent = 'No° de Serie CPU';
    }
}

function inicializarModalNuevoEquipo() {
    const abrirBtn = document.getElementById('abrirModalNuevoEquipo');
    const modal = document.getElementById('modalNuevoEquipo');
    const cerrarX = document.getElementById('cerrarModalNuevoEquipo');
    const cerrarBtn = document.getElementById('cerrarModalNuevoEquipoBtn');
    if (abrirBtn) abrirBtn.onclick = () => {
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    };
    if (cerrarX) cerrarX.onclick = () => {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    };
    if (cerrarBtn) cerrarBtn.onclick = () => {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    };
    if (modal) modal.addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
}
function inicializarModalEquipo() {
    document.querySelectorAll('.ver-equipo-btn').forEach(function(btn) {
        btn.onclick = function() {
            const id = this.getAttribute('data-id');
            const modal = document.getElementById('modalEquipo');
            const contenido = document.getElementById('contenidoEquipo');
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            contenido.innerHTML = '<div class="text-center text-gray-400">Cargando...</div>';
            fetch(`/inventarios/${id}`)
                .then(res => res.ok ? res.text() : Promise.reject('Error al cargar'))
                .then(html => {
                    contenido.innerHTML = html;
                })
                .catch(() => {
                    contenido.innerHTML = '<div class="text-center text-red-500">Error al cargar los datos.</div>';
                });
        };
    });
    document.getElementById('cerrarModalEquipo').onclick = function() {
        document.getElementById('modalEquipo').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    };
    document.getElementById('cerrarModalEquipoBtn').onclick = function() {
        document.getElementById('modalEquipo').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    };
    document.getElementById('modalEquipo').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
}
document.addEventListener('DOMContentLoaded', function() {
    inicializarModalNuevoEquipo();
    inicializarModalEquipo();
    inicializarModalEditarEquipo();
    // Inicializar campos dinámicos del formulario de NUEVO equipo (incluido vía Blade, no AJAX)
    const nuevoModalContainer = document.getElementById('modalNuevoEquipo');
    if (nuevoModalContainer) {
        const tipoSelect = nuevoModalContainer.querySelector('#tipo_equipo');
        if (tipoSelect) {
            tipoSelect.addEventListener('change', function() {
                toggleFieldsEquipo(this.value, nuevoModalContainer);
            });
            toggleFieldsEquipo(tipoSelect.value, nuevoModalContainer);
        }
    } 
    // --- Filtro y búsqueda AJAX ---
    const busqueda = document.getElementById('busquedaInventario');
    const filtroTipo = document.getElementById('filtroTipo');
    function cargarTabla() {
        const params = new URLSearchParams();
        if (busqueda.value) params.append('busqueda', busqueda.value);
        if (filtroTipo.value) params.append('tipo', filtroTipo.value);
        fetch(`/inventarios?${params.toString()}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(res => res.text())
            .then(html => {
                const tabla = document.querySelector('table');
                const viejoTbody = tabla ? tabla.querySelector('tbody') : null;
                // Parsear dentro de una tabla temporal para que el tbody se preserve correctamente
                const tempTable = document.createElement('table');
                tempTable.innerHTML = html;
                const nuevoTbody = tempTable.querySelector('tbody');
                if (nuevoTbody && viejoTbody) {
                    viejoTbody.replaceWith(nuevoTbody);
                }
                // Re-inicializa eventos de botones "Ver"
                inicializarModalEquipo();
                inicializarModalEditarEquipo(); 
            });
    }
    if (busqueda) busqueda.addEventListener('input', function() {
        cargarTabla();
    });
    if (filtroTipo) filtroTipo.addEventListener('change', function() {
        cargarTabla();
    });
});

function inicializarModalEditarEquipo(){
    document.querySelectorAll('.editar-equipo-btn').forEach(function(btn) {
          btn.onclick = function(){
            const id = this.getAttribute('data-id');
            const modal = document.getElementById('modalEditarEquipo'); 
            const contenido = document.getElementById('contenidoEditarEquipo');
            modal.classList.remove('hidden'); 
            document.body.classList.add('overflow-hidden');
            contenido.innerHTML = '<div class="text-center text-gray-400">Cargando...</div>';
           fetch(`/inventarios/${id}/edit`)
    .then(res => res.ok ? res.text() : Promise.reject('Error al cargar'))
            .then(html => {
                contenido.innerHTML = html;
                // Leer tipo desde el hidden input (el select viene disabled en edición)
                const hiddenTipo = contenido.querySelector('input[type="hidden"][name="tipo_equipo"]');
                const selectTipo = contenido.querySelector('#tipo_equipo');
                const tipo = hiddenTipo ? hiddenTipo.value : (selectTipo ? selectTipo.value : '');
                toggleFieldsEquipo(tipo, contenido);
                // Para el formulario nuevo: también añadir listener al select (no disabled)
                if (selectTipo && !selectTipo.disabled) {
                    selectTipo.addEventListener('change', function() {
                        toggleFieldsEquipo(this.value, contenido);
                    });
                }
            })
    .catch(() => {
        contenido.innerHTML = '<div class="text-center text-red-500">Error al cargar los datos.</div>';
    });

          }; 

    }); 

 // Cerrar modal igual que los otros
    document.getElementById('cerrarModalEditarEquipo').onclick = function() {
        document.getElementById('modalEditarEquipo').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    };
    document.getElementById('cerrarModalEditarEquipoBtn').onclick = function() {
        document.getElementById('modalEditarEquipo').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    };
    document.getElementById('modalEditarEquipo').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
}


</script>
@endsection
