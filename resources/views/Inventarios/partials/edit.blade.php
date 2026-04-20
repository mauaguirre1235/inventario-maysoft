<div class="max-w-2xl mx-auto bg-white rounded shadow p-8">
    <h2 class="text-xl font-bold mb-6">Editar Inventario</h2>
    <form action="{{ route('inventarios.update', $inventario) }}" method="POST" id="formEditarInventario">
        @csrf
        @method('PUT')
        @include('Inventarios.form')
        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Actualizar</button>
        </div>
    </form>
</div>
