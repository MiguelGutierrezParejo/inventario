<x-layout>
    <form action="{{ route('modelos.update', ['id' => $modelo->Id]) }}" method="POST">
        @csrf
        @method('PUT')

        <h1 class="mb-4 text-2xl font-semibold">Editar modelo</h1>

        <div class="mb-6">
            <label for="Modelo"
                class="text-sm font-medium text-gray-900 block mb-2 @error('Modelo') text-red-500 @enderror">
                Nombre del modelo
            </label>
            <input type="text" name="Modelo" id="Modelo"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Modelo') border-red-500 @enderror"
                value="{{ old('Modelo', $modelo->Modelo) }}">
            @error('Modelo')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="Observaciones"
                class="text-sm font-medium text-gray-900 block mb-2 @error('Observaciones') text-red-500 @enderror">
                Observaciones
            </label>
            <input type="text" name="Observaciones" id="Observaciones"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Observaciones') border-red-500 @enderror"
                value="{{ old('Observaciones', $modelo->Observaciones) }}">
            @error('Observaciones')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <button type="submit"
            class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
        <a href="/inventario/public/modelos/{{ $modelo->Id }}"
            style="border-color:#0053D0; background-color: #0053D0" class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
    </form>
</x-layout>
