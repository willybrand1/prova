<?php

namespace App\Http\Controllers;

use App\Produtos;
use App\Categorias;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;


class ProdutosController extends Controller
{
    public function cadastrar(){
        $categorias = Categorias::all();

        return view('/produtos/cadastrar')->with('categorias',$categorias);
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function read()
    {
     
        $produtos = DB::table('produtos')
        ->join('categorias','categorias.id','=','produtos.id_categoria')
        ->select('produtos.*','categorias.nome as cat_desc')
        ->get();
        
        return response()->json($produtos);

    }

     public function create(Request $request)
     {
        $produtos = new Produtos;

        date_default_timezone_set('America/Sao_Paulo');
        $agora = date('Y-m-d H:i:s');

        $produtos->id = Uuid::generate();
        $produtos->id_categoria = $request->categoria;
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->valor = (integer)str_replace('.','',str_replace(',','',$request->valor));
        $produtos->estoque = $request->estoque;
        $produtos->dt_cadastro = $agora;
       
        if($produtos->save()){
            return redirect('produtos');
        }
     }

     public function show($id)
     {
        $produtos = Produtos::find($id);
        $categorias = Categorias::all();

        return view('produtos/update')->with(compact('produtos','categorias'));
     }

     /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
     public function update(Request $request, $id)
     { 
        $produtos = Produtos::find($id);

        $produtos->id_categoria = $request->categoria;
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->valor = (integer)str_replace('.','',str_replace(',','',$request->valor));
        $produtos->estoque = $request->estoque;
        
        if($produtos->save()){
            return redirect('produtos');
        }
     }

     public function destroy($id)
     {
         $produtos = Produtos::find($id);
            
         if($produtos->delete()){
            return redirect('produtos');
         }
     }


    }