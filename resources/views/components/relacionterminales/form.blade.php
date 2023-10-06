@csrf
@if ($rel->Id == null)
<h1 class="mb-4 text-2xl font-semibold">Asignar terminal</h1>
@else
<h1 class="mb-4 text-2xl font-semibold">Editar terminal</h1>
@endif

<!-- Coger el usuario guardado en la cookie -->
<?php
    if( isset($_COOKIE["Nombreusuario"]) ) {
        $rel->IdUsuario = $_COOKIE["Nombreusuario"];
    }
?>
<div class="mb-6">
    <label for="Usuario"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Usuario') text-red-500 @enderror">
        Empleado 
    </label>
        
    <select type="text" class="border border-slate-300 px-6 py-2" name="Usuario" id="Usuario" value="{{ old('$rel->usuario->Nombre', $rel->IdUsuario) }}">
                                    @if ($rel->usuario) 
                                        <option selected value="{{$rel->IdUsuario}}">{{$rel->usuario->Nombre}}</option>
                                    @endif
                                    <option></option>
                                    
                                    @foreach ($emp as $em)
                                        <option value="{{ old('$rel->IdUsuario', $em->Id) }}">{{ $em->Nombre }}</option>
                                    @endforeach
    </select>
    @error('Usuario')
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
    @if ($rel->FechaAlta)
    <input type="date" name="FechaAlta" id="FechaAlta"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaAlta') border-red-500 @enderror"
        value="{{ old('FechaAlta', $rel->FechaAlta->format('Y-m-d')) }}">
    @else 
        <input type="date" name="FechaAlta" id="FechaAlta"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaAlta') border-red-500 @enderror"
            value="{{ old('FechaAlta', $rel->FechaAlta) }}">
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
        Fecha de baja
    </label>
    @if ($rel->FechaBaja) 
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $rel->FechaBaja->format('Y-m-d')) }}">
    @else 
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $rel->FechaBaja) }}">
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
        value="{{ old('Observaciones', $rel->Observaciones) }}">
    @error('rel')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="/inventario/public/terminales/{{$term->Id}}"
    class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>