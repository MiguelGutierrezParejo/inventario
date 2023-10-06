<x-layout>
    <form action="{{  url('/consumibles')  . '/' . $consumible->Id  }}" method="POST">
    @method('PUT')
        <x-i_consumibles.form :consumible="$consumible" />
    </form>
</x-layout>