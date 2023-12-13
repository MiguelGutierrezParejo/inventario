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
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 @error('Marca') border-red-500 @enderror"
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
    <input type="text" name="Modelo" id="Modelo" style="width: 250px"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 @error('Modelo') border-red-500 @enderror"
        value="{{ old('Modelo', $modeloimpresora->Modelo) }}">
    @error('Modelo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="FechaAlta"
        class="text-sm font-medium text-gray-900 block mb-2 @error('FechaAlta') text-red-500 @enderror">
        Fecha Alta
    </label>
    @if ($modeloimpresora->FechaAlta)
    <input type="date" name="FechaAlta" id="FechaAlta"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
        value="{{ old('FechaAlta', $modeloimpresora->FechaAlta->format('Y-m-d')) }}">
    @else
        <input type="date" name="FechaAlta" id="FechaAlta"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
            value="{{ old('FechaAlta', $modeloimpresora->FechaAlta) }}">
    @endif
    @error('FechaAlta')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="FechaBaja"
        class="text-sm font-medium text-gray-900 block mb-2 @error('FechaBaja') text-red-500 @enderror">
        Fecha Baja
    </label>
    @if ($modeloimpresora->FechaBaja)
    <input type="date" name="FechaBaja" id="FechaBaja"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
        value="{{ old('FechaBaja', date('d-m-Y', strtotime($modeloimpresora->FechaBaja))) }}">
    @else
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $modeloimpresora->FechaBaja) }}">
    @endif
    @error('FechaBaja')
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
