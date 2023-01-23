<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pessoa::Create([
            'nome' => 'Marcelo Ramos',
            'cpf' => '48349778032',
            'endereco' => 'Rua Luiz Demo, n 120, Bairro Passagem, Tubarão/SC',
        ]);
        Pessoa::Create([
            'nome' => 'Renato Silva',
            'cpf' => '76537136024',
            'endereco' => 'Rua Alexandre de Sá, n 98, Bairro Dehon, Tubarão/SC',
        ]);
        Pessoa::Create([
            'nome' => 'Maria Cordeiro',
            'cpf' => '01054804010',
            'endereco' => 'Rua Júlio Pozza, n 450, Bairro São João, Tubarão/SC',
        ]);
    }
}
