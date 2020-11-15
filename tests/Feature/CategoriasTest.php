<?php

namespace Tests\Feature;

use Tests\TestCase;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use App\Categorias;

class CategoriasTest extends TestCase
{
    /**
     * /api/categorias/read [GET]
     */
    public function testCreateCategoria(){

        $formData = [
            'id' => Uuid::generate(),
            'nome' => 'motos',
            'descricao' => 'categoria de motos'
        ];

        $this->post('/api/categorias/new',$formData)->assertStatus(302);
    }

    public function testUpdateCategoria(){
        $categorias = DB::table('categorias')->where('nome', 'motos')->first();
        $id = $categorias->id;

        $formData = [
            'nome' => 'bicicletas',
            'descricao' => 'categoria de bicicletas'
        ];
        $this->put('/api/categorias/update/'.$id,$formData)->assertStatus(302);
    }

    public function testDeleteCategoria(){
        $categorias = Categorias::where('nome','bicicletas')->get();
        $id = $categorias[0]->id;
        $this->delete('/api/categorias/delete/'.$id)->assertStatus(302);
    }

    public function testReadCategoria(){
        $this->get('/api/categorias/read')->assertStatus(200);
    }
}
