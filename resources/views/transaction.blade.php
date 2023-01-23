<x-layout>
    <x-navbar />

    <x-createTransactionForm :pessoasComContas="$pessoasComContas" />
    <x-transactionsTable />

    <x-transactionScripts />
</x-layout>
