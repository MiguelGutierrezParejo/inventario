<x-layout>
    <form action="{{  url('/lineas') }}" method="POST">
        <x-lineas.form :linea="$linea" />
    </form>
</x-layout>