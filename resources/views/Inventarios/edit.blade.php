@extends('layouts.app')

@section('content')
<h1>Editar Inventario</h1>
<form action="{{ route('inventarios.update', $inventario) }}" method="POST">
    @csrf 
    @method('PUT')
    @include('Inventarios.form')
    <button type="submit">Actualizar</button>
</form>
@endsection
