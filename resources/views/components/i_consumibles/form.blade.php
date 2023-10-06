@csrf


@if ($consumible->Id == null) 
    <h1 class="mb-4 text-2xl font-semibold">Crear consumible</h1>
@else 
    <h1 class="mb-4 text-2xl font-semibold">Editar consumible</h1>
@endif

<div class="mb-6">
    <label for="Modelo"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Modelo') text-red-500 @enderror">
        Modelo
    </label>
    <input type="text" name="Modelo" id="Modelo"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Modelo') border-red-500 @enderror"
        value="{{ old('Modelo', $consumible->Modelo) }}">
    @error('Modelo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Referencia"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Referencia') text-red-500 @enderror">
        Referencia
    </label>
    <input type="text" name="Referencia" id="Referencia"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Referencia') border-red-500 @enderror"
        value="{{ old('Referencia', $consumible->Referencia) }}">
    @error('Referencia')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Paginas"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Paginas') text-red-500 @enderror">
        Páginas
    </label>
    <input type="number" step="any" name="Paginas" id="Paginas" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Paginas') border-red-500 @enderror"
        value="{{ old('Paginas', $consumible->Paginas) }}">
    @error('Paginas')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Precio"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Precio') text-red-500 @enderror">
        Precio
    </label>
    <input type="number" step="any" name="Precio" id="Precio" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Precio') border-red-500 @enderror"
        value="{{ old('Precio', $consumible->Precio) }}">
    @error('Precio')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Stock"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Stock') text-red-500 @enderror">
        Stock
    </label>
    <input type="number" step="any" name="Stock" id="Stock" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Stock') border-red-500 @enderror"
        value="{{ old('Stock', $consumible->Stock) }}">
    @error('Stock')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Bajas"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Bajas') text-red-500 @enderror">
        Baja (0 no, 1 si)
    </label>
    <input type="number" step="any" name="Bajas" id="Bajas" min="0" max="1"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Bajas') border-red-500 @enderror"
        value="{{ old('Bajas', $consumible->Bajas) }}">
    @error('Bajas')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Equivalencia"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Equivalencia') text-red-500 @enderror">
        Equivalencia
    </label>
    <input type="number" step="any" name="Equivalencia" id="Equivalencia" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Equivalencia') border-red-500 @enderror"
        value="{{ old('Equivalencia', $consumible->Equivalencia) }}">
    @error('Equivalencia')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Stockminimo"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Stockminimo') text-red-500 @enderror">
        Stock minimo
    </label>
    <input type="number" step="any" name="Stockminimo" id="Stockminimo" min="0"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Stockminimo') border-red-500 @enderror"
        value="{{ old('Stockminimo', $consumible->Stockminimo) }}">
    @error('Stockminimo')
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
        value="{{ old('Observaciones', $consumible->Observaciones) }}">
    @error('Observaciones')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<button type="submit"
    class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="/inventario/public/consumibles/{{ $consumible->Id }}" style="border-color:#0053D0; background-color: #0053D0"
    class="text-white border-2 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>