<x-layout>
    <x-navbar />
    <x-accountCreateForm :pessoas="$pessoas" />

    <x-accountList :pessoasComContas="$pessoasComContas" />

</x-layout>
