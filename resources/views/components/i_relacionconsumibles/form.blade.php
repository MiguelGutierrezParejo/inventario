@csrf
@if ($relacion->Id == null) 
    <h1 class="mb-4 text-2xl font-semibold">Crear relacion</h1>
@else 
    <h1 class="mb-4 text-2xl font-semibold">Editar relacion</h1>
@endif

    <div class="mb-6">
        <label for="Modelo"
            class="text-sm font-medium text-gray-900 block mb-2 @error('Modelo') text-red-500 @enderror">
            Modelo 
        </label>
            
        <select type="text" class="border border-slate-300 px-6 py-2" name="Modelo" id="Modelo" value="{{ old('$relacion->modelo->Modelo', $relacion->IdModelo) }}">                                    
                                    @if ($relacion->IdModelo) 
                                        <option selected value="{{$relacion->IdModelo}}">{{$relacion->modelo->Modelo}}
                                        </option>
                                    @endif
                                    
                                    @foreach ($modelos as $modelo)
                                        <option value="{{ old('$relacion->IdModelo', $modelo->Id) }}">{{ $modelo->Modelo }}</option>
                                    @endforeach
        </select>
        @error('Modelo')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="Consumible"
            class="text-sm font-medium text-gray-900 block mb-2 @error('Consumible') text-red-500 @enderror">
            Consumible 
        </label>
            
        <select type="text" class="border border-slate-300 px-6 py-2" name="Consumible" id="Consumible" value="{{ old('$relacion->consumible->Modelo', $relacion->IdConsumible) }}">                                    
                                    @if ($relacion->IdConsumible) 
                                        <option selected value="{{$relacion->IdConsumible}}">{{$relacion->consumible->IdConsumible}}
                                        </option>
                                    @endif
                                    
                                    @foreach ($consumibles as $consumible)
                                        <option value="{{ old('$relacion->IdConsumible', $consumible->Id) }}">{{ $consumible->Modelo }}</option>
                                    @endforeach
        </select>
        @error('Consumible')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>


<button type="submit"
    class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
<a href="/inventario/public/consumibles" style="border-color:#0053D0; background-color: #0053D0"
    class="text-white border-2 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>