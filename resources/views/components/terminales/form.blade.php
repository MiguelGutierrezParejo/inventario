@csrf
@if ($terminal->Id == null)
    <h1 class="text-2xl font-semibold">Crear terminal</h1>
@else
    <h1 class="text-2xl font-semibold">Editar terminal</h1>
@endif
<div class="mt-6 mb-6">
    <label for="Marca"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Marca') text-red-500 @enderror">
        Marca
    </label>
    <input type="text" name="Marca" id="Marca"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Marca') border-red-500 @enderror"
        value="{{ old('Marca', $terminal->Marca) }}">
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
        value="{{ old('Modelo', $terminal->Modelo) }}">
    @error('Modelo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="NumSerie"
        class="text-sm font-medium text-gray-900 block mb-2 @error('NumSerie') text-red-500 @enderror">
        Número de Serie
    </label>
    <input type="text" name="NumSerie" id="NumSerie"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('NumSerie') border-red-500 @enderror"
        value="{{ old('NumSerie', $terminal->NumSerie) }}">
    @error('NumSerie')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Imei"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Imei') text-red-500 @enderror">
        Imei
    </label>
    <input type="text" name="Imei" id="Imei"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Imei') border-red-500 @enderror"
        value="{{ old('Imei', $terminal->Imei) }}">
    @error('Imei')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="FormatoTarjeta"
        class="text-sm font-medium text-gray-900 block mb-2 @error('FormatoTarjeta') text-red-500 @enderror">
        FormatoTarjeta
    </label>
    <input type="text" name="FormatoTarjeta" id="FormatoTarjeta"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FormatoTarjeta') border-red-500 @enderror"
        value="{{ old('FormatoTarjeta', $terminal->FormatoTarjeta) }}">
    @error('FormatoTarjeta')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Cuenta"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Cuenta') text-red-500 @enderror">
        Cuenta
    </label>
    <input type="text" name="Cuenta" id="Cuenta"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Cuenta') border-red-500 @enderror"
        value="{{ old('Cuenta', $terminal->Cuenta) }}">
    @error('Cuenta')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="FechaAlta"
        class="text-sm font-medium text-gray-900 block mb-2 @error('FechaAlta') text-red-500 @enderror">
        FechaAlta
    </label>
    @if ($terminal->FechaAlta)
    <input type="date" name="FechaAlta" id="FechaAlta" 
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaAlta') border-red-500 @enderror"
        value="{{ old('FechaAlta', $terminal->FechaAlta->format('Y-m-d')) }}">
    @else 
        <input type="date" name="FechaAlta" id="FechaAlta"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaAlta') border-red-500 @enderror"
            value="{{ old('FechaAlta', $terminal->FechaAlta) }}">
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
        FechaBaja
    </label>
    @if ($terminal->FechaBaja) 
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $terminal->FechaBaja->format('Y-m-d')) }}">
    @else 
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $terminal->FechaBaja) }}">
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
        value="{{ old('Observaciones', $terminal->Observaciones) }}">
    @error('Observaciones')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="PrecioAdquisicion"
        class="text-sm font-medium text-gray-900 block mb-2 @error('PrecioAdquisicion') text-red-500 @enderror">
        Precio de adquisición
    </label>
    <input type="number" step="any" name="PrecioAdquisicion" id="PrecioAdquisicion" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('PrecioAdquisicion') border-red-500 @enderror"
        value="{{ old('PrecioAdquisicion', $terminal->PrecioAdquisicion) }}">
    @error('PrecioAdquisicion')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<button type="submit"
    class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="/inventario/public/terminales/{{ $terminal->Id }}" style="border-color:#0053D0; background-color: #0053D0"
    class="text-white border-2 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>