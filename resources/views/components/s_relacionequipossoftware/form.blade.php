@csrf

<h1 class="mb-4 text-2xl font-semibold">Asignar equipo a {{$software->Nombre}}</h1>

<div class="mb-6">
    <label for="Equipo"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Equipo') text-red-500 @enderror">
        Equipo 
    </label>
        
    <select type="text" class="border border-slate-300 px-6 py-2" name="Equipo" id="Equipo" value="{{ old('$relacionequipossoftware->usuario->Nombre', $relacionequipossoftware->IdUsuario) }}">
                                    @if ($relacionequipossoftware->usuario) 
                                        <option selected value="{{$relacionequipossoftware->IdEquipo}}">{{$relacionequipossoftware->equipo->NombreOrdenador}}</option>
                                    @endif
                                    <option></option>
                                    
                                    @foreach ($equipos as $equipo)
                                        <option value="{{ old('$relacionequipossoftware->IdEquipo', $equipo->Id) }}">{{ $equipo->NombreOrdenador }}</option>
                                    @endforeach
    </select>
    @error('Equipo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="IdSoftware"
        class="text-sm font-medium text-gray-900 block mb-2 @error('IdSoftware') text-red-500 @enderror">
        Software
    </label>
    <input type="text" name="IdSoftware" id="IdSoftware"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('IdSoftware') border-red-500 @enderror"
        value="{{ old('IdSoftware', $software->Id) }}" readonly>
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