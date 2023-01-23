<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatePessoaRequest;
use App\Models\Conta;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function trataCpf($cpf){
        $forbiddenChars = ['.', '-'];
        $cpf = str_replace($forbiddenChars, "", $cpf);  
        return $cpf;
    }

    public function index(){

        $pessoas = Pessoa::all();
        // dd($pessoas);

        return view('home', ['pessoas'=>$pessoas]);
    }

    public function createUser(ValidatePessoaRequest $r){

        $data = $r->only('nome','cpf','endereco');
        $data['cpf'] = $this->trataCpf($data['cpf']);
        
        $pessoa = new Pessoa($data);
        if($pessoa->validaCPF($pessoa->cpf)){
            if($pessoa->checaCpfExistente($data['cpf'])){
                return redirect(route('home'))->withErrors(['msg' => "CPF já existente"]);
            }
            $pessoa->save();
        }
        else{
            return redirect(route('home'))->withErrors(['msg' => "CPF inválido"]);
        }
        

        return redirect(route('home'));
    }
    
    public function editUser(Request $r){
        $pessoa = Pessoa::find($r->id);

        return view('editUser', [
            'pessoa'=>$pessoa
        ]);
    }

    public function editUserAction(ValidatePessoaRequest $r){

        $pessoa = Pessoa::find($r->id);

        if($r->nome == null){
            $r->nome = $pessoa->nome;
        }
        if($r->cpf == null){
            $r->cpf = $pessoa->cpf;
        }
        if($r->endereco == null){
            $r->endereco = $pessoa->endereco;
        }

        $pessoa->nome = $r->nome;
        $pessoa->cpf = $this->trataCpf($r->cpf);
        $pessoa->endereco = $r->endereco;
        $pessoa->save();

        return redirect(route('home'));
    }

    public function deleteUserAction(request $r){

        $pessoa = Pessoa::find($r->id);
        $pessoa->delete();

        return redirect(route('home'));
    }
}
