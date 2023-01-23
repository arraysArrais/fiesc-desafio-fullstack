<div class="formContainer">
    <form class="border border-light p-5" method="POST" action="{{ route('createMovimentacao') }}">
        <p class="h4 mb-4 text-center">Cadastro de movimentação</p>
        @csrf
        <x-validate_error />
        <div class="form-group">
            <select class="form-control" name="pessoa_id" id="pessoaselect" required>
                <option value="" disabled selected="selected">Selecione o usuário</option>
                @foreach ($pessoasComContas as $pessoaComContas)
                    <option value="{{ $pessoaComContas->id }}">
                        {{ "$pessoaComContas->nome - $pessoaComContas->cpf" }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="conta" id='secondSelect'>
                <option value="" disabled selected="selected">Selecione a conta</option>
            </select>
        </div>
        <input type="text" name="valor" class="form-control mb-4" placeholder="Valor R$"
            required>
        <div class="form-group">
            <select class="form-control" name="operacao">
                <option value="" disabled selected="selected">Selecione o tipo de operação</option>
                <option>Depósito</option>
                <option>Retirada</option>
            </select>
        </div>
        <button id="submit" class="btn btn-info btn-block my-4" type="submit">Salvar</button>
    </form>
</div>