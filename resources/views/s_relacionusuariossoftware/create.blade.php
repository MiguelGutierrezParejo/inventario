<x-layout>
    <form action="{{  url('/relacionusuariossoftwares') . '/' . $software->Id . '/soft' }}" method="POST">
        @csrf

        <div class="mb-6">
            <label for="IdUsuario"
                class="text-sm font-medium text-gray-900 block mb-2 @error('IdUsuario') text-red-500 @enderror">
                Seleccione un usuario:
            </label>

            <select type="text" class="border border-slate-300 px-6 py-2" name="IdUsuario" id="IdUsuario">
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->Id }}">{{ $empleado->Nombre }} ({{ $empleado->Usuario }})</option>
                @endforeach
            </select>
            @error('IdUsuario')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="IdSoftware"
                class="text-sm font-medium text-gray-900 block mb-2 @error('IdSoftware') text-red-500 @enderror">
            </label>
            <input type="hidden" name="IdSoftware" id="IdSoftware"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('IdSoftware') border-red-500 @enderror"
                value="{{ $software->Id }}" readonly>
            @error('IdSoftware')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
        <a href="/inventario/public/softwares/{{$software->Id}}"
            class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
    </form>
</x-layout>
