<x-layout>
    <form action="{{  url('/relequip') . '/' . $relacion->Id }}" method="POST">
        @method('PUT')
        <x-relacionequipos.form :emp="$empleados" :rel="$relacion" />
    </form>
</x-layout>