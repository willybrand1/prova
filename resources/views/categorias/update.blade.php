@extends('menu')
@section('titulo', 'Atualizar categoria')
@section('conteudo')
<div class="m-5">
    <form action="/api/categorias/update/{{ $categorias->id }}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="{{ $categorias->id }}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $categorias->nome }}" />
                </div>
            </div>
            <div class="col-md-6">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $categorias->descricao }}" />
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <input type="submit" class="btn btn-primary" value="Atualizar"/>
                <input type="button" class="btn btn-primary ml-2" value="Voltar" onclick="window.location = '/categorias'">
            </div>
        </div>
    </form>
</div>
@stop