<x-layout>
    <form action="{{  url('/equipos') }}" method="POST">
        <x-equipos.form :equipo="$equipo" :tipos="$tipos" :modelos="$modelos" :contrato="$contrato" />
    </form>
</x-layout>
