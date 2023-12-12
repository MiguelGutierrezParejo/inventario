<x-layout>
    <form action="{{ url('/relacionusuariossoftwares') . '/' . $usuario->Id . '/user' }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('POST')
        <h1 class="mb-4 text-2xl font-semibold">Asignar software a {{ $usuario->Nombre }}</h1>

        @if ($softwares->count() == 0)
            <p class="text-red-500 text-sm mt-1 mb-4">No hay software para asignar (no hay licencias disponibles o este
                usuario tiene todos asignados)</p>
        @else
            <div class="mb-6">
                <label for="IdSoftware"
                    class="text-sm font-medium text-gray-900 block mb-2 @error('IdSoftware') text-red-500 @enderror">
                    Software
                </label>

                <select type="text" class="border border-slate-300 px-6 py-2" name="IdSoftware" id="IdSoftware"
                    value="{{ old('$relacionusuariossoftware->software->Nombre', $relacionusuariossoftware->IdSoftware) }}">
                    @if ($relacionusuariossoftware->software)
                        <option selected value="{{ $relacionusuariossoftware->IdSoftware }}">
                            {{ $relacionusuariossoftware->software->Nombre }}</option>
                    @endif
                    <option></option>

                    @foreach ($softwares as $software)
                        @if ($software->Cantidad > $software->relaciones->count() + $software->relacionesequipos->count())
                            <option value="{{ old('$relacionequipossoftware->IdSoftware', $software->Id) }}">
                                {{ $software->Nombre }}</option>
                        @else
                            <option value="{{ old('$relacionequipossoftware->IdSoftware', $software->Id) }}">
                                {{ $software->Nombre }}
                                <p>(Máximo de licencias)</p>
                            </option>
                        @endif
                    @endforeach
                </select>
                @error('IdSoftware')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="Usuario"
                    class="text-sm font-medium text-gray-900 block mb-2 @error('Usuario') text-red-500 @enderror">
                </label>
                <input type="hidden" name="IdUsuario" id="IdUsuario"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Usuario') border-red-500 @enderror"
                    value="{{ old('IdUsuario', $usuario->Id) }}" readonly>
                @error('Usuario')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        @endif
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
        <a href="/inventario/public/usuarios/{{ $usuario->Id }}"
            class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
    </form>
</x-layout>
