<x-layout>
    <form action="{{  url('/relacionusuariossoftwares') . '/' . $software->Id . '/soft' }}" method="POST">
        <x-s_relacionusuariossoftware.form :software="$software" :emp="$empleados" :relacionusuariossoftware="$relacionusuariossoftware" />
    </form>
</x-layout>