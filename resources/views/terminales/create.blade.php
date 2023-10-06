<x-layout>
    <form action="{{  url('/terminales') }}" method="POST">
        <x-terminales.form :terminal="$terminal" />
    </form>
</x-layout>