<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pessoa;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pessoa::class)->references('id')->on('pessoas')->onDelete('CASCADE');
            $table->string('numero');
            $table->decimal('saldo', 20, 2)->default(0);
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
        Schema::table('contas', function(Blueprint $table){
            $table->dropForeignIdFor(Pessoa::class);
        });

        Schema::dropIfExists('contas');
    }
};
