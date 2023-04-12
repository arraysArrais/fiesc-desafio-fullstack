
<x-validate_error/>

<x-layout>
    <div class="formContainer">
        <form class="border border-light p-5" method="POST" action="{{ route('editUserAction', ['id'=>$pessoa->id]) }}">
            <p class="h4 mb-4 text-center">Editar cadastro de pessoa</p>
            @csrf
            <input onkeyup="corrigirValor(this)" type="text" name="nome" id="nome" class="form-control mb-4" value="{{$pessoa->nome}}" required>
            <input type="text" name="cpf" id="cpf" class="form-control mb-4" value="{{$pessoa->cpf}}" disabled>
            <input type="text" name="endereco" class="form-control mb-4" value="{{$pessoa->endereco}}" required>
            <button id="submit" class="btn btn-info btn-block my-4" type="submit">Salvar</button>
        </form>
    </div>
</x-layout>