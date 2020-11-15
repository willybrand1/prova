<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $agora = date('Y-m-d H:i:s');

        DB::table('produtos')->insert([
            'id' => Uuid::generate(),
            'id_categoria' => Uuid::import('4f7057a0-26a4-11eb-89eb-7b18bb4e8f3d'),
            'nome' => 'BMW 320i',
            'descricao' => 'é um BMW',
            'valor' => 150000,
            'estoque' => 5,
            'dt_cadastro' => $agora
        ]);
    }
}
