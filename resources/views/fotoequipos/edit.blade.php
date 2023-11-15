<x-layout>
    <form action="{{ route('fotoequipos.update', ['id' => $foto->Id]) }}" method="POST">
        @csrf
        @method('PUT')

        <h1 class="mb-4 text-2xl font-semibold">Editar foto</h1>

        <div class="mb-6">
            <label for="Orden"
                class="text-sm font-medium text-gray-900 block mb-2">
                Orden
            </label>
            <input type="number" name="Orden" id="Orden"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                value="{{ old('Orden', $foto->Orden) }}" required>
        </div>

        <button type="submit"
            class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
        <a href="/inventario/public/modelos/{{ $modelo->Id }}"
            style="border-color:#0053D0; background-color: #0053D0" class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>

    </form>
</x-layout>
