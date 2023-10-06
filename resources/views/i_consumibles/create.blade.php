<x-layout>
    <form action="{{  url('/consumibles') }}" method="POST">
        <x-i_consumibles.form :consumible="$consumible" />
    </form>
</x-layout>