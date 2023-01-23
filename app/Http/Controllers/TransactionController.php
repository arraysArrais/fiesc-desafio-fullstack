<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Movimentacao;
use App\Models\Pessoa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function index()
    {

        $movimentacoes = DB::select('select m.id as id_movimentacao, p.id as id_pessoa, p.nome, p.cpf, c.id as id_conta, c.saldo from movimentacoes m
        inner join contas c on c.id = m.conta_id  
        inner join pessoas p on p.id = c.pessoa_id');

        // $pessoasComContas = DB::select('select c.id, p.id as pessoa_id, p.nome, p.cpf, c.numero, c.saldo from contas c
        // inner join pessoas p on p.id = c.pessoa_id
        // GROUP BY pessoa_id 
        // HAVING COUNT(c.id) >= 1;');

        // foreach($pessoasComContas as $pessoaComContas){
        //     $pessoaComContas->saldo = number_format($pessoaComContas->saldo, 2, ',', '.');
        // }

        $pessoasComContas = Pessoa::has('conta')->with('conta')->get(); //funcionando, todos os registros de Pessoa que têm conta, com os dados da conta

        $contas = Conta::all();

        return view('transaction', [
            'movimentacoes' => $movimentacoes,
            'pessoasComContas' => $pessoasComContas,
            'contas' => $contas
        ]);
    }

    public function getContasByPessoaId(Request $r)
    {
        $contas = Conta::where('pessoa_id', $r->pessoa_id)->get();

        foreach ($contas as $conta) {
            $conta->saldo = number_format($conta->saldo, 2, ',', '.');
        }

        return response()->json($contas);
    }

    public function createMovimentacao(Request $r)
    {
        
        $forbiddenChars = [','];
        $r->valor = str_replace($forbiddenChars, '.', $r->valor);
        // dd($r->valor);
        // dd($r->valor);
        
        

        $conta = Conta::find($r->conta);



        if ($r->operacao == 'Depósito') {
            $conta->saldo += $r->valor;
            $conta->save();
        }
        if ($r->operacao == 'Retirada') {
            //checando se possui saldo suficiente
            if ($conta->saldo >= $r->valor) {
                $conta->saldo -= $r->valor;
                $conta->save();
            }
            else{
                return redirect(route('movimentacao'))->withErrors(['msg' => "Saldo insuficiente. O saldo da conta $conta->numero é de R$ $conta->saldo e você tentou retirar R$ $r->valor"]);
            }
        }

        $movimentacao = new Movimentacao();
        $movimentacao->conta_id = $r->conta;
        $movimentacao->valor = $r->valor;
        $movimentacao->operacao = $r->operacao;
        $movimentacao->save();

        return redirect(route('movimentacao'));
    }

    public function getMovimentacoesByContaId(Request $r)
    {
        $movimentacoes = Movimentacao::where('conta_id', $r->conta_id)->get();
        // dd($movimentacoes);

        foreach ($movimentacoes as $movimentacao) {
            $movimentacao->valor = number_format($movimentacao->valor, 2, ',', '.');
            $x = Carbon::parse($movimentacao->created_at)->setTimezone('America/Sao_Paulo');
        }

        

        return response()->json($movimentacoes);
    }
}
