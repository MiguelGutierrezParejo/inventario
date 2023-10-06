@csrf
<?php
    if( isset($_COOKIE["Nombreusuario"]) ) {
        $impresora->IdUsuario = $_COOKIE["Nombreusuario"];
    }

?>
<?php
    if( isset($_COOKIE["Modelo"]) ) {
        $impresora->IdModImpresora = $_COOKIE["Modelo"];
    }
?>

@if ($impresora->Id == null) 
    <h1 class="mb-4 text-2xl font-semibold">Crear impresora</h1>
@else 
    <h1 class="mb-4 text-2xl font-semibold">Editar impresora</h1>
@endif

    <div class="mb-6">
        <label for="Modelo"
            class="text-sm font-medium text-gray-900 block mb-2 @error('Modelo') text-red-500 @enderror">
            Modelo 
        </label>
            
        <select type="text" class="border border-slate-300 px-6 py-2" name="Modelo" id="Modelo" value="{{ old('$impresora->modelo->Modelo', $impresora->IdModImpresora) }}">                                    
                                    @if ($impresora->modelo) 
                                        <option selected value="{{$impresora->IdModImpresora}}">{{$impresora->modelo->Modelo}}</option>
                                    @endif
                                    
                                    @foreach ($modelos as $modelo)
                                        <option value="{{ old('$impresora->IdModImpresora', $modelo->Id) }}">{{ $modelo->Modelo }}</option>
                                    @endforeach
        </select>
        @error('Modelo')
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
            
        <select type="text" class="border border-slate-300 px-6 py-2" name="Usuario" id="Usuario" value="{{ old('$impresora->usuario->Nombre', $impresora->IdUsuario) }}">                                    
                                    @if ($impresora->usuario) 
                                        <option selected value="{{$impresora->IdUsuario}}">{{$impresora->usuario->Nombre}}</option>
                                    @endif
                                    
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ old('$impresora->IdUsuario', $usuario->Id) }}">{{ $usuario->Nombre }}</option>
                                    @endforeach
        </select>
        @error('Usuario')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="NumSerie"
            class="text-sm font-medium text-gray-900 block mb-2 @error('NumSerie') text-red-500 @enderror">
            Número de serie
        </label>
        <input type="text" name="NumSerie" id="NumSerie"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('NumSerie') border-red-500 @enderror"
            value="{{ old('NumSerie', $impresora->NumSerie) }}">
        @error('NumSerie')
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
        @if ($impresora->FechaAlta)
        <input type="date" name="FechaAlta" id="FechaAlta" 
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
            value="{{ old('FechaAlta', $impresora->FechaAlta->format('Y-m-d')) }}">
        @else 
            <input type="date" name="FechaAlta" id="FechaAlta"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
                value="{{ old('FechaAlta', $impresora->FechaAlta) }}">
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
        @if ($impresora->FechaBaja)
        <input type="date" name="FechaBaja" id="FechaBaja" 
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', date('d-m-Y', strtotime($impresora->FechaBaja))) }}">
        @else 
            <input type="date" name="FechaBaja" id="FechaBaja"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
                value="{{ old('FechaBaja', $impresora->FechaBaja) }}">
        @endif
        @error('FechaBaja')
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
            value="{{ old('PrecioAdquisicion', $impresora->PrecioAdquisicion) }}">
        @error('PrecioAdquisicion')
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
        value="{{ old('Observaciones', $impresora->Observaciones) }}">
    @error('Modelo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
    </div>


<button type="submit"
    class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="{{ url()->previous() }}" style="border-color:#0053D0; background-color: #0053D0"
    class="text-white border-2 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
 
