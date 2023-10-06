<x-layout>
    <form action="{{  url('/relterm') . '/' . $relacion->Id }}" method="POST">
        @method('PUT')
        <x-relacionterminales.form :emp="$empleados" :rel="$relacion" :term="$terminal" />
    </form>
</x-layout>