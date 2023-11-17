<x-layout>
    <form action="{{ route('contratos.agregarEquipos', $contrato->Id) }}" method="post">
        @csrf
        @foreach ($equiposDisponibles as $equipo)
            <div class="col mb-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="equipos[]" value="{{ $equipo->Id }}">
                    <label class="form-check-label">
                        {{ $equipo->NombreOrdenador }} - {{ $equipo->NInventario }}
                    </label>
                </div>
            </div>
        @endforeach
        <br>
        <button type="submit"
            class="text-white bg-green-700 hover:bg-green-700 focus:ring-4 focus:ring-green-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>
        <a href="/inventario/public/contratos/{{ $contrato->Id }}"
            style="border-color:#0053D0; background-color: #0053D0" class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
    </form>
</x-layout>
