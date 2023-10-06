@csrf
<!-- Coger el usuario guardado en la cookie -->
<?php
    if( isset($_COOKIE["Nombreusuario"]) ) {
        $relacionusuariossoftware->IdUsuario = $_COOKIE["Nombreusuario"];
    }

?>
<h1 class="mb-4 text-2xl font-semibold">Asignar usuario a {{$software->Nombre}}</h1>

<div class="mb-6">
    <label for="Usuario"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Usuario') text-red-500 @enderror">
        Usuario 
    </label>
        
    <select type="text" class="border border-slate-300 px-6 py-2" name="Usuario" id="Usuario" value="{{ old('$relacionusuariossoftware->usuario->Nombre', $relacionusuariossoftware->IdUsuario) }}">
                                    @if ($relacionusuariossoftware->usuario) 
                                        <option selected value="{{$relacionusuariossoftware->IdUsuario}}">{{$relacionusuariossoftware->usuario->Nombre}}</option>
                                    @endif
                                    <option></option>
                                    
                                    @foreach ($emp as $em)
                                        <option value="{{ old('$relacionusuariossoftware->IdUsuario', $em->Id) }}">{{ $em->Nombre }}</option>
                                    @endforeach
    </select>
    @error('Usuario')
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