<x-layout>
    <form action="{{  url('/relacionequipossoftwares') . '/' . $equipo->Id . '/equip' }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('POST')
        <h1 class="mb-4 text-2xl font-semibold">Asignar software al equipo: {{$equipo->NombreOrdenador}}</h1>

        @if ($softwares->count() == 0) 
            <p class="text-red-500 text-sm mt-1 mb-4">No hay software para asignar (no hay licencias disponibles o este equipo tiene todos asignados)</p>
        @else
        <div class="mb-6">
            <label for="IdSoftware"
                class="text-sm font-medium text-gray-900 block mb-2 @error('IdSoftware') text-red-500 @enderror">
                Software 
            </label>
                
            <select type="text" class="border border-slate-300 px-6 py-2" name="IdSoftware" id="IdSoftware" 
                    value="{{ old('$relacionequipossoftware->software->Nombre', $relacionequipossoftware->IdSoftware) }}">
                                            @if ($relacionequipossoftware->software) 
                                                <option selected value="{{$relacionequipossoftware->IdSoftware}}">{{$relacionequipossoftware->software->Nombre}}</option>
                                            @endif
                                            <option></option>
                                            
                                            @foreach ($softwares as $software)
                                                @if ($software->Cantidad > $software->relaciones->count() + $software->relacionesequipos->count())
                                                    <option value="{{ old('$relacionequipossoftware->IdSoftware', $software->Id) }}">{{ $software->Nombre }}</option>
                                                @else
                                                    <option value="{{ old('$relacionequipossoftware->IdSoftware', $software->Id) }}">{{ $software->Nombre }} 
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
            <label for="FechaAlta"
                class="text-sm font-medium text-gray-900 block mb-2 @error('FechaAlta') text-red-500 @enderror">
                Fecha de alta
            </label>
                <input type="date" name="FechaAlta" id="FechaAlta"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror">
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
                <input type="date" name="FechaBaja" id="FechaBaja"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror">
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
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Observaciones') border-red-500 @enderror">
            @error('Observaciones')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="Equipo"
                class="text-sm font-medium text-gray-900 block mb-2 @error('Equipo') text-red-500 @enderror">
            </label>
            <input type="hidden" name="Equipo" id="Equipo"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Equipo') border-red-500 @enderror"
                value="{{ old('Equipo', $equipo->Id) }}" readonly>
            @error('Equipo')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        @endif
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
        <a href="/inventario/public/equipos/{{$equipo->Id}}"
            class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
    </form>
</x-layout>