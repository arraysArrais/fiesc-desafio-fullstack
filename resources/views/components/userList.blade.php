<div class="container">
    <h2>Lista de usuários</h2>
    <p>Usuários cadastrados na base</p>
    <div class="table-responsive-sm">
    <table class="table table-bordered">
        <tr class="thead-dark">
            <th>Nome</th>
            <th>CPF</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>

        @foreach ($pessoas as $pessoa)
            <tr>
                <td>{{ $pessoa->nome }}</td>
                <td>{{ $pessoa->cpf }}</td>
                <td>{{ $pessoa->endereco }}</td>
                <td>
                <div class="actionButtons">
                    <button id="submit" class="btn"><a href="{{ route('editUser', ['id' => $pessoa->id]) }}">Editar</a></button>
                    <button id="submit" class="btn" onclick="return confirm('Tem certeza que deseja deletar o usuário {{$pessoa->nome}}?')"><a href="{{ route('deleteUser', ['id' => $pessoa->id]) }}">Remover</a></button>
                </div>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
  </div>