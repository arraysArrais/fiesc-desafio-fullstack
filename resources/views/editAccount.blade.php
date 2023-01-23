<x-layout>
    <div class="formContainer">
        <form class="border border-light p-5" method="POST" action="{{ route('editAccountAction') }}">    
            <p class="h4 mb-4 text-center">Editar cadastro de Conta</p>
            @csrf
            <x-validate_error/>
            <input type="hidden" name="id" value="{{$conta->id}}">
            <input type="text" class="form-control mb-4" value="{{"$pessoa->nome - $pessoa->cpf"}}" required disabled>
            <input type="number" name="numero" class="form-control mb-4" value="{{$conta->numero}}" placeholder="Número da conta" required>
            <button id="submit" class="btn btn-info btn-block my-4" type="submit">Editar</button>
        </form>
    </div>
</x-layout>