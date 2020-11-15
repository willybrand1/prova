<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;


class CategoriasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function read()
    {
     
        $categorias = Categorias::all();

        return response()->json($categorias);

    }

     public function create(Request $request)
     {
        $categorias = new Categorias;

        $categorias->id = Uuid::generate();
        $categorias->nome = $request->nome;
        $categorias->descricao = $request->descricao;
       
        if($categorias->save()){
            return redirect('categorias');
        }
     }

     public function show($id)
     {
        $categorias = Categorias::find($id);

        return view('categorias/update')->with('categorias',$categorias);
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
        $categorias = Categorias::find($id);

        $categorias->nome = $request->nome;
        $categorias->descricao = $request->descricao;
        
        if($categorias->save()){
            return redirect('categorias');
        }
     }

     public function destroy($id)
     {
         $produtos = DB::table('produtos')->where('id_categoria','=',$id)->count();

         if($produtos > 0){
            return redirect('categorias')->with('status','Existem produtos registrados nessa categoria');
         }else{
            $categorias = Categorias::find($id);
            
            if($categorias->delete()){
               return redirect('categorias');
            }
         }
     }


    }