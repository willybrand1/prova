@extends('menu')
@section('titulo', 'Teste')
@section('conteudo')
<div class="jumbotron ml-3 mr-3 mt-3">
    <h1 class="display-4">Olá, avaliador!</h1>
    <p class="lead">
        Fico feliz em apresentar esse pequeno sisteminha.
    </p>
    <hr class="my-4">
    <p>
        Uma dica, para editar uma linha da tabela, basta dar <span style="font-weight: bold;">2 (dois) cliques</span> nela ok?
        <br />
        Foi utilizado datatables para formatação das tabelas, o que inclui paginação e filtro. Foram utilizados praticamente todos os requisitos da avaliação:
        <ul class="ml-5">
            <li>HTML5:&nbsp;&nbsp;&nbsp;<i style="color:green;" class="fas fa-thumbs-up"></i></li>
            <li>CSS3:&nbsp;&nbsp;&nbsp;<i style="color:green;" class="fas fa-thumbs-up"></i></li>
            <li>PHP:&nbsp;&nbsp;&nbsp;<i style="color:green;" class="fas fa-thumbs-up"></i></li>
            <li>COMPOSER:&nbsp;&nbsp;&nbsp;<i style="color:green;" class="fas fa-thumbs-up"></i></li>
            <li>LARAVEL:&nbsp;&nbsp;&nbsp;<i style="color:green;" class="fas fa-thumbs-up"></i></li>
            <li>JAVASCRIPT:&nbsp;&nbsp;&nbsp;<i style="color:green;" class="fas fa-thumbs-up"></i></li>
            <li>NPM:&nbsp;&nbsp;&nbsp;<i style="color:red;" class="fas fa-thumbs-down"></i></li>
            <li>REACT.JS:&nbsp;&nbsp;&nbsp;<i style="color:red;" class="fas fa-thumbs-down"></i></li>
            <li>MYSQL:&nbsp;&nbsp;&nbsp;<i style="color:green;" class="fas fa-thumbs-up"></i></li>
            <li>PHP UNIT (foi usado para categoria apenas para mostrar no projeto):&nbsp;&nbsp;&nbsp;<i style="color:green;" class="fas fa-thumbs-up"></i></li>
        </ul>
    </p>
</div>
@stop