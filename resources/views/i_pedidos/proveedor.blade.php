<x-layout>
    <div class="flex flex-col text-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Escoge un proveedor</h1>
        <br>
        <form action="/inventario/public/pedidos/create" method="get" enctype="multipart/form-data">
            @csrf
            <div class="mb-6 mt-6">
                <label for="IdProveedor"
                    class="text-sm font-medium text-gray-900 block mb-2 @error('IdProveedor') text-red-500 @enderror">
                    <strong>Proveedor</strong>  
                </label>
                <select type="text" class="border border-slate-300 px-6 py-2" name="IdProveedor" id="IdProveedor">
                    @foreach ($proveedores as $proveedor)
                        @if ($proveedor->FechaAlta <= date("Y-m-d") && ($proveedor->FechaBaja > date("Y-m-d") || $proveedor->FechaBaja == null))                               
                            <option value="{{ $proveedor->Id }}">{{$proveedor->Nombre}}</option>
                        @endif
                    @endforeach
                </select>
                @error('IdProveedor')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
                <br><br>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
            </div>
        </form>
    </div>
</x-layout>