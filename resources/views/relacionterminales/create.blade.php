<x-layout>
    <form action="{{  url('/relterm') . '/' . $terminal->Id }}" method="POST">
        <x-relacionterminales.form :rel="$relacion" :emp="$empleados" :term="$terminal" />
    </form>
</x-layout>