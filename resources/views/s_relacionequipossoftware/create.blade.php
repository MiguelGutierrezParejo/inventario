<x-layout>
    <form action="{{  url('/relacionequipossoftwares') . '/' . $software->Id . '/soft' }}" method="POST">
        <x-s_relacionequipossoftware.form :software="$software" :equipos="$equipos" :relacionequipossoftware="$relacionequipossoftware" />
    </form>
</x-layout>