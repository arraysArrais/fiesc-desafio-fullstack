

<div class="formContainer">
    <form class="border border-light p-5" method="POST" action="{{ route('createUser') }}">    
        <p class="h4 mb-4 text-center">Cadastro de pessoa</p>
        @csrf
        <x-validate_error/>
        <input onkeyup="corrigirValor(this)" type="text" name="nome" id="nome" class="form-control mb-4" placeholder="Insira seu nome">
        <input type="text" name="cpf" id="cpf" class="form-control mb-4" placeholder="Insira seu CPF">
        <input type="text" name="endereco" class="form-control mb-4" placeholder="Insira seu endereço">


        <button id="submit" class="btn btn-info btn-block my-4" type="submit">Salvar</button>
    </form>
</div>