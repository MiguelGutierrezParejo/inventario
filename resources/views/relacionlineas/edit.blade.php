<x-layout>
    <form action="{{  url('/relinea') . '/' . $relacion->Id }}" method="POST">
        @method('PUT')
        <x-relacionlineas.form :emp="$empleados" :rel="$relacion" :linea="$linea" />
    </form>
</x-layout>