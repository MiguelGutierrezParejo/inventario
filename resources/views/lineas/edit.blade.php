<x-layout>
    <form action="{{ url('/lineas') . '/' . $linea->Id }}" method="POST">
        @method('PUT')
        <x-lineas.form :linea="$linea" />
    </form>
</x-layout>