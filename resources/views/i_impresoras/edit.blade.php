<x-layout>
    <form action="{{  url('/impresoras')  . '/' . $impresora->Id  }}" method="POST">
    @method('PUT')
        <x-i_impresoras.form :impresora="$impresora" :modelos="$modelos" :usuarios="$usuarios" />
    </form>
</x-layout>