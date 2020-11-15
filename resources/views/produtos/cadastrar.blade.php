@extends('menu')
@section('titulo', 'Cadastrar produto')
@section('conteudo')
<script>
    $(document).ready(function(){
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
    });
</script>
<div class="m-5">
    <form action="/api/produtos/new" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" />
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" />
                </div>
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control money" id="valor" name="valor" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                        <option value="">&nbsp;</option>
                        @foreach($categorias as $row)
                            <option value="{{ $row->id }}">{{ $row->descricao }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="estoque">Estoque</label>
                    <input type="number" class="form-control" id="estoque" name="estoque" min="0" style="max-width: 50%;" />
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <input type="submit" class="btn btn-primary" value="Cadastrar"/>
                <input type="button" class="btn btn-primary ml-2" value="Voltar" onclick="window.location = '/produtos'">
            </div>
        </div>
    </form>
</div>
@stop