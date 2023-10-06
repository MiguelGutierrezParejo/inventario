@csrf
@if ($software->Id)
    <h1 class="text-2xl font-semibold">Editar software</h1>
@else
    <h1 class="text-2xl font-semibold">Añadir software</h1>
@endif
    <div class="mt-6 mb-6">
        <label for="Proveedor"
            class="text-sm font-medium text-gray-900 block mb-2 @error('Proveedor') text-red-500 @enderror">
            Proveedor 
        </label>
            
        <select type="text" class="border border-slate-300 px-6 py-2" name="Proveedor" id="Proveedor" value="{{ old('$software->proveedor->Nombre', $software->Id) }}">
                                    @if ($software->IdProveedor) 
                                        <option value="{{ $software->proveedor->Nombre }}">{{ $software->proveedor->Nombre }}</option>
                                    @endif                                   
                                    @foreach ($proveedores as $proveedor)
                                        @if ($software->IdProveedor) 
                                            @if ($software->proveedor->Nombre != $proveedor->Nombre)
                                                <option value="{{ old('$software->IdProveedor', $proveedor->Nombre) }}">{{ $proveedor->Nombre }}</option>
                                            @endif
                                        @else 
                                            <option value="{{ old('$software->IdProveedor', $proveedor->Nombre) }}">{{ $proveedor->Nombre }}</option>
                                        @endif
                                    @endforeach
        </select>
        @error('Proveedor')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
    </div>

<div class="mb-6">
    <label for="Nombre"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Nombre') text-red-500 @enderror">
        Nombre
    </label>
    <input type="text" name="Nombre" id="Nombre"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Nombre') border-red-500 @enderror"
        value="{{ old('Nombre', $software->Nombre) }}">
    @error('Nombre')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Cantidad"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Cantidad') text-red-500 @enderror">
        Cantidad
    </label>
    <input type="number" name="Cantidad" id="Cantidad" min=0
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('Cantidad') border-red-500 @enderror"
        value="{{ old('Cantidad', $software->Cantidad) }}">
    @error('Cantidad')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="Tipo"
        class="text-sm font-medium text-gray-900 block mb-2 @error('Tipo') text-red-500 @enderror">
        Tipo (Anual o Perpetua)
    </label>
    <input type="text" name="Tipo" id="Tipo"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('Tipo') border-red-500 @enderror"
        value="{{ old('Tipo', $software->Tipo) }}">
    @error('Tipo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="FechaAlta"
        class="text-sm font-medium text-gray-900 block mb-2 @error('FechaAlta') text-red-500 @enderror">
        FechaAlta
    </label>
    @if ($software->FechaAlta)
    <input type="date" name="FechaAlta" id="FechaAlta" 
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
        value="{{ old('FechaAlta', $software->FechaAlta->format('Y-m-d')) }}">
    @else 
        <input type="date" name="FechaAlta" id="FechaAlta"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaAlta') border-red-500 @enderror"
            value="{{ old('FechaAlta', $software->FechaAlta) }}">
    @endif
    @error('FechaAlta')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="FechaBaja"
        class="text-sm font-medium text-gray-900 block mb-2 @error('FechaBaja') text-red-500 @enderror">
        Fecha Baja
    </label>
    @if ($software->FechaBaja)
    <input type="date" name="FechaBaja" id="FechaBaja" 
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
        value="{{ old('FechaBaja', date('d-m-Y', strtotime($software->FechaBaja))) }}">
    @else 
        <input type="date" name="FechaBaja" id="FechaBaja"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('FechaBaja') border-red-500 @enderror"
            value="{{ old('FechaBaja', $software->FechaBaja) }}">
    @endif
    @error('FechaBaja')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="mb-6">
    <label for="PrecioAdquisicion"
        class="text-sm font-medium text-gray-900 block mb-2 @error('PrecioAdquisicion') text-red-500 @enderror">
        Precio de adquisición
    </label>
    <input type="text" name="PrecioAdquisicion" id="PrecioAdquisicion"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 @error('PrecioAdquisicion') border-red-500 @enderror"
        value="{{ old('PrecioAdquisicion', $software->PrecioAdquisicion) }}">
    @error('PrecioAdquisicion')
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
        value="{{ old('Observaciones', $software->Observaciones) }}">
    @error('Modelo')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>


<div class="mt-4">
    <button type="submit"
    class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
    <a href="/inventario/public/softwares/{{ $software->Id }}"
        style="border-color:#0053D0; background-color: #0053D0" class="text-white border-2 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
</div>

