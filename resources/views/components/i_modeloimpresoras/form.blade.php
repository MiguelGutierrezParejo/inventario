@csrf


@if ($modeloimpresora->Id == null) 
    <h1 class="mb-4 text-2xl font-semibold">Crear modelo</h1>
@else 
    <h1 class="mb-4 text-2xl font-semibold">Editar modelo</h1>
@endif

<div class="mb-6">
    <label for="Marca"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Marca') text-red-500 @enderror">
        Marca
    </label>
    <input type="text" name="Marca" id="Marca"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Marca') border-red-500 @enderror"
        value="{{ old('Marca', $modeloimpresora->Marca) }}">
    @error('Marca')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Modelo"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Modelo') text-red-500 @enderror">
        Modelo
    </label>
    <input type="text" name="Modelo" id="Modelo"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Modelo') border-red-500 @enderror"
        value="{{ old('Modelo', $modeloimpresora->Modelo) }}">
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
        value="{{ old('Observaciones', $modeloimpresora->Observaciones) }}">
    @error('Observaciones')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<button type="submit"
    class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="{{ url()->previous() }}" style="border-color:#0053D0; background-color: #0053D0"
    class="text-white border-2 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>