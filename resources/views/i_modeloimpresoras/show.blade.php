<x-layout>
    <script defer>
        function showConfirmation(id) {
            if (confirm("¿Seguro que deseas eliminar esta imagen?")) {
                fetch(`/inventario/public/fotoimpresora/${id}`, {
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
            <a href="/inventario/public/modeloimpresoras/edit/{{ $modelo->Id }}" style="background-color: #0053D0"
                class="text-white focus:ring-4 font-semibold rounded-lg text-sm px-5 py-1">Editar</a>
        </div>

        <h3 class="border-t mb-2 pt-3 font-semibold">Id:
            <span class="font-thin">{{ $modelo->Id }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Marca:
            <span class="font-thin">{{ $modelo->Marca }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Modelo:
            <span class="font-thin">{{ $modelo->Modelo }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha de Alta:
            <span class="font-thin">{{ $modelo->FechaAlta }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha de Baja:
            <span class="font-thin">{{ $modelo->FechaBaja }}</span>
        </h3>
        <h3 class="border-t mb-2 pt-3 font-semibold">Observaciones:
            <span class="font-thin">{{ $modelo->Observaciones }}</span>
        </h3>
    </div>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg mt-4">
        <div class="flex justify-between">
            <strong class="text-2xl">Impresoras</strong>
        </div>

        <table class="table-fixed border border-gray-500 border-collapse mt-14">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="w-3/12 bg-gray-300 text-left px-2">Usuario</th>
                    <th class="w-2/12 bg-gray-300 text-left px-2">Número de serie</th>
                    <th class="w-1/12 bg-gray-300 text-left px-2">Baja</th>
                    <th class="w-4/12 bg-gray-300 text-left px-2">Observaciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($modelo->impresoras as $impresora)
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black"><a>{{ $impresora->usuario->Nombre }}</a></td>
                        <td class="px-2 border border-black"><a href="">{{ $impresora->NumSerie }}</a></td>
                        <td class="text-left px-2 border border-black">
                            @if ($impresora->Baja == 0)
                                <a href="/inventario/public/impresoras/{{ $impresora->Id }}">No</a>
                            @else
                                <a href="/inventario/public/impresoras/{{ $impresora->Id }}">Si</a>
                            @endif
                        </td>
                        <td class="px-2 border border-black"><a href="">{{ $impresora->Observaciones }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <div class="flex justify-between">
            <strong class="text-2xl">Fotos asignadas</strong>
            <a href="{{ route('fotoimpresoras.create', ['id' => $modelo->Id]) }}"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Añadir
                foto</a>
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
                @foreach ($fotos as $foto)
                    <tr class="border border-black">
                        <td class="px-2 border border-black" align="center">
                            <img src="{{ asset('storage/' . basename($foto->Foto)) }}"
                                style="padding-top: 10px; padding-bottom: 10px; max-width:75px"
                                title="Doble clic para borrar esta imagen"
                                ondblclick="showConfirmation({{ $foto->Id }})">
                            <form action="{{ route('fotoimpresoras.destroy', ['id' => $foto->Id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                        <td align="center">
                            <p style="font-size:50px">
                                {{ $foto->Orden }}
                            </p>
                        </td>
                        <td class="px-2" align="right">
                            <a href="{{ route('fotoimpresoras.edit', ['id' => $foto->Id]) }}">
                                <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>

    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg mt-4">
        <div class="flex justify-between">
            <strong class="text-2xl">Consumibles asociados</strong>
            <a href="/inventario/public/modeloimpresoras/{{ $modelo->Id }}/consumibles"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-1">Añadir
                consumible</a>
        </div>

        <table class="table-fixed border border-gray-500 border-collapse mt-14">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="w-6/12 bg-gray-300 text-left px-2">Modelo</th>
                    <th class="w-6/12 bg-gray-300 text-left px-2">Observaciones</th>
                    <th class="w-5/12 bg-gray-300 text-left px-2"></th>
                    <th class="w-5/12 bg-gray-300 text-left px-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modelo->relaciones as $relacion)
                    <tr class="border border-black">
                        <td class="text-left px-2 border border-black"><a href="/inventario/public/consumibles/{{$relacion->consumible->Id}}">
                            {{ $relacion->consumible->Modelo }}
                        </a></td>
                        <td class="px-2 border border-black"><a href="/inventario/public/consumibles/{{$relacion->consumible->Id}}">
                            {{ $relacion->Observaciones }}
                        </a></td>
                        <td class="px-2">
                            <a href="/inventario/public/relacionconsumibles/edit/{{ $relacion->Id }}">
                                <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </td>
                        <td class="px-2">
                            <form action="/inventario/public/relacionconsumibles/{{ $relacion->Id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Está seguro de borrar esta asignación?')" type="submit">
                                    <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end space-x-2 pt-3">
        <a href="/inventario/public/modeloimpresoras" style="background-color: #0053D0"
            class="transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2">Volver</a>
    </div>

</x-layout>
