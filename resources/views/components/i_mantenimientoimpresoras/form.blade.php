@csrf
<h1 class="mb-4 text-2xl font-semibold">Mantenimiento de impresoras</h1>
<div class="mb-6">
    <label for="IdImpresora"
        class="text-sm font-medium text-gray-900 block mb-2 @error('IdImpresora') text-red-500 @enderror">
        Id impresora
    </label>
    <input type="text" name="IdImpresora" id="IdImpresora"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('IdImpresora') border-red-500 @enderror"
        value="{{$idimpresora}}" readonly>
    @error('IdImpresora')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="IdConsumible"
        class="text-sm font-medium text-gray-900 block mb-2 @error('IdConsumible') text-red-500 @enderror">
        Consumible 
    </label>
    <select type="text" class="border border-slate-300 px-6 py-2" name="IdConsumible" id="IdConsumible" value="">                                 
                                    @foreach ($relaciones as $relacion)
                                        <option value="{{ $relacion->IdConsumible}}">{{$relacion->consumible->Modelo}}</option>
                                    @endforeach
    </select>
    @error('IdConsumible')
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
    @if ($mantenimiento->Fecha)
    <input type="date" name="Fecha" id="Fecha" 
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('Fecha') border-red-500 @enderror"
        value="{{ old('Fecha', $mantenimiento->Fecha->format('Y-m-d')) }}">
    @else 
        <input type="date" name="Fecha" id="Fecha"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('Fecha') border-red-500 @enderror"
            value="{{ old('Fecha', $mantenimiento->Fecha) }}">
    @endif
    @error('Fecha')
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
        value="{{ old('Observaciones', $mantenimiento->Observaciones) }}">
    @error('Observaciones')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="{{ url()->previous() }}"
    class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>