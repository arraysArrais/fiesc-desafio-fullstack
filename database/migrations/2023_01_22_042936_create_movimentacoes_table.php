<?php

use App\Models\Conta;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Conta::class)->references('id')->on('contas')->onDelete('CASCADE');
            $table->decimal('valor', 20, 2)->default(0);
            $table->string('operacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimentacoes', function(Blueprint $table){
            $table->dropForeignIdFor(Conta::class);
        });

        Schema::dropIfExists('movimentacoes');
    }
};
