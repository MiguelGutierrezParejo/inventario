<x-layout>
    <form action="{{  url('/lineas') }}" method="POST">
        <x-lineas.form :linea="$linea" :terminal="$terminal" />
    </form>
</x-layout>
