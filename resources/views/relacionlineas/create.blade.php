<x-layout>
    <form action="{{  url('/relinea') . '/' . $linea->Id }}" method="POST">
        <x-relacionlineas.form :rel="$relacion" :emp="$empleados" :linea="$linea" />
    </form>
</x-layout>