@extends('layouts.app')

@section('content')
<h1>Detalle de Inventario</h1>
<ul>
    <li>No. Resguardo: {{$inventario->no_resguardo}}</li>
    <li>Id Equipo: {{$inventario->id_equipo}}</li>
    <li>Tipo Equipo: {{$inventario->tipo_equipo}}</li>
    <li>Modelo CPU: {{$inventario->modelo_cpu}}</li>
    <li>No. Serie CPU: {{$inventario->no_serie_cpu}}</li>
    <li>Modelo Monitor: {{$inventario->modelo_monitor}}</li>
    <li>No. Serie Monitor: {{$inventario->no_serie_monitor}}</li>
    <li>Modelo teclado: {{$inventario->modelo_teclado}}</li>
    <li>No. Serie Cargador: {{$inventario->no_serie_cargador}}</li>
    <li>No. Serie Teclado: {{$inventario->no_serie_teclado}}</li>
    <li>Modelo Mause: {{$inventario->modelo_mause}}</li>
    <li>No. Serie Mause: {{$inventario->no_serie_mause}}</li>
    <li>Modelo NoBreak: {{$inventario->modelo_nobreak}}</li>
    <li>No. Serie NoBreak: {{$inventario->no_serie_nobreak}}</li>
    <li>Usuario: {{$inventario->usuario}}</li>
    <li>No. Empleado: {{$inventario->no_empleado}}</li>
    <li>Puesto: {{$inventario->puesto}}</li>
    <li>Area Asignada: {{$inventario->area_asignada}}</li>
    <li>Unidad Administrativa: {{$inventario->unidad_administrativa}}</li>
    <li>No. Contacto: {{$inventario->no_contacto}}</li>
    <li>Correo electronico: {{$inventario->correo_electronico}}</li>
</ul>
<a href="{{ route('inventarios.index')}}">Volver</a> 
@endsection
