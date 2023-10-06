<form action="" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <h1 class="text-2xl font-semibold">Añadir foto a {{$equipo->NombreOrdenador}} </h1>
    <br>
    <div class="mb-6">
        <label for="Foto" class="text-sm font-medium text-gray-900 block mb-2 @error('Foto') text-red-500 @enderror">
            Foto
        </label>
        <input type="file" name="Foto" id="Foto" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('Foto') border-red-500 @enderror" value="{{ old('Foto', $foto->Foto) }}">
        @error('Foto')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
        @enderror
    </div>
    <br>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
    <a href="/inventario/public/equipos/{{$equipo->Id}}" class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
</form>