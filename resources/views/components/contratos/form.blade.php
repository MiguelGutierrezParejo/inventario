<h1 class="mb-4 text-2xl font-semibold">Crear contrato</h1>

<div class="mb-6">
    <label for="Nombre"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Nombre') text-red-500 @enderror">
        Nombre del contrato
    </label>
    <input type="text" name="Nombre" id="Nombre"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Nombre') border-red-500 @enderror"
        value="{{ old('Nombre', $contrato->Nombre) }}">
    @error('Nombre')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Adjudicativo"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Adjudicativo') text-red-500 @enderror">
        Adjudicativo
    </label>
    <input type="text" name="Adjudicativo" id="Adjudicativo"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Adjudicativo') border-red-500 @enderror"
        value="{{ old('Adjudicativos', $contrato->Adjudicativos) }}">
    @error('Adjudicativo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Fecha"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Fecha') text-red-500 @enderror">
        Fecha
    </label>
    <input type="date" name="Fecha" id="Fecha"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('Fecha') border-red-500 @enderror"
        value="{{ old('Fecha', optional($contrato->Fecha)->format('Y-m-d'))}}">
    @error('contrato')
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
        value="{{ old('Observaciones', $contrato->Observaciones) }}">
    @error('Modelo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Estado"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Estado') text-red-500 @enderror">
        Estado(Abierto o Cerrado)
    </label>
    <input type="text" name="Estado" id="Estado"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Estado') border-red-500 @enderror"
        value="{{ old('Estado', $contrato->Estado) }}">
    @error('Estado')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<button type="submit"
    class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="/inventario/public/contratos/{{ $contrato->Id }}"
    style="border-color:#0053D0; background-color: #0053D0" class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
