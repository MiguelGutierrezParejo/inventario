<x-layout>
    <form action="{{ url('/relacionconsumibles') }}" method="POST" enctype="multipart/form-data">
        <x-i_relacionconsumibles.form :relacion="$relacion" :modelos="$modelos" :consumibles="$consumibles" />
    </form>
</x-layout>