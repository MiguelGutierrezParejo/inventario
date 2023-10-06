<x-layout>
    <h1 class="text-2xl font-semibold">Generar inventario de impresoras</h1>
    <form action="{{  url('/impresoras/generar') }}" method="POST">
        @csrf
        <div class="mt-6 mb-6">
            <label for="titular"
                class="text-sm font-medium text-gray-900 block mb-2 @error('titular') text-red-500 @enderror">
                Mostrar titulares
            </label>
            <select type="text" class="border border-slate-300 px-6 py-2" name="titular" id="titular">
                                            <option value="{{ $titulares[0] }}">{{ $titulares[0] }}</option>
                                            <option value="{{ $titulares[1] }}">{{ $titulares[1] }}</option>
            </select>
            @error('titulares')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mt-6 mb-6">
            <label for="mantenimiento"
                class="text-sm font-medium text-gray-900 block mb-2 @error('mantenimiento') text-red-500 @enderror">
                Mostrar mantenimientos
            </label>
            <select type="text" class="border border-slate-300 px-6 py-2" name="mantenimiento" id="mantenimiento">
                                            <option value="{{ $mantenimientos[0] }}">{{ $mantenimientos[0] }}</option>
                                            <option value="{{ $mantenimientos[1] }}">{{ $mantenimientos[1] }}</option>
            </select>
            @error('Tipo')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mt-6 mb-6">
            <label for="Desde"
                class="text-sm font-medium text-gray-900 block mb-2 @error('Desde') text-red-500 @enderror">
                Desde
            </label>
            <input type="date" name="Desde" id="Desde" value="2021-01-01"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('desde') border-red-500 @enderror">
            @error('desde')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="Hasta"
                class="text-sm font-medium text-gray-900 block mb-2 @error('Hasta') text-red-500 @enderror">
                Hasta
            </label>
            <input type="date" name="Hasta" id="Hasta"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Hasta') border-red-500 @enderror">
            @error('hasta')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
        <a href="{{ url()->previous() }}" style="border-color:#0053D0; background-color: #0053D0"
            class="text-white border-2 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
    </form>
</x-layout>