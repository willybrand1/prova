@extends('menu')
@section('titulo', 'Teste - categorias')
@section('conteudo')
<div class="m-5">
    <div class="row">
        <div class="col-md-2">
            <input type="button" id="new" value="Nova categoria" class="btn btn-primary" onclick="window.location = '/categorias/cadastrar'">
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
    <table class="table table-bordered table-striped" style="width: 100%" id="tab_categorias">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        var myTable = $("#tab_categorias").DataTable({
            dom: 'Bfrtip',
            responsive: true,
    	    bDeferRender: true,
            ajax: {
                url: '/api/categorias/read',
                dataSrc: ''
            },
            columnDefs: [
    		    {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [ 3 ],
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        let txt = '';
                        txt += '<form action="api/categorias/delete/'+data['id']+'" method="post">';
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
    			{ "data": "nome" },
                { "data": "descricao" }
    		],
            buttons: [
                'excelHtml5'
            ],
        });
        $('#tab_categorias').on( 'dblclick', 'tbody tr', function(){
            let id = myTable.row( this ).data().id;
            window.location.href = 'api/categorias/show/'+id;
        });
        
        /*$('#tab_categorias tbody').on('click', 'button', function (){
            let data = myTable.row( $(this).parents('tr') ).data();
            let id = data['id'];
            window.location.href = 'api/categorias/delete/'+id;
        });*/
    });
</script>
@stop