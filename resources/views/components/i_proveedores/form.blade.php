@csrf
@if ($proveedor->Id)
    <h1 class="mb-4 text-2xl font-semibold">Editar proveedor</h1>
@else
    <h1 class="mb-4 text-2xl font-semibold">Añadir proveedor</h1>
@endif


<div class="mb-6">
    <label for="Nombre"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Nombre') text-red-500 @enderror">
        Nombre
    </label>
    <input type="text" name="Nombre" id="Nombre"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Nombre') border-red-500 @enderror"
        value="{{ old('Nombre', $proveedor->Nombre) }}">
    @error('Nombre')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Telefono"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Telefono') text-red-500 @enderror">
        Teléfono
    </label>
    <input type="text" name="Telefono" id="Telefono"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Telefono') border-red-500 @enderror"
        value="{{ old('Telefono', $proveedor->Telefono) }}">
    @error('Telefono')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Correo"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Correo') text-red-500 @enderror">
        Correo
    </label>
    <input type="text" name="Correo" id="Correo"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Correo') border-red-500 @enderror"
        value="{{ old('Correo', $proveedor->Correo) }}">
    @error('Correo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Cif"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Cif') text-red-500 @enderror">
        Cif
    </label>
    <input type="text" name="Cif" id="Cif"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Cif') border-red-500 @enderror"
        value="{{ old('Cif', $proveedor->Cif) }}">
    @error('Cif')
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
    @if ($proveedor->FechaAlta)
    <input type="date" name="FechaAlta" id="FechaAlta" 
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
        value="{{ old('FechaAlta', $proveedor->FechaAlta->format('Y-m-d')) }}">
    @else 
        <input type="date" name="FechaAlta" id="FechaAlta"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
            value="{{ old('FechaAlta', $proveedor->FechaAlta) }}">
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
    @if ($proveedor->FechaBaja)
    <input type="date" name="FechaBaja" id="FechaBaja" 
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
        value="{{ old('FechaBaja', date('d-m-Y', strtotime($proveedor->FechaBaja))) }}">
    @else 
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $proveedor->FechaBaja) }}">
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
        value="{{ old('Observaciones', $proveedor->Observaciones) }}">
    @error('Modelo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Descuento"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Descuento') text-red-500 @enderror">
        Descuento
    </label>
    <input type="number" name="Descuento" id="Descuento" 
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Descuento') border-red-500 @enderror"
        value="{{ old('Descuento', $proveedor->Descuento) }}">
    @error('Descuento')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Iva"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Iva') text-red-500 @enderror">
        Iva
    </label>
    <input type="number" name="Iva" id="Iva"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Iva') border-red-500 @enderror"
        value="{{ old('Iva', $proveedor->Iva) }}">
    @error('Iva')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>



<div class="mt-4">
    <button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
    <a href="/inventario/public/proveedores/{{ $proveedor->Id }}"
        class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
</div>

