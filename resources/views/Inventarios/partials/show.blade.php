<div>
    <h2 class="text-xl font-bold mb-4">Detalles del equipo</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div><strong>No. Resguardo:</strong> {{ $inventario->no_resguardo }}</div>
        <div><strong>Id Equipo:</strong> {{ $inventario->id_equipo }}</div>
        <div><strong>Tipo Equipo:</strong> {{ $inventario->tipo_equipo }}</div>
        <div><strong>Modelo CPU:</strong> {{ $inventario->modelo_cpu }}</div>
        <div><strong>No. Serie CPU:</strong> {{ $inventario->no_serie_cpu }}</div>
        <div><strong>Modelo Monitor:</strong> {{ $inventario->modelo_monitor }}</div>
        <div><strong>No. Serie Monitor:</strong> {{ $inventario->no_serie_monitor }}</div>
        <div><strong>No. Serie Cargador:</strong> {{ $inventario->no_serie_cargador }}</div>
        <div><strong>Modelo Teclado:</strong> {{ $inventario->modelo_teclado }}</div>
        <div><strong>No. Serie Teclado:</strong> {{ $inventario->no_serie_teclado }}</div>
        <div><strong>Modelo Mause:</strong> {{ $inventario->modelo_mause }}</div>
        <div><strong>No. Serie Mause:</strong> {{ $inventario->no_serie_mause }}</div>
        <div><strong>Modelo NoBreak:</strong> {{ $inventario->modelo_nobreak }}</div>
        <div><strong>No. Serie NoBreak:</strong> {{ $inventario->no_serie_nobreak }}</div>
        <div><strong>Usuario:</strong> {{ $inventario->usuario }}</div>
        <div><strong>No. Empleado:</strong> {{ $inventario->no_empleado }}</div>
        <div><strong>Puesto:</strong> {{ $inventario->puesto }}</div>
        <div><strong>Área Asignada:</strong> {{ $inventario->area_asignada }}</div>
        <div><strong>Unidad Administrativa:</strong> {{ $inventario->unidad_administrativa }}</div>
        <div><strong>No. Contacto:</strong> {{ $inventario->no_contacto }}</div>
        <div><strong>Correo Electrónico:</strong> {{ $inventario->correo_electronico }}</div>
    </div>
</div>
