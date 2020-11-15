<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_categoria', 'nome', 'descricao', 'valor', 'estoque', 'dt_cadastro'
    ];

    public static $rules = [
        "nome" => "required|max:100",
        "descricao" => "required|max:255",
        "valor" => "required|numeric|max:8",
        "estoque" => "required|numeric",
        "dt_cadastro" => "required|date_format:Y-m-d H:i:s"
    ];

    protected $casts = [
        'id' => 'string',
        'id_categoria' => 'string'
    ];
}
