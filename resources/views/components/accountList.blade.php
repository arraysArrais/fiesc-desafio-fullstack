<div class="container">
    <h2>Lista de Contas</h2>
    <p>Contas cadastradas na base</p>
    <div class="table-responsive-sm">
        <table class="table table-bordered">
            <tr class="thead-dark">
                <th>Nome</th>
                <th>CPF</th>
                <th>Número da conta</th>
                <th>Saldo</th>
                <th>Ações</th>
            </tr>

            @foreach ($pessoasComContas as $pessoaComConta)
                <tr>
                    <td>{{ $pessoaComConta->nome }}</td>
                    <td>{{ $pessoaComConta->cpf }}</td>
                    <td>{{ $pessoaComConta->numero }}</td>
                    <td>{{ $pessoaComConta->saldo }}</td>
                    <td>
                        <div class="actionButtons">
                            <button id="submit" class="btn"><a
                                    href="{{ route('editAccount', ['id' => $pessoaComConta->id]) }}">Editar</a></button>
                            <button id="submit" class="btn"
                                onclick="return confirm('Tem certeza que deseja deletar a conta id {{ $pessoaComConta->id }}?')"><a
                                    href="{{ route('deleteAccount', ['id' => $pessoaComConta->id]) }}">Remover</a></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>