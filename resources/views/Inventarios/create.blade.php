
@extends('layouts.app')

@section('content') 
    <h1>Nuevo Inventario</h1>
    <form action="{{ route('inventarios.store')}}"  method="$_POST">
        @csrf 
        @include('inventarios.form')
        <button type="submit">Guardar</button>
    </form>
    @endsection