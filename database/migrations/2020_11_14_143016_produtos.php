<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produtos extends Migration
{
    public $timestamps = false;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->uuid('id_categoria')->nullable(false);
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->string('nome');
            $table->string('descricao');
            $table->double('valor',8,2);
            $table->integer('estoque');
            $table->timestamp('dt_cadastro',0);
            $table->index(['id','id_categoria','nome','descricao','valor','estoque','dt_cadastro']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}