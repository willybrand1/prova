@extends('menu')
@section('titulo', 'Atualizar produto')
@section('conteudo')
<script>
    $(document).ready(function(){
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
    });
</script>
<div class="m-5">
    <form action="/api/produtos/update/{{ $produtos->id }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="{{ $produtos->id }}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $produtos->nome }}" />
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $produtos->descricao }}" />
                </div>
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control money" id="valor" name="valor" value="{{ $produtos->valor }}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                        <option value="">&nbsp;</option>
                        @foreach($categorias as $row)
                            <option value="{{ $row->id }}" 
                            @foreach($categorias as $k)
                                @if($k->id == $row->id)
                                    selected
                                @endif
                            @endforeach
                            >{{ $row->descricao }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="estoque">Estoque</label>
                    <input type="number" class="form-control" id="estoque" name="estoque" min="0" style="max-width: 50%;" value="{{ $produtos->estoque }}" />
                </div>
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