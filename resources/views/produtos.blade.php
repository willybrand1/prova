@extends('menu')
@section('titulo', 'Teste - produtos')
@section('conteudo')
<div class="m-5">
    <div class="row">
        <div class="col-md-2">
            <input type="button" id="new" value="Nova categoria" class="btn btn-primary" onclick="window.location = '/produtos/cadastrar'">
        </div>
    </div>
    <br />
    @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-bordered table-striped" style="width: 100%" id="tab_produtos">
        <thead>
            <tr>
                <th>Id</th>
                <th>Id categoria</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Estoque</th>
                <th>Data de cadastro</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        var myTable = $("#tab_produtos").DataTable({
            dom: 'Bfrtip',
            responsive: true,
    	    bDeferRender: true,
            ajax: {
                url: '/api/produtos/read',
                dataSrc: ''
            },
            columnDefs: [
    		    {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [ 7 ],
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        let txt = '';
                        txt += '<form action="api/produtos/delete/'+data['id']+'" method="post">';
                        txt += '<input class="btn btn-danger" type="submit" value="Delete" />';
                        txt += '{!! method_field("delete") !!}';
                        txt += '{!! csrf_field() !!}';
                        txt += '</form>';
                        return txt;
                    }
                }
            ],
            columns: [
    			{ "data": "id" },
                { "data": "id_categoria" },
    			{ "data": "nome" },
                { "data": "descricao" },
                { "data": "valor" },
                { "data": "estoque" },
                { "data": "dt_cadastro" }
    		],
            buttons: [
                'excelHtml5'
            ],
        });
        
        $('#tab_produtos').on( 'dblclick', 'tbody tr', function(){
            let id = myTable.row( this ).data().id;
            window.location.href = 'api/produtos/show/'+id;
        });
    });
</script>
@stop