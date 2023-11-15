@csrf
@if ($equipo->Id == null)
<h1 class="mb-4 text-2xl font-semibold">Crear equipo</h1>
@else
<h1 class="mb-4 text-2xl font-semibold">Editar equipo</h1>
@endif

<div class="mb-6">
    <label for="Tipo"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Tipo') text-red-500 @enderror">
        Tipo
    </label>
    <select type="text" class="border border-slate-300 px-6 py-2" name="Tipo" id="Tipo" value="{{ old('$equipo->tipo->Denominacion', $equipo->IdTipo) }}">
        @if ($equipo->tipo)
            <option selected value="{{$equipo->IdTipo}}">{{$equipo->tipo->Denominacion}}</option>
        @endif
        <option></option>

        @foreach ($tipos as $tipo)
            <option value="{{ $tipo->Id }}">{{ $tipo->Denominacion }}</option>
        @endforeach
    </select>
    @error('Tipo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="NombreOrdenador"
        class="text-sm font-medium text-gray-900 block mb-2 @error('NombreOrdenador') text-red-500 @enderror">
        Nombre de equipo
    </label>
    <input type="text" name="NombreOrdenador" id="NombreOrdenador"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('NombreOrdenador') border-red-500 @enderror"
        value="{{ old('NombreOrdenador', $equipo->NombreOrdenador) }}">
    @error('NombreOrdenador')
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
    <select type="text" class="border border-slate-300 px-6 py-2" name="Modelo" id="Modelo" value="{{ old('$equipo->modelo->Modelo', $equipo->IdModelo) }}">
        @if ($equipo->modelo)
            <option selected value="{{$equipo->IdModelo}}">{{$equipo->modelo->Modelo}}</option>
        @endif
        <option></option>

        @foreach ($modelos as $modelo)
            <option value="{{ $modelo->Id }}">{{ $modelo->Modelo }}</option>
        @endforeach
    </select>
    @error('Modelo')
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
        value="{{ old('NumSerie', $equipo->NumSerie) }}">
    @error('NumSerie')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Contrato"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Contrato') text-red-500 @enderror">
        Contrato
    </label>
    <select type="text" class="border border-slate-300 px-6 py-2" name="Contrato" id="Contrato" value="{{ old('$equipo->contrato->Nombre', $equipo->IdContrato) }}">
        @if ($equipo->contrato)
            <option selected value="{{$equipo->IdContrato}}">{{$equipo->contrato->Nombre}}</option>
        @endif
        <option></option>

        @foreach ($contrato as $con)
            <option value="{{ $con->Id }}">{{ $con->Nombre }}</option>
        @endforeach
    </select>
    @error('Contrato')
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
    @if ($equipo->FechaAlta)
    <input type="date" name="FechaAlta" id="FechaAlta"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
        value="{{ old('FechaAlta', $equipo->FechaAlta->format('Y-m-d')) }}">
    @else
        <input type="date" name="FechaAlta" id="FechaAlta"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
            value="{{ old('FechaAlta', $equipo->FechaAlta) }}">
    @endif
    @error('equipo')
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
    @if ($equipo->FechaBaja)
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $equipo->FechaBaja->format('Y-m-d')) }}">
    @else
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $equipo->FechaBaja) }}">
    @endif
    @error('equipo')
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
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('PrecioAdquisicion') border-red-500 @enderror"
        value="{{ old('PrecioAdquisicion', $equipo->PrecioAdquisicion) }}">
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
        value="{{ old('Observaciones', $equipo->Observaciones) }}">
    @error('Modelo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<button type="submit"
    class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="/inventario/public/equipos/{{ $equipo->Id }}"
    style="border-color:#0053D0; background-color: #0053D0" class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
