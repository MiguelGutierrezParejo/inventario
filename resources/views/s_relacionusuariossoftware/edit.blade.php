<x-layout>
    <form action="{{  url('/relacionusuariossoftwares') . '/' . $relacion->Id }}" method="POST">
        @method('PUT')
        <x-s_relacionusuariossoftware.form :emp="$empleados" :relacion="$relacion" />
    </form>
</x-layout>
