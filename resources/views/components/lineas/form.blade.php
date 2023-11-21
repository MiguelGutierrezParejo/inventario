@csrf
@if ($linea->Id == null)
    <h1 class="text-2xl font-semibold">Crear linea</h1>
@else
    <h1 class="text-2xl font-semibold">Editar linea</h1>
@endif
<div class="mt-6 mb-6">
    <label for="Numero"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Numero') text-red-500 @enderror">
        Numero
    </label>
    <input type="number" name="Numero" id="Numero" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Numero') border-red-500 @enderror"
        value="{{ old('Numero', $linea->Numero) }}">
    @error('Numero')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Extension"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Extension') text-red-500 @enderror">
        Extension
    </label>
    <input type="number" name="Extension" id="Extension" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Extension') border-red-500 @enderror"
        value="{{ old('Extension', $linea->Extension) }}">
    @error('Extension')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Pin"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Pin') text-red-500 @enderror">
        Pin
    </label>
    <input type="number" name="Pin" id="Pin" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Pin') border-red-500 @enderror"
        value="{{ old('Pin', $linea->Pin) }}">
    @error('Pin')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Puk1"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Puk1') text-red-500 @enderror">
        Puk1
    </label>
    <input type="number" name="Puk1" id="Puk1" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Puk1') border-red-500 @enderror"
        value="{{ old('Puk1', $linea->Puk1) }}">
    @error('Puk1')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Puk2"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Puk2') text-red-500 @enderror">
        Puk2
    </label>
    <input type="number" name="Puk2" id="Puk2" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Puk2') border-red-500 @enderror"
        value="{{ old('Puk2', $linea->Puk2) }}">
    @error('Puk2')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="NumTarjeta"
        class="text-sm font-medium text-gray-900 block mb-2 @error('NumTarjeta') text-red-500 @enderror">
        Nº Tarjeta
    </label>
    <input type="number" name="NumTarjeta" id="NumTarjeta" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('NumTarjeta') border-red-500 @enderror"
        value="{{ old('NumTarjeta', $linea->NumTarjeta) }}">
    @error('NumTarjeta')
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
        value="{{ old('Caracteristicas', $linea->Caracteristicas) }}">
    @error('Caracteristicas')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="Terminal"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Terminal') text-red-500 @enderror">
        Terminal
    </label>
    <select type="text" class="border border-slate-300 px-6 py-2" name="Terminal" id="Terminal" value="{{ old('$linea->terminal->Modelo', $linea->IdTerminal) }}">
        @if ($linea->terminal)
            <option selected value="{{$linea->IdTerminal}}">{{$linea->terminal->Modelo}}</option>
        @endif
        <option></option>

        @foreach ($terminal as $ter)
            <option value="{{ $ter->Id }}">{{ $ter->Modelo }}</option>
        @endforeach
    </select>
    @error('Terminal')
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
    @if ($linea->FechaAlta)
    <input type="date" name="FechaAlta" id="FechaAlta"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
        value="{{ old('FechaAlta', $linea->FechaAlta->format('Y-m-d')) }}">
    @else
        <input type="date" name="FechaAlta" id="FechaAlta"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
            value="{{ old('FechaAlta', $linea->FechaAlta) }}">
    @endif
    @error('linea')
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
    @if ($linea->FechaBaja)
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $linea->FechaBaja->format('Y-m-d')) }}">
    @else
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $linea->FechaBaja) }}">
    @endif
    @error('linea')
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
        value="{{ old('Observaciones', $linea->Observaciones) }}">
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
