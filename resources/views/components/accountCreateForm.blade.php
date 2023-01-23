<div class="formContainer">
    <form class="border border-light p-5" method="POST" action="{{ route('createAccount') }}">    
        <p class="h4 mb-4 text-center">Cadastro de Conta</p>
        @csrf
        <x-validate_error/>
        <div class="form-group">
            <select class="form-control" name="pessoa_id" required>
                <option value="" disabled selected="selected">Selecione o usuário</option>
                @foreach ($pessoas as $pessoa)
                    <option value="{{$pessoa->id}}">{{"$pessoa->nome - $pessoa->cpf"}}</option>
                @endforeach
              </select>
        </div>
        <input type="number" name="numero" class="form-control mb-4" placeholder="Número da conta" required>
        <button id="submit" class="btn btn-info btn-block my-4" type="submit">Salvar</button>
    </form>
</div>