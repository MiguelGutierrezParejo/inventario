<x-layout>
    <script defer>
        function showConfirmation(fotoId) {
         if (confirm("¿Seguro que deseas eliminar esta imagen?")) {
             fetch(`/inventario/public/fotos/${fotoId}`, {
                 method: 'DELETE',
                 headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}',
                 },
             })
             .then(response => {
                 location.reload();
             });
         }
     }
     </script>
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Datos del modelo</strong>
            <div>
                <a href="/inventario/public/modelos/edit/{{$modelo->Id}}"
                    style="border-color:#0053D0; background-color: #0053D0" class="text-white bg-blue-700 font-semibold rounded-lg text-sm px-5 py-1 mr-2 text-center">Editar</a>
            </div>
        </div>

        <h3 class="border-t mb-2 pt-3 font-semibold">Nombre:
            <span class="font-thin">{{ $modelo->Modelo }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Observaciones:
            <span class="font-thin">{{ $modelo->Observaciones }}</span>
        </h3>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Fotos asignadas</strong>
            <a href="{{ route('fotoequipos.create', ['id' => $modelo->Id]) }}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Añadir foto</a>
        </div>
        <table class="table-fixed border border-gray-500 border-collapse mt-14">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="w-6/12 bg-gray-300 text-center px-2">Foto</th>
                    <th class="w-6/12 bg-gray-300 text-center px-2">Orden</th>
                    <th class="bg-gray-300"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fotos as $foto )
                <tr class="border border-black">
                    <td class="px-2 border border-black" align="center">
                        <img src="{{ asset('storage/' . basename($foto->Foto)) }}"
                            style="padding-top: 10px; padding-bottom: 10px; max-width:75px"
                            title="Doble clic para borrar esta imagen"
                            ondblclick="showConfirmation({{ $foto->Id }})">
                        <form action="{{ route('fotoequipos.destroy', ['fotoId' => $foto->Id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    <td align="center">
                        <p style="font-size:50px">
                            {{ $foto->Orden}}
                        </p>
                    </td>
                    <td class="px-2" align="right">
                        <a href="{{ route('fotoequipos.edit', ['id' => $foto->Id]) }}">
                            <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>

    <div class="flex justify-end space-x-2 pt-3">
        <a href="/inventario/public/modelos" style="background-color: #0053D0"
            class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
    </div>
</x-layout>
