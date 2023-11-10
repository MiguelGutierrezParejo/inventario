<x-layout>
    <form action="{{ url('/docum') . '/' . $documento->Id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="text-2xl font-semibold">Editar documento</h1>
        <div class="mb-6">
            <label for="Nombre"
                class="text-sm font-medium text-gray-900 block mb-2 @error('Nombre') text-red-500 @enderror">
                Nombre
            </label>
            <input type="text" name="Nombre" id="Nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('Nombre') border-red-500 @enderror"
                value="{{ old('Nombre', $documento->Nombre) }}">
            @error('Nombre')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="Documento"
                class="text-sm font-medium text-gray-900 block mb-2 @error('Documento') text-red-500 @enderror">
                Documento
            </label>
            <input type="file" name="Documento" id="Documento"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('documento') border-red-500 @enderror"
                value="{{ old('Documento', $documento->Fichero) }}">
            @error('Documento')
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
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('Observaciones') border-red-500 @enderror"
                value="{{ old('Observaciones', $documento->Observaciones) }}">
            @error('Observaciones')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
        <a href="{{ url()->previous() }}"
            class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
    </form>
</x-layout>
