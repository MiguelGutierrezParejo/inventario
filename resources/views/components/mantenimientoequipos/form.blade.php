@csrf
<h1 class="text-2xl font-semibold">Añadir mantenimiento a {{$equipo->NombreOrdenador}} </h1>
<div class="mt-6 mb-6">
    <label for="Nombre"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Nombre') text-red-500 @enderror">
        Componente
    </label>
    <input type="text" name="Nombre" id="Nombre"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Nombre') border-red-500 @enderror"
        value="{{ old('Nombre', $mant->Nombre) }}">
    @error('Nombre')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Caracteristicas"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Caracteristicas') text-red-500 @enderror">
        Caracteristicas
    </label>
    <input type="text" name="Caracteristicas" id="Caracteristicas"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Caracteristicas') border-red-500 @enderror"
        value="{{ old('Caracteristicas', $mant->Caracteristicas) }}">
    @error('Caracteristicas')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Fabricante"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Fabricante') text-red-500 @enderror">
        Fabricante
    </label>
    <input type="text" name="Fabricante" id="Fabricante"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Fabricante') border-red-500 @enderror"
        value="{{ old('Fabricante', $mant->Fabricante) }}">
    @error('Fabricante')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="NumSerie"
        class="text-sm font-medium text-gray-900 block mb-2 @error('NumSerie') text-red-500 @enderror">
        Nº Serie
    </label>
    <input type="text" name="NumSerie" id="NumSerie"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('NumSerie') border-red-500 @enderror"
        value="{{ old('NumSerie', $mant->NumSerie) }}">
    @error('NumSerie')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="FechaAlta"
        class="text-sm font-medium text-gray-900 block mb-2 @error('FechaAlta') text-red-500 @enderror">
        Fecha de alta
    </label>
    @if ($mant->FechaAlta)
        <input type="date" name="FechaAlta" id="FechaAlta"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 @error('FechaAlta') border-red-500 @enderror"
        value="{{ old('FechaAlta', $mant->FechaAlta)->format('Y-m-d') }}"/>
    @else
        <input type="date" name="FechaAlta" id="FechaAlta"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 @error('FechaAlta') border-red-500 @enderror"
        value="{{ old('FechaAlta', $mant->FechaAlta) }}"/>
    @endif
    @error('mant')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="FechaBaja"
        class="text-sm font-medium text-gray-900 block mb-2 @error('FechaBaja') text-red-500 @enderror">
        Fecha de baja
    </label>
    @if ($mant->FechaBaja)
        <input type="date" name="FechaBaja" id="FechaBaja"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 @error('FechaBaja') border-red-500 @enderror"
        value="{{ old('FechaBaja', $mant->FechaBaja)->format('Y-m-d') }}"/>
    @else
        <input type="date" name="FechaBaja" id="FechaBaja"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 @error('FechaBaja') border-red-500 @enderror"
        value="{{ old('FechaBaja', $mant->FechaBaja) }}"/>
    @endif
    @error('mant')
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
        value="{{ old('Observaciones', $mant->Observaciones) }}">
    @error('mant')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="/inventario/public/equipos/{{$equipo->Id}}"
    class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
