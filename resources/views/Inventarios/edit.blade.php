
@extends('layouts.app')

@section('content')
<h1>Editar Inventario</h1>
<form action="{{ route('inventario.update', $inventario) }}" method="$_POST">
    @csrf 
    @method('PUT')
    @include('inventarios.form')
    <button type="submit">Actualizar</button>
</form>
@endsection
