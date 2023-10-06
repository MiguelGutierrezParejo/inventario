@csrf
@if ($usuario->Id == null)
<h1 class="mb-4 text-2xl font-semibold">Crear empleado</h1>
@else
<h1 class="mb-4 text-2xl font-semibold">Editar empleado</h1>
@endif
<div class="mb-6">
    <label for="Nombre"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Nombre') text-red-500 @enderror">
        Nombre
    </label>
    <input type="text" name="Nombre" id="Nombre"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Nombre') border-red-500 @enderror"
        value="{{ old('Nombre', $usuario->Nombre) }}">
    @error('Nombre')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Usuario"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Usuario') text-red-500 @enderror">
        Usuario
    </label>
    <input type="text" name="Usuario" id="Usuario"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Usuario') border-red-500 @enderror"
        value="{{ old('Usuario', $usuario->Usuario) }}"> (debe acabar en su dominio correspondiente)
    @error('Usuario')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Departamento"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Departamento') text-red-500 @enderror">
        Departamento
    </label>
    <input type="text" name="Departamento" id="Departamento"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Departamento') border-red-500 @enderror"
        value="{{ old('Departamento', $usuario->Departamento) }}">
    @error('Departamento')
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
    @if ($usuario->FechaAlta)
    <input type="date" name="FechaAlta" id="FechaAlta" 
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaAlta') border-red-500 @enderror"
        value="{{ old('FechaAlta', $usuario->FechaAlta->format('Y-m-d')) }}">
    @else 
        <input type="date" name="FechaAlta" id="FechaAlta"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaAlta') border-red-500 @enderror"
            value="{{ old('FechaAlta', $usuario->FechaAlta) }}">
    @endif
    @error('usuario')
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
    @if ($usuario->FechaBaja) 
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $usuario->FechaBaja->format('Y-m-d')) }}">
    @else 
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $usuario->FechaBaja) }}">
    @endif
    @error('usuario')
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
        value="{{ old('Observaciones', $usuario->Observaciones) }}">
    @error('Observaciones')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<button type="submit"
    class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="/inventario/public/usuarios/{{ $usuario->Id }}" style="border-color:#0053D0; background-color: #0053D0"
    class="text-white border-2 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>