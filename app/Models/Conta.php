<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $table = 'contas';

    protected  $fillable = [
        'pessoa_id',
        'numero',
        'saldo'
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);//->select(['numero']);
    }

    public function movimentacao(){
        return $this->hasMany(Movimentacao::class);
    }
}
