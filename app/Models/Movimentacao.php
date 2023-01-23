<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $table = 'movimentacoes';

    protected $fillable = [
        'conta_id',
        'valor',
        'operacao',
        // 'created_at'
    ];
    

    public function conta(){
        return $this->belongsTo(Conta::class);
    }

}
