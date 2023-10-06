<x-layout>
    <form action="{{  url('/impresoras') }}" method="POST">
        <x-i_impresoras.form :impresora="$impresora" :modelos="$modelos" :usuarios="$usuarios" />
    </form>
</x-layout>