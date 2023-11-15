<x-layout>
    <form action="{{ url('/equipos') . '/' . $equipo->Id }}" method="POST">
        @method('PUT')
        <x-equipos.form :equipo="$equipo" :tipos="$tipos" :modelos="$modelos" :contrato="$contrato" />
    </form>
</x-layout>
