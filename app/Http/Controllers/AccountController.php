<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateAccountRequest;
use App\Models\Conta;
use App\Models\Movimentacao;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index(){
        // $pessoas = Pessoa::with('conta:pessoa_id,numero')->get();
        $pessoas = Pessoa::all();
        $pessoasComConta = Pessoa::has('conta')->with('conta:pessoa_id,numero')->get();

        
        // $contaComPessoas = Conta::has('pessoa')->get();
        $pessoasComContas = DB::select('select c.id, p.nome, p.cpf, c.numero, c.saldo from contas c
        inner join pessoas p on p.id = c.pessoa_id');
        
        foreach($pessoasComContas as $pessoaComContas){
            $pessoaComContas->saldo = number_format($pessoaComContas->saldo, 2, ',', '.');
        }
        


        return view('account',[
            'pessoas' => $pessoas,
            'pessoasComContas' => $pessoasComContas
        ]);
    }

    public function createAccount(ValidateAccountRequest $r){
       $data = $r->only('pessoa_id', 'numero');
       $conta = new Conta($data);
       $conta->save();

       return redirect(route('conta'));
    }

    public function editAccount(Request $r){
        $conta = Conta::find($r->id);
        $pessoa = Pessoa::find($conta->pessoa_id);

        return view ('editAccount', [
            'conta'=>$conta,
            'pessoa'=>$pessoa
        ]);
    }

    public function editAccountAction(Request $r){
        $conta = Conta::find($r->id);

        if($r->numero == null){
            $r->numero = $conta->numero;
        }

        $conta->numero = $r->numero;
        $conta->save();

        return redirect(route('conta'));
    }

    public function deleteAccountAction(Request $r){
        $conta = Conta::find($r->id);
        if(Movimentacao::where('conta_id', $r->id)->count()>=1){
            return redirect(route('conta'))->withErrors(['msg' => "Essa conta não pode ser excluída pois possui movimentações"]);
        }
        $conta->delete();

        return redirect(route('conta'));
    }
}
