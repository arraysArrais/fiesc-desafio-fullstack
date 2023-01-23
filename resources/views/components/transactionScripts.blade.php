<script>
    $("#pessoaselect").change(function() {
        var pessoa_id = $('#pessoaselect').val();
        // alert (pessoa_id); 
        $.ajax({
            url: '/contas/' + pessoa_id,
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                var options =
                    "<option value='' disabled selected='selected'>Selecione a conta</option>";
                $.each(response, function(index, value) {
                    options += "<option value='" + value.id + "'>" + value.numero +
                        " - Saldo: R$ " + value.saldo + "</option>";
                });
                $("#secondSelect").html(options);

            },
            error: function(error) {
                console.log('error making request to getContasByPessoaId route')
            }
        });
    });

    //atualizando o valor do elemento $saldo, responsável por exibir o saldo
    $("#secondSelect").change(function() {
        var selectedOptionText = $("#secondSelect option:selected").text();
        var saldo = selectedOptionText.substring(selectedOptionText.indexOf("R$"));
        $("#saldo").text("Saldo: " + saldo);
    });

    //excluindo os elements <td> do select de contas
    $("#secondSelect").change(function() {

        $("#extrato tr").each(function() {
            $(this).find("td").each(function() {
                $(this).remove();
            });
        });

        //pegando id da conta
        var conta_id = $('#secondSelect').val();
        // alert (conta_id);

        //ajax request pra api de movimentações passando id de conta
        $.ajax({
            url: '/movimentacoes/' + conta_id,
            type: 'GET',
            success: function(response) {
                var table = $("#extrato");
                $.each(response, function(index, value) {
                    //populando tabela de extrato
                    var row = "<tr><td>" + value.created_at + "</td><td class='" + (value
                            .operacao === 'Retirada' ? 'retirada' : 'deposito') + "'>" +
                        "R$ " + (value.operacao === 'Retirada' ? '-' + value.valor : value
                            .valor) +
                        "</td>" + "<td>" + value.operacao + "</td>" + "</tr>";
                    table.append(row);
                });
            },
            error: function(error) {
                console.log('error making request to getMovimentacoesByContaId route')
            }
        });

    });
</script>
<script>
    document.querySelector("input[name='valor']").addEventListener("keypress", function(e) {
        var key = e.which || e.keyCode;
        if (!(key >= 48 && key <= 57) && key !== 44) {
            e.preventDefault();
        }
    });
</script>
