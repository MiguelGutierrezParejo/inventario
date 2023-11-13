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
            <span class="font-thin">{{ $modelo->Nombre }}</span>
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
        <table align="center">
            @foreach ($fotos as $foto)
                @if ($foto->IdModelo == $modelo->Id)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . basename($foto->Foto)) }}"
                                width="200px"
                                height="200px"
                                style="padding-bottom: 30px"
                                title="Doble clic para borrar esta imagen"
                                ondblclick="showConfirmation({{ $foto->Id }})">
                            <form action="{{ route('fotoequipos.destroy', ['fotoId' => $foto->Id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>

    <br>

    <div class="flex justify-end space-x-2 pt-3">
        <a href="/inventario/public/modelos" style="background-color: #0053D0"
            class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
    </div>
</x-layout>
